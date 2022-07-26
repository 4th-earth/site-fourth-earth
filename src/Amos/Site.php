<?php
declare(strict_types=1);

namespace Eightfold\Amos;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Psr\Http\Message\StreamInterface;

use Nyholm\Psr7\Response;
use Nyholm\Psr7\Stream;

use Eightfold\Markdown\Markdown as MarkdownConverter;

use Eightfold\Amos\Content;
use Eightfold\Amos\Markdown;
use Eightfold\Amos\Sitemap;

use Eightfold\Amos\Documents\Page;

class Site
{
    private RequestInterface $request;

    private UriInterface $uri;

    private array $templates = [
        'default' => Page::class
    ];

    public static function init(
        string $withDomain,
        Content $contentIn,
    ): self
    {
        return new Site($withDomain, $contentIn);
    }

    final private function __construct(
        private string $withDomain,
        private Content $contentIn
    ) {
    }

    public function domain(): string
    {
        return $this->withDomain;
    }

    public function content(): Content
    {
        return $this->contentIn;
    }

    public function templates(string $default): self
    {
        $this->templates['default'] = $default;
        return $this;
    }

    public function response(RequestInterface $for): ResponseInterface
    {
        $this->request = $for;

        if ($this->requestPath() === '/sitemap.xml') {
            return new Response(
                status: 200,
                headers: ['Content-type' => 'application/xml'],
                body: Stream::create(
                    Sitemap::create(
                        $this->content(),
                        $this->domain()
                    )->build()
                )
            );

        }

        if ($this->content()->notFound(at: $this->requestPath())) {
            die('404');
        }

        $template = $this->templates['default'];
        if (
            $this->content()->meta($this->requestPath())
                ->valueExists(for: 'template')
        ) {
            die('has template');

        }

        $this->createMarkdownConverter();
        return new Response(
            status: 200,
            headers: ['Content-type' => 'text/html'],
            body: Stream::create(
                $template::create(
                    $this->content(),
                    $this->request(),
                    $this->domain()
                )->build()
            )
        );
    }

    private function requestPath(): string
    {
        $path = $this->request()->getUri()->getPath();
        if (str_ends_with($path, '/')) {
            $path = substr($path, 0, -1);
        }
        return $path;
    }

    private function request(): RequestInterface
    {
        if (isset($this->request) === false) {
            trigger_error("No request received.", E_USER_WARNING);
        }
        return $this->request;
    }

    private function createMarkdownConverter(): void
    {
        Markdown::singletonConverter(
            MarkdownConverter::create()
                ->withConfig([
                    'html_input' => 'allow'
                ])->defaultAttributes([
                    Image::class => [
                        'loading'  => 'lazy',
                        'decoding' => 'async'
                    ]
                ])->externalLinks([
                    'open_in_new_window' => true,
                    'internal_hosts'     => $this->domain()
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
        );
    }
}
