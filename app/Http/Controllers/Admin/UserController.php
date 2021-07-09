<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function notification()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return view('admin.user.notification')
            ->withNotifications(auth()->user()->notifications()->paginate(8));
    }
}
