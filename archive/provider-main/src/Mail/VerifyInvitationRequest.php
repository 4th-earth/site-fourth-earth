<?php

namespace FourthEarth\Site\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Eightfold\LaravelMarkup\UIKit;

use FourthEarth\Site\Models\Request;

class VerifyInvitationRequest extends Mailable
{
    use Queueable, SerializesModels;

    protected $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = env("APP_URL") ."/request?token=". $this->request->token;

        $view = <<<EOD
        <html>
            <head>
                <title>hello</title>
                <style type="text/css">
                    body {
                      margin: 0;
                      font-family: "Open Sans", Helvetica, Verdana, sans-serif;
                      background: #3E505B;
                      font-size: 16px;
                      line-height: 2.25rem;
                    }

                    h1, h2, h3, h4, h5, h6 {
                        text-align: center;
                      font-family: Futura, "Trebuchet MS", Arial, sans-serif;
                    }

                    div {
                        margin: 2rem auto;
                        padding: 1rem;
                        width: 90%;
                        background: #FCFCFD;
                        border-radius: 0 10px 10px 10px;
                        border-left: 4px solid hsl(298,92%,43%);
                        box-shadow: 3px 3px 5px 0px rgba(0, 0, 0, 0.30);
                    }

                    a {
                        display: inline-block;
                        padding: 2px 1px;
                        border-radius: 3px;
                        background-color: hsl(298,92%,43%);
                        color: hsl(202,2%,99%);
                        font-weight: bold;
                        text-decoration: none;
                    }

                    a:hover {
                        background-color: hsl(202,19%,19%);
                    }
                </style>
            </head>
            <body>
                <div>
                    <h1>4th Earth</h1>
                    <p>We received a request to send an invitation to Fourth Earth alpha gameplay to this email address: {$this->request->email}</p>
                    <p>Please confirm your desire to receive an invitation at a future time by visiting the following URL.</p>
                    <p><a href="{$url}">Claim request</a></p>
                    <p>The request <strong>expires in 72 hours</strong>. If you do not wish to join Fourth Earth, do nothing and ignore this message.</p>
                    <p>Sincerely,<br>
                    Darl of Fourth Earth</p>
                    <p>If the link above doesn't work, try this one: {$url}</p>
                </div>
            </body>
        </html>
        EOD;

        return $this->subject("Fourth Earth: Verify invitation request")->html($view);
    }
}
