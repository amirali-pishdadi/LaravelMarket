@extends("User.account")

@section("content-account")
    <form id="profile-form" class="space-y-40 w-full" method="POST" action="/create-ads" enctype="multipart/form-data">
    @csrf
    <div>
        <label class=" text-gray-700">Url :</label>
        <input type="url" name="url" class="w-full border border-gray-300 rounded px-5 py-2 my-3"
            placeholder="Url here ...">
    </div>
    <div>
        <label class=" text-gray-700">Image :</label>
        <input type="file" name="ads_image" class="w-full border border-gray-300 rounded px-5 py-2 my-3">
    </div>
    
    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded w-full">Save</button>
</form>
@endsection