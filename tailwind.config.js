const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./resources/**/*.{blade.php,js,vue}'],
  theme: {
    extend: {
        colors: {
            gray: colors.stone,
        },
    },
  },
  plugins: [],
};
