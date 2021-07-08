<div class="card-header">
    <div class="d-flex justify-content-between">
        <div>
            <img src="{{ Gravatar::src($discussion->author->email) }}" alt="" class="rounded-circle" width="40"
                 height="40">
            <strong class="ml-2 text-uppercase">{{ $discussion->author->name }}</strong>
        </div>
        <div>
            @if($page == 'index')
                <a href="{{ route('discussions.show', $discussion->slug) }}" class="btn btn-success btn-sm">View</a>
            @else
                <a href="{{ route('discussions.index') }}" class="btn btn-info btn-sm">Back</a>
            @endif
        </div>
    </div>
</div>
