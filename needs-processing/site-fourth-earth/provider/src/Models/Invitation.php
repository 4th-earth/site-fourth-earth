<?php

namespace FourthEarth\Site\Models;

use Hashids\Hashids;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

use FourthEarth\Site\Models\InvitationRequest;

use FourthEarth\Site\Mail\InvitationMail;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = ["code", "claimed_at"];

    static public function newInvitation(
        InvitationRequest $invitationRequest
    ): Invitation
    {
        $invitation = Invitation::create();
        $invitation->code = (new Hashids(env("APP_KEY"), 8))
            ->encode($invitationRequest->id);
        $invitation->invitation_request_id = $invitationRequest->id;
        $invitation->save();

        return $invitation;
    }

    public function sendMail()
    {
        Mail::to($this->email)->send(new InvitationMail($this));
    }

    public function request()
    {
        return $this->belongsTo(InvitationRequest::class, "invitation_request_id")->first();
    }

    public function getEmailAttribute()
    {
        return $this->request()->email;
    }

    public function getTokenAttribute()
    {
        return $this->request()->token;
    }
}
