<nav class="bg-gray-800">
    <div class="container flex">
        <div class="px-8 py-4 bg-primary md:flex items-center cursor-pointer relative group hidden">
            <span class="text-white">
                <i class="fa-solid fa-bars"></i>
            </span>
            <span class="capitalize ml-2 text-white hidden">All Categories</span>

            <!-- dropdown -->
            <div
                class="absolute w-full left-0 top-full bg-white shadow-md py-3 divide-y divide-gray-300 divide-dashed opacity-0 group-hover:opacity-100 transition duration-300 invisible group-hover:visible">
                <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="{{ asset('images/icons/sofa.svg') }}" alt="sofa" class="w-5 h-5 object-contain">
                    <span class="ml-6 text-gray-600 text-sm">Sofa</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="{{ asset('images/icons/terrace.svg') }}" alt="terrace" class="w-5 h-5 object-contain">
                    <span class="ml-6 text-gray-600 text-sm">Terrace</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="{{ asset('images/icons/bed.svg') }}" alt="bed" class="w-5 h-5 object-contain">
                    <span class="ml-6 text-gray-600 text-sm">Bed</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="{{ asset('images/icons/office.svg') }}" alt="office" class="w-5 h-5 object-contain">
                    <span class="ml-6 text-gray-600 text-sm">Office</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="{{ asset('images/icons/outdoor-cafe.svg') }}" alt="outdoor" class="w-5 h-5 object-contain">
                    <span class="ml-6 text-gray-600 text-sm">Outdoor</span>
                </a>
                <a href="#" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
                    <img src="{{ asset('images/icons/bed-2.svg') }}" alt="Mattress" class="w-5 h-5 object-contain">
                    <span class="ml-6 text-gray-600 text-sm">Mattress</span>
                </a>
            </div>
        </div>

        <div class="flex items-center justify-between flex-grow md:pl-12 py-5">
            <div class="flex items-center space-x-6 capitalize">
                <a href="index.html" class="text-gray-200 hover:text-white transition">Home</a>
                <a href="pages/shop.html" class="text-gray-200 hover:text-white transition">Shop</a>
                <a href="#" class="text-gray-200 hover:text-white transition">About us</a>
                <a href="#" class="text-gray-200 hover:text-white transition">Contact us</a>
            </div>
            <a href="pages/login.html" class="text-gray-200 hover:text-white transition">Login</a>
        </div>
    </div>
</nav>
<!-- ./navbar -->

<!-- banner -->
<div class="bg-cover bg-no-repeat bg-center py-36" style="background-image: url('{{ asset('images/banner-bg.jpg') }}');">
    <div class="container">
        <h1 class="text-6xl text-gray-800 font-medium mb-4 capitalize">
            best collection for <br> home decoration
        </h1>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam <br>
            accusantium perspiciatis, sapiente
            magni eos dolorum ex quos dolores odio</p>
        <div class="mt-12">
            <a href="#" class="bg-primary border border-primary text-white px-8 py-3 font-medium 
                rounded-md hover:bg-transparent hover:text-primary">Shop Now</a>
        </div>
    </div>
</div>