/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "footer.php", "page-home.php", "header.php", "index.php", "single.php", "page.php"
  ],
  theme: {
    extend: {
      "colors": {
          "tblue": "#38557D",
          "tlightblue": "#A5BFD3",
          "tyellow": "#EDC065",
          "tlightyellow": "#F4D596",
          "tpurple": "#43233D",
          "tlightpurple": "#B39EAA",
          "tred": "#AC3437",
          "tgray": "#343534",
          "tlightgray": "#9F9F9E",
      }
    },
  },
  plugins: [],
}

