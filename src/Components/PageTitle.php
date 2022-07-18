<?php
declare(strict_types=1);

namespace FE\Components;

class PageTitle
{
    private string $baseTitle = '';

    public static function titleForPath(string $path): string
    {
        if (file_exists($path) === false) {
            return '';
        }

        $json = file_get_contents($path);
        $obj  = json_decode($json);

        return $obj->title;
    }

    public static function init(
        string $contentRoot,
        string $path
    ): PageTitle {
        return new static($contentRoot, $path);
    }

    public function __construct(
        private string $contentRoot,
        private string $path
    ) {
    }

    public function overrideBaseTitle(string $title = ''): PageTitle
    {
        $this->baseTitle = $title;
        return $this;
    }

    public function title(): string
    {
        $pathParts = explode('/', $this->path());
        $filtered  = array_filter($pathParts);

        $titles = [];
        while (count($filtered) > 0) {
            $path     = '/' . implode('/', $filtered) . '/';
            $metaPath = $this->contentRoot() . $path . 'meta.json';
            $titles[] = $this->titleFor($metaPath);

            array_pop($filtered);
        }

        $baseTitle = $this->baseTitle();
        if (strlen($baseTitle) === 0) {
            $rootTitlePath = $this->contentRoot() . '/meta.json';
            $titles[]      = $this->titleFor($rootTitlePath);

        } else {
            $titles[] = $baseTitle;

        }

        $titles = array_filter($titles);

        return implode(' | ', $titles);
    }

    private function contentRoot(): string
    {
        return $this->contentRoot;
    }

    private function path(): string
    {
        return $this->path;
    }

    private function titleFor(string $path): string
    {
        return static::titleForPath($path);
    }

    private function baseTitle(): string
    {
        return $this->baseTitle;
    }
}
