/** @type {import('tailwindcss').Config} */

import preset from "./vendor/filament/support/tailwind.config.preset";

const defaultTheme = require("tailwindcss/defaultTheme");

export default {
    presets: [preset],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./app/Filament/**/*.php",
        "./resources/views/filament/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                hero: "url('/public/images/hero.png')",
                contact: "url('/public/images/contact.png')",
            },
        },
    },
};
