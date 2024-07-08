<nav class="bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between py-5">
            <div class="flex items-center space-x-6 capitalize">
                <a href="/" class="text-gray-200 hover:text-white transition @if(Request::is('/')) text-white @endif">Home</a>
                <a href="/products" class="text-gray-200 hover:text-white transition @if(Request::is('products')) text-white @endif">Shop</a>
                <a href="#" class="text-gray-200 hover:text-white transition">About us</a>
                <a href="#" class="text-gray-200 hover:text-white transition">Contact us</a>
            </div>

        </div>
    </div>
</nav>
<!-- ./navbar -->
