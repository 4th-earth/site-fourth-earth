<?php

namespace FourthEarth\Site\Actions;

use Laravel\Fortify\Contracts\CreatesNewUsers;

use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Rules\Password;

use Eightfold\LaravelMarkup\UIKit;

use App\Models\User;
use FourthEarth\Site\Models\Request;
use FourthEarth\Site\Models\Invitation;

use FourthEarth\Site\Controllers\AbstractController;

class CreateNewUser implements CreatesNewUsers
{
    public function create(array $input)
    {
        $validator = Validator::make(
            $input,
            [
                'token' => [
                    'required'
                ],
                'code' => [
                    'required'
                ],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique(User::class),
                ],
                'password' => [
                    'required',
                    'string',
                    (new Password)->requireUppercase()
                        ->requireNumeric()->requireSpecialCharacter()
                        ->withMessage("Password must be at least 8 characters long, include at least one uppercase, one numeric, and one special character.")
                ]
            ],
            [
                "token.required"    => "A token was not received, please try the email link again.",
                "code.required"     => "The invitation email should have had a code, we need that.",
                "email.required"    => "We need to verify the email address the invitation was sent to.",
                "email.email"       => "The submitted email address does not appear to be formatted properly.",
                "email.unique"      => "We already have this email address, did you forget your password?",
                "email.max"         => "The email address is too long.",
                "password.required" => "We need an initial password for you."
            ]
        );

        if ($validator->fails()) {
            AbstractController::errorMessage();
            $validator->validate();
        }

        $request = Request::where("token", $input["token"])->firstOrFail();

        $validator = Validator::make(
            $input,
            [
                'token' => [
                    Rule::in([$request->token])
                ],
                'code' => [
                    Rule::in([$request->invitation()->code])
                ],
                'email' => [
                    Rule::in([$request->email])
                ]
            ],
            [
                "token.in" => "The token doesn't match our records, please try the link from the invitation email again.",
                "code.in"  => "The code doesn't match our records, please look at the invitation email again.",
                "email.in" => "The email address doesn't match our records, please ensure you're using the email address the invitation was sent to."
            ]
        );

        if ($validator->fails()) {
            session()->flash(
                "message",
                UIKit::doubleWrap(
                    UIKit::h2("errors detected"),
                    UIKit::markdown("We use multiple methods to ensure our players are human. Something in the submitted combination seems incorrect. If you start from the invitation email, you should get all pieces again.")
                )->outer("div", "is alert-error", "role alert")
            );
            $validator->validate();
        }

        $user = User::create([
            'invitation_id'    => $request->invitation()->id,
            'email'             => $input['email'],
            'password'          => Hash::make($input['password']),
            'email_verified_at' => Carbon::now()
        ]);
dd($user->hash());
    }
}
