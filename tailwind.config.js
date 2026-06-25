/** @type {import('tailwindcss').Config} */
import forms from '@tailwindcss/forms';

export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './app/**/*.php',
    ],
    theme: {
        extend: {
            colors: {
                ink: {
                    950: '#05070d',
                    900: '#0a0e1a',
                    800: '#111627',
                    700: '#1a2034',
                },
                accent: {
                    cyan: '#22d3ee',
                    purple: '#a855f7',
                },
            },
            fontFamily: {
                sans: ['Sora', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                display: ['Sora', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
            boxShadow: {
                glow: '0 0 40px -10px rgba(34, 211, 238, 0.35)',
                'glow-purple': '0 0 45px -10px rgba(168, 85, 247, 0.4)',
            },
            backgroundImage: {
                'grid-lines':
                    'linear-gradient(to right, rgba(148,163,184,0.06) 1px, transparent 1px), linear-gradient(to bottom, rgba(148,163,184,0.06) 1px, transparent 1px)',
            },
            keyframes: {
                'fade-up': {
                    '0%': { opacity: '0', transform: 'translateY(24px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                float: {
                    '0%,100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-10px)' },
                },
            },
            animation: {
                'fade-up': 'fade-up 0.7s ease-out forwards',
                float: 'float 6s ease-in-out infinite',
            },
        },
    },
    plugins: [forms],
};
