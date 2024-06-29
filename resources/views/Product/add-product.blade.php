<form id="profile-form" class="space-y-40 w-full" method="POST" action="/add-product" enctype="multipart/form-data">
    @csrf
    <div>
        <label class=" text-gray-700">Name :</label>
        <input type="text" name="name" class="w-full border border-gray-300 rounded px-5 py-2 my-3"
            placeholder="product name">
    </div>
    <div>
        <label class=" text-gray-700">Description :</label>
        <input type="text" name="description" class="w-full border border-gray-300 rounded px-5 py-2 my-3"
            placeholder="Address">
    </div>
    <div>
        <label class=" text-gray-700">Price :</label>
        <input type="number" min="1" name="price" class="w-full border border-gray-300 rounded px-5 py-2 my-3"
            placeholder="price">
    </div>
    <div>
        <label class=" text-gray-700">Quantity :</label>
        <input type="number" min="1" name="quantity"
            class="w-full border border-gray-300 rounded px-5 py-2 my-3" placeholder="quantity">
    </div>
    <div>
        <label class=" text-gray-700">Brand :</label>
        <input type="text" name="brand" class="w-full border border-gray-300 rounded px-5 py-2 my-3"
            placeholder="brand name">
    </div>
    <div>
        <label class=" text-gray-700">Discount :</label>
        <input type="number" min="0" max="100" name="discount"
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
