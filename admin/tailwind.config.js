/** @type {import('tailwindcss').Config} */
export default {
    content: ["./index.html", "./src/**/*.{vue,js,ts,jsx,tsx}",]
,
    theme: {
        extend: {
            screens: {
                'sm': '390px',
                'md': '768px',
                'lg': '1024px',
                'xl': '1280px',
                '2xl': '1536px',
            },
            fontFamily: {
                'Acad-Flux': ['Afacad Flux', 'sans-serif'],
            },
            colors: {
                'lightBrown': '#D1B89A',
                'gold':'#F3C623'
            },
            keyframes: {
                'fade-in-down': {
                    from: {
                        transform: "translateY(-0.75rem)",
                        opacity: '0',
                    },
                    to: {
                        transform: "translateY(0rem)",
                        opacity: '1',
                    },
                },

            },
            animation: {
                'fade-in-down': "fade-in-down 0.3s ease-in-out both",
            },
        },
    },
    plugins: [],
}

