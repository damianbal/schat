<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class UserController extends Controller
{
    /**
     * Update activity time of currently logged in user.
     */
    public function updateActivityTime()
    {
        Auth::user()->touch();

        return ['succes' => true];
    }

    /**
     * Check which users are active and which ones are not.
     */
     public function updateActiveUsers()
     {
         $users = \App\User::all();

         $active = [];

         foreach($users as $user)
         {
             $now = Carbon::now();

             $diffInMinutes = $user->updated_at->diffInMinutes($now);

             if($diffInMinutes > 2) // inactive for 2 minutes
             {
                 $user->timestamps = false;
                 $user->active = false;
                 $user->save();
                 $user->timestamps = true;
             }
             else {
                 $user->timestamps = false;
                 $user->active = true;
                 $user->save();
                 $user->timestamps =true;

             }
         }

         return $active;
     }
}
