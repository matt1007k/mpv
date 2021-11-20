const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    // mode: "jit",
    purge: [
        // "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        // "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    darkMode: "class",
    theme: {
        extend: {
            fontSize: {
                thead: ["13px", "21px"],
                base: ["15px", "22px"],
            },
            fontFamily: {
                sans: ["Inter", "Poppins", ...defaultTheme.fontFamily.sans],
            },
            width: {
                wrap: "1200px",
            },
        },
    },

    variants: {
        extend: {
            opacity: ["disabled", "dark"],
            display: ["hover", "focus", "group-hover"],
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
