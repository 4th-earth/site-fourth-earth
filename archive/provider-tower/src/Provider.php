<?php

namespace FourthEarth\Tower;

use Illuminate\Support\ServiceProvider;

use Livewire\Livewire;

use Laravel\Fortify\Fortify;

use FourthEarth\Tower\LivewireComponents\Counter;

/**
 * Dice tower generates cryptographically unbiased, random results: random_int
 */
class Provider extends ServiceProvider
{
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ ."/Routes.php");
        // $this->loadMigrationsFrom(__DIR__ ."/database/migrations");

        $this->loadViewsFrom(__DIR__.'/Views', "tower");
    }

    public function boot()
    {
        Livewire::component("counter", Counter::class);
    }
}
