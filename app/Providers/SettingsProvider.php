<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;


class SettingsProvider extends ServiceProvider
{
    protected $chatName = "My super chat!";
    protected $welcomeMessage = "Welcome to this chat!";
    protected $chatMessage = "<span style='color:red;'>Don't swear please!</span>";

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::share('chat_name', $this->chatName);
        View::share('welcome_message', $this->welcomeMessage);
        View::share('chat_message', $this->chatMessage);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
