<!-- sidebar -->
<!-- drawer init and toggle -->
<div class="text-center md:hidden">
    <button class="text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block md:hidden"
        type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example" aria-controls="drawer-example">
        <ion-icon name="grid-outline"></ion-icon>
    </button>
</div>

<!-- drawer component -->
<div id="drawer-example"
    class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800"
    tabindex="-1" aria-labelledby="drawer-label">
    <h5 id="drawer-label"
        class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400"><svg
            class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                clip-rule="evenodd"></path>
        </svg>Info</h5>
    <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <div class="divide-y divide-gray-200 space-y-5">
        <div>
            <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Categories</h3>
            <div class="space-y-2">
                <div class="flex items-center">
                    <input type="checkbox" name="cat-1" id="cat-1"
                        class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                    <label for="cat-1" class="text-gray-600 ml-3 cursor-pointer">Bedroom</label>
                    <div class="ml-auto text-gray-600 text-sm">(15)</div>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="cat-2" id="cat-2"
                        class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                    <label for="cat-2" class="text-gray-600 ml-3 cursor-pointer">Sofa</label>
                    <div class="ml-auto text-gray-600 text-sm">(9)</div>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="cat-3" id="cat-3"
                        class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                    <label for="cat-3" class="text-gray-600 ml-3 cursor-pointer">Office</label>
                    <div class="ml-auto text-gray-600 text-sm">(21)</div>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="cat-4" id="cat-4"
                        class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                    <label for="cat-4" class="text-gray-600 ml-3 cursor-pointer">Outdoor</label>
                    <div class="ml-auto text-gray-600 text-sm">(10)</div>
                </div>
            </div>
        </div>

        <div class="pt-4">
            <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Brands</h3>
            <div class="space-y-2">
                <div class="flex items-center">
                    <input type="checkbox" name="brand-1" id="brand-1"
                        class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                    <label for="brand-1" class="text-gray-600 ml-3 cursor-pointer">Cooking Color</label>
                    <div class="ml-auto text-gray-600 text-sm">(15)</div>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="brand-2" id="brand-2"
                        class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                    <label for="brand-2" class="text-gray-600 ml-3 cursor-pointer">Magniflex</label>
                    <div class="ml-auto text-gray-600 text-sm">(9)</div>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="brand-3" id="brand-3"
                        class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                    <label for="brand-3" class="text-gray-600 ml-3 cursor-pointer">Ashley</label>
                    <div class="ml-auto text-gray-600 text-sm">(21)</div>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="brand-4" id="brand-4"
                        class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                    <label for="brand-4" class="text-gray-600 ml-3 cursor-pointer">M&D</label>
                    <div class="ml-auto text-gray-600 text-sm">(10)</div>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="brand-5" id="brand-5"
                        class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                    <label for="brand-5" class="text-gray-600 ml-3 cursor-pointer">Olympic</label>
                    <div class="ml-auto text-gray-600 text-sm">(10)</div>
                </div>
            </div>
        </div>

        <div class="pt-4">
            <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Price</h3>
            <div class="mt-4 flex items-center">
                <input type="text" name="min" id="min"
                    class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                    placeholder="min">
                <span class="mx-3 text-gray-500">-</span>
                <input type="text" name="max" id="max"
                    class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                    placeholder="max">
            </div>
        </div>

        <div class="pt-4">
            <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Size</h3>
            <div class="flex items-center gap-2">
                <div class="size-selector">
                    <input type="radio" name="size" id="size-xs" class="hidden">
                    <label for="size-xs"
                        class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">XS</label>
                </div>
                <div class="size-selector">
                    <input type="radio" name="size" id="size-sm" class="hidden">
                    <label for="size-sm"
                        class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">S</label>
                </div>
                <div class="size-selector">
                    <input type="radio" name="size" id="size-m" class="hidden">
                    <label for="size-m"
                        class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">M</label>
                </div>
                <div class="size-selector">
                    <input type="radio" name="size" id="size-l" class="hidden">
                    <label for="size-l"
                        class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">L</label>
                </div>
                <div class="size-selector">
                    <input type="radio" name="size" id="size-xl" class="hidden">
                    <label for="size-xl"
                        class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">XL</label>
                </div>
            </div>
        </div>

        <div class="pt-4">
            <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Color</h3>
            <div class="flex items-center gap-2">
                <div class="color-selector">
                    <input type="radio" name="color" id="red" class="hidden">
                    <label for="red"
                        class="border border-gray-200 rounded-sm h-6 w-6 cursor-pointer shadow-sm block"
                        style="background-color: #fc3d57;"></label>
                </div>
                <div class="color-selector">
                    <input type="radio" name="color" id="black" class="hidden">
                    <label for="black"
                        class="border border-gray-200 rounded-sm h-6 w-6 cursor-pointer shadow-sm block"
                        style="background-color: #000;"></label>
                </div>
                <div class="color-selector">
                    <input type="radio" name="color" id="white" class="hidden">
                    <label for="white"
                        class="border border-gray-200 rounded-sm h-6 w-6 cursor-pointer shadow-sm block"
                        style="background-color: #fff;"></label>
                </div>
            </div>
        </div>

    </div>
    <div class="grid grid-cols-2 gap-4">
        <a href="#"
            class="px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Learn
            more</a>
        <a href="#"
            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Get
            access <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg></a>
    </div>
</div>

<!-- ./sidebar -->
<div class="col-span-1 bg-white px-4 pb-6 shadow rounded overflow-hidden hidden md:block">
    <div class="divide-y divide-gray-200 space-y-5">
        <div>
            <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Categories</h3>
            <div class="space-y-2">
                @foreach ($categories as $category)
                    <div class="flex items-center">
                        <a href={{ "/category/$category->id/$category->name" }} for="cat-1"
                            class="text-gray-600 ml-3 cursor-pointer">{{ $category->name }}</a>
                        <div class="ml-auto text-gray-600 text-sm">( {{ $category->products->count() }} )</div>
                    </div>
                @endforeach
            </div>
        </div>

        <form method="GET" action="/products">
            <div class="pt-4">
                <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Price</h3>
                <div class="mt-4 flex items-center">
                    <input type="number" name="min" id="min"
                        class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                        placeholder="min" min="1" value="{{ request()->min }}">
                    <span class="mx-3 text-gray-500">-</span>
                    <input type="number" name="max" id="max"
                        class="w-full border-gray-300 focus:border-primary rounded focus:ring-0 px-3 py-1 text-gray-600 shadow-sm"
                        placeholder="max" min="1" value="{{ request()->max }}">
                </div>
            </div>
            <button type="submit" class="mt-3 px-4 py-2 bg-blue-500 text-white rounded">Filter</button>
        </form>
    </div>
</div>
