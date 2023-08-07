/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./template/**/*.html.twig",
    "./node_modules/tw-elements/dist/js/**/*.js",
  ],
  plugins: [
    require("tailwindcss"),
    require("autoprefixer"),
    // Autres plugins PostCSS que vous pourriez utiliser
  ],
};
