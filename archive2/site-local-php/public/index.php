<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('realpath_cache_size', '4096');
ini_set('realpath_cache_ttl', '600');

require __DIR__ . '/../../vendor/autoload.php';

use Nyholm\Psr7\ServerRequest;

use FE\SiteDynamic\Http\Emitter;
use FE\SiteDynamic\Http\RequestHandler;

use JoshBruce\SiteDynamic\FileSystem\Finder;

use FE\SiteDynamic\Environment;

Emitter::emit(
    RequestHandler::in(
        Environment::with(
            __DIR__ . '/../../content/public',
            __DIR__,
            'http://earth.fourth:8889',
            'local'
        )
    )->handle(
        new ServerRequest(
            method: $_SERVER['REQUEST_METHOD'],
            uri: $_SERVER['REQUEST_URI'],
            headers: getallheaders(),
            serverParams: $_SERVER
        )
    )
);
exit;
