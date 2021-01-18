<?php

namespace FourthEarth\Site\Models;

use Carbon\Carbon;
use Hashids\Hashids;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

use FourthEarth\Site\Models\Invitation;

use FourthEarth\Site\Mail\VerifyInvitationRequest;

class InvitationRequest extends Model
{
    use HasFactory;

    protected $fillable = ["email", "token", "verified_at"];

    static public function newRequest(string $email): InvitationRequest
    {
        $request = InvitationRequest::create([
            "email" => $email
        ]);

        $request->token = (new Hashids(env("APP_KEY"), 12))->encode($request->id);
        $request->save();

        return $request;
    }

    static public function claimRequest(string $token)
    {
        $inviteRequest = InvitationRequest::where("token", request()->query("token"))->firstOrFail();
        $now = Carbon::now();
        $diff = $now->diffInHours($inviteRequest->created_at);

        if ($diff > 72) {
            $inviteRequest->delete();
            return false;
        }

        if ($inviteRequest->verified_at === null) {
            $inviteRequest->verified_at = $now;
            $inviteRequest->ip_address  = request()->ip();
            $inviteRequest->save();

            $users = User::all();
            if ($users->count() === 0) {
                Invitation::newInvitation($inviteRequest)->sendMail();
            }
        }

        return $inviteRequest;
    }

    public function sendMail()
    {
        Mail::to($this->email)->send(new VerifyInvitationRequest($this));
    }
}
