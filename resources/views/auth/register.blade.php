@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __('Sign up') }}</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label class="mb-2" for="name">
                    {{ __('Name') }}
                </label>
                <input id="name" name="name" type="text" min="3" max="255" placeholder="Max Mustermann">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="mb-2" for="email">
                    {{ __('E-Mail') }}
                </label>
                <input id="email" name="email" type="email" max="255" placeholder="max@mustermann.de">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="mb-2" for="password">
                    {{ __('Password') }}
                </label>
                <input id="password" name="password" type="password" min="8">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-8">
                <label class="mb-2" for="password_confirmation">
                    {{ __('Confirm Password') }}
                </label>
                <input id="password_confirmation" name="password_confirmation" type="password" min="8">

                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="flex items-center justify-between mb-8">
                <a href="{{ route('login') }}" class="font-bold text-sm">{{ __('Already signed up?') }}</a>

                <button
                    class="button button-primary"
                    type="submit">
                    {{ __('Sign up') }}
                </button>
            </div>
        </form>
    </div>
@endsection
