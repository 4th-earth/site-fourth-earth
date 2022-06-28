<?php

declare(strict_types=1);

namespace FE\SiteDynamic\FileSystem;

use SplFileInfo;

use FE\SiteDynamic\FileSystem\FileTrait;

class File
{
    use FileTrait;

    public static function at(string $localPath, string $root): File
    {
        $realPath = (new SplFileInfo($root))->getRealPath();
        if (! $realPath) {
            $realPath = $root;
        }
        return static::from(new SplFileInfo($localPath), $realPath);
    }

    public static function from(SplFileInfo $fileInfo, string $root): File
    {
        return new static($fileInfo, $root);
    }
}
