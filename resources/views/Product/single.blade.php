@extends("layout.layout")

@section("content")
<div class="max-w-7xl mx-auto px-4 py-8 pt-20">
    <!-- Product Information and Images -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Left Column: Product Images -->
      <div class="flex flex-col items-center space-y-4">
        <!-- Image Carousel -->
        <div class="relative w-full">
          <button id="prevBtn" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-neon-blue text-black p-2 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
              <path d="M15 19l-7-7 7-7"/>
            </svg>
          </button>
          <img id="mainImage" src="https://dummyimage.com/600x400/000/fff" alt="Product Image" class="w-full h-64 object-cover rounded-full">
          <button id="nextBtn" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-neon-blue text-black p-2 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
              <path d="M9 5l7 7-7 7"/>
            </svg>
          </button>
        </div>
        <!-- Thumbnails -->
        <div class="flex space-x-2">
          <img src="https://dummyimage.com/600x400/000/fff" alt="Thumbnail 1" class="w-16 h-16 object-cover rounded-full thumbnail">
          <img src="https://dummyimage.com/600x400/555/fff" alt="Thumbnail 2" class="w-16 h-16 object-cover rounded-full thumbnail">
          <img src="https://dummyimage.com/600x400/aaa/fff" alt="Thumbnail 3" class="w-16 h-16 object-cover rounded-full thumbnail">
          <img src="https://dummyimage.com/600x400/777/fff" alt="Thumbnail 4" class="w-16 h-16 object-cover rounded-full thumbnail">
          <img src="https://dummyimage.com/600x400/222/fff" alt="Thumbnail 5" class="w-16 h-16 object-cover rounded-full thumbnail">
        </div>
      </div>

      <!-- Right Column: Product Details -->
      <div class="space-y-4">
        <h1 class="text-3xl font-bold">Product Name</h1>
        <p class="text-xl font-semibold text-neon-blue">$99.99</p>
        <div>
          <label for="quantity" class="block text-sm font-medium text-gray-300">Quantity</label>
          <select id="quantity" class="mt-1 block w-full bg-gray-800 border border-gray-700 rounded-full text-gray-300 p-2">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <p class="text-sm text-gray-400">Discount: 10%</p>
        <p class="text-gray-300">This is a short description of the product. It highlights the key features and benefits.</p>
        <button class="w-full bg-neon-blue text-black font-bold py-2 px-4 rounded-full">Add to Inventory</button>
      </div>
    </div>

    <!-- Comment Section -->
    @extends("Comment.comment")
  </div>

@endsection