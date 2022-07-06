<?php

//
// use League\CommonMark\Extension\CommonMark\Node\Inline\Image;
//
// use Eightfold\Markdown\Markdown as MarkdownConverter;
//

//
// function fileForRequest(): string|bool
// {
//     $request = $_SERVER['REQUEST_URI'];
//     if ($request === '/') {
//         return __DIR__ . '/../content/raw.md';
//
//     } elseif ($request === '/vanilla/') {
//         return __DIR__ . '/../content/vanilla.md';
//
//     } elseif ($request === '/sprinkles/') {
//         return __DIR__ . '/../content/sprinkles.md';
//
//     } elseif ($request === '/versioning/') {
//         return __DIR__ . '/../content/versioning.md';
//
//     }
//
//     return false;
// }
//
// /**
//  * @param array<string, mixed> $config
//  * @param array<string, mixed> $defaultAttributes
//  * @param array<string, mixed> $externalLinks
//  * @param array<string, mixed> $peprmaLinks
//  */
// function content(
//     array $config = [
//         'html_input' => 'allow'
//     ],
//     array $defaultAttributes = [
//         Image::class => [
//             'loading'  => 'lazy',
//             'decoding' => 'async'
//         ]
//     ],
//     array $externalLinks = [
//         'open_in_new_window' => true,
//         'internal_hosts'     => 'raw.earth.fourth'
//     ],
//     array $peprmaLinks = [
//         'min_heading_level' => 2,
//         'max_heading_level' => 3,
//         'symbol'            => '＃'
//     ]
// ): string {
//     $filePath = fileForRequest();
//
//     if (is_string($filePath) and $c = file_get_contents($filePath)) {
//         return MarkdownConverter::create()
//             ->withConfig($config)
//             ->minified()
//             ->smartPunctuation()
//             ->descriptionLists()
//             ->tables()
//             ->attributes() // for class on notices
//             ->defaultAttributes($defaultAttributes)
//             ->abbreviations()
//             ->externalLinks($externalLinks)
//             ->accessibleHeadingPermalinks($peprmaLinks)
//             ->convert($c);
//     }
//
//     throw new Exception('There is no content for this URI');
// }
