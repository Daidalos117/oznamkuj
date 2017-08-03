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

 mix.copy(
      '/node_modules/jquery-bar-rating/dist/themes/bars-square.css"',
      'resources/assets/sass/third'
 );
 mix.copy('bower_components/fontawesome/fonts', 'public/assets/fonts')

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.browserSync({
   proxy: 'localhost/www/oznamkuj/public'
});
