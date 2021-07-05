<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckDiscussionRequest;
use Illuminate\Http\Request;

use App\Models\Channel;

class DiscussionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.discussion.index');
    }

    public function create()
    {
        return view('admin.discussion.create')
            ->withChannels(Channel::get());
    }

    public function store(CheckDiscussionRequest $cdr)
    {
        return 'store reached';
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
