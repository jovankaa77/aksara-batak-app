import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                jua: ["Jua", "sans-serif"],
                poppins: ["Poppins", "sans-serif"],
                opensans: ["Open Sans", "sans-serif"],
            },
            colors:{
                bg:{
                    dark: "#1b1b1b",
                },
                accent:{
                    teal:"#1DBF9F",
                    yellow: "#E5CA46"
                },
                secondary:{
                    base:"#090C9B"
                }
            }
        },
    },

    plugins: [forms],
};
