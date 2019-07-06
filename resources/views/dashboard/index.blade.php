@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Dashboard</h2>

        @if (count($games) > 0)
            <h2>{{ __('Open Games') }}</h2>

            <table>
                <tbody>
                    @foreach ($games as $game)
                        <tr>
                            <td>{{ $game->id }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <ul>
            <li class="block mb-2">
                <a class="block p-4 bg-gray-200 text-gray-800 font-bold uppercase hover:bg-gray-400" href="{{ route('match.create') }}">{{ __('New Game') }}</a>
            </li>
            <li>
                <a class="block p-4 bg-gray-200 text-gray-800 font-bold uppercase hover:bg-gray-400" href="{{ route('friend.index') }}">{{ __('Friends') }}</a>
            </li>
        </ul>
    </div>
@endsection
