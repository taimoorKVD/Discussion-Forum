@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
        <div class="card-title">Notifications</div>
        </div>

        <div class="card-body">
            @forelse($notifications as $notification)
                <li class="list-group-item">
                @if($notification->type == "App\Notifications\NewReplyAdded")
                    A new reply was added to your discussion
                    <strong>
                        "{{ ucfirst($notification->data['discussion']['title']) }}"
                    </strong>
                    <a href="{{ route('discussions.show', $notification->data['discussion']['slug']) }}"
                        class="btn btn-info btn-sm  float-right">
                        View
                    </a>
                @endif
                @if($notification->type == "App\Notifications\ReplyMarkAsBestReply")
                    You reply to the discussion
                    <strong>
                        "{{ ucfirst($notification->data['discussion']['title']) }}"
                    </strong>
                    was marked as best reply.
                    <a href="{{ route('discussions.show', $notification->data['discussion']['slug']) }}"
                        class="btn btn-info btn-sm  float-right">
                        View
                    </a>
                @endif
                </li>
                @empty
                <h5 class="text-center">No notification found.</h5>
            @endforelse
        </div>
    </div>

@endsection
