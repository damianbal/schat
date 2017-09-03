<?php

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
use Illuminate\Support\Facades\Auth;


/**
 * Main
 */
Route::get('/', 'ChatController@start')->name('chat.start');
Route::get('/chat', 'ChatController@chat')->name('chat.chat');
Route::post('/enter', 'ChatController@enter')->name('chat.enter');


/**
 * User activity
 */
Route::get('/user/update_activity', 'UserController@updateActivityTime');
Route::get('/user/update_active_users', 'UserController@updateActiveUsers');
Route::get('/users/active', function() {
    $activeUsers = \App\User::where(['active' => true])->get();
    return $activeUsers;
});

/**
 * User
 */
Route::get('/user', function() {

    if(Auth::check())
    {
        return [
            'name' => Auth::user()->name,
            'can_moderate' => Auth::user()->can_moderate
        ];
    }
    else
    {
        return ['name' => 'guest', 'can_moderate' => false];
    }

});

/**
 * Messages
 */
 Route::get('/fetch/messages', function() {
     $msgs = \App\Message::orderBy('created_at', 'DESC')->take(10)->get();
     $new_msgs = [];

     foreach($msgs as $msg)
     {
         $new_msgs[] = [
             'id' => $msg->id,
             'user' => $msg->user->name,
             'user_color' => $msg->user->color,
             'text_color' => $msg->color,
             'ago' => $msg->created_at->diffForHumans(),
             'message' => $msg->message,
             'highlighted' => $msg->highlighted,
             'removed' => $msg->removed,

         ];
     }

     return $new_msgs;

 });

Route::post('/message/create', function() {

    $msg = request()->input('message');

    \App\Message::create([
        'user_id' => Auth::user()->id,
        'message' => $msg,
        'color' => Auth::user()->color,
    ]);

    //return ['msg' => request()->session('username')];
    return ['ok' => true];
});


Route::get('/message/remove/{message}', 'MessagesController@remove');
