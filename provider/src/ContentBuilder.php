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

use Eightfold\ShoopShelf\Shoop;

use Eightfold\Markup\UIKit;

class ContentBuilder extends Fold
{
    private $markdown = "";

    public function view()
    {
        return UIKit::webView(
            $this->pageTitle(),
            $this->appearance(),
            $this->main(),
            $this->stats()
        )->meta($this->meta());
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

    public function appearance()
    {
        return UIKit::div(
            UIKit::nav(
                UIKit::ul(
                    UIKit::li(
                        UIKit::anchor(UIKit::span("Fourth Earth"), "/")
                            ->attr("class home")
                    ),
                    UIKit::li(
                        UIKit::anchor("Citizen", "/citizen"),
                        UIKit::listWith(
                            UIKit::anchor("Citizen Glasses", "/citizen/citizen-glasses"),
                            UIKit::anchor("Species", "/citizen/species"),
                            UIKit::anchor("Magic", "/citizen/magic-of-fourth-earth")
                        )
                    ),
                    UIKit::li(
                        UIKit::anchor("Gameplay", "/the-system")
                    )
                )
            ),
            UIKit::p("Copyright © Joshua Bruce 2020. All rights reserved.")
                ->attr("class copyright")
        )->attr("class appearance");
    }

    public function main()
    {
        $content = UIKit::markdown("Hmmmm...either the content for this page has not been written or does not exist.");
        if ($this->hasContent()->unfold()) {
            $content = UIKit::markdown(
                $this->markdown()->body()
            )->extensions(
                GithubFlavoredMarkdownExtension::class,
                SmartPunctExtension::class,
                HeadingPermalinkExtension::class,
                FootnoteExtension::class,
                AbbreviationExtension::class,
                AccordionExtension::class,
                AccordionGroupExtension::class,
                TableExtension::class
            );
        }
        return UIKit::main($content)->attr("class transcript");
    }

    public function stats()
    {
        return UIKit::div(
            UIKit::div()->attr("class meter meter-health"),
            UIKit::div()->attr("class meter meter-physical"),
            UIKit::div()->attr("class meter meter-mental"),
            UIKit::div()->attr("class meter meter-aura")
        )->attr("class status");
    }

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

    private function contentPath()
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
}
