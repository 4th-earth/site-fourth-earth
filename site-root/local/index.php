<?php
declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

use FE\Page;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('realpath_cache_size', '4096');
ini_set('realpath_cache_ttl', '600');

(new SapiEmitter())->emit(
    Page::init('root')->response()
);
