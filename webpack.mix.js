const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js/app.js')
    .react()
    .sass('resources/sass/app.scss', 'public/css/app.css');

mix.scripts([
    'resources/main/js/jquery.min.js',
    'resources/main/js/popper.min.js',
    'resources/main/js/bootstrap.min.js',
    'resources/main/js/custom.js',
    'resources/main/js/company.js',
], 'public/js/main.js');

mix.styles([
    'resources/main/css/bootstrap.min.css',
    'resources/main/css/fontawesome.min.css',
    'resources/main/css/custom.css',
], 'public/css/main.css')

mix.disableNotifications();
