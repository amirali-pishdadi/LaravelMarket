@extends('User.account')

@section('content-account')
    <div class="col-span-9 space-y-4">
        @foreach ($ads as $ad)
            <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                <div class="w-28">
                    <img src='{{ asset("uploads/ads/$ad->ads_image") }}' class="w-full">
                </div>
                <div class="w-1/3">
                    <h2 class="text-gray-800 text-sm font-medium uppercase">{{ $ad->link }}</h2>
                </div>
                <a href="/edit-ads/{{ $ad->id }}"
                    class=" px-4 py-2 text-center text-sm text-white bg-primary border border-primary rounded transition uppercase font-roboto font-medium">Edit</a>
                <a href="/delete-ads/{{ $ad->id }}"
                    class=" px-4 py-2 text-center text-sm text-white bg-primary border border-primary rounded transition uppercase font-roboto font-medium">Remove</a>

                <div class="text-gray-600 cursor-pointer hover:text-primary">
                    <i class="fa-solid fa-trash"></i>
                </div>
            </div>
        @endforeach
    </div>

@endsection
