<!-- Sidebar -->
<div class="col-span-3">
    @if (Auth::check() && Auth::user()->username)
        <div class="px-4 py-3 shadow-md flex items-center gap-4 rounded-md border border-gray-300">
            <div class="flex-shrink-0">
                <img src="{{ asset('images/avatar.png') }}" alt="profile"
                    class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
            </div>
            <div class="flex-grow">
                <p class="text-gray-600">Hello,</p>
                <h4 class="text-gray-800 font-medium">{{ Auth::user()->name }}</h4>
            </div>
        </div>

        <div class="mt-6 bg-white shadow-md rounded-md p-4 divide-y divide-gray-200 space-y-4 text-gray-600">
            <div class="space-y-1 pl-8">
                <a href="/account/{{ Auth::user()->username }}"
                    class="relative hover:text-primary block capitalize transition">
                    Profile Management
                </a>
            </div>

            @if (Auth::user()->is_admin)
                <div class="space-y-1 pt-4 pl-8">
                    <a href="/admin"
                        class="relative hover:text-primary block capitalize transition">
                        Admin Panel
                    </a>
                </div>

                <div class="space-y-1 pt-4 pl-8">
                    <a href="/create-ads"
                        class="relative hover:text-primary block capitalize transition">
                        Add Advertisement
                    </a>
                    <a href="/manage-ads"
                        class="relative hover:text-primary block capitalize transition">
                        Advertisement Management
                    </a>
                </div>
            @endif

            <div class="space-y-1 pl-8 pt-4">
                <a href="/order/{{ Auth::user()->username }}"
                    class="relative hover:text-primary block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="far fa-heart"></i>
                    </span>
                    Order
                </a>
            </div>

            <div class="space-y-1 pt-5 pl-8">
                <a href="/add-product" class="relative hover:text-primary block capitalize transition">
                    Add Product
                </a>
                <a href="/{{ Auth::user()->username }}/products"
                    class="relative hover:text-primary block capitalize transition">
                    My Products
                </a>
            </div>

            <div class="space-y-1 pl-8 pt-4">
                <a href="/logout/{{ Auth::user()->username }}"
                    class="relative hover:text-primary block font-medium capitalize transition">
                    <span class="absolute -left-8 top-0 text-base">
                        <i class="far fa-arrow-right"></i>
                    </span>
                    Logout
                </a>
            </div>
        </div>
    @endif
</div>
<!-- ./Sidebar -->
