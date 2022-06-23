<?php

namespace FourthEarth\Site;

use Illuminate\Support\ServiceProvider;

class Provider extends ServiceProvider
{
    public function register()
    {
        $this->loadRoutesFrom(__DIR__."/Routes.php");

        // $this->loadViewsFrom(__DIR__.'/Views', "fourth");
    }

    public function boot()
    {
    }
}
