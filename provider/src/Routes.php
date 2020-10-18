<?php

use Carbon\Carbon;
use Hashids\Hashids;

use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use Eightfold\Shoop\Shoop;
use FourthEarth\Site\ContentBuilder;

use Eightfold\LaravelMarkup\UIKit;

use FourthEarth\Site\Models\InvitationRequest;

Route::domain(env("SITE"))->group(function() {
    $builder = ContentBuilder::fold(
        Shoop::this(__DIR__)->divide("/")->dropLast(3)
            ->append(["content-fourth-earth", "root"])
    );

    Route::get("/", function() use ($builder) {
        if (Auth::user()) {
            die("authenticated view");
        }
        return $builder->homeView();
    })->middleware("web")->name("home");

    Route::get("/register", function(Request $request) use ($builder) {
        return $builder->registerView();
    })->middleware("web");

    Route::get("/request", function(Request $request) use ($builder) {

        if (! $request->has("token")) {
            session()->flash(
                "message",
                UIKit::doubleWrap(
                    UIKit::h2("no token found"),
                    UIKit::markdown("We did not find a token. Please try following the link from the email again.")
                )->outer("div", "is alert-warning", "role alert")
            );

            return redirect("/");
        }

        $token = $request->query("token");

        $request = InvitationRequest::claimRequest($token);
        if (! $request) {
            session()->flash(
                "message",
                UIKit::doubleWrap(
                    UIKit::h2("invitation request expired"),
                    UIKit::markdown("Invite requests are only valid for 72 hours. Please resubmit your email address to try again.")
                )->outer("div", "is alert-warning", "role alert")
            );
            return redirect("/");
        }

        return $builder->requestConfirmView();
    })->middleware("web");

    Route::post("/request", function(Request $request) {
        $input = $request->all();
        $rules = [
            "email" => "required|unique:invitation_requests|email",
            "adult" => "required|accepted",
            "mail"  => "required|accepted"
        ];
        $messages = [
            "email.required" => "We need an email address.",
            "email.unique"   => "We already have this email address.",
            "email.email"    => "Does not appear to be an email address.",
            "adult.required" => "You must be 18 or older, sorry.",
            "mail.required"  => "We must be able to email you."
        ];

        Validator::make($input, $rules, $messages)->validate();

        $email = $request->input("email");

        InvitationRequest::newRequest($email)->sendMail();

        session()->flash(
            "message",
            UIKit::doubleWrap(
                UIKit::h2("confirmation email sent"),
                UIKit::markdown("Please check your email and follow the link there to confirm your request. (And help ensure a bit that you're not a robot.)")
            )->outer("div", "is alert-success", "role alert")
        );

        return back();
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
