@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="float-left">{{ __('Home') }}</div>
        </div>

        <div class="card-body">
            {{ __('You are logged in!') }}
        </div>
    </div>

@endsection
