@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __('Create Game') }}</h2>

        <form method="POST" action="{{ route('match.store') }}">
            @csrf

            <div class="mb-4">
                <label class="mb-2" for="type">
                    {{ __('Game Type') }}
                </label>
                <select id="type" name="type">
                    @foreach ($types as $value => $name)
                        <option value="{{ $value }}" {{ ($value == old('type', '301')) ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>

                @error('type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="mb-2" for="sets">
                    {{ __('Sets') }}
                </label>
                <input type="number" min="1" max="255" name="sets" id="sets" value="{{ old('sets', 1) }}">

                @error('legs')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="mb-2" for="legs">
                    {{ __('Legs') }}
                </label>
                <input type="number" min="1" max="255" name="legs" id="legs" value="{{ old('legs', 1) }}">

                @error('legs')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="mb-2" for="friends">
                    {{ __('Players') }}
                </label>
                <select id="friends" name="friends[]" multiple>
                    @foreach ($friends as $id => $name)
                        <option value="{{ $id }}" {{ (in_array($id, old('friends', [])) ? 'selected' : '') }}>{{ $name }}</option>
                    @endforeach
                </select>

                @error('friends')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button
                class="button button-primary mt-8 block w-full"
                type="submit">
                {{ __('Start') }}
            </button>
        </form>
    </div>
@endsection
