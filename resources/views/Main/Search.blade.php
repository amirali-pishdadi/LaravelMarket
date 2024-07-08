@extends('layout.layout')

@section('content')
    <!-- categories -->
    <div class="container py-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Search {{ $searchTerm }} in Database</h2>
        <h2 class="text-xl font-medium text-gray-800 uppercase mb-6">Search by Category</h2>
        <div class="grid grid-cols-4 gap-4">
            @foreach ($categories as $category)
                <div class="bg-gray-100 p-4 rounded-sm">
                    <a href="{{ url("/category/$category->id/$category->name") }}"
                        class="text-lg text-gray-800 font-roboto font-medium hover:text-blue-500 transition">
                        {{ $category->name }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- ./categories -->

    <!-- new arrival -->
    <div class="container pb-16">
        <h2 class="text-xl font-medium text-gray-800 uppercase mb-6">Search by Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div class="bg-white shadow rounded overflow-hidden group">
                    <div class="relative">
                        @php
                            $user = App\Models\User::find($product->user_id);
                            $imagePath = "uploads/{$user->username}/{$product->name}/{$product->product_image}";
                        @endphp

                        @if (file_exists(public_path($imagePath)))
                            <img src="{{ asset($imagePath) }}" alt="Product Image"
                                class="w-full h-64 object-cover rounded-full">
                        @else
                            <img src="{{ asset('images/default.png') }}" alt="Default profile image" class="w-full">
                        @endif
                        <div
                            class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                        </div>
                    </div>
                    <div class="pt-4 pb-3 px-4">
                        <a href="{{ url("/product/$product->id/$product->name") }}">
                            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                                {{ $product->name }}
                            </h4>
                        </a>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-primary font-semibold">
                                ${{ round($product->price * (1 - $product->discount / 100), 2) }}
                            </p>
                            <p class="text-sm text-gray-400 line-through">${{ $product->price }}</p>
                        </div>
                        <div class="flex items-center">
                            <div class="text-xs text-gray-500 ml-3">({{ $product->quantity }})</div>
                        </div>
                    </div>
                    @auth
                        <form method="POST" action="/add-to-order">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit"
                                class="my-5 w-full bg-neon-blue text-black font-bold py-2 px-4 rounded-full border border-black">
                                Add to cart
                            </button>
                        </form>
                    @endauth
                </div>
            @endforeach
        </div>
    </div>
    <!-- ./new arrival -->
@endsection
