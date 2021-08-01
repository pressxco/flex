let mix = require('laravel-mix');
let path = require('path');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const CopyWebpackPlugin = require('copy-webpack-plugin');
const imageminMozjpeg = require('imagemin-mozjpeg');

mix.setPublicPath(path.resolve('./'));

mix.sass('source/styles/main.scss', 'dist/styles');

mix.combine(
  [
    'source/scripts/plugins/moby.js',
    'source/scripts/plugins/lazysizes.js',
    'source/scripts/plugins/scrollpup.js',
    'source/scripts/bundle.js'
  ],
  'dist/scripts/bundle.js'
);

mix.options({
  processCssUrls: false,
  postCss: [
    require('postcss-nested-ancestors'),
    require('postcss-nested'),
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
  ]
});

mix.webpackConfig({
  plugins: [
    new CopyWebpackPlugin({
      patterns: [
        { from: "source/images", to: "dist/images" },
        { from: "source/icons", to: "dist/icons" },
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
  ]
});

mix.disableNotifications();

mix.browserSync({
  proxy: 'http://localhost:8888',
  open: 'external',
  port: 3000,
  files: ["dist/**/*.php", "*.php", "**/*.php", "source/**/**/*"]
});

mix.version();
