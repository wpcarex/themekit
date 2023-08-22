const mix = require('laravel-mix');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const CopyWebpackPlugin = require('copy-webpack-plugin');
const imageminMozjpeg = require('imagemin-mozjpeg');
const StyleLintPlugin = require('stylelint-webpack-plugin');
const tailwindcss = require('tailwindcss');
const { glb } = require('laravel-mix-glob');

mix
	.setPublicPath('./build');

mix
	.sass(
		'src/Theme/Main/Static/styles/main.scss',
		'styles.bundle.css',
		{ sassOptions: { outputStyle: 'compressed' } }
	)
	.options({
		postCss: [
			require('css-declaration-sorter')({
				order: 'smacss'
			})
		],
		autoprefixer: {
			options: {
				browsers: [
					'last 6 versions',
				]
			}
		},
	});

mix
	.sass(
		glb.src('src/Theme/Main/Static/styles/**/*.s.scss'),
		glb.out({
			baseMap: '',
			outMap: './styles',
			specifier: 's',
		}),
	);


mix
	.combine([
		// 'resources/scripts/includes/*',
		'src/Theme/Main/Static/scripts/main.js'
	],
		'build/scripts.bundle.js'
	);

mix
	.options({
		processCssUrls: false,
		postCss: [
			require('postcss-nested-ancestors'),
			require('postcss-nested'),
			require('postcss-import'),
			tailwindcss('./.dev/tailwind.config.js'),
			require('autoprefixer'),
		]
	});

mix
	.webpackConfig({
		plugins: [
			new CopyWebpackPlugin({
				patterns: [
					{ from: "src/Theme/Main/Static/images", to: "images" },
					{ from: "src/Theme/Main/Static/icons", to: "icons" },
					{ from: "src/Theme/Main/Static/fonts", to: "fonts" },
				],
			}),
			new ImageminPlugin({
				test: /\.(jpe?g|png|jpg|gif|svg)$/i,
				plugins: [
					imageminMozjpeg({
						quality: 80,
					})
				]
			}),
			new StyleLintPlugin({
				files: 'src/Theme/Main/Static/styles/**/*.scss',
				configFile: './.stylelintrc'
			}),
		],
	});

mix
	.browserSync({
		proxy: 'http://base.local',
		open: 'external',
		port: 3000,
		files: ['*.php', 'src/**/**/*']
	});

mix
	.disableNotifications();

mix
	.version();
