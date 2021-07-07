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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/layouts/main.scss', 'public/css/layouts')
    .sass('resources/sass/layouts/auth.scss', 'public/css/layouts')
    .sass('resources/sass/lab-booking/account/edit.scss', 'public/css/lab-booking/account')
    .sass('resources/sass/lab-booking/account/show.scss', 'public/css/lab-booking/account')
    .sass('resources/sass/lab-booking/create.scss', 'public/css/lab-booking')
    .sass('resources/sass/lab-booking/dashboard.scss', 'public/css/lab-booking');
