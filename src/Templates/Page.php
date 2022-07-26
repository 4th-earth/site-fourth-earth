<?php
declare(strict_types=1);

namespace FE\Templates;

use Eightfold\XMLBuilder\Contracts\Buildable;

use Eightfold\HTMLBuilder\Document;
use Eightfold\HTMLBuilder\Element;

use Psr\Http\Message\RequestInterface;

use Eightfold\Amos\Content;

use Eightfold\Amos\PageComponents\PageTitle;

// use Psr\Http\Message\RequestInterface;
//
// use Nyholm\Psr7Server\ServerRequestCreator;
// use Nyholm\Psr7\Factory\Psr17Factory;
// use Nyholm\Psr7\Response;
// use Nyholm\Psr7\Stream;
// use Nyholm\Psr7\Uri;
//
// use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
//
// use Eightfold\Markdown\Markdown as MarkdownConverter;
//
//
// use FE\Environment;
// use FE\Components\PageTitle;
// use FE\Sitemap;

class Page implements Buildable
{
    public static function create(
        Content $contentIn,
        RequestInterface $request
    ): self {
        return new self($contentIn, $request);
    }

    final private function __construct(
        private Content $contentIn,
        private RequestInterface $request
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

    public function build(): string
    {
        return Document::create(
                PageTitle::create(
                    $this->content(),
                    $this->request()
                )->build()
                // $this->pageTitle()
            )->head(
                Element::meta()->props('charset utf-8'),
                Element::meta()->props(
                    'name viewport',
                    'content width=device-width,initial-scale=1'
                ),
                Element::meta()->props(
                    'name description',
                    'content A tabletop role playing game for the ages.'
                ),
                Element::link()->omitEndTag()->props(
                    'type image/x-icon',
                    'rel icon',
                    'href /assets/icons/favicon.ico'
                ),
                Element::link()->omitEndTag()->props(
                    'sizes 180x180',
                    'rel apple-touch-icon',
                    'href /assets/icons/apple-touch-icon.png'
                ),
                Element::link()->omitEndTag()->props(
                    'sizes 32x32',
                    'rel image/png',
                    'href /assets/icons/favicon-32x32.png'
                ),
                Element::link()->omitEndTag()->props(
                    'sizes 16x16',
                    'rel image/png',
                    'href /assets/icons/favicon-16x16.png'
                ),
                Element::link()->props('rel stylesheet', 'href /assets/css/styles.min.css'),
                Element::script()->props('src /assets/js/interactive.js')
            )->body(
                Element::a('Skip to main content')->props('href #main', 'id skip-nav'),
                // $this->navigation(),
                Element::article(
                    Element::section(
                        // $content
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
//     private Psr17Factory $psr17Factory;
//
//     private RequestInterface $serverRequest;
//
//     private string $path = '';
//
//     public static function init(string $site, Environment $environment): Page
//     {
//         return new static($site, $environment);
//     }
//
//     public function __construct(
//         private string $site,
//         private Environment $environment
//     ) {
//         $this->psr17Factory = new Psr17Factory();
//
//         $creator = new ServerRequestCreator(
//             $this->psr17Factory, // ServerRequestFactory
//             $this->psr17Factory, // UriFactory
//             $this->psr17Factory, // UploadedFileFactory
//             $this->psr17Factory  // StreamFactory
//         );
//
//         $this->serverRequest = $creator->fromGlobals();
//     }
//
//     public function serverRequest(): RequestInterface
//     {
//         return $this->serverRequest;
//     }
//
//     public function path(): string
//     {
//         if (strlen($this->path) === 0) {
//             $this->path = $this->uri()->getPath();
//         }
//         return $this->path;
//     }
//
//     public function authority(): string
//     {
//         return $this->uri()->getAuthority();
//     }
//
//     public function response(): Response
//     {
//         if ($this->isFile()) {
//             return $this->fileResponse();
//         }
//         return $this->textResponse();
//     }
//
//     private function environment(): Environment
//     {
//         return $this->environment;
//     }
//
//     private function psr17Factory(): Psr17Factory
//     {
//         return $this->psr17Factory;
//     }
//
//     private function site(): string
//     {
//         return $this->site;
//     }
//
//     private function isRoot(): bool
//     {
//         return $this->site === 'root';
//     }
//
//     private function isNotRoot(): bool
//     {
//         return ! $this->isRoot();
//     }
//
//     private function uri(): Uri
//     {
//         return $this->serverRequest()->getUri();
//     }
//
//     private function isFile(): bool
//     {
//         return str_contains($this->path(), '.');
//     }
//
//     private function fileResponse(): Response
//     {
//         if (
//             $this->path() === '/vanilla/character-sheet.pdf' or
//             $this->path() === '/vanilla/social-contract.pdf'
//         ) {
//             $resource = @\fopen(__DIR__ . '/../content-raw' . $this->path(), 'r');
//             if (is_resource($resource)) {
//                 return new Response(
//                     status: 200,
//                     headers: ['content-type' => 'application/pdf'],
//                     body: Stream::create($resource)
//                 );
//             }
//         }
//
//         $resource = @\fopen(__DIR__ . $this->path(), 'r');
//         $contentType = 'text/plain';
//         if (str_ends_with($this->path(), '.css')) {
//             $contentType = 'text/css';
//
//         } elseif (str_ends_with($this->path(), '.svg')) {
//             $contentType = 'image/svg+xml';
//
//         } elseif (str_ends_with($this->path(), '.js')) {
//             $contentType = 'application/javascript';
//
//         } elseif (str_ends_with($this->path(), '.ttf')) {
//             $contentType = 'font/ttf';
//
//         } elseif (str_ends_with($this->path(), 'sitemap.xml')) {
//             $contentType = 'application/xml';
//             return new Response(
//                 status: 200,
//                 headers: ['content-type' => $contentType],
//                 body: Stream::create(
//                     Sitemap::create(
//                         $this->site(),
//                         $this->environment()->contentRootForSite($this->site()),
//                         $this->environment()->authorityForSite($this->site()),
//                         $this->environment()->schemeForSite($this->site())
//                     )
//                 )
//             );
//         }
//
//         if (is_resource($resource)) {
//             return new Response(
//                 status: 200,
//                 headers: ['content-type' => $contentType],
//                 body: Stream::create($resource)
//             );
//         }
//
//         return new Response(
//             status: 404,
//             headers: ['content-type' => $contentType],
//             body: 'Content not found.'
//         );
//     }
//
//     private function contentPath(): string
//     {
//         return $this->rootForContent() . $this->path() . 'content.md';
//     }
//
//     private function rootForContent(): string
//     {
//         if ($this->shouldUseRootContent()) {
//             return __DIR__ . '/../content-root';
//         }
//         return __DIR__ . '/../content-' . $this->site();
//     }
//
//     private function shouldUseRootContent(): bool
//     {
//         return str_starts_with($this->path(), '/legal/') or
//             str_starts_with($this->path(), '/support/');
//     }
//
//     private function textResponse(): Response
//     {
//         $responseBody = $this->psr17Factory()->createStream($this->body());
//         return $this->psr17Factory()->createResponse(200)->withBody($responseBody);
//     }
//
//     private function body(): string
//     {
//         $content = '';
//         if (
//             is_string($this->contentPath()) and
//             file_exists($this->contentPath()) and
//             $c = file_get_contents($this->contentPath())
//         ) {
//             $content = MarkdownConverter::create()
//                 ->withConfig([
//                     'html_input' => 'allow'
//                 ])->defaultAttributes([
//                     Image::class => [
//                         'loading'  => 'lazy',
//                         'decoding' => 'async'
//                     ]
//                 ])->externalLinks([
//                     'open_in_new_window' => true,
//                     'internal_hosts'     =>
//                         $this->environment()->authorityForSite($this->site())
//                 ])->accessibleHeadingPermalinks([
//                     'min_heading_level' => 2,
//                     'max_heading_level' => 3,
//                     'symbol'            => '＃'
//                 ])->minified()
//                 ->smartPunctuation()
//                 ->descriptionLists()
//                 ->tables()
//                 ->attributes() // for class on notices
//                 ->abbreviations()
//                 ->convert($c);
//         } else {
//             $content = <<<html
//                 <h1>Ready player 404</h1>
//                 <p>We couldnʼt find that content.</p>
//                 <p>Maybe it was eaten by a dinosaur. Or perhaps it's just on vacation.</p>
//             html;
//
//             if ($this->site() === 'raw') {
//                 $content .= <<<html
//                     <p>Try here instead:</p>
//                     <ul>
//                     <li><a href="/">RAW</a></li>
//                     <li><a href="/vanilla/">Vanilla</a></li>
//                     <li><a href="/sprinkles/">Sprinkles</a></li>
//                     </ul>
//                 html;
//
//             } elseif ($this->site() === 'lore') {
//                 $content .= <<<html
//                     <p>Try here instead:</p>
//                     <ul>
//                     <li><a href="/">Lore</a></li>
//                     <li><a href="/people/">People</a></li>
//                     <li><a href="/places/">Places</a></li>
//                     <li><a href="/things/">Things</a></li>
//                     </ul>
//                 html;
//             }
//         }
//
//     }
//
//     private function pageTitle(): string
//     {
//         $contentRoot = __DIR__ . '/../content-' . $this->site();
//         $pageTitle   = PageTitle::init($contentRoot, $this->path());
//         if ($this->site() === 'raw' or $this->site() === 'lore') {
//             if (
//                 str_starts_with($this->path(), '/legal/') or
//                 str_starts_with($this->path(), '/support/')
//             ) {
//                 $part = 'legal';
//                 if (str_starts_with($this->path(), '/support/')) {
//                     $part = 'support';
//                 }
//                 $baseTitleMeta = $contentRoot . '/meta.json';
//                 $baseTitle     = PageTitle::titleForPath($baseTitleMeta);
//
//                 $contentRoot = __DIR__ . '/../content-root';
//                 $pageTitle = PageTitle::init($contentRoot, $this->path())
//                     ->overrideBaseTitle($baseTitle);
//             }
//         }
//         return $pageTitle->title();
//     }
//
//     private function navigation(): Element|string
//     {
//         if ($this->isNotRoot()) {
//             $links = [
//                 '/ R Rules as Written',
//                 '/vanilla/ V Vanilla',
//                 '/sprinkles/ S Sprinkles'
//             ];
//             if ($this->site() === 'lore') {
//                 $links = [
//                     '/ I Introduction',
//                     '/people/ Pe People',
//                     '/places/ Pl Places',
//                     '/things/ T Things'
//                 ];
//             }
//
//             $l = [];
//             $requestPath = $this->path();
//             foreach ($links as $link) {
//                 list($href, $ts, $title) = explode(' ', $link, 3);
//                 $id = str_replace('/', '', $href);
//
//                 $a = Element::a(
//                     ...$this->spans($title, $ts)
//                 )->props('href ' . $href);
//                 if ($requestPath === '/' and $href === $requestPath) {
//                     $a = Element::a(
//                         ...$this->spans($title, $ts)
//                     )->props('href ' . $href, 'class current');
//
//                 } elseif (
//                     $href !== '/' and
//                     str_starts_with($requestPath, $href)
//                 ) {
//                     $a = Element::a(
//                         ...$this->spans($title, $ts)
//                     )->props('href ' . $href, 'class current');
//
//                 }
//
//                 $l[] = Element::li($a);
//             }
//             return Element::nav(
//                 Element::ul(...$l)->props('class col-' . count($links))
//             )->props('is main-nav');
//
//         }
//         return '';
//     }
//
//     private function spans(string $title, string $titleShort): array
//     {
//         return [
//             Element::span($title),
//             Element::span($titleShort)->props('aria-label ' . $title)
//         ];
//     }
}
