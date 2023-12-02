/** @type {import('tailwindcss').Config} */
export default {
    darkMode   : "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue"
    ],
    theme  : {
        themeVariants: ['dark'],
        extend: {
            colors: {
                'shark': {
                    '50': '#f6f7f9',
                    '100': '#ededf1',
                    '200': '#d7d9e0',
                    '300': '#b4b8c5',
                    '400': '#8b91a5',
                    '500': '#6d738a',
                    '600': '#575c72',
                    '700': '#474b5d',
                    '800': '#3e414e',
                    '900': '#363844',
                    '950': '#212229',
                },
                'woodsmoke': {
                    '50': '#f6f6f6',
                    '100': '#e7e7e7',
                    '200': '#d1d1d1',
                    '300': '#b0b0b0',
                    '400': '#888888',
                    '500': '#6d6d6d',
                    '600': '#5d5d5d',
                    '700': '#4f4f4f',
                    '800': '#454545',
                    '900': '#3d3d3d',
                    '950': '#131313',
                },
                'alabaster': {
                    '50': '#fafbfc',
                    '100': '#ebeff3',
                    '200': '#d3dce4',
                    '300': '#adbfcc',
                    '400': '#809cb0',
                    '500': '#608097',
                    '600': '#4c677d',
                    '700': '#3e5466',
                    '800': '#364856',
                    '900': '#313e49',
                    '950': '#202831',
                },
                'purple': {
                    '50': '#f7f6ff',
                    '100': '#ece9fe',
                    '200': '#dbd6fe',
                    '300': '#c0b5fd',
                    '400': '#a18bfa',
                    '500': '#825cf6',
                    '600': '#723aed',
                    '700': '#6328d9',
                    '800': '#5321b6',
                    '900': '#451d95',
                    '950': '#291065',
                },

            }
        },
        fontFamily: {
            body: ['"Inconsolata"'],
            sans: ['"Inconsolata"'],
        },
    },
    plugins: [],
}

