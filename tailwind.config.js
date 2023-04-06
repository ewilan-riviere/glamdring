const plugin = require('tailwindcss/plugin')
const colors = require('tailwindcss/colors')

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.{vue,js,ts,jsx,tsx,php}',
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/laravel/jetstream/**/*.blade.php',
    './storage/framework/views/*.php',
    './app/View/Components/**/*.php',
    './vendor/filament/**/*.blade.php',
  ],

  darkMode: 'class',
  theme: {
    container: {
      center: true,
    },
    extend: {
      /**
       * https://github.com/filamentphp/filament/discussions/3004
       * https://filamentphp.com/docs/2.x/admin/appearance#building-themes
       * https://laravel.com/docs/9.x/vite
       */
      colors: {
        danger: colors.rose,
        primary: colors.violet,
        success: colors.green,
        warning: colors.yellow,
      },
      fontFamily: {
        'ringbearer': ['Ringbearer, crusive'],
        'aniron': ['Aniron, crusive'],
        'elvish': ['ElvishRingNFI, crusive'],
        'fanjo-leoda': ['FanjoLeoda, crusive'],
        'midjungards': ['Midjungards, crusive'],
      },
    },
  },

  plugins: [
    plugin(({ addComponents }) => {
      addComponents({
        '.header-title': {
          '@apply text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200': {},
        },
        '.word-wraping': {
          'text-align': 'justify',
          '-webkit-hyphens': 'auto',
          '-moz-hyphens': 'auto',
          '-ms-hyphens': 'auto',
          'hyphens': 'auto',
        },
        '.color-mode': {
          '@apply bg-white dark:bg-gray-900 text-black dark:text-white': {},
        },
        '.scrollbar-thin': {
          'scrollbar-width': 'thin',
        },
        '.main-container': {
          '@apply container px-4 pt-16 pb-20 sm:px-6 lg:px-8 max-w-7xl': {},
        },
        '.text-gray-medium': {
          '@apply text-gray-500 dark:text-gray-400': {},
        },
        '.text-gray-dark': {
          '@apply text-gray-900 dark:text-gray-100': {},
        },
        '.debug-screens': {
          '@apply before:bottom-0 before:left-0 before:fixed before:px-1 before:text-sm before:bg-black before:text-white before:shadow-xl before:content-["screen:_"] sm:before:content-["screen:sm"] md:before:content-["screen:md"] lg:before:content-["screen:lg"] xl:before:content-["screen:xl"] 2xl:before:content-["screen:2xl"]':
            {},
          '&:before': {
            'z-index': '2147483647',
          },
        },
      })
    }),
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
  ],
}
