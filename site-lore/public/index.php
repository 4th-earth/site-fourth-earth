<?php
declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

use Psr\Http\Message\RequestInterface;

use Nyholm\Psr7Server\ServerRequestCreator;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\Response;
use Nyholm\Psr7\Stream;

use League\CommonMark\Extension\CommonMark\Node\Inline\Image;

use Eightfold\HTMLBuilder\Document;
use Eightfold\HTMLBuilder\Element;

use Eightfold\Markdown\Markdown as MarkdownConverter;

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$serverRequest = $creator->fromGlobals();
$uri           = $serverRequest->getUri()->getPath();

$psr17Factory = new Psr17Factory();

if ($serverRequest->getUri()->getAuthority()) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');

} else {
    ini_set('display_errors', '0');
    ini_set('display_startup_errors', '0');

}

ini_set('realpath_cache_size', '4096');
ini_set('realpath_cache_ttl', '600');

if (str_contains($uri, '.')) {
    if ($uri === '/vanilla/character-sheet.pdf') {
        $resource = @\fopen(__DIR__ . '/../../content-raw/character-sheet.pdf', 'r');
        if (is_resource($resource)) {
            $response = new Response(
                status: 200,
                headers: ['content-type' => 'application/pdf'],
                body: Stream::create($resource)
            );
            (new \Laminas\HttpHandlerRunner\Emitter\SapiEmitter())->emit($response);
        }

    } else {
        $resource = @\fopen(__DIR__ . $uri, 'r');
        if (is_resource($resource)) {
            $response = new Response(
                status: 200,
                headers: ['content-type' => 'text/css'],
                body: Stream::create($resource)
            );
            (new \Laminas\HttpHandlerRunner\Emitter\SapiEmitter())->emit($response);

        }
    }
    exit;
}

$title = [
    '4th Earth',
    'Rules as Written'
];

$contentPath = __DIR__ . '/error-404.md';

if ($uri === '/') {
    $title       = $title;
    $contentPath = __DIR__ . '/../../content-lore/content.md';

} elseif ($uri === '/vanilla/') {
    $title[] = 'Vanilla';
    $contentPath = __DIR__ . '/../../content-raw/vanilla.md';

} elseif ($uri === '/sprinkles/') {
    $title[] = 'Sprinkles';
    $contentPath = __DIR__ . '/../../content-raw/sprinkles.md';

} elseif ($uri === '/versioning/') {
    $title[] = 'Versioning';
    $contentPath = __DIR__ . '/../../content-raw/versioning.md';

} else {
    $title = ['Page not found error'];

}

$pageTitle = implode(' | ', array_reverse($title));

$content = '';
if (is_string($contentPath) and $c = file_get_contents($contentPath)) {
    $content = MarkdownConverter::create()
        ->withConfig([
            'html_input' => 'allow'
        ])->defaultAttributes([
            Image::class => [
                'loading'  => 'lazy',
                'decoding' => 'async'
            ]
        ])->externalLinks([
            'open_in_new_window' => true,
            'internal_hosts'     => 'raw.earth.fourth'
        ])->accessibleHeadingPermalinks([
            'min_heading_level' => 2,
            'max_heading_level' => 3,
            'symbol'            => '＃'
        ])->minified()
        ->smartPunctuation()
        ->descriptionLists()
        ->tables()
        ->attributes() // for class on notices
        ->abbreviations()
        ->convert($c);
}

$body = Document::create(
        $pageTitle
    )->head(
        Element::meta()->props('charset utf-8'),
        Element::meta()->props('name viewport', 'content width=device-width,initial-scale=1'),
        Element::meta()->props('name description', 'content A tabletop role playing game for the ages.'),
        Element::link()->props('rel stylesheet', 'href /assets/css/main.css'),
    )->body(
        $content
    )->build();

$responseBody = $psr17Factory->createStream($body);
$response = $psr17Factory->createResponse(200)->withBody($responseBody);
(new \Laminas\HttpHandlerRunner\Emitter\SapiEmitter())->emit($response);
