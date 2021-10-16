module.exports = {
  mode: 'jit',
  purge: [
      './sources/**/*.{svg,css,png,jpg,js}',
      './includes/**/*.php',
      './views/**/*.php',
      './safelist.txt',

      // Theme root PHP files
      './404.php',
      './comments.php',
      './footer.php',
      './functions.php',
      './header.php',
      './index.php',
      './page.php',
      './search.php',
      './sidebar.php',
      './single.php',
  ]
}
