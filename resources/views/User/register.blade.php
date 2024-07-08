@extends('layout.layout')

@section('content')
    <!-- Login -->
    <div class="container py-16">
        <div class="max-w-lg mx-auto shadow-md px-6 py-7 rounded overflow-hidden">
            <h2 class="text-2xl uppercase font-medium mb-1">Create an account</h2>
            <p class="text-gray-600 mb-6 text-sm">Register as a new customer</p>
            <form action="/register" method="POST">
                @csrf
                <div class="space-y-2">
                    <div>
                        <label for="name" class="text-gray-600 mb-2 block">Full Name</label>
                        <input type="text" name="name" id="name"
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:outline-none focus:ring-2 focus:ring-primary placeholder-gray-400"
                            placeholder="Full Name" required>
                    </div>
                    <div>
                        <label for="email" class="text-gray-600 mb-2 block">Email address</label>
                        <input type="email" name="email" id="email"
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:outline-none focus:ring-2 focus:ring-primary placeholder-gray-400"
                            placeholder="youremail@example.com" required>
                    </div>
                    <div>
                        <label for="username" class="text-gray-600 mb-2 block">Username</label>
                        <input type="text" name="username" id="username"
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:outline-none focus:ring-2 focus:ring-primary placeholder-gray-400"
                            placeholder="Username" minlength="4" required>
                    </div>
                    <div>
                        <label for="password" class="text-gray-600 mb-2 block">Password</label>
                        <input type="password" name="password" id="password"
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:outline-none focus:ring-2 focus:ring-primary placeholder-gray-400"
                            placeholder="*******" required>
                    </div>
                    <div>
                        <label for="confirm" class="text-gray-600 mb-2 block">Confirm password</label>
                        <input type="password" name="confirm" id="confirm"
                            class="block w-full border border-gray-300 px-4 py-3 text-gray-600 text-sm rounded focus:outline-none focus:ring-2 focus:ring-primary placeholder-gray-400"
                            placeholder="*******" required>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit"
                        class="block w-full py-2 text-center bg-primary border border-primary rounded-md hover:bg-transparent text-white transition uppercase font-roboto font-medium">Create
                        Account</button>
                </div>
            </form>

            <p class="mt-4 text-center text-gray-600">Already have an account? <a href="login" class="text-primary">Login
                    now</a></p>
        </div>
    </div>
    <!-- ./Login -->
@endsection
