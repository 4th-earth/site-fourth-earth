<?php

namespace FourthEarth\Site\Controllers;

use FourthEarth\Site\Controllers\AbstractController;

use Carbon\Carbon;

use Eightfold\ShoopShelf\Shoop;
use Eightfold\LaravelMarkup\UIKit;

use App\Models\User;
use FourthEarth\Site\Models\Request;
use FourthEarth\Site\Models\Invitation;

class VerifyRequestController extends AbstractController
{
    public function __invoke()
    {
        if (! request()->has("token")) {
            session()->flash(
                "message",
                UIKit::doubleWrap(
                    UIKit::h2("no token found"),
                    UIKit::markdown("The verification email should have come with a token. Please try the URL from the email again or submit the form again.")
                )->outer("div", "is alert-warning", "role alert")
            );
            return redirect("/");
        }

        $request = Request::where("token", request()->query("token"))->firstOrFail();

        // $now = Carbon::now();
        // $diff = $now->diffInHours($request->created_at);

        // if ($diff > 72) {
        //     $request->delete();
        //     session()->flash(
        //         "message",
        //         UIKit::doubleWrap(
        //             UIKit::h2("request expired"),
        //             UIKit::markdown("The request has expired. Please submit the form again.")
        //         )->outer("div", "is alert-warning", "role alert")
        //     );
        //     return redirect("/");
        // }

        // if ($request->verified_at !== null) {
        //     session()->flash(
        //         "message",
        //         UIKit::doubleWrap(
        //             UIKit::h2("request already verified"),
        //             UIKit::markdown("The request has already been verified. You should receive an invite soon; or, you can check your spam folder.")
        //         )->outer("div", "is alert-warning", "role alert")
        //     );
        //     return redirect("/");
        // }

        // $request->verified_at = $now;
        // $request->ip_address  = request()->ip();
        // $request->save();

        // if (User::count() === 0) {
        //     Invitation::new($request)->sendMail();
        // }

        return parent::view(
            [
                UIKit::div(
                    parent::logoHeader(),
                    UIKit::div(
                        UIKit::h2("request confirmed"),
                        UIKit::markdown("Thank you!\n\nWe will send an invitation as soon as we can.\n\nKeep your eyes open.")
                    )
                )->attr("class centered")
            ]
        );
    }
}
