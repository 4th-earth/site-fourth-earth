<?php
declare(strict_types=1);

namespace FE\PageComponents;

use Eightfold\XMLBuilder\Contracts\Buildable;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

use Eightfold\HTMLBuilder\Element;

use Eightfold\Amos\Content;

class Navigation implements Buildable
{
    private UriInterface $uri;

    private string $domain = '';

    public static function create(
        Content $contentIn,
        RequestInterface $request,
        // string $withDomain = ''
    ): self {
        return new self($contentIn, $request);
    }

    final private function __construct(
        private Content $contentIn,
        private RequestInterface $request,
        // private string $withDomain = ''
    ) {
    }

    private function request(): RequestInterface
    {
        return $this->request;
    }

    private function uri(): UriInterface
    {
        if (isset($this->uri) === false) {
            $this->uri = $this->request()->getUri();
        }
        return $this->uri;
    }

    private function domain(): string
    {
        if (strlen($this->domain) === 0) {
            $this->domain = $this->uri()->getAuthority();
        }
        return $this->domain;
    }

    private function path(): string
    {
        return $this->uri()->getPath();
    }

    /**
     * @return bool Whether this site is the 4th.earth site
     */
    private function isRoot(): bool
    {
        return ! $this->isRaw() and ! $this->isLore();
    }

    /**
     * @return bool Whether this site is the raw.4th.earth site
     */
    private function isRaw(): bool
    {
        return str_starts_with($this->domain(), 'raw.');
    }

    /**
     * @return bool Whether this site is the lore.4th.earth site.
     */
    private function isLore(): bool
    {
        return str_starts_with($this->domain(), 'lore.');
    }

    private function spans(string $title, string $titleShort): array
    {
        return [
            Element::span($title),
            Element::span($titleShort)->props('aria-label ' . $title)
        ];
    }

    public function build(): string
    {
        if ($this->isRoot()) {
            return '';

        } elseif ($this->isRaw()) {
            $links = [
                '/ R Rules as Written',
                '/vanilla/ V Vanilla',
                '/sprinkles/ S Sprinkles'
            ];

        } elseif ($this->isLore()) {
            $links = [
                '/ I Introduction',
                '/people/ Pe People',
                '/places/ Pl Places',
                '/things/ T Things'
            ];

        }

        $l = [];
        $requestPath = $this->path();
        foreach ($links as $link) {
            list($href, $ts, $title) = explode(' ', $link, 3);
            $id = str_replace('/', '', $href);

            $a = Element::a(
                ...$this->spans($title, $ts)
            )->props('href ' . $href);
            if ($requestPath === '/' and $href === $requestPath) {
                $a = Element::a(
                    ...$this->spans($title, $ts)
                )->props('href ' . $href, 'class current');

            } elseif (
                $href !== '/' and
                str_starts_with($requestPath, $href)
            ) {
                $a = Element::a(
                    ...$this->spans($title, $ts)
                )->props('href ' . $href, 'class current');

            }

            $l[] = Element::li($a);
        }

        return Element::nav(
            Element::ul(...$l)->props('class col-' . count($links))
        )->props('is main-nav')->build();
    }

    public function __toString(): string
    {
        return $this->build();
    }
}
