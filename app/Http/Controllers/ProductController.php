<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function homePage()
    {
        $newProducts = Product::orderBy("created_at", "desc")->take(4)->get();
        $categories = Category::all();
        // $ads = Advertisement::find(12);
        return view("Main.Home", ["newProducts" => $newProducts, "categories" => $categories]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Initialize the query for products
        $query = Product::query();

        // Apply the minimum price filter if present
        if ($request->filled('min')) {
            $query->where('price', '>=', $request->min);
        }

        // Apply the maximum price filter if present
        if ($request->filled('max')) {
            $query->where('price', '<=', $request->max);
        }

        // Execute the query and get the filtered products
        $products = $query->get();

        // Retrieve all categories
        $categories = Category::all();

        // Return the view with the filtered products and categories
        return view('Product.shop', ['products' => $products, 'categories' => $categories]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Product.add-product", ["categories" => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "name"          => "string|required|min:5",
            "description"   => "string|required|max:255",
            "price"         => "required|integer|min:1",
            "quantity"      => "required|integer|min:1",
            "brand"         => "string|required|max:10",
            "discount"      => "required|integer|min:0|max:100",
            "category"      => "required|string",
            "product_image" => 'required|mimes:jpg,png|max:10240',
        ]);
        $categories = Category::pluck('name')->toArray();
        if ($formFields) {
            $currentUser = Auth::user();


            // Handle file upload for profile picture
            $uploadedFile = $request->file("product_image");
            $fileName = time() . "." . $formFields["name"] . "." . $uploadedFile->getClientOriginalName();
            $uploadedFile->move(public_path("uploads/$currentUser->username/" . $formFields["name"] . "/"), $fileName);

            if (!in_array($formFields["category"], $categories)) {
                abort(400);
            } else {
                $findCategory = Category::where("name", $formFields["category"])->first();
                Product::create([
                    "name"          => $formFields["name"],
                    "description"   => $formFields["description"],
                    "price"         => (int) $formFields["price"],
                    "quantity"      => (int) $formFields["quantity"],
                    "brand"         => $formFields["brand"],
                    "user_id"       => $currentUser->id,
                    "discount"      => (int) $formFields["discount"],
                    "category_id"   => $findCategory->id,
                    "product_image" => $fileName,
                ]);

                return back()->with("message", "created ...");
            }

        } else {
            abort(400);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show($id, $name)
    {
        $product = Product::where('id', $id)
            ->where('name', $name)
            ->first();

        if ($product) {
            $comments = $product->comments;
            return view("Product.single", ["product" => $product, "comments" => $comments]);
        } else {
            abort(404);
        }

    }

    public function showUserProduct($username)
    {
        $currentUser = Auth::user();
        $originalUser = User::where("username", $username)->first();
        if ($originalUser && $currentUser->email == $originalUser->email) {
            $userProducts = Product::where("user_id", $originalUser->id)->get();
            return view("Product.my-products", ["products" => $userProducts, "user" => $originalUser]);
        } else {
            return response()->json([
                'message' => 'please login / register',
            ], 404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($name, $id)
    {
        $product = Product::where('id', $id)
            ->where('name', $name)
            ->first();
        return view("Product.edit-product", ["product" => $product, "categories" => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $name, $id)
    {
        $formFields = $request->validate([
            "name"          => "string|required|min:5",
            "description"   => "string|required|max:255",
            "price"         => "required|integer|min:1",
            "quantity"      => "required|integer|min:1",
            "brand"         => "string|required|max:10",
            "discount"      => "required|integer|min:0|max:100",
            "category"      => "required|string",
            "product_image" => 'required|mimes:jpg,png|max:10240',
        ]);

        $categories = Category::pluck('name')->toArray();
        $currentUser = Auth::user();
        $product = Product::where('id', $id)
            ->where('name', $name)
            ->first();

        if ($product && $currentUser->id === $product->user_id) {
            $oldPicturePath = public_path("uploads/$currentUser->username/$product->name/") . $product->product_image;

            if (!in_array($formFields["category"], $categories)) {
                return response()->json([
                    'message' => 'category not found',
                ], 404);
            } else {
                if (File::exists($oldPicturePath)) {
                    File::delete($oldPicturePath);

                    $findCategory = Category::where("name", $formFields["category"])->first();

                    // Handle file upload for profile picture
                    $uploadedFile = $request->file("product_image");
                    $fileName = time() . "." . $product->name . "." . $uploadedFile->getClientOriginalName();
                    $uploadedFile->move(public_path("uploads/$currentUser->username/" . $formFields["name"] . "/"), $fileName);

                    $product->name = $formFields["name"];
                    $product->description = $formFields["description"];
                    $product->price = (int) $formFields["price"];
                    $product->quantity = (int) $formFields["quantity"];
                    $product->discount = (int) $formFields["discount"];
                    $product->category_id = $findCategory->id;
                    $product->product_image = $fileName;
                    $product->save();

                    return response()->json([
                        'message' => 'product edited succsesfully',
                    ], 404);
                } else {
                    return response()->json([
                        'message' => 'product profile not found',
                    ], 404);
                }
            }
        } else {
            return response()->json([
                'message' => 'not found',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($name, $id)
    {
        $currentUser = Auth::user();
        $product = Product::where('id', $id)
            ->where('name', $name)
            ->first();
        if ($currentUser->id == $product->user_id) {
            $product->delete();
            return response()->json([
                'message' => 'deleted',
            ], 201);
        } else {
            return response()->json([
                'message' => 'error',
            ], 404);

        }
    }
}
