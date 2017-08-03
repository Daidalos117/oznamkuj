var elixir = require('laravel-elixir');


elixir(function(mix) {
    mix
        .sass('app.scss')
        .version('css/app.css');

    mix.browserSync({
        proxy: 'localhost/www/oznamkuj/public'
    });

    mix.copy('node_modules/bulma', 'resources/assets/sass/bulma');
});