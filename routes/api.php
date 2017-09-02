<?php

use Illuminate\Http\Request;
use App\Message;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
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
 * Return last 10 messages
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

})->middleware('api');
