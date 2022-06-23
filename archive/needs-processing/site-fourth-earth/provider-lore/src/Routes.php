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
