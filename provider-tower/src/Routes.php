<?php

use Illuminate\Support\Facades\Route;

use FourthEarth\Tower\Controllers\RootController;
use FourthEarth\Tower\Controllers\PostController;

use Eightfold\Shoop\Shoop;

Route::domain(env("TOWER"))->middleware("web")->group(function() {
    Route::get("/", RootController::class)->name("root");

    Route::post("/", PostController::class);

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
