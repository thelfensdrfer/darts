@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __('Sign in') }}</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

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

            <div class="flex items-center justify-between mb-8">
                <a class="inline-block align-baseline font-bold text-sm link" href="{{ route('password.request') }}">
                    {{ __('Forgot Password?') }}
                </a>

                <button
                    class="button button-primary"
                    type="submit">
                    {{ __('Sign in') }}
                </button>
            </div>

            <div>
                <a href="#" class="font-bold text-sm link">{{ __('No account yet?') }}</a>
            </div>
        </form>
    </div>
@endsection
