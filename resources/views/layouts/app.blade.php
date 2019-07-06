<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
<div id="app" class="flex flex-col h-full">
    <nav class="flex flex-grow-0 items-center justify-between flex-wrap p-6" id="navigation">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <span class="font-semibold text-gold text-2xl uppercase tracking-tight">
                <i class="fas fa-bullseye-arrow" aria-hidden="true"></i> Dart
            </span>
        </div>
        <div class="block lg:hidden">
            <button id="navigation-toggle"
                    class="flex items-center px-3 py-2 border rounded border-gray-200 hover:text-white hover:border-white">
                <i class="fas fa-bars" aria-hidden="true"></i>
            </button>
        </div>
        <div class="w-full hidden lg:block flex-grow lg:flex lg:text-right lg:w-auto" id="navigation-wrapper">
            <div class="text-sm lg:flex-grow">
                @auth
                    <a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>

                    <form method="post" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit">{{ __('Logout') }} ({{ auth()->user()->name }})</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">{{ __('Sign in') }}</a>

                    <a href="{{ route('register') }}">{{ __('Sign up') }}</a>
                @endauth
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
