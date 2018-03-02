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

//mix.js('resources/assets/js/app.js', 'public/js')
   //.sass('resources/assets/sass/app.scss', 'public/css/app.css')
mix.sass('resources/assets/sass/style.scss', 'public/css/style.css')
   .scripts([
        'resources/assets/js/vendor/jquery.min.js',
        'resources/assets/js/vendor/jquery.easing.1.3.js',
        'resources/assets/js/vendor/jquery.stellar.min.js',
        'resources/assets/js/vendor/jquery.flexslider-min.js',
        'resources/assets/js/vendor/imagesloaded.pkgd.min.js',
        'resources/assets/js/vendor/isotope.pkgd.min.js',
        'resources/assets/js/vendor/photoswipe.min.js',
        'resources/assets/js/vendor/photoswipe-ui-default.min.js',
        'resources/assets/js/vendor/owl.carousel.min.js',
        'resources/assets/js/vendor/bootstrap.min.js',
        'resources/assets/js/vendor/jquery.waypoints.min.js'
   ], 'public/js/scripts.js')
   .scripts('resources/assets/js/custom.js', 'public/js/custom.js')
   .styles([
        'resources/assets/css/vendor/bootstrap.min.css',
        'resources/assets/css/vendor/animate.css',
        'resources/assets/css/vendor/icomoon.css',
        'resources/assets/css/vendor/flexslider.css',
        'resources/assets/css/vendor/owl.carousel.min.css',
        'resources/assets/css/vendor/owl.theme.default.min.css',
        'resources/assets/css/vendor/photoswipe.css',
        'resources/assets/css/vendor/default-skin.css',

    ], 'public/css/app.css' )
   .sourceMaps()
   .disableNotifications();
   
