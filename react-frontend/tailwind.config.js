/** @type {import('tailwindcss').Config} */
export default {
    content: ["./index.html", "./src/**/*.{js,ts,jsx,tsx}"],
    theme: {
        extend: {
            margin: {
                "smallerMargin": "200px"
            }
        },
    },
    plugins: [],
};
