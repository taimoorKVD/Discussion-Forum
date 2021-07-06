<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckDiscussionRequest;
use App\Models\Discussion;
use Illuminate\Http\Request;

use App\Models\Channel;
use Illuminate\Support\Str;

class DiscussionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.discussion.index')
            ->withDiscussions(Discussion::orderBy('created_at','DESC')->paginate(5));
    }

    public function create()
    {
        return view('admin.discussion.create')
            ->withChannels(Channel::get());
    }

    public function store(CheckDiscussionRequest $cdr)
    {
        auth()->user()->discussions()->create([
            'title' => request()->title,
            'content' => request()->content,
            'slug' => Str::slug(request()->title),
            'channel_id' => request()->channel_id,
        ]);
        return redirect()
            ->route('discussions.index')
            ->with('success', 'Discussion posted successfully.');
    }

    public function show(Discussion $discussion)
    {
        return view('admin.discussion.show')
            ->withDiscussion($discussion);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
