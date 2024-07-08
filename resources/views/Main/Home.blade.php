@extends('layout.layout')

@section('content')
    <!-- Banner -->
    <div class="bg-cover bg-no-repeat bg-center py-36" style="background-image: url('{{ asset('images/banner-bg.jpg') }}');">
        <div class="container">
            <h1 class="text-6xl text-gray-800 font-medium mb-4 capitalize">
                best collection for <br> home decoration
            </h1>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam <br>
                accusantium perspiciatis, sapiente magni eos dolorum ex quos dolores odio</p>
            <div class="mt-12">
                <a href="#"
                    class="bg-primary border border-primary text-white px-8 py-3 font-medium 
                    rounded-md hover:bg-transparent hover:text-primary">Shop Now</a>
            </div>
        </div>
    </div>
    <!-- ./Banner -->

    <!-- Categories -->
    <div class="container py-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Shop by Category</h2>
        <div class="grid grid-cols-4 gap-4">
            @foreach ($categories as $category)
                <div class="bg-gray-100 p-4 border border-black rounded-md shadow-md">
                    <a href="{{ "/category/$category->id/$category->name" }}"
                        class="text-lg text-gray-800 font-roboto font-medium hover:text-blue-500 transition">{{ $category->name }}</a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- ./Categories -->

    <!-- New Arrivals -->
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Top New Arrivals</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach ($newProducts as $newProduct)
                <div class="bg-white shadow rounded overflow-hidden group">
                    <div class="relative">
                        @php
                            $user = App\Models\User::findOrFail($newProduct->user_id);
                            $imagePath = "uploads/{$user->username}/{$newProduct->name}/{$newProduct->product_image}";
                        @endphp

                        @if (file_exists(public_path($imagePath)))
                            <img src="{{ asset($imagePath) }}" alt="Product Image"
                                class="w-full h-64 object-cover rounded-full">
                        @else
                            <img src="{{ asset('images/default.png') }}" alt="Default profile image" class="w-full">
                        @endif
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                            <!-- Additional overlay content can be added here if needed -->
                        </div>
                    </div>
                    <div class="pt-4 pb-3 px-4">
                        <a href="{{ url("/product/$newProduct->id/$newProduct->name") }}">
                            <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                                {{ $newProduct->name }}
                            </h4>
                        </a>
                        <div class="flex items-baseline mb-1 space-x-2">
                            <p class="text-xl text-primary font-semibold">
                                ${{ round(($newProduct->price * $newProduct->discount) / 100, 2) }}
                            </p>
                            <p class="text-sm text-gray-400 line-through">${{ $newProduct->price }}</p>
                        </div>
                        <div class="flex items-center">
                            <div class="text-xs text-gray-500 ml-3">({{ $newProduct->quantity }})</div>
                        </div>
                    </div>
                    @auth
                        <form method="POST" action="/add-to-order">
                            @csrf
                            <input type="hidden" name="quantity" value="1" />
                            <input type="hidden" name="product_id" value="{{ $newProduct->id }}" />
                            <button type="submit" class="my-5 w-full bg-neon-blue text-black font-bold py-2 px-4 rounded-full border border-black">
                                Add to Cart
                            </button>
                        </form>
                    @endauth
                </div>
            @endforeach
        </div>
    </div>
    <!-- ./New Arrivals -->
@endsection
