<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function remove(\App\Message $message)
    {
        if(Auth::user()->can_moderate)
        {
            $message->delete();
        }
    }
}
