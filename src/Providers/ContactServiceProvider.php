<?php

namespace Molitor\Contact\Providers;

use Illuminate\Support\ServiceProvider;

class ContactServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'contact');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }

    public function register()
    {

    }
}
