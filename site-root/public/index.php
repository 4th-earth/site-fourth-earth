<?php
declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

use FE\Page;
use FE\Environment;

ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
ini_set('realpath_cache_size', '4096');
ini_set('realpath_cache_ttl', '600');

(new SapiEmitter())->emit(
    Page::init(
        'root',
        Environment:: init([
            'root' => [
                'https://4th.earth',
                __DIR__ . '/../../content-root'
            ],
            'raw' => [
                'https://raw.4th.earth',
                __DIR__ . '/../../content-raw'
            ],
            'lore' => [
                'https://lore.4th.earth',
                __DIR__ . '/../../content-lore'
            ]
        ])
    )->response()
);
