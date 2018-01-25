var path = require('path');
var webpack = require('webpack');

module.exports = {
	devtool: 'source-map',
	entry: './src/index',
	output: {
		filename: 'bundle.js',
		path: path.join(__dirname, 'www/js'),
		publicPath: 'js'
	},
	plugins: [
		new webpack.optimize.OccurrenceOrderPlugin(),
		new webpack.DefinePlugin({
			'process.env': {
				'NODE_ENV': JSON.stringify('production')
			}
		}),
		new webpack.optimize.UglifyJsPlugin({
			compressor: {
				warnings: false
			}
		})
	],
	module: {
		rules: [
			{
				test: /\.css$/,
				loader: 'style-loader!css-loader'
			},
			{
				test: /\.js$/,
				loaders: 'babel-loader',
				query: {
					presets: ['react', 'es2015', 'stage-0']
				}
			},
			{
				test: /\.woff2$/,
				loader: 'file-loader',
				options: {
					limit: 10000,
					outputPath: '/fonts/'
				}
			}
		]
	}
};
