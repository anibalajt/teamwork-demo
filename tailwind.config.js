const defaultTheme = require('tailwindcss/defaultTheme');
const colors =  require('tailwindcss/colors');

module.exports = {
    // delete below if something wrong happens
    // purge: [
    //     './**/*.php',
    //     './resources/**/*.js',
    //     './resources/**/*.vue',
    // ],
    // DELETE ABOVE IF SOMETHING WRONG HAPPENS

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    colors: {
        // Build your palette here
        transparent: 'transparent',
        current: 'currentColor',
        white: colors.white,
        black: colors.black,
        slate: colors.slate,
        gray: colors.gray,
        neutral: colors.neutral,
        stone: colors.stone,
        red: colors.red,
        orange: colors.orange,
        amber: colors.amber,
        yellow: colors.yellow,
        lime: colors.lime,
        green: colors.green,
        emerald: colors.emerald,
        teal: colors.teal,
        cyan: colors.cyan,
        sky: colors.sky,
        blue: colors.blue,
        indigo: colors.indigo,
        violet: colors.violet,
        purple: colors.purple,
        fuchsia: colors.fuchsia,
        pink: colors.pink,
        rose: colors.rose,

        /* Alternative names for some colours */
        primary: colors.blue,
        secondary: colors.purple,
        tertiary: colors.gray,
        danger: colors.red,
        warning: colors.amber,
        info: colors.slate,
        success: colors.green,
    },
    variants:{
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
    ],
};
