const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass("../provider-main/src/main.scss", "public/css")
    .js("./resources/js/app.js", "public/js")
    .scripts(["../provider-tower/src/Javascript/pool.js"], "public/js/main.js");
