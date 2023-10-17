<?php

amespace Weboptic\Notifications;

use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('flash', fn () => $this->app->make('Weboptic\Notifications\FlashNotifier'));
    }
    
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../../views', 'notifications');
    }
}
