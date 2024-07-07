@extends('User.account')

@section('content-account')
    <form id="profile-form" class="space-y-40 w-full" method="POST" action="{{ "/edit-ads/$ads->id" }}"
        enctype="multipart/form-data">
        @csrf
        <div>
            <label class=" text-gray-700">Url :</label>
            <input type="url" name="url" value="{{ $ads->link }}"
                class="w-full border border-gray-300 rounded px-5 py-2 my-3" placeholder="product name">
        </div>
        <label class=" text-gray-700">Image :</label>
        <input type="file" name="ads_image" class="w-full border border-gray-300 rounded px-5 py-2 my-3">
        
        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded w-full">Save</button>
    </form>
@endsection