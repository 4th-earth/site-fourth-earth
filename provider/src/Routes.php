<?php

use Carbon\Carbon;

use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Eightfold\Shoop\Shoop;
use FourthEarth\Site\ContentBuilder;

use Eightfold\LaravelMarkup\UIKit;

Route::domain("lore.". env("SITE"))->group(function () {
    $builder = ContentBuilder::fold(
        Shoop::this(__DIR__)->divide("/")->dropLast(3)->append(["content-fourth-earth"])
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

    Route::any("{any}", function(Request $request, string $any = null) use ($builder) {
        if ($builder->hasContent()->unfold()) {
            if ($builder->markdown()->meta()->hasAt("redirect")->unfold()) {
                return redirect($builder->markdown()->meta()->redirect);
            }
            return view("ef::default")->with("view", $builder->view());
        }
        return view("ef::default")->with("view", $builder->view());
    })->where("any", ".*");
});

Route::domain(env("SITE"))->middleware("web")->group(function() {
    Route::get("/", function() {
        $content = <<<EOD
        Fourth Earth is accepting requests for up to 200 Alpha-round players.

        1. Submit your email address below.
        2. Follow the verification link.
        3. Await your invitation.
        EOD;
        $home = UIKit::webView(
            "Fourth Eearth (pre-alpha)",
            UIKit::form(
                "post /request",
                UIKit::text("Email address (for alpha play)", "email")->placeholder("darl@4th.earth")->email()
            ),
            UIKit::div(
                UIKit::div(
                    UIKit::p("pre-alpha sign-up")->attr("class top")
                ),
                UIKit::div(
                    UIKit::p("pre-beta sign-up")->attr("class top"),
                    UIKit::p("alpha play")->attr("class bottom")
                ),
                UIKit::div(
                    UIKit::p("pre-open sign-up")->attr("class top"),
                    UIKit::p("beta play")->attr("class bottom")
                ),
                UIKit::div(
                    UIKit::p("open play")->attr("class bottom")
                )
            )->attr("class timeline"),
            UIKit::main(
                UIKit::markdown($content)
            )->attr("is transcript"),
            UIKit::aside()->attr("is status"),
            UIKit::aside()->attr("is appearance")
        );
        return view("ef::default")->with("view", $home);
    });

    Route::post("/request", function() {

    })->middleware("web");
});
