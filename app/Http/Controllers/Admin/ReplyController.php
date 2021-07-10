<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckReplyRequest;
use App\Models\Discussion;
use App\Notifications\NewReplyAdded;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(CheckReplyRequest $crr, Discussion $discussion)
    {
        auth()->user()->replies()->create([
            'reply' => request()->reply,
            'discussion_id' => $discussion->id,
        ]);

        if($discussion->author->id != auth()->user()->id)
        {
            $discussion->author->notify(new NewReplyAdded($discussion));
        }

        return redirect()
            ->back()
            ->with('success', 'Reply posted successfully.');
    }

    public function show($id)
    {
        //
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
