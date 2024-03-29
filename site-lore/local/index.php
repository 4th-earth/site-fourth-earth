<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
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

(new SapiEmitter())->emit(
    Site::init(
        withDomain: 'http://lore.earth.fourth:8889',
        contentIn: Content::init(__DIR__ . '/../../content-lore')
    )->templates(
        default: Page::class,
        templates: [
            'error404' => PageNotFound::class
        ]
    )->response(for: $request)
);
exit();
