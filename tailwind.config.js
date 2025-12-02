import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    darkMode: 'class', // Mengaktifkan mode gelap berbasis class

    theme: {
        extend: {
            // Definisi font kustom - Homespire menggunakan Inter & Playfair Display
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                serif: ['Playfair Display', ...defaultTheme.fontFamily.serif],
            },

            // Definisi palet warna kustom untuk Homespire
            colors: {
                // Mode Terang (Light Mode)
                primary: '#C8A46B',
                'primary-content': '#ffffff',
                secondary: '#4A4540',
                'secondary-content': '#ffffff',
                accent: '#9A8C78',
                neutral: '#2A2623',
                'neutral-content': '#F9F6F3',
                'base-100': '#F9F6F3',
                'base-200': '#EAE4DD',
                'base-300': '#DCD3C9',
                'base-content': '#4A4540',

                // Warna semantik
                info: {
                    DEFAULT: '#3ABFF8',
                    content: '#00529B'
                },
                success: {
                    DEFAULT: '#36D399',
                    content: '#004225'
                },
                warning: {
                    DEFAULT: '#FBBD23',
                    dark: '#E2A81B',
                    content: '#664D03'
                },
                danger: {
                    DEFAULT: '#F87272',
                    dark: '#E06464',
                    content: '#58151C'
                },

                // Mode Gelap (Dark Mode)
                'dark-primary': '#D1AD7B',
                'dark-primary-content': '#1A1816',
                'dark-secondary': '#EAE4DD',
                'dark-secondary-content': '#2A2623',
                'dark-accent': '#B0A391',
                'dark-neutral': '#1A1816',
                'dark-neutral-content': '#EAE4DD',
                'dark-base-100': '#2A2623',
                'dark-base-200': '#3A3633',
                'dark-base-300': '#4A423D',
                'dark-base-content': '#F9F6F3',
            },

            // Transisi kustom
            transitionProperty: {
                'height': 'height',
                'spacing': 'margin, padding',
            },
        },
    },

    plugins: [forms],
};
