const colors = require('tailwindcss/colors')

module.exports = {
  mode: 'jit',
  purge: {
    content: [
      './sources/**/*.{svg,css,png,jpg,js}',
      './includes/**/*.php',
      './views/**/*.php',
      './safelist.txt',

      // // Theme root PHP files
      './404.php',
      './archive.php',
      './comments.php',
      './footer.php',
      './functions.php',
      './header.php',
      './index.php',
      './page.php',
      './search.php',
      './sidebar.php',
      './single.php',
    ],
    options: {
      safelist: [],
      blocklist: [],
      keyframes: true,
      fontFace: true,
    },
  },
  darkMode: 'class',
  theme: {
    extend: {
      spacing: {
        colors: {
          transparent: 'transparent',
          current: 'currentColor',
          black: '#000',
          white: '#fff',
          amber: colors.amber,
          blue: colors.blue,
          cyan: colors.cyan,
          emerald: colors.emerald,
          fuchsia: colors.fuchsia,
          gray: colors.coolGray,
          green: colors.green,
          indigo: colors.indigo,
          lime: colors.lime,
          orange: colors.orange,
          pink: colors.pink,
          purple: colors.purple,
          red: colors.red,
          rose: colors.rose,
          teal: colors.teal,
          violet: colors.violet,
          yellow: colors.yellow,
        },
      },
    },
    plugins: [
      require('@tailwindcss/line-clamp'),
      require('@tailwindcss/typography'),
      require('@tailwindcss/forms'),
      function ({ addComponents }) {
        addComponents({
          '.container': {
            maxWidth: '1170px',
            '@screen sm': {
              maxWidth: '100%',
            },
            '@screen md': {
              maxWidth: '100%',
            },
            '@screen lg': {
              maxWidth: '1140px',
            },
            '@screen xl': {
              maxWidth: '1170px',
            },
          }
        })
      }
    ]
  }
}
