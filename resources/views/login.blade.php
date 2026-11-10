@extends('layouts.app')

@section('title', 'Login Page')

@section('tanpa-navbar', true)

@section('content')
<div class="flex flex-1 flex-col items-center justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-25 w-auto" src="{{ asset('images/coffee2.svg') }}" alt="logo coffee" />
        <h2 class="mt-6 text-center text-2xl/9 font-bold tracking-tight text-coffee">Login to Your account</h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-sm">
        <form action="{{ route('login.proses') }}" method="POST">
            @csrf

            @if ($errors->any())
            <p class="mb-4 text-sm text-red-600">{{ $errors->first() }}</p>
            @endif
            <div>
                <label for="username" class="block text-sm/6 font-medium text-coffee-hover">Username</label>
                <div class="mt-2">
                    <input type="text" name="username" id="username" value="{{ old('username') }}" autocomplete="username" placeholder="username" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                </div>
            </div>
            <div>
                <div class="flex items-center justify-between mt-8">
                    <label for="password" class="block text-sm/6 font-medium text-coffee-hover">Password</label>
                </div>
                <div class="mt-2">
                    <input type="password" name="password" id="password" autocomplete="current-password" placeholder="password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                </div>
            </div>
            <div class="mt-8">
                <button type="submit" class="flex w-full justify-center rounded-md bg-coffee px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-coffee-hover focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm/6 text-gray-500">
            Forgot Password?
            <a href="#" class="font-semibold text-coffee hover:text-coffee-hover">Reset Password</a>
        </p>
    </div>
</div>
@endsection