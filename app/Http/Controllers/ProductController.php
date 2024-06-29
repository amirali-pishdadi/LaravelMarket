<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("Product.shop", ["products" => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "name"        => "string|required|min:5",
            "description" => "string|required|max:255",
            "price"       => "required",
            "quantity"    => "required",
            "brand"       => "string|required|max:10",
            "discount"    => "required",
            "category"    => "required|string",
            "product_image" => 'required|mimes:jpg,png|max:10240',
        ]);

        dd($formFields);
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
            return view("Product.single", ["product" => $product]);
        } else {
            abort(404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
