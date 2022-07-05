<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('realpath_cache_size', '4096');
ini_set('realpath_cache_ttl', '600');

require __DIR__ . '/../vendor/autoload.php';

use Eightfold\Markdown\Markdown as MarkdownConverter;

function pageTitle(): string {
    $request = $_SERVER['REQUEST_URI'];
    if ($request === '/') {
        return 'Rules as Written | 4th Earth';

    } elseif ($request === '/vanilla/') {
        return 'Vanilla | Rules as Written | 4th Earth';

    } elseif ($request === '/sprinkles/') {
        return 'Sprinkles | Rules as Written | 4th Earth';

    } elseif ($request === '/versioning/') {
        return 'Versioning | Rules as Written | 4th Earth';
        
    }
    return 'Page not found error';
}

function fileForRequest(): string|bool {
    $request = $_SERVER['REQUEST_URI'];
    if ($request === '/') {
        return __DIR__ . '/../content/raw.md';

    } elseif ($request === '/vanilla/') {
        return __DIR__ . '/../content/vanilla.md';

    } elseif ($request === '/sprinkles/') {
        return __DIR__ . '/../content/sprinkles.md';

    } elseif ($request === '/versioning/') {
        return __DIR__ . '/../content/versioning.md';
        
    }

    return false;
}

function content(
    array $config = [
        'html_input' => 'allow'
    ],
    array $defaultAttributes = [
        Image::class => [
            'loading'  => 'lazy',
            'decoding' => 'async'
        ]
    ],
    array $externalLinks = [
        'open_in_new_window' => true,
        'internal_hosts'     => 'raw.earth.fourth'
    ],
    array $peprmaLinks = [
        'min_heading_level' => 2,
        'max_heading_level' => 3,
        'symbol'            => '＃'
    ]
) {
    $filePath = fileForRequest();

    if (! $filePath) {
        throw new Exception('There is no content for this URI');
    }

    return MarkdownConverter::create()
        ->withConfig($config)
        ->minified()
        ->smartPunctuation()
        ->descriptionLists()
        ->tables()
        ->attributes() // for class on notices
        ->defaultAttributes($defaultAttributes)
        ->abbreviations()
        ->externalLinks($externalLinks)
        ->accessibleHeadingPermalinks($peprmaLinks)
        ->convert(
            file_get_contents($filePath)
        );
}
