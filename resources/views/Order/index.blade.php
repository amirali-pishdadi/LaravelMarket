@extends("User.account")

@section('content-account')
    <div class="col-span-9 space-y-4">
        @foreach ($order->orderItems as $orderItem)
            <div class="flex items-center justify-between border gap-12 p-4 border-gray-200 rounded">
                <div class="w-28">
                    @php
                        $product_name =$orderItem->product->name;
                        $product_image = $orderItem->product->product_image;
                    @endphp
                    <img src='{{ asset("uploads/$user->username/$product_name/$product_image") }}' alt="product 6" class="w-full">
                </div>
                <div class="w-1/3">
                    <h2 class="text-gray-800 text-xl font-medium uppercase">{{ $orderItem->product->name }}</h2>
                </div>
                <div class="text-primary text-lg font-medium ">{{ $orderItem->quantity }}x{{ $orderItem->product->price }}</div>
                <a href="/remove-order/{{ $orderItem->id }}/{{ $orderItem->product_id }}"
                    class=" px-4 py-2 text-center text-sm text-white bg-primary border border-primary rounded transition uppercase font-roboto font-medium">Remove</a>

                <div class="text-gray-600 cursor-pointer hover:text-primary">
                    <i class="fa-solid fa-trash"></i>
                </div>
            </div>
        @endforeach
        <button type="submit"
                        class="my-5 w-full bg-neon-blue text-black border font-bold py-2 px-4 rounded-full border-black  ">
                        Pay</a>
                    </button>
    </div>

@endsection
