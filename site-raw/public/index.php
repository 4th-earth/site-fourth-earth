<?php
declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

use Psr\Http\Message\RequestInterface;

use Nyholm\Psr7\Factory\Psr17Factory;

$psr17Factory = new Psr17Factory();

$creator = new \Nyholm\Psr7Server\ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$serverRequest = $creator->fromGlobals();

if ($serverRequest->getUri()->getAuthority()) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');

} else {
    ini_set('display_errors', '0');
    ini_set('display_startup_errors', '0');

}

ini_set('realpath_cache_size', '4096');
ini_set('realpath_cache_ttl', '600');

function pageTitle(RequestInterface $serverRequest): string
{
    $uri = $serverRequest->getUri()->getPath();

    $title = [
        '4th Earth',
        'Rules as Written'
    ];

    if ($uri === '/') {
        $title = $title;

    } elseif ($uri === '/vanilla/') {
        $title[] = 'Vanilla';

    } elseif ($uri === '/sprinkles/') {
        $title[] = 'Sprinkles';

    } elseif ($uri === '/versioning/') {
        $title[] = 'Versioning';

    } else {
        $title = ['Page not found error'];

    }
    return implode(' | ', array_reverse($title));
}

print pageTitle($serverRequest);
