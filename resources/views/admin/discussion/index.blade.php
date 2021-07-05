@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="float-left">{{ __('Discussions') }}</div>
            <a href="{{ route('discussions.create') }}" class="btn btn-primary btn-sm float-right">Add Discussion</a>
        </div>

        <div class="card-body">

        </div>
    </div>

@endsection
