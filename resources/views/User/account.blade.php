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

        <!-- Sidebar -->
        @include('User.sidebar-account')
        <!-- ./Sidebar -->

        <!-- Content -->
        @yield('content-account')
        <!-- ./Content -->

    </div>
    <!-- ./account wrapper -->
@endsection
