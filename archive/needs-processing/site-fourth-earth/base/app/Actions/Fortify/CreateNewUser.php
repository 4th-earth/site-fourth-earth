<?php

namespace App\Actions\Fortify;

use Carbon\Carbon;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

use Eightfold\ShoopExtras\Shoop;

use FourthEarth\Site\Models\InvitationRequest;
use FourthEarth\Site\Models\Invitation;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'token'    => ["required"],
            'code'     => ["required"],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        $token             = $input["token"];
        $invitationRequest = InvitationRequest::where("token", $token)->firstOrFail();
        $invitation        = Invitation::where("invitation_request_id", $invitationRequest->id)->firstOrFail();

        Validator::make($input, [
            'code' => function ($attribute, $value, $fail) use ($invitation) {
                if ($value !== $invitation->code) {
                    $fail("The code does not match the invitation request.");
                }
            }
        ])->validate();

        $user = User::create([
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'email_verified_at' => Carbon::now()
        ]);

        $invitation->ip_address  = request()->ip();
        $invitation->verified_at = Carbon::now();
        $invitation->user_id     = $user->id;
        $invitation->save();

        return $user;
    }
}
