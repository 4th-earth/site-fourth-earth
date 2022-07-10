<?php
declare(strict_types=1);

namespace FE;

use Psr\Http\Message\RequestInterface;

use Nyholm\Psr7Server\ServerRequestCreator;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\Response;
use Nyholm\Psr7\Stream;
use Nyholm\Psr7\Uri;

use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

use Eightfold\Markdown\Markdown as MarkdownConverter;

use Eightfold\HTMLBuilder\Document;
use Eightfold\HTMLBuilder\Element;

class Page
{
    private Psr17Factory $psr17Factory;

    private RequestInterface $serverRequest;

    private string $path = '';

    public static function init(string $site): Page
    {
        return new static($site);
    }

    public function __construct(private string $site)
    {
        $this->psr17Factory = new Psr17Factory();

        $creator = new ServerRequestCreator(
            $this->psr17Factory, // ServerRequestFactory
            $this->psr17Factory, // UriFactory
            $this->psr17Factory, // UploadedFileFactory
            $this->psr17Factory  // StreamFactory
        );

        $this->serverRequest = $creator->fromGlobals();
    }

    public function serverRequest(): RequestInterface
    {
        return $this->serverRequest;
    }

    public function path(): string
    {
        if (strlen($this->path) === 0) {
            $this->path = $this->uri()->getPath();
        }
        return $this->path;
    }

    public function authority(): string
    {
        return $this->uri()->getAuthority();
    }

    public function response(): Response
    {
        if ($this->isFile()) {
            return $this->fileResponse();
        }
        return $this->textResponse();
    }

    private function psr17Factory(): Psr17Factory
    {
        return $this->psr17Factory;
    }

    private function site(): string
    {
        return $this->site;
    }

    private function uri(): Uri
    {
        return $this->serverRequest()->getUri();
    }

    private function isFile(): bool
    {
        return str_contains($this->path(), '.');
    }

    private function fileResponse(): Response
    {
        if ($this->path() === '/vanilla/character-sheet.pdf') {
            $resource = @\fopen(__DIR__ . '/../../content-raw/character-sheet.pdf', 'r');
            if (is_resource($resource)) {
                return new Response(
                    status: 200,
                    headers: ['content-type' => 'application/pdf'],
                    body: Stream::create($resource)
                );
            }
        }

        $resource = @\fopen(__DIR__ . $this->path(), 'r');
        $contentType = 'text/plain';
        if (str_ends_with($this->path(), '.css')) {
            $contentType = 'text/css';

        } elseif (str_ends_with($this->path(), '.svg')) {
            $contentType = 'image/svg+xml';

        } elseif (str_ends_with($this->path(), '.js')) {
            $contentType = 'application/javascript';

        }

        if (is_resource($resource)) {
            return new Response(
                status: 200,
                headers: ['content-type' => $contentType],
                body: Stream::create($resource)
            );
        }

        return new Response(
            status: 404,
            headers: ['content-type' => $contentType],
            body: 'Content not found.'
        );
    }

    private function pageTitle(): string
    {
        $title = [
            '4th Earth',
            'Rules as Written'
        ];

        $contentPath = __DIR__ . '/error-404.md';

        if ($this->path() === '/') {
            $title       = $title;

        } elseif ($this->path() === '/vanilla/') {
            $title[] = 'Vanilla';

        } elseif ($this->path() === '/sprinkles/') {
            $title[] = 'Sprinkles';

        } elseif ($this->path() === '/versioning/') {
            $title[] = 'Versioning';

        } else {
            $title = ['Page not found error'];

        }

        return implode(' | ', array_reverse($title));
    }

    private function contentPath(): string
    {
        return $this->rootForContent() . $this->path() . 'content.md';
    }

    private function rootForContent(): string
    {
        return __DIR__ . '/../content-' . $this->site();
    }

    private function rootForSite(): string
    {
        return __DIR__ . '/../site-' . $this->site() . '/public';
    }

    private function textResponse(): Response
    {
        $responseBody = $this->psr17Factory()->createStream($this->body());
        return $this->psr17Factory()->createResponse(200)->withBody($responseBody);
    }

    private function body(): string
    {
        if (
            is_string($this->contentPath()) and
            $c = file_get_contents($this->contentPath())
        ) {
            $content = MarkdownConverter::create()
                ->withConfig([
                    'html_input' => 'allow'
                ])->defaultAttributes([
                    Image::class => [
                        'loading'  => 'lazy',
                        'decoding' => 'async'
                    ]
                ])->externalLinks([
                    'open_in_new_window' => true,
                    'internal_hosts'     => 'raw.earth.fourth'
                ])->accessibleHeadingPermalinks([
                    'min_heading_level' => 2,
                    'max_heading_level' => 3,
                    'symbol'            => '＃'
                ])->minified()
                ->smartPunctuation()
                ->descriptionLists()
                ->tables()
                ->attributes() // for class on notices
                ->abbreviations()
                ->convert($c);
        }

        return Document::create(
                $this->pageTitle()
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
                Element::link()->props('rel stylesheet', 'href /assets/css/styles.min.css'),
                Element::script()->props('src /assets/js/interactive.js')
            )->body(
                Element::a('Skip to main content')->props('href #main', 'id skip-nav'),
                $this->navigation(),
                Element::article(
                    Element::section(
                        $content
                    )
                )->props('id main', 'role main'),
                Element::a('to top')->props('id back-to-top', 'href #skip-nav')
            )->build();
    }

    private function navigation(): Element
    {
        $links = [
            '/ Rules as Writen',
            '/vanilla/ Vanilla',
            '/sprinkles/ Sprinkles'
        ];

        $l = [];
        $requestPath = $this->path();
        foreach ($links as $link) {
            list($href, $title) = explode(' ', $link, 2);

            $a = Element::a(
                Element::span($title)
            )->props('href ' . $href);
            if ($requestPath === '/' and $href === $requestPath) {
                $a = Element::a(
                    Element::span($title)
                )->props('href ' . $href, 'class current');

            } elseif (
                $href !== '/' and
                str_starts_with($requestPath, $href)
            ) {
                $a = Element::a(
                    Element::span($title)
                )->props('href ' . $href, 'class current');

            }

            $l[] = Element::li($a);
        }
        return Element::nav(Element::ul(...$l))->props('is main-nav');
    }
}
