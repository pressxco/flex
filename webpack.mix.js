const mix = require('laravel-mix');
const ImageminPlugin = require('imagemin-webpack-plugin').default;
const CopyWebpackPlugin = require('copy-webpack-plugin');
const imageminMozjpeg = require('imagemin-mozjpeg');
const StyleLintPlugin = require('stylelint-webpack-plugin');

mix
  .setPublicPath('./dist');

mix
  .sass(
    'source/styles/main.scss',
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
    }
  });

mix
  .combine([
    'source/scripts/includes/*',
    'source/scripts/main.js'
  ],
    'dist/scripts.bundle.js'
  );

mix
  .options({
    processCssUrls: false,
    postCss: [
      require('postcss-nested-ancestors'),
      require('postcss-nested'),
      require('postcss-import'),
      require('tailwindcss'),
      require('autoprefixer'),
    ]
  });

mix
  .webpackConfig({
    plugins: [
      new CopyWebpackPlugin({
        patterns: [
          { from: "source/images", to: "images" },
          { from: "source/icons", to: "icons" },
          { from: "source/fonts", to: "fonts" },
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
        files: './source/styles/**/*.scss',
        configFile: './.stylelintrc'
      }),
    ]
  });

mix
  .browserSync({
    proxy: 'http://localhost:8888',
    open: 'external',
    port: 3000,
    files: ['*.php', 'includes/**/*.php', 'views/**/*.php', 'source/**/**/*']
  });

mix
  .disableNotifications();

mix
  .version();
