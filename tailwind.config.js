import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};

// export default {
//     content: [
//         "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
//         "./vendor/laravel/jetstream/**/*.blade.php",
//         "./storage/framework/views/*.php",
//         "./resources/views/**/*.blade.php",
//         "./resources/js/**/*.vue",
//     ],

//     theme: {
//         extend: {
//             fontFamily: {
//                 sans: ["Figtree", ...defaultTheme.fontFamily.sans],
//             },
//             colors: {
//                 primary: {
//                     DEFAULT: "#166534",
//                     light: "#d1fae5",
//                     soft: "#e6f4ea",
//                 },
//                 grayish: "#f3f4f6",
//             },
//         },
//     },

//     plugins: [forms, typography],
// };
