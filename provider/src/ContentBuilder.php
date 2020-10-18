<?php

namespace FourthEarth\Site;

use Eightfold\Foldable\Fold;

use Eightfold\Markup\UIKit\Elements\Compound\WebHead;

use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\Extension\SmartPunct\SmartPunctExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\Footnote\FootnoteExtension;

use Eightfold\CommonMarkAbbreviations\AbbreviationExtension;
use Eightfold\CommonMarkAccordions\AccordionExtension;
use Eightfold\CommonMarkAccordions\AccordionGroupExtension;
use League\CommonMark\Extension\Table\TableExtension;

use FourthEarth\Site\CommonmarkExtras\Location\LocationExtension;
use FourthEarth\Site\CommonmarkExtras\OtherSpeaking\OtherSpeakingExtension;
use FourthEarth\Site\CommonmarkExtras\SelfSpeaking\SelfSpeakingExtension;
use FourthEarth\Site\CommonmarkExtras\Narration\NarrationExtension;

use Eightfold\ShoopShelf\Shoop;

use Eightfold\LaravelMarkup\UIKit;

use FourthEarth\Site\Models\InvitationRequest;

class ContentBuilder extends Fold
{
    private $markdown = "";

    // public function view()
    // {
    //     return UIKit::webView(
    //         $this->pageTitle(),
    //         $this->appearance(),
    //         $this->main(),
    //         $this->stats()
    //     )->meta($this->meta());
    // }

    public function view(string $class = "triple", ...$content)
    {
        $message = "";
        if (request()->session()->has("message")) {
            $message = session("message");
        }

        $view = UIKit::webView(
            $this->pageTitle(),
            $message,
            UIKit::main(...$content)->attr("is transcript"),
            ($class === "triple") ? $this->asideStats() : "",
            ($class === "tripe") ? $this->asideAppearance() : "",
            UIKit::footer(
                UIKit::p("Copyright © Joshua Bruce, 2020. All rights reserved.")
            )
        )->meta(
            UIKit::webHead()->favicons(
                "/assets/favicons/favicon.ico",
                "/assets/favicons/apple-touch-icon.png",
                "/assets/favicons/favicon-32x32.png",
                "/assets/favicons/favicon-16x16.png"
            )->styles(...["/css/main.css"])
            // ->scripts(...$this->scripts())
        )->bodyAttr("class {$class}");

        return view("ef::default")->with("view", $view);
    }

    public function homeView()
    {
        return $this->view("triple",
            $this->logoHeader(),
            $this->invitationRequestForm(),
            UIKit::markdown(
                $this->markdown()->body()
            )->extensions(
                LocationExtension::class,
                OtherSpeakingExtension::class,
                SelfSpeakingExtension::class,
                NarrationExtension::class
            )
        );
    }

    public function requestConfirmView()
    {
        return $this->view("full",
            $this->logoHeader(),
            UIKit::markdown(
                $this->markdown()->body()
            )->extensions(
                LocationExtension::class,
                OtherSpeakingExtension::class,
                SelfSpeakingExtension::class,
                NarrationExtension::class
            )
        );
    }

    public function registerView()
    {
        $token = request()->query("token");
        $invitationRequest = InvitationRequest::where("token", $token)->firstOrFail();
        return $this->view("full",
            $this->logoHeader(),
            UIKit::markdown(
                $this->markdown()->body()
            ),
            UIKit::form(
                "post ". route("register"),
                UIKit::text("code from invitation email", "code"),
                UIKit::text("email address", "email")->email()->value($invitationRequest->email),
                UIKit::password("password", "password"),
                UIKit::password("confirm password", "password_confirmation"),
                (request()->query("token"))
                    ? UIKit::input()->attr("type hidden", "name token", "value ". request()->query("token"))
                    : ""
            )->submitLabel("Register"),
            UIKit::p(
                UIKit::anchor("Already registered?", "/login")
            )
        );
    }

    public function loginView()
    {
        return $this->view("full",
            $this->logoHeader(),
            UIKit::markdown(
                $this->markdown()->body()
            ),
            UIKit::form(
                "post ". route("login"),
                UIKit::text("email address", "email")->email(),
                UIKit::password("password", "password")
            )->submitLabel("Sign in"),
            UIKit::p(
                UIKit::anchor("Forgot your password?", route('password.request'))
            )
        );
    }

