@extends('layout.layout')

@section('content')
    <div class="container py-4 flex items-center gap-3">
        <a href="" class="text-primary text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Account</p>
    </div>
    <!-- ./breadcrumb -->

    <!-- account wrapper -->
    <div class="container flex flex-auto items-start gap-6 pt-4 pb-16">
        <style>
            /* Basic styling for demonstration */
            .content {
                display: none;
                /* Hide all content initially */
            }

            .active {
                display: block;
                /* Show active content */
            }
        </style>

        <!-- Sidebar -->
        <div class="col-span-3">
            <div class="px-4 py-3 shadow flex items-center gap-4">
                <div class="flex-shrink-0">
                    <img src="{{ asset('images/avatar.png') }}" alt="profile"
                        class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
                </div>
                <div class="flex-grow">
                    <p class="text-gray-600">Hello,</p>
                    <h4 class="text-gray-800 font-medium">{{ $user->name }}</h4>
                </div>
            </div>

            <div class="mt-6 bg-white shadow rounded p-4 divide-y divide-gray-200 space-y-4 text-gray-600">
                <div class="space-y-1 pl-8">
                    <a href="#" onclick="showContent('profile-management')"
                        class="relative hover:text-primary block capitalize transition">
                        Profile Management
                    </a>
                </div>

                <div class="space-y-1 pl-8 pt-4">
                    <a href="#" onclick="showContent('my-wishlist')"
                        class="relative hover:text-primary block font-medium capitalize transition">
                        <span class="absolute -left-8 top-0 text-base">
                            <i class="fa-regular fa-heart"></i>
                        </span>
                        Wishlist
                    </a>
                </div>

                <div class="space-y-1 pl-8 pt-4">
                    <a href="#" onclick="showContent('my-cart')"
                        class="relative hover:text-primary block font-medium capitalize transition">
                        <span class="absolute -left-8 top-0 text-base">
                            <i class="fa-regular fa-heart"></i>
                        </span>
                        Cart
                    </a>
                </div>

                <div class="space-y-1 pt-5 pl-8">
                    <a href="#" onclick="showContent('add-product')"
                        class="relative hover:text-primary block capitalize transition">
                        Add Product
                    </a>
                     <a href="#" onclick="showContent('my-products')"
                        class="relative hover:text-primary block capitalize transition">
                        My Products
                    </a>
                </div>

                @if (Auth::check() && Auth::user()->username)
                    <div class="space-y-1 pl-8 pt-4">
                        <a href="/logout/{{ Auth::user()->username }}"
                            class="relative hover:text-primary block font-medium capitalize transition">
                            <span class="absolute -left-8 top-0 text-base">
                                <i class="fa-regular fa-arrow-right-from-bracket"></i>
                            </span>
                            Logout
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- ./Sidebar -->

        <!-- Content Sections -->
        <div id="default-content" class="content active min-w-fit max-w-full">
            <div id="default-content" class="content active max-w-full p-6 bg-white shadow rounded-lg">

                @include('User.main-account')
            </div>
        </div>


        <div id="profile-management" class="content min-w-fit max-w-full">
            <!-- Profile Management -->
            @include('User.edit-profile')
        </div>
        <div id="my-wishlist" class="content min-w-fit max-w-full">
            @include('User.wishlist')
        </div>

        <div id="my-cart" class="content min-w-fit max-w-full">
            @include('User.cart')
        </div>

        <div id="add-product" class="content min-w-fit max-w-full">
            @include('Product.add-product')
        </div>
        <div id="my-products" class="content min-w-fit max-w-full">
            @include('Product.my-products')
        </div>


    </div>





    </div>
    <!-- ./Content Sections -->
    </div>
    <!-- ./account wrapper -->

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sections = [{
                    buttonId: 'edit-profile',
                    infoId: 'profile-info',
                    formId: 'profile-form'
                },
                {
                    buttonId: 'edit-addresses',
                    infoId: 'addresses-info',
                    formId: 'addresses-form'
                }
            ];

            sections.forEach(section => {
                const button = document.getElementById(section.buttonId);
                const info = document.getElementById(section.infoId);
                const form = document.getElementById(section.formId);

                if (button) {
                    button.addEventListener('click', () => {
                        info.classList.toggle('hidden');
                        form.classList.toggle('hidden');
                    });
                }
            });
        });

        function showContent(id) {
            const contents = document.getElementsByClassName('content');
            for (let i = 0; i < contents.length; i++) {
                contents[i].style.display = 'none';
            }
            document.getElementById(id).style.display = 'block';
        }
    </script>
@endsection
