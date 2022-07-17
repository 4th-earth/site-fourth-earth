<?php
declare(strict_types=1);

namespace FE\Components;

class PageTitle
{
    private string $path = '';
    private string $contentRoot = '';

    public static function init(string $site): PageTitle
    {
        return new static($site);
    }

    public function __construct(private string $site)
    {
    }

    public function titleFor(string $path, string $contentRoot): string
    {
        $this->path = $path;
        $this->contentRoot = $contentRoot;

        die(var_dump($contentRoot . $path));
        return '';
    }

    private function path(): string
    {
        return $this->path;
    }

    private function contentRoot(): string
    {
        return $this->contentRoot;
    }
