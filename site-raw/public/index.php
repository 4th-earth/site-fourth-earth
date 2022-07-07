<?php
declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

use FE\Page;

$page = Page::init('raw');

if (str_starts_with($page->authority(), 'raw.earth.fourth')) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');

} else {
    ini_set('display_errors', '0');
    ini_set('display_startup_errors', '0');

}

ini_set('realpath_cache_size', '4096');
ini_set('realpath_cache_ttl', '600');

(new SapiEmitter())->emit($page->response());
