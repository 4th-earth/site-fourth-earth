<?php

use Carbon\Carbon;

use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Eightfold\Shoop\Shoop;
use FourthEarth\Site\ContentBuilder;

use Eightfold\LaravelMarkup\UIKit;

use FourthEarth\Site\CommonmarkExtras\Location\LocationExtension;
use FourthEarth\Site\CommonmarkExtras\OtherSpeaking\OtherSpeakingExtension;
use FourthEarth\Site\CommonmarkExtras\SelfSpeaking\SelfSpeakingExtension;
use FourthEarth\Site\CommonmarkExtras\Narration\NarrationExtension;

use FourthEarth\Site\Models\Invitation;

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

Route::domain(env("SITE"))->group(function() {
    $builder = ContentBuilder::fold(
        Shoop::this(__DIR__)->divide("/")->dropLast(3)
            ->append(["content-fourth-earth", "the-game"])
    );

    Route::get("/", function() use ($builder) {
        $home = UIKit::webView(
            "Fourth Eearth (pre-alpha)",
            UIKit::div(
                UIKit::main(
                    UIKit::h1(
                        UIKit::span("Fourth Earth")
                    ),
                    UIKit::form(
                        "post /request",
                        UIKit::text("Where should the alpha gameplay invitation be sent?", "email")->placeholder("darl@4th.earth")->email(),
                        UIKit::ul(
                            UIKit::li(
                                UIKit::input()->attr("type checkbox", "id adult-check", "name adult"),
                                UIKit::label("I am 18 years or older.")->attr("for adult-check")
                            ),
                            UIKit::li(
                                UIKit::input()->attr("type checkbox", "id mail-check", "name mail"),
                                UIKit::label("I consent to periodic emails.")->attr("for mail-check")
                            )
                        )->attr("class checkboxes")
                    ),
                    UIKit::markdown(
                        $builder->markdown()->body()
                    )->extensions(
                        LocationExtension::class,
                        OtherSpeakingExtension::class,
                        SelfSpeakingExtension::class,
                        NarrationExtension::class
                    )
                )->attr("is transcript"),
                UIKit::aside(
                    UIKit::h2(UIKit::span("10"), " health"),
                    UIKit::figure(
                        $builder->meter()
                    )->attr("is health"),
                    UIKit::h2(UIKit::span("10"), " physical"),
                    UIKit::figure(
                        $builder->meter()
                    )->attr("is physical"),
                    UIKit::h2(UIKit::span("10"), " mental"),
                    UIKit::figure(
                        $builder->meter()
                    )->attr("is mental"),
                    UIKit::h2(UIKit::span("10"), " spirit"),
                    UIKit::figure(
                        $builder->meter()
                    )->attr("is spirit")
                )->attr("is status"),
                UIKit::aside(
                )->attr("is appearance"),
                UIKit::footer(
                    UIKit::p("Copyright © Joshua Bruce, 2020. All rights reserved.")
                )
            )->attr("class container")
        )->meta(
            UIKit::webHead()->favicons(
                "/assets/favicons/favicon.ico",
                "/assets/favicons/apple-touch-icon.png",
                "/assets/favicons/favicon-32x32.png",
                "/assets/favicons/favicon-16x16.png"
            )
            // )->social(
            //     $this->handler()->title(ContentHandler::BOOKEND),
            //     url()->current(),
            //     $this->handler()->description(),
            //     $this->handler()->socialImage(),
            //     $type
            // )->socialTwitter(...$this->socialTwitter())
            ->styles(...["/css/main.css"])
            // ->scripts(...$this->scripts())
        );
        return view("ef::default")->with("view", $home);
    })->middleware("web");

    Route::get("/request", function() {

    })->middleware("web");

    Route::post("/request", function() {
die(var_dump("here"));
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
