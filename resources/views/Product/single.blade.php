@extends('layout.layout')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8 pt-20">
        <!-- Product Information and Images -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Left Column: Product Images -->
            <div class="flex flex-col items-center space-y-4">
                <!-- Image Carousel -->
                <div class="w-full flex">
                    @php

                        $user = App\Models\User::findOrFail($product->user_id);

                        $imagePath = "uploads/{$user->username}/{$product->name}/$product->product_image";
                    @endphp

                    @if (file_exists(public_path($imagePath)))
                        <img id="mainImage" src="{{ asset($imagePath) }}" alt="Product Image"
                            class=" w-full h-64 object-cover rounded-md">
                    @else
                        <img src="{{ asset('images/default.png') }}" alt="Default profile image" class="w-full">
                    @endif

                </div>

            </div>

            <!-- Right Column: Product Details -->
            <div class="space-y-4">
                <h1 class="text-3xl font-bold">{{ $product->name }}</h1>
                <p class="text-xl font-semibold text-neon-blue">${{ $product->price }}</p>

                <p class="text-sm text-black">Discount: {{ $product->discount }}%</p>
                <p class="text-black">{{ $product->description }}</p>
                <div>
                    <form method="POST" action="/add-to-order">
                        @csrf
                        <label for="quantity" class="block text-sm font-medium text-black">Quantity</label>
                        <input id="quantity" name="quantity" type="number"
                            class="mt-1 block w-full border border-gray-700 rounded-full text-black p-2" min="1"
                            default="1" max="{{ $product->quantity }}" />
                        <input class="hidden" type="number" name="product_id" value="{{ $product->id }}" />
                    <button type="submit"
                        class="my-5 w-full bg-neon-blue text-black font-bold py-2 px-4 rounded-full border  border-black  ">
                        add to cart</a>
                    </button>
                    </form>
                    
                </div>

            </div>
        </div>

        <!-- Comment Section -->
        {{-- @extends("Comment.comment") --}}
    </div>
@endsection
