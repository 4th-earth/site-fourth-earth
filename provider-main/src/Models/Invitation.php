<?php

namespace FourthEarth\Site\Models;

use Hashids\Hashids;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

use FourthEarth\Site\Models\Request;
use FourthEarth\Site\Mail\InvitationMail;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_id',
        'code'
    ];

    static public function new(Request $request): Invitation
    {
        $id = $request->id;

        $invitation = Invitation::create();
        $invitation->code = (new Hashids(env("APP_KEY"), 8))->encode($id);
        $invitation->request_id = $id;
        $invitation->save();

        return $invitation;
    }

    public function user()
    {
        return $this->hasOne(User::class)->first();
    }

    public function request()
    {
        return $this->belongsTo(Request::class)->first();
    }

    public function getEmailAttribute()
    {
        return $this->request()->email;
    }

    public function getTokenAttribute()
    {
        return $this->request()->token;
    }

    public function sendMail()
    {
        Mail::to($this->email)->send(new InvitationMail($this));
        return $this;
    }
}
