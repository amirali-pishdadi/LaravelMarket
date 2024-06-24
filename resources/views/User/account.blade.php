@extends('layout.layout')

@section('content')
    <div class="container py-4 flex items-center gap-3">
        <a href="../index.html" class="text-primary text-base">
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
                    <img src="path/to/avatar.png" alt="profile"
                        class="rounded-full w-14 h-14 border border-gray-200 p-1 object-cover">
                </div>
                <div class="flex-grow">
                    <p class="text-gray-600">Hello,</p>
                    <h4 class="text-gray-800 font-medium">John Doe</h4>
                </div>
            </div>

            <div class="mt-6 bg-white shadow rounded p-4 divide-y divide-gray-200 space-y-4 text-gray-600">
                <div class="space-y-1 pl-8">
                    <a href="#" onclick="showContent('manage-account')"
                        class="relative text-primary block font-medium capitalize transition">
                        <span class="absolute -left-8 top-0 text-base">
                            <i class="fa-regular fa-address-card"></i>
                        </span>
                        Manage account
                    </a>
                    <a href="#" onclick="showContent('profile-info')"
                        class="relative hover:text-primary block capitalize transition">
                        Profile information
                    </a>
                    <a href="#" onclick="showContent('manage-addresses')"
                        class="relative hover:text-primary block capitalize transition">
                        Manage addresses
                    </a>
                    <a href="#" onclick="showContent('change-password')"
                        class="relative hover:text-primary block capitalize transition">
                        Change password
                    </a>
                </div>

                <div class="space-y-1 pl-8 pt-4">
                    <a href="#" onclick="showContent('my-wishlist')"
                        class="relative hover:text-primary block font-medium capitalize transition">
                        <span class="absolute -left-8 top-0 text-base">
                            <i class="fa-regular fa-heart"></i>
                        </span>
                        My wishlist
                    </a>
                </div>

                <div class="space-y-1 pl-8 pt-4">
                    <a href="#" onclick="showContent('logout')"
                        class="relative hover:text-primary block font-medium capitalize transition">
                        <span class="absolute -left-8 top-0 text-base">
                            <i class="fa-regular fa-arrow-right-from-bracket"></i>
                        </span>
                        Logout
                    </a>
                </div>
            </div>
        </div>
        <!-- ./Sidebar -->

        <!-- Content Sections -->
        <div id="manage-account" class="content">
            <!-- Manage account -->
            <div class="col-span-9 shadow rounded bg-white px-4 pt-6 pb-8">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-medium text-gray-800 text-lg">Manage Account</h3>
                    <button id="edit-account" class="text-primary">Edit</button>
                </div>
                <div id="account-info" class="space-y-1">
                    <h4 class="text-gray-700 font-medium">John Doe</h4>
                    <p class="text-gray-800">example@mail.com</p>
                    <p class="text-gray-800">0811 8877 988</p>
                </div>
                <form id="account-form" class="hidden space-y-4">
                    <div>
                        <label for="name" class="block text-gray-700">Name</label>
                        <input type="text" id="name" class="w-full border border-gray-300 rounded px-3 py-2 mt-1"
                            value="John Doe">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" id="email" class="w-full border border-gray-300 rounded px-3 py-2 mt-1"
                            value="example@mail.com">
                    </div>
                    <div>
                        <label for="phone" class="block text-gray-700">Phone</label>
                        <input type="text" id="phone" class="w-full border border-gray-300 rounded px-3 py-2 mt-1"
                            value="0811 8877 988">
                    </div>
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded">Save</button>
                </form>
            </div>

        </div>

        <div id="profile-info" class="content">
            <!-- Profile information -->
            <div class="col-span-9 shadow rounded bg-white px-4 pt-6 pb-8">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-medium text-gray-800 text-lg">Profile Information</h3>
                    <button id="edit-profile" class="text-primary">Edit</button>
                </div>
                <div id="profile-info" class="space-y-1">
                    <h4 class="text-gray-700 font-medium">John Doe</h4>
                    <p class="text-gray-800">example@mail.com</p>
                    <p class="text-gray-800">0811 8877 988</p>
                </div>
                <form id="profile-form" class="hidden space-y-4">
                    <div>
                        <label for="profile-name" class="block text-gray-700">Name</label>
                        <input type="text" id="profile-name" class="w-full border border-gray-300 rounded px-3 py-2 mt-1"
                            value="John Doe">
                    </div>
                    <div>
                        <label for="profile-email" class="block text-gray-700">Email</label>
                        <input type="email" id="profile-email"
                            class="w-full border border-gray-300 rounded px-3 py-2 mt-1" value="example@mail.com">
                    </div>
                    <div>
                        <label for="profile-phone" class="block text-gray-700">Phone</label>
                        <input type="text" id="profile-phone"
                            class="w-full border border-gray-300 rounded px-3 py-2 mt-1" value="0811 8877 988">
                    </div>
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded">Save</button>
                </form>
            </div>

        </div>

        <div id="manage-addresses" class="content">
            <!-- Manage addresses -->
            <div class="col-span-9 shadow rounded bg-white px-4 pt-6 pb-8">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-medium text-gray-800 text-lg">Manage Addresses</h3>
                    <button id="edit-addresses" class="text-primary">Edit</button>
                </div>
                <div id="addresses-info" class="space-y-4">
                    <div class="border border-gray-300 rounded p-4">
                        <h4 class="text-gray-700 font-medium">Home Address</h4>
                        <p class="text-gray-800">123 Main St, City, Country</p>
                        <p class="text-gray-800">12345</p>
                        <p class="text-gray-800">+123 456 7890</p>
                    </div>
                    <div class="border border-gray-300 rounded p-4">
                        <h4 class="text-gray-700 font-medium">Office Address</h4>
                        <p class="text-gray-800">456 Office St, City, Country</p>
                        <p class="text-gray-800">67890</p>
                        <p class="text-gray-800">+123 456 7890</p>
                    </div>
                </div>
                <form id="addresses-form" class="hidden space-y-4">
                    <div class="border border-gray-300 rounded p-4">
                        <h4 class="text-gray-700 font-medium">Home Address</h4>
                        <div>
                            <label for="home-address" class="block text-gray-700">Address</label>
                            <input type="text" id="home-address"
                                class="w-full border border-gray-300 rounded px-3 py-2 mt-1"
                                value="123 Main St, City, Country">
                        </div>
                        <div>
                            <label for="home-zip" class="block text-gray-700">ZIP Code</label>
                            <input type="text" id="home-zip"
                                class="w-full border border-gray-300 rounded px-3 py-2 mt-1" value="12345">
                        </div>
                        <div>
                            <label for="home-phone" class="block text-gray-700">Phone</label>
                            <input type="text" id="home-phone"
                                class="w-full border border-gray-300 rounded px-3 py-2 mt-1" value="+123 456 7890">
                        </div>
                    </div>
                    <div class="border border-gray-300 rounded p-4">
                        <h4 class="text-gray-700 font-medium">Office Address</h4>
                        <div>
                            <label for="office-address" class="block text-gray-700">Address</label>
                            <input type="text" id="office-address"
                                class="w-full border border-gray-300 rounded px-3 py-2 mt-1"
                                value="456 Office St, City, Country">
                        </div>
                        <div>
                            <label for="office-zip" class="block text-gray-700">ZIP Code</label>
                            <input type="text" id="office-zip"
                                class="w-full border border-gray-300 rounded px-3 py-2 mt-1" value="67890">
                        </div>
                        <div>
                            <label for="office-phone" class="block text-gray-700">Phone</label>
                            <input type="text" id="office-phone"
                                class="w-full border border-gray-300 rounded px-3 py-2 mt-1" value="+123 456 7890">
                        </div>
                    </div>
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded">Save</button>
                </form>
            </div>
        </div>

        <div id="change-password" class="content">
            <div class="col-span-9 shadow rounded bg-white px-4 pt-6 pb-8">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-medium text-gray-800 text-lg">Change Password</h3>
                </div>
                <form>
                    <div class="mb-4">
                        <label for="current-password" class="block text-gray-700">Current Password</label>
                        <input type="password" id="current-password"
                            class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
                    </div>
                    <div class="mb-4">
                        <label for="new-password" class="block text-gray-700">New Password</label>
                        <input type="password" id="new-password"
                            class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
                    </div>
                    <div class="mb-4">
                        <label for="confirm-password" class="block text-gray-700">Confirm Password</label>
                        <input type="password" id="confirm-password"
                            class="w-full border border-gray-300 rounded px-3 py-2 mt-1">
                    </div>
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded">Change Password</button>
                </form>
            </div>

        </div>
    </div>

    <div id="my-wishlist" class="content">
        <h2>My Wishlist</h2>
        <p>This is the content for my wishlist.</p>
    </div>

    <div id="logout" class="content">
        <h2>Logout</h2>
        <p>This is the content for logout.</p>
    </div>
    <!-- ./Content Sections -->
    </div>
    <!-- ./account wrapper -->

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sections = [{
                    buttonId: 'edit-account',
                    infoId: 'account-info',
                    formId: 'account-form'
                },
                {
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

        // JavaScript function to show content based on clicked link
        function showContent(id) {
            // Hide all content elements
            const contents = document.getElementsByClassName('content');
            for (let i = 0; i < contents.length; i++) {
                contents[i].style.display = 'none';
            }
            // Display the selected content
            document.getElementById(id).style.display = 'block';
        }
    </script>
@endsection
