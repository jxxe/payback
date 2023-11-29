const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/**/*.php'
    ],
    future: {
        hoverOnlyWhenSupported: true
    },
    theme: {
        extend: {
            borderColor: {
                DEFAULT: colors.neutral[400]
            },
            fontFamily: {
                sans: ['"Univers"', '"Helvetica Neue"', '"Avenir"', 'sans-serif'],
                mono: ['"Berkeley Mono"', '"Menlo"', 'monospace']
            },
            borderWidth: {
                3: 3
            },
            colors: {
                gray: colors.neutral
            }
        }
    },
    plugins: []
}