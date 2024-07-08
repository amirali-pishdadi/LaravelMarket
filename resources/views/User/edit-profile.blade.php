@extends("User.account")

@section("content-account")
<div class="col-span-12 shadow rounded bg-white px-8 pt-6 pb-8">
    <div class="flex items-center justify-between mb-4">
        <h3 class="font-medium text-gray-800 text-lg">Profile Information</h3>
        <button id="edit-profile" class="text-primary pl-8">Edit</button>
    </div>
    <div id="profile-info" class="space-y-4">
        <div class="border border-gray-300 rounded p-4">
            <h4 class="text-gray-700 font-medium">Name: {{ $user->name }}</h4>
            <p class="text-gray-800">Email: {{ $user->email }}</p>
            <p class="text-gray-800">Phone: +98{{ $user->phone_number }}</p>
            <p class="text-gray-800">Username: {{ $user->username }}</p>

            <br>

            <h4 class="text-gray-700 font-medium">Home Address</h4>
            <p class="text-gray-800">Address: {{ $user->address }}</p>
            <p class="text-gray-800">ZIP Code: {{ $user->zip_code }}</p>
        </div>
    </div>
    <form id="profile-form" class="hidden space-y-4" method="POST" action="/update-profile">
        @csrf
        <div>
            <label for="profile-name" class="block text-gray-700">Name</label>
            <input type="text" id="profile-name" name="name"
                class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-primary"
                value="{{ $user->name }}">
        </div>
        <input type="hidden" name="username" value="{{ $user->username }}">
        <br>
        <h4 class="text-gray-700 font-medium">Office Address</h4>
        <div>
            <label for="office-address" class="block text-gray-700">Address</label>
            <input type="text" id="office-address" name="address"
                class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-primary"
                value="{{ $user->address }}" placeholder="Address">
        </div>
        <div>
            <label for="office-zip" class="block text-gray-700">ZIP Code</label>
            <input type="text" id="office-zip" name="zip_code"
                class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-primary"
                value="{{ $user->zip_code }}" placeholder="Zip Code">
        </div>
        <div>
            <label for="office-phone" class="block text-gray-700">Phone</label>
            <div class="flex space-x-2">
                <span class="inline-flex items-center px-3 bg-gray-100 border border-gray-300 rounded">+98</span>
                <input type="text" name="phone" id="office-phone"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary"
                    placeholder="--- --- ----" maxlength="12" value="{{ $user->phone }}">
            </div>
        </div>
        <div class="mb-4">
            <label for="current-password" class="block text-gray-700">Current Password</label>
            <input type="password" name="current_password" id="current-password"
                class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-primary">
        </div>
        <div class="mb-4">
            <label for="new-password" class="block text-gray-700">New Password</label>
            <input type="password" name="password" id="new-password"
                class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-primary">
        </div>
        <div class="mb-4">
            <label for="confirm-password" class="block text-gray-700">Confirm Password</label>
            <input type="password" name="confirm" id="confirm-password"
                class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-primary">
        </div>
        <button type="submit"
            class="bg-red-600 text-white px-4 py-2 rounded-md w-full hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-600">Save</button>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const editProfileButton = document.getElementById('edit-profile');
        const profileInfo = document.getElementById('profile-info');
        const profileForm = document.getElementById('profile-form');

        editProfileButton.addEventListener('click', () => {
            profileInfo.classList.toggle('hidden');
            profileForm.classList.toggle('hidden');
        });
    });
</script>
@endsection
