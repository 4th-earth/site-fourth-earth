<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;

use Laravel\Fortify\Fortify;

use Eightfold\Shoop\Shoop;
use FourthEarth\Site\ContentBuilder;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        Fortify::registerView(function () {
            return ContentBuilder::fold(
                Shoop::this(__DIR__)->divide("/")->dropLast(4)
                    ->append(["content-fourth-earth", "root"])
            )->registerView();
        });

        Fortify::loginView(function () {
            return ContentBuilder::fold(
                Shoop::this(__DIR__)->divide("/")->dropLast(4)
                    ->append(["content-fourth-earth", "root"])
            )->loginView();
        });
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
