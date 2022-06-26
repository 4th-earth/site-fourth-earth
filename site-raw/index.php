<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('realpath_cache_size', '4096');
ini_set('realpath_cache_ttl', '600');

require __DIR__ . '/../vendor/autoload.php';

use Eightfold\Markdown\Markdown as MarkdownConverter;

function content() {
    if (! file_exists('./content.md')) {
        throw new Exception('There is no content for this URI');
    }

    return MarkdownConverter::create()
        ->withConfig(
            [
                'html_input' => 'allow'
            ]
        )->minified()
        ->smartPunctuation()
        ->descriptionLists()
        ->attributes() // for class on notices
        ->defaultAttributes([
            Image::class => [
                'loading'  => 'lazy',
                'decoding' => 'async'
            ]
        ])->abbreviations()
        ->externalLinks(
            [
                'open_in_new_window' => true,
                'internal_hosts'     => 'joshbruce.com'
            ]
        )->accessibleHeadingPermalinks(
            [
                'min_heading_level' => 2,
                'symbol'            => '＃'
            ],
        )->convert(
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
    </head>
    <body>
        <?php print(content()); ?>
    </body>
</html>
