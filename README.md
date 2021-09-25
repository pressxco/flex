![Flex logo](https://pressx.co/flex/flex-logo.svg)

# Flex WordPress Starter Theme
[![GitHub release](https://img.shields.io/github/v/release/pressxco/flex?color=ed64a6)](https://github.com/pressxco/flex/releases) [![license](https://img.shields.io/badge/license-GPL--2.0%2B-orange)](https://github.com/pressxco/flex/blob/master/LICENSE) [![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg)](https://github.com/pressxco/flex/pulls) ![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/pressxco/flex) ![GitHub repo size](https://img.shields.io/github/repo-size/pressxco/flex)

Flex is the simplest WordPress starter theme including full setup for Sass, PostCSS, Autoprefixer, stylelint, Webpack, ESLint, imagemin, Browsersync, etc.


## Getting Started

### 1. Install Dependencies

```bash
composer install
yarn install
yarn wp-env start # Optional step: If you wish to run this theme via WP-ENV and Docker
```

### 2. Start Dev Environment

```bash
yarn dev
```

## Configuration & Defaults

You can modify the configurations by editing `config` in `webpack.mix.js`.

```javascript
mix.browserSync({
  proxy: 'http://localhost:8888',
  open: 'external',
  port: 3000,
  files: ['*.php', 'includes/**/*.php', 'views/**/*.php', 'source/**/**/*']
});
```

## Copyright / License

© 2020-2021 the contributors of PressX under the [GPL version 2.0] or later.
For more information, visit: https://github.com/pressxco/flex/blob/master/LICENSE
