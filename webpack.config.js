'use strict';
const { VueLoaderPlugin } = require('vue-loader');
const HtmlWebpackPlugin = require('html-webpack-plugin');

module.exports = {
    mode: 'development',

    entry: [
        './assets/vue/app.js'
    ],
    module: {
        rules: [
            {
                test: /\.vue$/,
                use: 'vue-loader'
            },
            {
                test: /\.js$/,
                loader: 'babel-loader'
            },
        ]
    },
    resolve: {
        extensions: ['.vue', '.js']
    },
    plugins: [
        new HtmlWebpackPlugin({
            template: './templates/index.html',
            filename: '../public/index.html',
            inject: true
        }),
        new VueLoaderPlugin(),
    ]
}
