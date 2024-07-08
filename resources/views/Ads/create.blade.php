@extends('User.account')

@section('content-account')
    <form id="profile-form" class="space-y-6 w-full" method="POST" action="/create-ads" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="url" class="text-gray-700">Advertisement URL:</label>
            <input type="url" id="url" name="url" class="w-full border border-gray-300 rounded px-4 py-2 my-2 focus:outline-none focus:border-primary"
                placeholder="Enter advertisement URL">
        </div>
        <div>
            <label for="ads_image" class="text-gray-700">Advertisement Image:</label>
            <input type="file" id="ads_image" name="ads_image"
                class="w-full border border-gray-300 rounded px-4 py-2 my-2 focus:outline-none focus:border-primary">
        </div>
        <button type="submit"
            class="bg-red-600 text-white px-4 py-2 rounded w-full hover:bg-red-700 focus:outline-none focus:bg-red-700">Save</button>
    </form>
@endsection
