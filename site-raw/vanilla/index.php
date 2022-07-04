<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('realpath_cache_size', '4096');
ini_set('realpath_cache_ttl', '600');

require __DIR__ . '/../../vendor/autoload.php';

use Eightfold\Markdown\Markdown as MarkdownConverter;

$converterConfig = [
    'html_input' => 'allow'
];

$defaultAttributes = [
    Image::class => [
        'loading'  => 'lazy',
        'decoding' => 'async'
    ]
];

$externalLinks = [
    'open_in_new_window' => true,
    'internal_hosts'     => 'raw.earth.fourth'
];

$peprmaLinks = [
    'min_heading_level' => 2,
    'max_heading_level' => 3,
    'symbol'            => '＃'
];

function content(
    array $config,
    array $defaultAttributes,
    array $externalLinks,
    array $peprmaLinks
) {
    if (! file_exists('./content.md')) {
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
            file_get_contents(__DIR__ . '/content.md')
        );
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Rules as Written | 4th Earth</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A tabletop role playing game for the ages.">
        <style type="text/css">
            html {
                scroll-behavior: smooth;
                font-family: monospace;
                font-size: 1.5rem;
            }

            body {
                width: 70ch;
                margin: 4rem auto;
                line-height: 1.5rem;
            }

            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                margin: 0;
                padding: 0;
            }

            h1 {
                text-align: center;
            }

            h3 {
                font-style: italic;
            }

            details {
                margin: 2rem 0;
            }

            details:hover {
                cursor: pointer;
            }

            table {
                margin: 2rem auto;
                width: 100%;
                border-collapse: collapse;
            }

            table th {
                padding: 5px 0;
            }

            table td {
                padding: 7px 5px;
                border: 1px solid black;
            }

            li {
                margin: 0.75rem 0;
            }

            div[is="heading-wrapper"] {
                display: grid;
                grid-auto-columns: 44pt auto;
                column-gap: 2ch;
                grid-template-areas:
                    'link text';
                margin-top: 3rem;
            }

            div[is="heading-wrapper"] > h2,
            div[is="heading-wrapper"] > h3,
            div[is="heading-wrapper"] > h4,
            div[is="heading-wrapper"] > h5,
            div[is="heading-wrapper"] > h6 {
                grid-area: text;
            }

            div[is="heading-wrapper"] > a {
                grid-area: link;
                display: inline-block;
                width: 44pt;
                height: 44pt;
                background: red;
            }

            div[is="heading-wrapper"] > a > span {
                position: absolute;
                left: -999px;
            }
        </style>
    </head>
    <body>
        <?php print(content($converterConfig, $defaultAttributes, $externalLinks, $peprmaLinks)); ?>
    </body>
</html>
