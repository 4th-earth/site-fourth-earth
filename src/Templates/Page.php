<?php
declare(strict_types=1);

namespace FE\Templates;

use Eightfold\XMLBuilder\Contracts\Buildable;

use Psr\Http\Message\RequestInterface;

use Eightfold\HTMLBuilder\Document;
use Eightfold\HTMLBuilder\Element;

use Eightfold\Amos\Content;
use Eightfold\Amos\Markdown;
use Eightfold\Amos\PageComponents\PageTitle;
use Eightfold\Amos\PageComponents\Favicons;

use FE\PageComponents\Navigation;

class Page implements Buildable
{
    public static function create(
        Content $contentIn,
        RequestInterface $request,
        string $withDomain = ''
    ): self {
        return new self($contentIn, $request, $withDomain);
    }

    final private function __construct(
        private Content $contentIn,
        private RequestInterface $request,
        private string $withDomain
    ) {
    }

    private function content(): Content
    {
        return $this->contentIn;
    }

    private function request(): RequestInterface
    {
        return $this->request;
    }

    private function domain(): string
    {
        return $this->withDomain;
    }

    public function build(): string
    {
        return Document::create(
                PageTitle::create(
                    $this->content(),
                    $this->request()
                )->build()
            )->head(
                Element::meta()->omitEndTag()->props(
                    'name viewport',
                    'content width=device-width,initial-scale=1'
                ),
                Element::meta()->omitEndTag()->props(
                    'name description',
                    'content A tabletop role playing game for the ages.'
                ),
                Favicons::create(
                    themeColor: '#ffffff',
                    path: '/favicons',
                    msAppTileColor: '#00aba9',
                    safariTabColor: '#00aba9'
                ),
                Element::link()->omitEndTag()
                    ->props(
                        'rel stylesheet',
                        'href /css/styles.min.css',
                        'type text/css'
                    ),
                Element::script()->props(
                    'src /js/interactive.min.js',
                    'type text/javascript'
                )
            )->body(
                Element::a('Skip to main content')
                    ->props('href #main', 'id skip-nav'),
                Navigation::create(
                    $this->content(),
                    $this->request(),
                    $this->domain()
                ),
                // $this->navigation(),
                Element::article(
                    Element::section(
                        $this->content()->convertedContent(
                            at: $this->request()->getUri()->getPath()
                        )
                    )
                )->props('id main', 'role main'),
                Element::footer(
                    Element::img()->props(
                        'src /assets/icons/fourth-earth-mark.svg',
                        'alt Fourth Earth logo, with a 4 and E overlapping and the 4 has a curved hypotenuse',
                        'width 100px',
                        'height auto'
                    ),
                    Element::ul(
                        Element::li(
                            Element::a(
                                'terms'
                            )->props('href /legal/')
                        ),
                        Element::li(
                            Element::a(
                                'support'
                            )->props('href /support/')
                        )
                    ),
                    Element::p(
                        Element::span(
                            '4th Earth RAW, 4th Earth RAW: Vanilla, and 4th Earth RAW: Sprinkles'
                        )->props('property dct:title'),
                        Element::br()->omitEndTag(),
                        ' by ',
                        Element::span(
                            'Alexander Midknight'
                        )->props('property cc:attributionName'),
                        ' is ',
                        Element::br()->omitEndTag(),
                        ' licensed under ',
                        Element::a(
                            'Attribution-ShareAlike 4.0 International'
                        )->props(
                            'href http://creativecommons.org/licenses/by-sa/4.0/?ref=chooser-v1',
                            'target _blank',
                            'rel license noopener noreferrer'
                        ),
                        '.',
                        Element::br()->omitEndTag(),
                        Element::img()->props(
                            'style height:22px!important;margin-left:3px;vertical-align:text-bottom;',
                            'src https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1'
                        ),
                        Element::img()->props(
                            'style height:22px!important;margin-left:3px;vertical-align:text-bottom;',
                            'src https://mirrors.creativecommons.org/presskit/icons/by.svg?ref=chooser-v1'
                        ),
                        Element::img()->props(
                            'style height:22px!important;margin-left:3px;vertical-align:text-bottom;',
                            'src https://mirrors.creativecommons.org/presskit/icons/sa.svg?ref=chooser-v1'
                        )
                    )->props(
                       'xmlns:cc http://creativecommons.org/ns#',
                       'xmlns:dct http://purl.org/dc/terms/'
                    )
                ),
                Element::a(
                    Element::span(
                        'to top'
                    )
                )->props('id back-to-top', 'href #skip-nav')
            )->build();
    }

    public function __toString(): string
    {
        return $this->build();
    }
}
