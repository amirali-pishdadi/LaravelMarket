@extends("User.account")

@section("content-account")
    <form id="profile-form" class="space-y-40 w-full" method="POST" action="{{ "/edit/$product->name/$product->id"}}" enctype="multipart/form-data">
    @csrf
    <div>
        <label class=" text-gray-700">Name :</label>
        <input type="text" name="name" value="{{ $product->name }}" class="w-full border border-gray-300 rounded px-5 py-2 my-3"
            placeholder="product name">
    </div>
    <div>
        <label class=" text-gray-700">Description :</label>
        <input type="text" value="{{ $product->description }}" name="description" class="w-full border border-gray-300 rounded px-5 py-2 my-3"
            placeholder="Address">
    </div>
    <div>
        <label class=" text-gray-700">Price :</label>
        <input type="number" min="1" value="{{ $product->price }}" name="price" class="w-full border border-gray-300 rounded px-5 py-2 my-3"
            placeholder="price">
    </div>
    <div>
        <label class=" text-gray-700">Quantity :</label>
        <input type="number" min="1" value="{{ $product->quantity }}" name="quantity"
            class="w-full border border-gray-300 rounded px-5 py-2 my-3" placeholder="quantity">
    </div>
    <div>
        <label class=" text-gray-700">Brand :</label>
        <input type="text" name="brand" value="{{ $product->brand }}" class="w-full border border-gray-300 rounded px-5 py-2 my-3"
            placeholder="brand name">
    </div>
    <div>
        <label class=" text-gray-700">Discount :</label>
        <input type="number" min="0" max="99" value="{{ $product->discount }}" name="discount"
            class="w-full border border-gray-300 rounded px-5 py-2 my-3" placeholder="discount">
    </div>
    <div>
        <label class=" text-gray-700">Picture :</label>
        <input type="file" name="product_image" class="w-full border border-gray-300 rounded px-5 py-2 my-3">
    </div>
    <div>
        <label class="flex text-gray-700">Category :</label>
        <select name="category"
            class="w-full border border-gray-300 rounded px-5 py-2 my-3">
            <option value="">None</option>
            @foreach ($categories as $category)
                <option value="{{ $category->name }}">{{ $category->name }}</option>
            @endforeach
            
        </select>
    </div>
    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded w-full">Save</button>
</form>
@endsection
