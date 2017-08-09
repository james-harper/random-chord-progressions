let mix = require('laravel-mix');
let minifier = require('minifier');

mix.js('resources/assets/js/app.js', 'public/js');

mix.styles(['resources/assets/css/app.css'], 'public/css/app.css');
minifier.minify('public/css/app.css');
