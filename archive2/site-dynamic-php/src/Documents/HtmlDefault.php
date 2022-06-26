<?php

declare(strict_types=1);

namespace FE\SiteDynamic\Documents;

use Eightfold\HTMLBuilder\Document;
use Eightfold\HTMLBuilder\Element;

use FE\SiteDynamic\Environment;

use FE\SiteDynamic\Content\Markdown;

use JoshBruce\SiteDynamic\FileSystem\Finder;
use FE\SiteDynamic\FileSystem\PlainTextFile;

class HtmlDefault
{
    public static function create(
        string $pageTitle,
        string $description,
        Element $body,
        Environment $environemt
    ): string {
        $html = Document::create(
            $pageTitle
        )->head(
            // ...self::baseHead($description)
        )->body(
            $body
        )->build();

        return self::canonicalUrls($html, $environemt);
    }

    /**
     * @return Element[]
     */
    public static function baseHead(string $description): array
    {
        return [
            Element::meta()->omitEndTag()->props(
                'name viewport',
                'content width=device-width,initial-scale=1'
            ),
            Element::meta()->omitEndTag()->props(
                'name description',
                'content ' . $description
            ),
            Element::link()->omitEndTag()->props(
                'type image/x-icon',
                'rel icon',
                'href /assets/favicons/favicon.ico'
            ),
            Element::link()->omitEndTag()->props(
                'rel apple-touch-icon',
                'href /assets/favicons/apple-touch-icon.png',
                'sizes 180x180'
            ),
            Element::link()->omitEndTag()->props(
                'rel image/png',
                'href /assets/favicons/favicon-32x32.png',
                'sizes 32x32'
            ),
            Element::link()->omitEndTag()->props(
                'rel image/png',
                'href /assets/favicons/favicon-16x16.png',
                'sizes 16x16'
            ),
            self::cssElement()
        ];
    }

    public static function cssElement(): Element
    {
        $cssPath  = '/assets/css/main.min.css';
        // TODO: should be last commit of CSS file - another reason to place
        //       content in same folder as rest of project.
        $query = round(microtime(true));

        return Element::link()->omitEndTag()
            ->props('rel stylesheet', "href {$cssPath}?v={$query}");
    }

    public static function footer(): Element
    {
        return Element::footer(
            Element::p(
                'Copyright © 2004–' . date('Y') . ' Joshua C. Bruce. ' .
                    'All rights reserved.'
            )
        );
    }

    public static function canonicalUrls(
        string $html,
        Environment $environment
    ): string {
        // TODO: Make sure images show canonical url
        return str_replace(
            ['href="/', 'src="/'],
            [
                'href="' . $environment->appUrl() . '/',
                'src="' . $environment->appUrl() . '/'
            ],
            $html
        );
    }
}
