const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/assets/sass/app.sass', 'public/css');
mix.scripts([
    'resources/assets/js/libraries/axios.min.js',
    'resources/assets/js/libraries/vue.js',
], 'public/js/vendor.js');
