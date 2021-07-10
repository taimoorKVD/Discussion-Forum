@extends('layouts.app')

@section('content')

    @if($discussions->count() > 0)
        @foreach($discussions as $discussion)
            <div class="card mt-1">
                @include('admin.partials.discussion-header')
                <div class="card-body">
                    <div class="text-center">
                        <strong>
                            {{ $discussion->title }}
                        </strong>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-end mt-2">
            {{ $discussions->appends(['channel' => request()->query('channel')])->links() }}
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <h6 align="center">No discussion posted yet.</h6>
            </div>
        </div>
    @endif

@endsection
