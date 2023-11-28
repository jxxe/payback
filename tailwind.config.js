/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.php'
    ],
    theme: {
        extend: {
            aspectRatio: {
                photo: '3/2'
            }            
        }
    },
    plugins: []
}