    public function pageTitle($parts = [])
    {
        if ($this->hasContent()->reversed()->unfold()) {
            return "This page has not been filled in";
        }

        return $this->contentPaths()->each(function($v) {
            return Shoop::store($v)
                ->markdown()->meta()->at("title")->unfold();
        })->efToString(" | ");
    }

    public function logoHeader()
    {
        return UIKit::h1(
            UIKit::span("Fourth Earth")
        )->attr("class logo-header");
    }

    public function ip()
    {
        $keys = [
            'HTTP_CLIENT_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED',
            'HTTP_X_CLUSTER_CLIENT_IP',
            'HTTP_FORWARDED_FOR',
            'HTTP_FORWARDED',
            'REMOTE_ADDR'
        ];

        foreach ($keys as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip();
    }

    public function invitationRequestForm()
    {

        return UIKit::form(
            "post /request",
            UIKit::text("Where should the alpha gameplay invitation be sent?", "email")->placeholder("darl@4th.earth")->email(),
            UIKit::ul(
                UIKit::li(
                    UIKit::input()->attr("type checkbox", "id adult-check", "name adult"),
                    UIKit::label("I am 18 years or older.")->attr("for adult-check")
                ),
                UIKit::li(
                    UIKit::input()->attr("type checkbox", "id mail-check", "name mail"),
                    UIKit::label("I consent to periodic emails.")->attr("for mail-check")
                )
            )->attr("class checkboxes")
        )->submitLabel("Request invitation");
    }

    public function asideStats()
    {
        return UIKit::aside(
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
        )->attr("is status");
    }

    public function asideAppearance()
    {
        return UIKit::aside(
        )->attr("is appearance");
    }

    // public function appearance()
    // {
    //     return UIKit::div(
    //         UIKit::nav(
    //             UIKit::ul(
    //                 UIKit::li(
    //                     UIKit::anchor(UIKit::span("Fourth Earth"), "/")
    //                         ->attr("class home")
    //                 ),
    //                 UIKit::li(
    //                     UIKit::anchor("Citizen", "/citizen"),
    //                     UIKit::listWith(
    //                         UIKit::anchor("Citizen Glasses", "/citizen/citizen-glasses"),
    //                         UIKit::anchor("Species", "/citizen/species"),
    //                         UIKit::anchor("Magic", "/citizen/magic-of-fourth-earth")
    //                     )
    //                 ),
    //                 UIKit::li(
    //                     UIKit::anchor("Gameplay", "/the-system")
    //                 )
    //             )
    //         ),
    //         UIKit::p("Copyright © Joshua Bruce 2020. All rights reserved.")
    //             ->attr("class copyright")
    //     )->attr("class appearance");
    // }

    // public function main()
    // {
    //     $content = UIKit::markdown("Hmmmm...either the content for this page has not been written or does not exist.");
    //     if ($this->hasContent()->unfold()) {
    //         $content = UIKit::markdown(
    //             $this->markdown()->body()
    //         )->extensions(
    //             GithubFlavoredMarkdownExtension::class,
    //             SmartPunctExtension::class,
    //             HeadingPermalinkExtension::class,
    //             FootnoteExtension::class,
    //             AbbreviationExtension::class,
    //             AccordionExtension::class,
    //             AccordionGroupExtension::class,
    //             TableExtension::class
    //         );
    //     }
    //     return UIKit::main($content)->attr("class transcript");
    // }

    // public function stats()
    // {
    //     return UIKit::div(
    //         UIKit::div()->attr("class meter meter-health"),
    //         UIKit::div()->attr("class meter meter-physical"),
    //         UIKit::div()->attr("class meter meter-mental"),
    //         UIKit::div()->attr("class meter meter-aura")
    //     )->attr("class status");
    // }

    public function markdown()
    {
        if (Shoop::this($this->markdown)->efIsString()) {
            $content = Shoop::store($this->contentPath())->content()->unfold();
            $this->markdown = Shoop::markdown($content);
        }
        return $this->markdown;
    }

    public function hasContent()
    {
        return Shoop::store($this->contentPath())->isFile();
    }

    private function requestPath()
    {
        return request()->path();
    }

    private function requestParts()
    {
        return Shoop::this($this->requestPath())->divide("/", false)->unfold();
    }

    public function contentPath()
    {
        return $this->main->append(
            $this->requestParts()
        )->append(["content.md"])->efToString("/");
    }

    private function contentPaths()
    {
        $parts = Shoop::this($this->requestParts());
        $paths = $parts->each(function($v) use (&$parts) {
            $path = $this->main->append($parts->unfold())
                ->append(["content.md"])->efToString("/");
            if (Shoop::store($path)->isFile()) {
                $parts = $parts->dropLast();
                return $path;
            }
        })->append([$this->main->append(["content.md"])->efToString("/")]);

        return $paths;
    }

    public function uiPath(string $image = "")
    {
        return $this->main->append(["assets", "ui"])->append(
            Shoop::this($image)->divide("/", false)->unfold()
        )->efToString("/");
    }

    public function faviconsPath(string $image = "")
    {
        return $this->main->append(["assets", "favicons"])->append(
            Shoop::this($image)->divide("/", false)->unfold()
        )->efToString("/");
    }

    public function meta(string $type = "website"): WebHead
    {
        return UIKit::webHead()->favicons(
            "/assets/favicons/favicon.ico",
            "/assets/favicons/apple-touch-icon.png",
            "/assets/favicons/favicon-32x32.png",
            "/assets/favicons/favicon-16x16.png"
        )
        // )->social(
        //     $this->handler()->title(ContentHandler::BOOKEND),
        //     url()->current(),
        //     $this->handler()->description(),
        //     $this->handler()->socialImage(),
        //     $type
        // )->socialTwitter(...$this->socialTwitter())
        ->styles(...$this->styles())
        ->scripts(...$this->scripts());
    }

    public function styles()
    {
        return Shoop::this(["/css/main.css"]);
    }

    public function scripts()
    {
        return Shoop::this([
            "/js/ef-menu.js",
            "/js/ef-accordions.js"
        ]);
    }

    public function meter()
    {
        return '<svg width="100%" height="100%" viewBox="0 0 250 250" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><g transform="matrix(1,0,0,1,-147,-1408.4)"><g id="Artboard6" transform="matrix(0.294118,0,0,0.416667,103.576,1115.9)"><rect x="147.641" y="702" width="850" height="600" style="fill:none;"/><clipPath id="_clip1"><rect x="147.641" y="702" width="850" height="600"/></clipPath><g clip-path="url(#_clip1)"><g transform="matrix(3.57134,0,0,2.52095,-2971.76,-448.092)"><g><g transform="matrix(2.21129,0,0,2.21129,-434.926,-710.8)"><path class="m10" d="M645.497,527.752C675.199,527.752 699.313,551.867 699.313,581.568C699.313,611.27 675.199,635.384 645.497,635.384C615.795,635.384 591.681,611.27 591.681,581.568C591.681,551.867 615.795,527.752 645.497,527.752ZM645.497,532.227C672.729,532.227 694.838,554.336 694.838,581.568C694.838,608.801 672.729,630.91 645.497,630.91C618.264,630.91 596.155,608.801 596.155,581.568C596.155,554.336 618.264,532.227 645.497,532.227Z"/></g><g transform="matrix(0.464546,0,0,0.464546,661.592,232.051)"><circle class="m9" cx="645.497" cy="581.568" r="53.816"/></g><g transform="matrix(0.464546,0,0,0.464546,618.305,274.051)"><circle class="m8" cx="645.497" cy="581.568" r="53.816"/></g><g transform="matrix(0.464546,0,0,0.464546,618.592,334.051)"><circle class="m7" cx="645.497" cy="581.568" r="53.816"/></g><g transform="matrix(0.464546,0,0,0.464546,660.592,378.051)"><circle class="m6" cx="645.497" cy="581.568" r="53.816"/></g><g transform="matrix(0.464546,0,0,0.464546,723.592,378.051)"><circle class="m5" cx="645.497" cy="581.568" r="53.816"/></g><g transform="matrix(0.464546,0,0,0.464546,766.592,335.051)"><circle class="m4" cx="645.497" cy="581.568" r="53.816"/></g><g transform="matrix(0.464546,0,0,0.464546,766.592,275.051)"><circle class="m3" cx="645.497" cy="581.568" r="53.816"/></g><g transform="matrix(0.464546,0,0,0.464546,721.592,231.051)"><circle class="m2" cx="645.497" cy="581.568" r="53.816"/></g><g transform="matrix(0.929092,0,0,0.929092,392.729,34.8862)"><circle class="m1" cx="645.497" cy="581.568" r="53.816"/></g></g></g></g></g></g></svg>';
    }
}
