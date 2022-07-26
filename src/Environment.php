<?php
declare(strict_types=1);

namespace FE;

class Environment
{
    public static function init(array $domainsAndContentRoots): Environment
    {
        return new Environment($domainsAndContentRoots);
    }

    public function __construct(private array $domainsAndContentRoots)
    {
    }

    public function schemeForSite(string $site): string
    {
        $d = $this->domainForSite($site);
        $parts = explode('://', $d);
        return $parts[0];
    }

    public function authorityForSite(string $site): string
    {
        $d = $this->domainForSite($site);
        $parts = explode('://', $d);
        return $parts[1];
    }

    public function contentRootForSite(string $site): string
    {
        if (array_key_exists($site, $this->domainsAndContentRoots())) {
            $d = $this->domainsAndContentRoots();
            $i = $d[$site];
            return $i[1];
        }
        return '';
    }

    public function domainForSite(string $site): string
    {
        if (array_key_exists($site, $this->domainsAndContentRoots())) {
            $d = $this->domainsAndContentRoots();
            $i = $d[$site];
            return $i[0];
        }
        return '';
    }

    private function domainsAndContentRoots(): array
    {
        return $this->domainsAndContentRoots;
    }
}
