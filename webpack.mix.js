const mix = require('laravel-mix');
const Mix = require('laravel-mix/src/Mix');
const path = require("path");

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
mix.js('resources/js/app.js', 'public/js').extract()

mix.sass('resources/scss/app.scss', 'public/css', [
    //
]).browserSync('localhost:8000');

