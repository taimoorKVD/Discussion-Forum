<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('admin/login');
});

Route::prefix('admin')->group(function () {
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('discussions', 'Admin\DiscussionController');
    Route::resource('discussions/{discussion}/replies', 'Admin\ReplyController');
    Route::post('discussions/{discussion}/replies/{reply}/mark-as-best-reply', 'Admin\DiscussionController@markAsBestReply')
        ->name('discussion.best-reply');
});
