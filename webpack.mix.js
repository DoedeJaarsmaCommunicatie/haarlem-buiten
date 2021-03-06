const mix = require('laravel-mix');

mix
    .sass('assets/styles/main.scss', 'dist/styles')
    // .copyDirectory('assets/images', 'dist/images')
    .js('assets/scripts/main.js', 'dist/scripts/app.js')
    .js('assets/elements/main.js', 'dist/scripts/elements.js')
    .options({
        processCssUrls: false,
        postCss: [
            require('tailwindcss'),
            require('autoprefixer')
        ]
    })
