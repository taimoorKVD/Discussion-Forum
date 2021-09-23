@extends('layouts.app')

@section('content')

    <div class="card mt-1">

        @include('admin.partials.discussion-header')

        <div class="card-body">
            <div class="text-center">
                <strong>
                    {{ $discussion->title }}
                </strong>
            </div>
            <hr>
            {!! $discussion->content !!}
            @if($discussion->bestReply)
                <div class="card bg-success my-5" style="color: #ffffff">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="{{ Gravatar::src($discussion->bestReply->owner->email) }}" alt="" class="rounded-circle" width="40"
                                         height="40">
                                    <strong class="ml-2 text-uppercase">{{ $discussion->bestReply->owner->name }}</strong>
                                </div>
                                <div>
                                    <strong class="text-uppercase">Best Reply</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! $discussion->bestReply->reply !!}
                    </div>
                </div>
                @endif
        </div>
    </div>

    @foreach($discussion->replies()->orderBy('created_at', 'desc')->paginate(5) as $reply)
        <div class="card mt-4">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <img src="{{ Gravatar::src($reply->owner->email) }}" alt="" class="rounded-circle" width="40"
                             height="40">
                        <strong class="ml-2 text-uppercase">{{ $reply->owner->name }}</strong> 
                        <span class="ml-2">{{ $reply->created_at->diffForHumans() }}</span>
                    </div>
                    @auth
                    @if(auth()->user()->id == $discussion->user_id)
                    <div>
                        <form action="{{ route('discussion.best-reply', [ 'discussion' => $discussion->slug, 'reply' => $reply->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Mark as best reply</button>
                        </form>
                    </div>
                        @endif
                        @endauth
                </div>
            </div>
            <div class="card-body">
                {!! $reply->reply !!}
            </div>
        </div>
        @endforeach
    <div class="d-flex justify-content-end mt-2">
        {{ $discussion->replies()->paginate(5)->links() }}
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <div class="card-title">
                Add a reply
            </div>
        </div>
        @auth
        <form action="{{ route('replies.store', $discussion->slug) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <input type="hidden" name="reply" id="reply">
                    <trix-editor input="reply"></trix-editor>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-success btn-sm">Submit</button>
            </div>
        </form>
            @else
            <a href="{{ route('login') }}" class="btn btn-primary btn-sm mb-2" style="width: 100%;">Sign in to add reply</a>
        @endauth
    </div>

@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" rel="stylesheet">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
@endsection
