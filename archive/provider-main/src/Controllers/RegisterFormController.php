<?php

namespace FourthEarth\Site\Controllers;

use FourthEarth\Site\Controllers\AbstractController;

use Eightfold\ShoopShelf\Shoop;
use Eightfold\LaravelMarkup\UIKit;

use FourthEarth\Site\Models\Request;
use FourthEarth\Site\Models\Invitation;

class RegisterFormController extends AbstractController
{
    static public function check()
    {
        if (! request()->has("token")) {
            session()->flash(
                "message",
                UIKit::doubleWrap(
                    UIKit::h2("no token found"),
                    UIKit::markdown("The invitation email should have come with a token. Please try the URL from the email again or submit the form again.")
                )->outer("div", "is alert-warning", "role alert")
            );
            return redirect("/");
        }
        return new RegisterFormController;
    }

    public function __invoke()
    {
        return parent::view(
            [
                parent::logoHeader(),
                $this->registrationForm(),
            ]
        );
    }

    public function registrationForm()
    {
        $request = Request::where("token", request()->query("token"))
            ->firstOrFail();
        return UIKit::div(
            UIKit::form(
                "post /register",
                UIKit::text("invitation code", "code"),
                UIKit::text("email address", "email")
                    ->value($request->email)
                    ->placeholder("darl@4th.earth")->email(),
                UIKit::password("password", "password"),
                UIKit::input()->attr("type hidden", "name token", "value ". $request->token)
            )->submitLabel("Register")->attr("novalidate novalidate"),
            UIKit::p(
                "Already registered? ",
                UIKit::anchor("Sign in", "/login")
            )
        )->attr("class centered");
    }

    // public function markdown()
    // {
    //     return UIKit::markdown(
    //         Shoop::store(__DIR__)->up(4)
    //             ->append(["content-fourth-earth", "root", "content.md"])
    //             ->markdown()->content()
    //     )->extensions(
    //         LocationExtension::class,
    //         OtherSpeakingExtension::class,
    //         SelfSpeakingExtension::class,
    //         NarrationExtension::class
    //     )->unfold();
    // }
}
