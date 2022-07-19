<?php
declare(strict_types=1);

namespace FE;

use SplFileInfo;

use Symfony\Component\Finder\Finder;

use Eightfold\XMLBuilder\Document;
use Eightfold\XMLBuilder\Element;

class Sitemap
{
    public static function create(
        string $site,
        string $contentRoot,
        string $domain,
        string $scheme
    ): string {
        return (new Sitemap($site, $contentRoot, $domain, $scheme))->sitemap();
    }

    public function __construct(
        private string $site,
        private string $contentRoot,
        private string $domain,
        private string $scheme
    ) {
    }

    public function sitemap(): string
    {
        $metaFilePaths = (new Finder())->files()->name('meta.json')
            ->in($this->contentRoot());

        $urls = [];
        foreach ($metaFilePaths as $metaFilePath) {
            $f = $metaFilePath->getPath() . '/';
            $path = str_replace($this->contentRoot(), '', $f);
            $urls[$path] = $this->urlForPath($path);
        }

        $urls['/support/'] = $this->urlForPath('/support/');
        $urls['/legal/'] = $this->urlForPath('/legal/');

        return Document::urlset(
            ...$urls
        )->props('xmlns http://www.sitemaps.org/schemas/sitemap/0.9')->build();
    }

    private function urlForPath(string $path): Element
    {
        $contentRoot = $this->contentRoot();
        if ($path === '/legal/' or $path === '/support/') {
            $contentRoot = __DIR__ . '/../content-root';
        }

        $meta = $contentRoot . $path . 'meta.json';
        $json = file_get_contents($meta);
        $obj  = json_decode($json);
        $d    = $obj->created;
        if (isset($d->updated)) {
            $d = $obj->updated;

        }

        return Element::url(
            Element::loc($this->canonicalUrlForPath($path)),
            Element::lastmod($d),
            Element::priority('1')
        );
    }

    private function canonicalUrlForPath(string $path): string
    {
        return $this->scheme . '://' . $this->domain() . $path;
    }

    private function site(): string
    {
        return $this->site;
    }

    private function contentRoot(): string
    {
        return $this->contentRoot;
    }

    private function scheme(): string
    {
        return $this->scheme;
    }

    private function domain(): string
    {
        return $this->domain;
    }
}
