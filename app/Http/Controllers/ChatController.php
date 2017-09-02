<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    public function chat()
    {
        return view('chat.chat');
    }

    public function enter()
    {

        $username = request()->input('username');
        $password = request()->input('password');


        $user = User::where('name', $username)->first();

        if(!$user) {

            $u = User::create([
                'name' => request()->input('username'),
                'password' => bcrypt(request()->input('password')),
                'color' => request()->input('color'),
            ]);

            session([
                'username' => $u->name
            ]);

            //echo "STWORZONO KOTNO!: " . $u->id;
            Auth::loginUsingId($u->id);

            return redirect('/chat');

        }
        else {
            // attempt login
            if(Auth::attempt(['name' => $username, 'password' => $password]))
            {

                session([
                    'name' => Auth::user()->name
                ]);

                return redirect('/chat');

            }
            else
            {
                return back();
            }
        }

        return back();
    }

    public function start()
    {
        return view('chat.start');
    }
}
