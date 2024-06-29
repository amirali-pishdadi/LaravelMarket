@extends("layout.layout")

@section("content")
<div class="max-w-7xl mx-auto px-4 py-8 pt-20">
    <!-- Product Information and Images -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Left Column: Product Images -->
      <div class="flex flex-col items-center space-y-4">
        <!-- Image Carousel -->
        <div class="w-full flex">
          
          <img id="mainImage" src="{{ $product->product_image }}" alt="Product Image" class=" w-full h-64 object-cover rounded-md">
          
        </div>
        
      </div>

      <!-- Right Column: Product Details -->
      <div class="space-y-4">
        <h1 class="text-3xl font-bold">{{ $product->name }}</h1>
        <p class="text-xl font-semibold text-neon-blue">${{ $product->price }}</p>
        <div>
          <label for="quantity" class="block text-sm font-medium text-black">Quantity</label>
          <input id="quantity" type="number" class="mt-1 block w-full border border-gray-700 rounded-full text-black p-2" min="1" max="{{ $product->quantity }}"/>
            
          
        </div>
        <p class="text-sm text-black">Discount: {{ $product->discount }}%</p>
        <p class="text-black">This is a short description of the product. It highlights the key features and benefits.</p>
        <button class="w-full bg-neon-blue text-black font-bold py-2 px-4 rounded-full border  border-black border-dashed  ">Add to Inventory</button>
      </div>
    </div>

    <!-- Comment Section -->
    {{-- @extends("Comment.comment") --}}
  </div>

@endsection