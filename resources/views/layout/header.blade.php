<header class="py-4 shadow-sm bg-white">
    <div class="container flex items-center justify-between">
        <a href="index.html">
            <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="w-32">
        </a>

        <div class="w-full max-w-xl relative flex">
            <span class="absolute left-4 top-3 text-lg text-gray-400">
                <i class="fa-solid fa-magnifying-glass"></i>
            </span>
            <input type="text" name="search" id="search"
                class="w-full border border-primary border-r-0 pl-12 py-3 pr-3 rounded-l-md focus:outline-none hidden md:flex"
                placeholder="search">
            <button
                class="bg-primary border border-primary text-white px-8 rounded-r-md hover:bg-transparent hover:text-primary transition hidden md:flex items-center">Search</button>
        </div>

        @if (Auth::check())
            
                <a href="/account/{{ Auth::user()->username }}" class="text-center text-gray-700 hover:text-primary transition relative">
                    <div class="text-2xl">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="text-xs leading-3">Account</div>
                </a>
            </div>
        @else
            <div class="flex items-center space-x-4">

                <a href="register" class="text-center text-gray-700 hover:text-primary transition relative">
                    <div class="text-2xl">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                    <div class="text-xs leading-3">Register</div>

                </a>
                <a href="login" class="text-center text-gray-700 hover:text-primary transition relative">
                    <div class="text-2xl">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="text-xs leading-3">Login</div>
                </a>
            </div>
        @endif
    </div>
</header>
