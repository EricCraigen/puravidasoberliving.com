const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

module.exports = {
    // prefix: 'tw-',
    purge: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        screens: {
            sm: "480px",
            md: "768px",
            lg: "976px",
            xl: "1440px",
        },
        // colors: {
        //     transparent: "transparent",
        //     current: "currentColor",
        //     blue: {
        //         light: "#85d7ff",
        //         DEFAULT: "#1fb6ff",
        //         dark: "#009eeb",
        //     },
        //     pink: {
        //         light: "#ff7ce5",
        //         DEFAULT: "#ff49db",
        //         dark: "#ff16d1",
        //     },
        //     gray: {
        //         darkest: "#17e34d",
        //         dark: "#17e34d",
        //         DEFAULT: "#17e34d",
        //         light: "#17e34d",
        //         lightest: "#17e34d",
        //     },
        // ...this.theme.colorsc,
        // },
        extend: {
            colors: {
                transparent: "transparent",
                current: "currentColor",
                black: colors.black,
                white: colors.white,
                gray: colors.trueGray,
                indigo: colors.indigo,
                red: colors.rose,
                yellow: colors.amber,
            },
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ["disabled"],
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
