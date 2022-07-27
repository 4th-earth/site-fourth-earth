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

use FE\Documents\Main;

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
        return Main::create($this->content(), $this->request(), $this->domain())
            ->setPageTitle(
                PageTitle::create(
                    $this->content(),
                    $this->request()
                )->build()
            )->setBody(
                $this->content()->convertedContent(
                    at: $this->request()->getUri()->getPath()
                )
            )->build();
    }

    public function __toString(): string
    {
        return $this->build();
    }
}
