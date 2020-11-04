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

mix.styles([
    'resources/sass/plantilla/css/font-awesome.min.css',
    'resources/sass/plantilla/css/simple-line-icons.min.css',
    'resources/sass/plantilla/css/style.css'
], 'public/css/plantilla.css')
    .scripts([
        'resources/sass/plantilla/js/jquery.min.js',
        'resources/sass/plantilla/js/popper.min.js',
        'resources/sass/plantilla/js/bootstrap.min.js',
        'resources/sass/plantilla/js/Chart.min.js',
        'resources/sass/plantilla/js/pace.min.js',
        'resources/sass/plantilla/js/template.js',
        'resources/sass/plantilla/js/sweetalert2.all.js'
    ], 'public/js/plantilla1.js')
    .js([
        'resources/js/app.js'
    ], 'public/js/app.js');
