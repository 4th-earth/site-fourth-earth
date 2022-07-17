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
// var_dump($path);
// var_dump($contentRoot);
// die();
        $pathParts = explode('/', $this->path());
        $filtered  = array_filter($pathParts);

        $titles = [];
        while (count($filtered) > 0) {
            $path  = '/' . implode('/', $filtered) . '/';
            $title = $this->metaForPath($path);
            if ($title) {
                $titles[] = $title->title;
            }
            array_pop($filtered);
        }
        $titles[] = $this->metaForPath('/')->title;

        return implode(' | ', $titles);
    }

    private function path(): string
    {
        return $this->path;
    }

    private function contentRoot(): string
    {
        return $this->contentRoot;
    }

    private function metaForPath(string $path): object|false
    {
        $metaPath = $this->contentRoot() . $path . 'meta.json';
        if (! file_exists($metaPath)) {
            return false;
        }

        $meta = file_get_contents($metaPath);
        return json_decode($meta, false);
    }
}
