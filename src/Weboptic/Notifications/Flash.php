<?php namespace Weboptic\Notifications;

use Illuminate\Support\Facades\Facade;

class Flash extends Facade {

    public static function getFacadeAccessor()
    {
        return 'flash';
    }

} 
