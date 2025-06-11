import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        'node_modules/preline/dist/*.js', // Add this if missing
    ],

    theme: {
        extend: {
            fontFamily: {
                sentient: ['Sentient', 'sans-serif'],
                telma: ['Telma', 'sans-serif'],
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                brand: {
                    brown: '#8B5E3C',
                    gold: '#B48C63',
                    blush: '#F9E7DE',
                    cream: '#FAF9F6',
                },
            },
        },
    },

    plugins: [
        require('preline/plugin'),
        require('@tailwindcss/forms'),
    ],
};
