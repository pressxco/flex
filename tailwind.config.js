const colors = require('tailwindcss/colors')

module.exports = {
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
  theme: {
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
