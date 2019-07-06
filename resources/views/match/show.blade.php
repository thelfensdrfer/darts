@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ __('Match #:match', ['match' => $match->id]) }}</h2>
    </div>
@endsection
