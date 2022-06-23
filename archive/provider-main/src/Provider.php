<?php

namespace FourthEarth\Site;

use Illuminate\Support\ServiceProvider;

use Laravel\Fortify\Fortify;

use FourthEarth\Site\Controllers\RegisterFormController;

class Provider extends ServiceProvider
{
    public function register()
    {
        $this->loadRoutesFrom(__DIR__ ."/Routes.php");
        $this->loadMigrationsFrom(__DIR__ ."/database/migrations");

        // $this->loadViewsFrom(__DIR__.'/Views', "fourth");
    }

    public function boot()
    {
        Fortify::registerView(function () {
            $form = RegisterFormController::check();
            if (is_a($form, RegisterFormController::class)) {
                return $form();
            }
            return $form;
        });
    }
}
