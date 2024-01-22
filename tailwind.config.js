import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
  ],

  // theme: {
  //   extend: {
  //     fontFamily: {
  //       sans: ['Figtree', ...defaultTheme.fontFamily.sans],
  //     },
  //     // colors: require('daisyui/colors'),
  //   },
  // },

  plugins: [
    require("@tailwindcss/typography"),
    require('@tailwindcss/forms'),

    // add daisyUI plugin
    require('daisyui'),
  ],

  // daisyUI config (optional - here are the default values)
  daisyui: {
    themes: true, // false: only light + dark | true: all themes | array: specific themes like this ["light", "dark", "cupcake"]
    // themes: [{
    //   mytheme: {
    //     "primary": "#0000ff",
    //     "secondary": "#00a3ff",
    //     "accent": "#00be00",
    //     "neutral": "#2c272b",
    //     "base-100": "#232136",
    //     "info": "#1de5ff",
    //     "success": "#00ffae",
    //     "warning": "#a47100",
    //     "error": "#ff7b81",
    //   },
    // }, ],
    // darkTheme: "dark", // name of one of the included themes for dark mode
    base: true, // applies background color and foreground color for root element by default
    styled: true, // include daisyUI colors and design decisions for all components
    utils: true, // adds responsive and modifier utility classes
    prefix: "", // prefix for daisyUI classnames (components, modifiers and responsive class names. Not colors)
    logs: true, // Shows info about daisyUI version and used config in the console when building your CSS
    themeRoot: ":root", // The element that receives theme color CSS variables
  },
};
