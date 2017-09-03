<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    /**
     * Display chat
     */
    public function chat()
    {
        return view('chat.chat');
    }

    /**
     *  Enter chat (Sign in user)
     */
    public function enter()
    {
        // validate request
        $this->validate(request(), [
            'username' => 'required|min:3',
            'password' => 'required|min:3'
        ]);

        $username = request()->input('username');
        $password = request()->input('password');

        $user = User::where('name', $username)->first();

        if(!$user) {

            $u = User::create([
                'name' => request()->input('username'),
                'password' => bcrypt(request()->input('password')),
                'color' => request()->input('color'),
            ]);

            Auth::loginUsingId($u->id);

            return redirect('/chat');

        }
        else {
            // attempt login
            if(Auth::attempt(['name' => $username, 'password' => $password]))
            {
                return redirect('/chat');
            }
            else
            {
                return back()->with('_errors', ["Username and password don't match!"]);
            }
        }

        return back()->with('_errors', ["Could not sign in!"]);
    }

    /**
     * Login form
     */
    public function start()
    {
        return view('chat.start');
    }
}
