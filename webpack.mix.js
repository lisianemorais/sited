const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |.js('resources/app/js/app.js', 'public/app/js')
 */

mix.styles(['resources/app/css/style.css'
],'public/app/css/style.css')
.js('resources/app/js/app.js', 'public/app/js')
.copyDirectory('resources/app/img', 'public/app/img')
.version();
