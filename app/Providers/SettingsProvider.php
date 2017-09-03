<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;


class SettingsProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('chat_name', env('CHAT_NAME'));
        View::share('welcome_message', env('CHAT_WELCOME_MESSAGE'));
        View::share('chat_message', env('CHAT_MESSAGE'));
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
