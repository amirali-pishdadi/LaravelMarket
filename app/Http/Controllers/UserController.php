<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function searchPage(Request $request)
    {
        $Productquery = Product::query();
        $Categoryquery = Category::query();

        // Apply the search filter if present
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $Productquery->where('name', 'LIKE', '%' . $searchTerm . '%');
            $Categoryquery->where('name', 'LIKE', '%' . $searchTerm . '%');
        }

        // Execute the query and get the filtered products
        $products = $Productquery->get();
        $categories = $Categoryquery->get();

        return view('Main.Search', ['products' => $products, 'categories' => $categories , "searchTerm" => $searchTerm]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("User.register");
    }

    /**
     * Show the form for Login.
     */
    /**
     * Show Login form.
     */
    public function login(Request $request)
    {
        // Return the view for user login
        return view("User.login");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "name"     => "required|string|min:3",
            "email"    => "required|email|min:3",
            "username" => "required|string|min:4",
            "password" => "required|string|min:8",
            "confirm"  => "required|string|min:8",
        ]);


        if ($formFields["password"] == $formFields["confirm"]) {

            User::create([
                "name"     => $formFields["name"],
                "email"    => $formFields["email"],
                "username" => $formFields["username"],
                "password" => Hash::make($formFields["password"]),
                "is_admin" => false,
            ]);

            return redirect("/login");
        } else {
            return back()->with("message", "Password and confirm password should be equal");
        }
    }


    /**
     * Validate Login form and Log user into website.
     */
    public function authenthicate(Request $request)
    {
        // Validate login form fields from the request
        $formFields = $request->validate([
            'email'    => 'email|required|min:3',
            'password' => 'string|required|min:8',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($formFields)) {
            $user = User::where('email', $formFields["email"])->first();
            auth()->login($user);
            return redirect("/");
        } else {
            // Redirect the user to the registration page if authentication fails
            return redirect('/register');
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $username)
    {
        $user = User::where('username', $username)->first();

        // Check if the user exists
        if ($user == Auth::user()) {


            return view("User.edit-profile", ["user" => $user]);
        } else {
            // If the user is not found or does not match the authenticated user, return a 404 error
            abort(404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $formFields = $request->validate([
            "name"             => "required|string|min:5",
            "address"          => "required|string|min:5",
            "username"         => "required|string|min:4",
            "zip_code"         => "required|string|min:5",
            "phone"            => "required|string|min:5",
            "current_password" => "required|min:5",
            "password"         => "required|min:5",
            "confirm"          => "required|min:5",
        ]);

        $currentUser = Auth::user();
        $user = User::where("username", $formFields["username"])->first();

        if ($user && $user->email == $currentUser->email) {
            if (Hash::check($formFields["current_password"], $currentUser->password)) {
                // Update user information
                $currentUser->name = $formFields['name'];
                $currentUser->address = $formFields['address'];
                $currentUser->username = $formFields['username'];
                $currentUser->zip_code = $formFields['zip_code'];
                $currentUser->phone_number = $formFields['phone'];
                $currentUser->password = Hash::make($formFields['password']);

                // Save the updated user information
                $currentUser->save();
                // Redirect or return a success response
                return redirect()->back()->with('success', 'Profile updated successfully.');
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function logout(string $username)
    {
        // Retrieve the user with the given username from the database
        $user = User::where('username', $username)->first();

        // Check if the user exists
        if ($user == Auth::user()) {

            // Logout the authenticated user
            Auth::logout();

            // Redirect back with a success message
            return back()->with("message", "User logouted successfully");
        } else {
            // If the user is not found or does not match the authenticated user, return a 404 error
            abort(404);
        }
    }
}
