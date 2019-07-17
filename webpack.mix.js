let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('node_modules/dropify/src/sass/dropify.scss', 'public/css/dropify.css')
   .sass('node_modules/sweetalert2/src/sweetalert2.scss', 'public/css/swal2.css');

mix.scripts([
    'public/pickadate.js-3.5.6/lib/picker.js',
    'public/pickadate.js-3.5.6/lib/picker.date.js',
    'public/pickadate.js-3.5.6/lib/picker.time.js',
    'public/pickadate.js-3.5.6/lib/translations/es_ES.js',
    'public/js/popper.min.js',
	'public/js/bootstrap.min.js',
	'public/js/slick-1.8.1/slick/slick.min.js',
	'public/js/footer-reveal.min.js',
	'public/js/plugins.js',
    'public/js/active.js'
	], 'public/js/index_mixed.js');


mix.scripts([
    'node_modules/dropify/dist/js/dropify.min.js'
	], 'public/js/user-profile.js');

mix.scripts([
    'node_modules/sweetalert2/dist/sweetalert2.all.min.js',
    'public/pickadate.js-3.5.6/lib/picker.js',
    'public/pickadate.js-3.5.6/lib/picker.date.js',
    'public/pickadate.js-3.5.6/lib/picker.time.js',
    'public/pickadate.js-3.5.6/lib/translations/es_ES.js',
    'public/js/popper.min.js',
  ], 'public/js/swal2.js');

mix.scripts([
    'node_modules/@fullcalendar/core/main.min.js',
    'node_modules/@fullcalendar/daygrid/main.min.js',
    'node_modules/@fullcalendar/list/main.min.js',
  ], 'public/js/calendar.js');

mix.styles([
    'node_modules/@fullcalendar/core/main.min.css',
    'node_modules/@fullcalendar/daygrid/main.min.css',
    'node_modules/@fullcalendar/list/main.min.css',
  ], 'public/css/calendar.css');