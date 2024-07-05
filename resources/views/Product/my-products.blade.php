@extends('User.account')

@section('content-account')
    <div class="col-span-9 space-y-4">
        @foreach ($products as $product)
            <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                <div class="w-28">
                    <img src='{{ asset("uploads/$user->username/$product->name/$product->product_image") }}' alt="product 6" class="w-full">
                </div>
                <div class="w-1/3">
                    <h2 class="text-gray-800 text-xl font-medium uppercase">{{ $product->name }}</h2>
                </div>
                <div class="text-primary text-lg font-semibold">{{ $product->price }}</div>
                <a href="/edit/{{ $product->name }}/{{ $product->id }}"
                    class=" px-4 py-2 text-center text-sm text-white bg-primary border border-primary rounded transition uppercase font-roboto font-medium">Edit</a>
                <a href="/delete/{{ $product->name }}/{{ $product->id }}"
                    class=" px-4 py-2 text-center text-sm text-white bg-primary border border-primary rounded transition uppercase font-roboto font-medium">Remove</a>

                <div class="text-gray-600 cursor-pointer hover:text-primary">
                    <i class="fa-solid fa-trash"></i>
                </div>
            </div>
        @endforeach
    </div>

@endsection
