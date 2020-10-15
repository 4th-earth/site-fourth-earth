<?php

use Carbon\Carbon;

use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use Eightfold\Shoop\Shoop;
use FourthEarth\Site\ContentBuilder;

use Eightfold\LaravelMarkup\UIKit;

use FourthEarth\Site\Models\Invitation;

Route::domain(env("SITE"))->group(function() {
    $builder = ContentBuilder::fold(
        Shoop::this(__DIR__)->divide("/")->dropLast(3)
            ->append(["content-fourth-earth", "root"])
    );

    Route::get("/", function() use ($builder) {
        return $builder->view();
    })->middleware("web")->name("home");

    Route::get("/request", function() {
        return redirect("/");
    })->middleware("web");

    Route::post("/request", function(Request $request) {
        $input = $request->all();
        $rules = [
            "email" => "required|unique:invitations|email",
            "adult" => "required",
            "mail"  => "required"
        ];
        $messages = [
            "email.required" => "We need an email address.",
            "email.unique"   => "We already have this email address.",
            "email.email"    => "Does not appear to be an email address.",
            "adult.required" => "You must be 18 or older, sorry.",
            "mail.required"  => "We must be able to email you."
        ];

        Validator::make($input, $rules, $messages)->validate();
die(var_dump(
    "made it"
));
    })->middleware("web");

    $builder = ContentBuilder::fold(
        Shoop::this(__DIR__)->divide("/")->dropLast(3)
            ->append(["content-fourth-earth"])
    );

    Route::prefix("assets/ui")->group(function() use ($builder) {
        Route::get("/", function() { abort(404); });

        Route::get("/{image}", function($image) use ($builder) {
            $extension = Shoop::this($image)->divide(".")->last()->unfold();
            $path = $builder->uiPath($image);

            return response()->file(
                $path,
                ["Content-Type: image/{$extension}"]
            );
        })->name("assets");
    });

    Route::prefix("assets/favicons")->group(function() use ($builder) {
        Route::get("/", function() { abort(404); });

        Route::get("/{image}", function($image) use ($builder) {
            $extension = Shoop::this($image)->divide(".")->last()->unfold();
            $path = $builder->faviconsPath($image);

            return response()->file(
                $path,
                ["Content-Type: image/{$extension}"]
            );
        })->name("assets");
    });
});
