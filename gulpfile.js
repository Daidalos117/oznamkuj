var elixir = require('laravel-elixir');


elixir(function(mix) {
    mix
        .sass('app.scss')
        .version('css/app.css');

    //mix.js('resources/assets/js/app.js', 'public/js');
    mix.copy(
         '/node_modules/jquery-bar-rating/dist/themes/bars-square.css"',
         'resources/assets/sass/third'
     );

    mix.browserSync({
        proxy: 'localhost/www/oznamkuj/public'
    });

    //mix.copy('node_modules/bulma', 'resources/assets/sass/bulma');
});
