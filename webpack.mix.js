const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .react() // Habilitar React
    .webpackConfig({
        module: {
            rules: [
                {
                    test: /\.jsx?$/, // Asegurarse de que acepta JSX
                    exclude: /node_modules/,
                    use: {
                        loader: 'babel-loader',
                        options: Mix.babelConfig(),
                    },
                },
            ],
        },
    })
    .sass('resources/sass/app.scss', 'public/css');
