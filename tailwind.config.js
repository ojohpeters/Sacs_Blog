import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php', // Include all Blade files
        './resources/**/*.js', // Include all JS files
        './resources/**/*.vue', // Include all Vue files (if you're using Vue)
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php', // Laravel Pagination views
        './public/**/*.{css, js}'
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [],
};