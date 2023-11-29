const colors = require('tailwindcss/colors');
const { fontFamily } = require('tailwindcss/defaultTheme');

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
            fontFamily: {
                sans: [
                    ['Inter', ...fontFamily.sans],
                    { fontFeatureSettings: '"ss04"' }
                ]
            },
            aspectRatio: {
                photo: '3/2'
            },
            colors: {
                gray: colors.neutral,
                accent: {
                    DEFAULT: colors.sky[600],
                    ...colors.sky
                }
            }
        }
    },
    plugins: [
        require('tailwindcss/plugin')(api => {
            api.addVariant('em', variant => {
                variant.container.walkRules(rule => {
                    rule.selector = `.em\\:${rule.selector.slice(1)}`;
                    rule.walkDecls(decl => {
                        decl.value = decl.value.replace('rem', 'em');
                    });
                });
            });
        })
    ]
}