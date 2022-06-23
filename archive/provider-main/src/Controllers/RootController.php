<?php

namespace FourthEarth\Site\Controllers;

use FourthEarth\Site\Controllers\AbstractController;

use Illuminate\Http\Request;

use Eightfold\ShoopShelf\Shoop;
use Eightfold\LaravelMarkup\UIKit;

use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\Extension\SmartPunct\SmartPunctExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\Footnote\FootnoteExtension;

use Eightfold\CommonMarkAbbreviations\AbbreviationExtension;
use Eightfold\CommonMarkAccordions\AccordionExtension;
use Eightfold\CommonMarkAccordions\AccordionGroupExtension;
use League\CommonMark\Extension\Table\TableExtension;

use FourthEarth\Site\CommonmarkExtensions\Location\LocationExtension;
use FourthEarth\Site\CommonmarkExtensions\OtherSpeaking\OtherSpeakingExtension;
use FourthEarth\Site\CommonmarkExtensions\SelfSpeaking\SelfSpeakingExtension;
use FourthEarth\Site\CommonmarkExtensions\Narration\NarrationExtension;

class RootController extends AbstractController
{
    public function __invoke()
    {
        return parent::view(
            [
                parent::logoHeader(),
                $this->requestForm(),
                $this->markdown()
            ],
            [],
            [
                parent::meters()
            ]
        );
    }

    public function requestForm()
    {
        return UIKit::form(
            "post /request",
            UIKit::text("What email should we send the invitation to?", "email")->placeholder("darl@4th.earth")->email(),
            UIKit::select(
                UIKit::span("Disclosures"),
                "disclosures",
                "disclosures"
            )->options(
                "adult I am 18 years or older.",
                "receive I consent to periodic emails."
            )->checkbox()->attr("class checkboxes")
        )->submitLabel("Request invitation")->attr("novalidate novalidate");
    }

    public function markdown()
    {
        return UIKit::markdown(
            Shoop::store(__DIR__)->up(4)
                ->append(["content-fourth-earth", "root", "content.md"])
                ->markdown()->content()
        )->extensions(
            LocationExtension::class,
            OtherSpeakingExtension::class,
            SelfSpeakingExtension::class,
            NarrationExtension::class
        )->unfold();
    }
}
