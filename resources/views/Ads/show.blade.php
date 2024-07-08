@extends('User.account')

@section('content-account')
    <div class="col-span-9 space-y-4">
        @foreach ($ads as $ad)
            <div class="flex items-center justify-between border gap-6 p-4 border-gray-200 rounded">
                <div class="w-28">
                    <img src='{{ asset("uploads/ads/$ad->ads_image") }}' class="w-full" alt="Advertisement Image">
                </div>
                <div class="w-1/3">
                    <a href="{{ $ad->link }}" target="_blank" rel="noopener noreferrer" class="text-gray-800 text-sm font-medium uppercase">{{ $ad->link }}</a>
                </div>
                <div class="flex gap-2">
                    <a href="/edit-ads/{{ $ad->id }}"
                        class="px-4 py-2 text-sm text-white bg-primary border border-primary rounded transition uppercase font-roboto font-medium hover:bg-transparent hover:text-primary">Edit</a>
                    <a href="/delete-ads/{{ $ad->id }}"
                        class="px-4 py-2 text-sm text-white bg-primary border border-primary rounded transition uppercase font-roboto font-medium hover:bg-transparent hover:text-primary">Remove</a>
                </div>
                <div class="text-gray-600 cursor-pointer hover:text-primary">
                    <i class="fa-solid fa-trash"></i>
                </div>
            </div>
        @endforeach
    </div>
@endsection
