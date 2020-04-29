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
    .js('resources/js/purchase.js', 'public/js')
    .js('resources/js/signup.js', 'public/js')
    .js('resources/js/welcome.js', 'public/js')
    .js('resources/js/purchasev2.js', 'public/js')
    .js('resources/js/conektav2.js', 'public/js')
    .js('resources/js/payment_succeed.js', 'public/js')
    .sass('resources/sass/purchase_information.scss', 'public/css')
    .sass('resources/sass/purchase_information_v2.scss', 'public/css')
    .sass('resources/sass/signup.scss', 'public/css')
    .sass('resources/sass/welcome.scss', 'public/css')
    .sass('resources/sass/payment_succeed.scss', 'public/css')
    .sass('resources/sass/oxxopay_mail.scss', 'public/css')
    .sass('resources/sass/app.scss', 'public/css'); 
