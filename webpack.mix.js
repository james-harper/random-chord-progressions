let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js').version();
mix.styles(['resources/assets/css/*.css'], 'public/css/app.css').version();
mix.sass('resources/assets/css/bulma.scss', 'public/css/');

mix.webpackConfig({
  resolve: {
    alias: {
      '@': path.resolve('resources/assets/js')
    }
  }
});
