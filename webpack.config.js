const path = require('path')
const {CleanWebpackPlugin}=require('clean-webpack-plugin')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const OptimizeCssAssetPlugin = require('optimize-css-assets-webpack-plugin')
const TerserWebPlugin = require('terser-webpack-plugin')

const isDev =process.env.NODE_ENV ==='development'
const isProd = !isDev

const optimization = () =>{
    const config =
        {
            splitChunks: {
                chunks: "all"
            }
        }
        if(isProd) {
            config.minimizer=[
                new OptimizeCssAssetPlugin(),
                new TerserWebPlugin()
            ]
        }
        return config;
}

module.exports={
    context: path.resolve(__dirname, 'src'),
    mode: 'development',//не минифицированный файл
    //mode: 'production',//минифицированный файл
    entry:{
        send_request: './js/send-request.js'//точка входа
    },
    output:{//точка выхода
        filename: '[name].bundle.js',
        path: path.resolve(__dirname,'dist')
    },
    resolve:{
        extensions: ['.js','.json'],
        alias: {

        }
    },
    optimization: optimization(),
    devServer: {
        port:4200
    },
    plugins:[
        new CleanWebpackPlugin(),
        new MiniCssExtractPlugin({
            filename: '[name].css'
        })
    ],
    module:{
        rules:[
            {
                test: /\.css$/,
                use: [
                    {
                        loader: MiniCssExtractPlugin.loader,
                        options: {
                        },
                    },
                    'css-loader',
                ],
            },
            { test: /\.woff(2)?(\?v=[0-9]\.[0-9]\.[0-9])?$/, loader: "url-loader?limit=10000&mimetype=application/font-woff" },
            { test: /\.(ttf|eot|svg)(\?v=[0-9]\.[0-9]\.[0-9])?$/, loader: "file-loader" }

        ]
    }
}