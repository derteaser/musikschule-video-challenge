module.exports = {
  purge: {
    content: [
      '../../**/*.twig',
      '../../**/*.php',
      'dist/**/*.js',
    ],
  },
  future: {
    removeDeprecatedGapUtilities: true,
    purgeLayersByDefault: true,
  },
  theme: {
    aspectRatio: {
      none: 0,
      square: [1, 1],
      "16/9": [16, 9],
      "4/3": [4, 3],
    },
    fontFamily: {
      'sans': [
        'Karla',
        'system-ui',
        '-apple-system',
        'BlinkMacSystemFont',
        '"Segoe UI"',
        '"Helvetica Neue"',
        'Arial',
        '"Noto Sans"',
        'sans-serif',
        '"Apple Color Emoji"',
        '"Segoe UI Emoji"',
        '"Segoe UI Symbol"',
        '"Noto Color Emoji"',
      ]
    },
    typography: {
      default: {
        css: {
          color: '#191818',
          a: {
            color: '#cd6726',
            '&:hover': {
              color: '#008195',
            },
          },
        },
      },
    },
    extend: {
      'colors': {
        'cdu-orange': {
          'dark': '#cd6726',
          'medium': '#d27e27',
          'light': '#dea826',
        },
      },
      height: {
        'screen/2': '50vh',
        'screen/3': 'calc(100vh / 3)',
        'screen/4': 'calc(100vh / 4)',
        'screen/5': 'calc(100vh / 5)',
      },
      spacing: {
        '72': '18rem',
        '84': '21rem',
        '96': '24rem',
      },
      screens: {
        'print': {'raw': 'print'},
      },
    },
  },
  plugins: [
    require('@tailwindcss/custom-forms'),
    require('@tailwindcss/typography'),
    require('tailwindcss-debug-screens'),
    require("tailwindcss-brand-colors"),
    require('tailwindcss-responsive-embed'),
    require('tailwindcss-aspect-ratio'),
    require("tailwindcss-padding-safe")(),
    require('tailwindcss-elevation')([]),
  ],
}
