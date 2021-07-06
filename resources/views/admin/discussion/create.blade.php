@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="float-left">{{ __('Create New Discussion') }}</div>
            <a href="{{ route('discussions.index') }}" class="btn btn-info btn-sm float-right">Back</a>
        </div>

        <form action="{{ route('discussions.store') }}" method="POST">
            @csrf

            <div class="card-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <input type="hidden" name="content" id="content">
                    <trix-editor input="content"> </trix-editor>
                </div>

                <div class="form-group">
                    <label for="channel">Channels</label>
                    <select id="channel" class="form-control" name="channel_id">
                        <option selected disabled>Choose a channel</option>
                        @if($channels->count() > 0)
                            @foreach($channels as $channel)
                                <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-success btn-sm">Submit</button>
            </div>

        </form>
    </div>

@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" rel="stylesheet">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
@endsection
