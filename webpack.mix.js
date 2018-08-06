const webpack = require('webpack');
let mix = require('laravel-mix');

var path = require('path');
mix.setPublicPath('public');
mix.options({ processCssUrls: false });

mix.js('resources/assets/js/app.js', 'public/js')
    .js([
        'resources/assets/cms/dependencies/js/vendor/app.js',
        'node_modules/select2/dist/js/select2.js',
        'resources/assets/cms/dependencies/js/vendor/adminlte.js'
        ], 'public/js/vendor.js').version()
    .js('resources/assets/cms/core/js/cms.js', 'public/js').version()
   .sass('resources/assets/sass/app.scss', 'public/css');

   mix.webpackConfig({
    plugins: [
        new webpack.ProvidePlugin({
            introJs: ['intro.js', 'introJs']
        })
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/assets/cms/core/js/config'),
            '_': path.resolve(__dirname, 'resources/assets/cms/core/js'),
            '~': path.resolve(__dirname, 'resources/assets/cms/dependencies/js')
        }
    },
    module: {
        loaders: [
            {
                test: /\.json$/,
                exclude: /node_modules/,
                loader: 'json-loader'
            }
        ],
        rules: [
            {
                test: /\.md$/,
                use: 'raw-loader',
            }
        ]
    },
});
