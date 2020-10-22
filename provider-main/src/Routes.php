<?php

use Illuminate\Support\Facades\Route;

use FourthEarth\Site\Controllers\RootController;
use FourthEarth\Site\Controllers\CreateRequestController;
use FourthEarth\Site\Controllers\VerifyRequestController;
use FourthEarth\Site\Controllers\RegisterFormController;

use Eightfold\Shoop\Shoop;

// User -> Invitation -> Invitation Request
Route::domain(env("SITE"))->middleware("web")->group(function() {
    Route::get("/", RootController::class)->name("root");

    Route::post("/request", CreateRequestController::class);

    Route::get("/request", VerifyRequestController::class);

    // Registration, sign-in, and auth handled by Fortify

    Route::prefix("lore")->group(function() {
        Route::get("/", function() {
            dd("lore");
        });
    });

    Route::prefix("assets/ui")->group(function() {
        Route::get("/", function() { abort(404); });

        Route::get("/{image}", function($image) {
            $extension = Shoop::this($image)->divide(".")->last()->unfold();
            $path = Shoop::this(__DIR__)->divide("/")->dropLast(3)
                ->append(["content-fourth-earth", "assets", "ui"])
                ->append(
                    Shoop::this($image)->divide("/", false)->unfold()
                )->efToString("/");

            return response()->file(
                $path,
                ["Content-Type: image/{$extension}"]
            );
        })->name("assets");
    });

    Route::prefix("assets/favicons")->group(function() {
        Route::get("/", function() { abort(404); });

        Route::get("/{image}", function($image) {
            $extension = Shoop::this($image)->divide(".")->last()->unfold();
            $path = Shoop::this(__DIR__)->divide("/")->dropLast(3)
                ->append(["content-fourth-earth", "assets", "favicons"])
                ->append(
                    Shoop::this($image)->divide("/", false)->unfold()
                )->efToString("/");

            return response()->file(
                $path,
                ["Content-Type: image/{$extension}"]
            );
        })->name("assets");
    });

    // $user->invitation->inviteRequest
});
