<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckReplyRequest;
use App\Models\Discussion;
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
