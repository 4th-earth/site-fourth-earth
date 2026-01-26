<?php
declare(strict_types=1);

ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');
error_reporting(E_ALL);

ini_set('realpath_cache_size', '4096');
ini_set('realpath_cache_ttl', '600');

require __DIR__ . '/../../vendor/autoload.php';

// use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

// use Eightfold\Amos\Site;
// use Eightfold\Amos\Content;

// use Nyholm\Psr7Server\ServerRequestCreator;
// use Nyholm\Psr7\Factory\Psr17Factory;

// use FE\Templates\Page;
// use FE\Templates\PageNotFound;

// $psr17Factory = new Psr17Factory();

// $request = (new ServerRequestCreator(
//     $psr17Factory, // ServerRequestFactory
//     $psr17Factory, // UriFactory
//     $psr17Factory, // UploadedFileFactory
//     $psr17Factory  // StreamFactory
// ))->fromGlobals();

// (new SapiEmitter())->emit(
//     Site::init(
//         withDomain: 'https://4th.earth',
//         contentIn: Content::init(__DIR__ . '/../../content-root')
//     )->templates(
//         default: Page::class,
//         templates: [
//             'error404' => PageNotFound::class
//         ]
//     )->response(for: $request)
// );
// exit();

?>
<!doctype html>
<head>
    <title>4th Earth</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="A tabletop role playing game and lore for the ages.">
    <link rel="apple-touch-icon" href="/favicons/apple-touch-icon.png" sizes="180x180">
    <link type="image/png" rel="icon" href="/favicons/favicon-32x32.png" sizes="32x32">
    <link type="image/png" rel="icon" href="/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/favicons/site.webmanifest">
    <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#008181">
    <link rel="shortcut icon" href="/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#008181">
    <meta name="msapplication-config" content="/favicons/browserconfig.xml">
    <meta name="theme-color" color="#ffffff">
    <link type="text/css" rel="stylesheet" href="/css/styles.css">
</head>     
<body>
    <a href="#main-content">skip navigation</a>
    <nav aria-label="quick navigation">
        <ul>
            <li><a href="#primary-nav">Menu <span class="sr-only">(go to primary navigation)</span></a></li>
            <li><a href="https://www.patreon.com/cw/4thearth" target="_blank">Patreon <span class="sr-only">(new window)</span></a></li>
        </ul>
    </nav>
    <article id="main-content">
        <blockquote>
            <p>The war took many. Our numbers are coming back. Weʼre not sure how many higher-order sentient beings might exist beyond <a href="/places/the-cradle/">The Cradle</a>.</p>
            <cite>Url</cite>
        </blockquote>
        <p>The ages of Earth are not typically known or named except in hindsight.</p>
        <p>First Earth was the rise, time, and fall of humans, also known as homo-sapiens (by them) and First Earthers (by us). They gave the planet its name, which we still use to this day.</p>
        <p>Second Earth was the rise of the <a href="/species/#fenghuang">Fenghuang</a> and decline of humans. The Fenghuang are believed to have created <a href="/places/#the-cradle">The Cradle</a> alongside the humans who remained.</p>
        <p>Third Earth was the rise and destruction of Maul, and saw many higher-order species migrate to <a href="/places/#the-cradle">The Cradle</a> in waves. Eventually leading Maul toward The Cradle and <a href="/events/#the-battle-over-third-earth">The Battle over Third Earth</a></p>
        <p>Fourth Earth is the time following the destruction of Maul.</p>
    </article>
    <nav id="primary-nav" aria-label="site navigation">
        <ul>
            <li><a href="/">4th Earth</a></li>
            <li><a href="/events/">Events</a></li>
            <li><a href="/places/">Places</a></li>
            <li><a href="/species/">Species</a></li>
        </ul>
    </nav>
</body>
</head>