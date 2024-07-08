<header class="py-4 shadow-sm bg-white">
    <div class="container flex items-center justify-between">
        <a href="/">
            <img src="{{ asset('images/logo.svg') }}" alt="Company Logo" class="w-32">
        </a>
        <form method="GET" action="/search">
            <div class="w-full max-w-xl relative flex">
                <span class="absolute left-4 top-3 text-lg text-gray-400">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input type="text" name="search" id="search"
                    class="w-full border border-primary border-r-0 pl-12 py-3 pr-3 rounded-l-md focus:outline-none"
                    placeholder="Search" value="{{ request()->search }}">
                <button type="submit"
                    class="bg-primary border border-primary px-8 rounded-r-md hover:bg-transparent text-primary transition flex items-center">
                    <span class="hidden md:block">Search</span>
                </button>
            </div>
        </form>
        <div class="flex items-center space-x-4">
            @if (Auth::check())
                <a href="/account/{{ Auth::user()->username }}"
                    class="text-center text-gray-700 hover:text-primary transition relative">
                    <div class="text-2xl">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="text-xs leading-3">Account</div>
                </a>
            @else
                <a href="/register"
                    class="text-center text-gray-700 hover:text-primary transition relative">
                    <div class="text-2xl">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                    <div class="text-xs leading-3">Register</div>
                </a>
                <a href="/login"
                    class="text-center text-gray-700 hover:text-primary transition relative">
                    <div class="text-2xl">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <div class="text-xs leading-3">Login</div>
                </a>
            @endif
        </div>
    </div>
</header>
