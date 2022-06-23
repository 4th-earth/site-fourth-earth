<?php

namespace FourthEarth\Site\Models;

use Hashids\Hashids;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

use FourthEarth\Site\Mail\VerifyInvitationRequest;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'token'
    ];

    static public function new(string $email): Request
    {
        $request = Request::create([
            "email" => $email
        ]);

        $request->token = (new Hashids(env("APP_KEY"), 12))->encode($request->id);
        $request->save();

        return $request;
    }

    public function invitation()
    {
        return $this->hasOne(Invitation::class)->first();
    }

    public function sendMail()
    {
        Mail::to($this->email)->send(new VerifyInvitationRequest($this));
        return $this;
    }
}
