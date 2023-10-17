<?php namespace Weboptic\Notifications;

use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('flash', function()
        {
            return $this->app->make('Weboptic\Notifications\FlashNotifier');
        });
    }

    /**
     * Bootstrap a package
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../views', 'notifications');
    }
}
