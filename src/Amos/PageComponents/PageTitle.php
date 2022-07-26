<?php
declare(strict_types=1);

namespace Eightfold\Amos\PageComponents;

use Eightfold\XMLBuilder\Contracts\Buildable;

use Psr\Http\Message\RequestInterface;

use Eightfold\Amos\Content;
use Eightfold\Amos\Meta;

use Eightfold\Amos\Markdown;

class PageTitle implements Buildable
{
    public static function create(
        Content $contentIn,
        RequestInterface $request
    ): PageTitle {
        return new static($contentIn, $request);
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
        $path = $this->request()->getUri()->getPath();

        $pathParts = explode('/', $path);
        $filtered  = array_filter($pathParts);

        $titles = [];
        while (count($filtered) > 0) {
            $path = '/' . implode('/', $filtered) . '/';

            $titles[] = Markdown::convertTitle(
                $this->content()->meta(at: $path)->value(for: 'title')
            );

            array_pop($filtered);
        }

        $titles[] = Markdown::convertTitle(
            $this->content()->meta(at: '/')->value(for: 'title')
        );

        $titles = array_filter($titles);

        return trim(implode(' | ', $titles));
    }

    public function __toString(): string
    {
        return $this->build();
    }
}
