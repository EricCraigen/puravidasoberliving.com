const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");
const plugin = require("tailwindcss/plugin");

module.exports = {
    // prefix: 'tw-',
    purge: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    darkMode: 'class',
    theme: {
        screens: {
            sm: "480px",
            md: "768px",
            lg: "976px",
            xl: "1440px",
        },
        extend: {
            colors: {
                rose: colors.rose,
            },
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        width: ["responsive", "hover", "focus"],
        extend: {
            opacity: ["disabled"],
            display: ['first-of-type']
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/aspect-ratio"),
        require('@tailwindcss/typography'),
        plugin(function ({ addVariant, e }) {
            addVariant("first-of-type", ({ modifySelectors, separator }) => {
                modifySelectors(({ className }) => {
                    return `.${e(`first-of-type${separator}${className}`)}:first-of-type`;
                });
            });
        }),
    ],
};
