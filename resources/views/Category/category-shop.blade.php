@extends('layout.layout')

@section('content')
    <div class="container py-4 flex items-center gap-3">
        <a href="../index.html" class="text-primary text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Shop</p>
    </div>
    <!-- ./breadcrumb -->

    <!-- shop wrapper -->
    <div class="container grid md:grid-cols-4 grid-cols-2 gap-6 pt-4 pb-16 items-start">
        @include("Product.sidebar")
        <!-- products -->
        <div class="col-span-3">
            <div class="flex items-center mb-4">
                <div class="flex gap-2 ml-auto">
                    <div class="border border-primary w-10 h-9 flex items-center justify-center text-white bg-primary rounded cursor-pointer">
                        <i class="fa-solid fa-grip-vertical"></i>
                    </div>
                    <div class="border border-gray-300 w-10 h-9 flex items-center justify-center text-gray-600 rounded cursor-pointer">
                        <i class="fa-solid fa-list"></i>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-3 grid-cols-2 gap-6">
                @foreach ($products as $product)
                    <div class="bg-white shadow rounded overflow-hidden group">
                        <div class="relative">
                            @php
                                $user = App\Models\User::findOrFail($product->user_id);
                                $imagePath = "uploads/{$user->username}/{$product->name}/{$product->product_image}";
                                $imageExists = file_exists(public_path($imagePath));
                            @endphp

                            <img src="{{ $imageExists ? asset($imagePath) : asset('images/default-profile.jpg') }}"
                                alt="Product Image" class="w-full">

                            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                                <a href="#" class="text-white">View Details</a>
                            </div>
                        </div>
                        <div class="pt-4 pb-3 px-4">
                            <a href="/product/{{ $product->id }}/{{ $product->name }}">
                                <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                                    {{ $product->name }}</h4>
                            </a>
                            <div class="flex items-baseline mb-1 space-x-2">
                                <p class="text-xl text-primary font-semibold">
                                    ${{ round(($product->price * (100 - $product->discount)) / 100, 2) }}</p>
                                <p class="text-sm text-gray-400 line-through">${{ $product->price }}</p>
                            </div>
                            <div class="flex items-center">
                                <div class="flex gap-1 text-sm text-yellow-400">
                                    @for ($i = 0; $i < 5; $i++)
                                        <span><i class="fa-solid fa-star"></i></span>
                                    @endfor
                                </div>
                                <div class="text-xs text-gray-500 ml-3">({{ $product->quantity }})</div>
                            </div>
                        </div>
                        <a href="#" class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">Add to cart</a>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- ./products -->
    </div>
    <!-- ./shop wrapper -->
@endsection
