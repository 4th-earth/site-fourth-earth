<?php
declare(strict_types=1);

ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
error_reporting(E_ALL);

ini_set('realpath_cache_size', '4096');
ini_set('realpath_cache_ttl', '600');

require __DIR__ . '/../../vendor/autoload.php';

use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

use Eightfold\Amos\Site;
use Eightfold\Amos\Content;

use Nyholm\Psr7Server\ServerRequestCreator;
use Nyholm\Psr7\Factory\Psr17Factory;

use FE\Templates\Page;
use FE\Templates\PageNotFound;

$psr17Factory = new Psr17Factory();

$request = (new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
))->fromGlobals();

$path = $request->getUri()->getPath();
if ($path === '/people/') {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: https://4th.earth/species/');
    header("Connection: close");
    exit();
}

if ($path === '/places/') {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: https://4th.earth/places/');
    header("Connection: close");
    exit();
}

if ($path === '/things/') {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: https://4th.earth/inventory/');
    header("Connection: close");
    exit();
}

if ($path === '/') {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: https://4th.earth');
    header("Connection: close");
    exit();
}

(new SapiEmitter())->emit(
    Site::init(
        withDomain: 'https://lore.4th.earth',
        contentIn: Content::init(__DIR__ . '/../../content-lore')
    )->templates(
        default: Page::class,
        templates: [
            'error404' => PageNotFound::class
        ]
    )->response(for: $request)
);
exit();
