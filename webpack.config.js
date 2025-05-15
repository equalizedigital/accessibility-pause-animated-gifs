/* global require, __dirname, module */
const webpack = require( 'webpack' ); // to access built-in plugins
const path = require( 'path' );
const { CleanWebpackPlugin } = require( 'clean-webpack-plugin' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const CssMinimizerPlugin = require( 'css-minimizer-webpack-plugin' );

module.exports = {
	mode: 'production', // development | production
	watch: false,
	entry: {
		frontend: [
			'./src/js/index.js',
		],
	},
	output: {
		filename: 'js/[name].bundle.js', // Output JS files to build/js
		path: path.resolve( __dirname, 'build' ),
	},
	devtool: 'source-map',
	module: {
		rules: [
			{
				test: /\.(js|jsx)$/,
				exclude: /node_modules/,
				use: [ 'babel-loader' ],
			},
			{
				test: /gifa11y\.min\.css$/,
				include: /node_modules[\\\/]gifa11y[\\\/]dist[\\\/]css/,
				use: [
					{
						loader: 'css-loader',
						options: {
							exportType: 'string',
						},
					},
				],
			},
			{
				test: /\.(s(a|c)ss)$/,
				use: [
					MiniCssExtractPlugin.loader,
					'css-loader',
					'sass-loader',
				],
			},
			{
				test: /\.css$/i,
				exclude: /gifa11y\.min\.css$/,
				use: [
					MiniCssExtractPlugin.loader,
					{
						loader: 'css-loader',
						options: {
							esModule: false,
						},
					},
				],
			},
		],
	},
	plugins: [
		new webpack.ProgressPlugin(),
		new CleanWebpackPlugin(),
		new MiniCssExtractPlugin( {
			filename: 'css/[name].css',
		} ),
		new CssMinimizerPlugin(),
	],
};
