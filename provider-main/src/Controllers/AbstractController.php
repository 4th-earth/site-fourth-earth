<?php

namespace FourthEarth\Site\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Eightfold\ShoopShelf\Shoop;
use Eightfold\LaravelMarkup\UIKit;

class AbstractController extends Controller
{
    public function view(
        array $mainContent = [],
        array $leftContent = [],
        array $rightContent = []
    )
    {
        $message = "";
        if (request()->session()->has("message")) {
            $message = session("message");
        }

        return UIKit::webView(
            "4th Earth",
            UIKit::div(
                UIKit::main($message, ...$mainContent)->attr("is transcript"),
                UIKit::aside(...$rightContent)->attr("is right-sidebar"),
                UIKit::aside(...$leftContent)->attr("is left-sidebar"),
                UIKit::footer(
                    UIKit::div(
                        UIKit::p("Copyright © 2020 Joshua Bruce. All rights reserved.")
                            ->attr("class copyright")
                    )
                )
            )->attr("class container")
        )->meta(
            UIKit::webHead()->favicons(
                "/assets/favicons/favicon.ico",
                "/assets/favicons/apple-touch-icon.png",
                "/assets/favicons/favicon-32x32.png",
                "/assets/favicons/favicon-16x16.png"
            )->styles(...["/css/main.css"])
        );
    }

    public function logoHeader()
    {
        return UIKit::h1(
            UIKit::span("Fourth Earth")
        )->attr("class logo-header");
    }

    public function meters()
    {
        return UIKit::div(
            UIKit::div(
                UIKit::h2(UIKit::span("10"), " health"),
                UIKit::figure(
                    $this->meter()
                )
            )->attr("is health", "data-value 10"),
            UIKit::div(
                UIKit::h2(UIKit::span("10"), " physical"),
                UIKit::figure(
                    $this->meter()
                )
            )->attr("is physical", "data-value 10"),
            UIKit::div(
                UIKit::h2(UIKit::span("10"), " mental"),
                UIKit::figure(
                    $this->meter()
                )
            )->attr("is mental", "data-value 10"),
            UIKit::div(
                UIKit::h2(UIKit::span("10"), " spirit"),
                UIKit::figure(
                    $this->meter()
                )
            )->attr("is spirit", "data-value 10")
        );
    }

    public function meter()
    {
        return '<svg width="100%" height="100%" viewBox="0 0 250 250" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g transform="matrix(1,0,0,1,-147,-1408.4)"><g id="Artboard6" transform="matrix(0.294118,0,0,0.416667,103.576,1115.9)"><rect x="147.641" y="702" width="850" height="600" style="fill:none;"/><clipPath id="_clip1"><rect x="147.641" y="702" width="850" height="600"/></clipPath><g clip-path="url(#_clip1)"><g transform="matrix(3.57134,0,0,2.52095,-2971.76,-448.092)"><g><g transform="matrix(2.21129,0,0,2.21129,-434.926,-710.8)"><path class="m10" d="M645.497,527.752C675.199,527.752 699.313,551.867 699.313,581.568C699.313,611.27 675.199,635.384 645.497,635.384C615.795,635.384 591.681,611.27 591.681,581.568C591.681,551.867 615.795,527.752 645.497,527.752ZM645.497,532.227C672.729,532.227 694.838,554.336 694.838,581.568C694.838,608.801 672.729,630.91 645.497,630.91C618.264,630.91 596.155,608.801 596.155,581.568C596.155,554.336 618.264,532.227 645.497,532.227Z"/></g><g transform="matrix(0.464546,0,0,0.464546,661.592,232.051)"><circle class="m9" cx="645.497" cy="581.568" r="53.816"/></g><g transform="matrix(0.464546,0,0,0.464546,618.305,274.051)"><circle class="m8" cx="645.497" cy="581.568" r="53.816"/></g><g transform="matrix(0.464546,0,0,0.464546,618.592,334.051)"><circle class="m7" cx="645.497" cy="581.568" r="53.816"/></g><g transform="matrix(0.464546,0,0,0.464546,660.592,378.051)"><circle class="m6" cx="645.497" cy="581.568" r="53.816"/></g><g transform="matrix(0.464546,0,0,0.464546,723.592,378.051)"><circle class="m5" cx="645.497" cy="581.568" r="53.816"/></g><g transform="matrix(0.464546,0,0,0.464546,766.592,335.051)"><circle class="m4" cx="645.497" cy="581.568" r="53.816"/></g><g transform="matrix(0.464546,0,0,0.464546,766.592,275.051)"><circle class="m3" cx="645.497" cy="581.568" r="53.816"/></g><g transform="matrix(0.464546,0,0,0.464546,721.592,231.051)"><circle class="m2" cx="645.497" cy="581.568" r="53.816"/></g><g transform="matrix(0.929092,0,0,0.929092,392.729,34.8862)"><circle class="m1" cx="645.497" cy="581.568" r="53.816"/></g></g></g></g></g></g></svg>';
    }
}
