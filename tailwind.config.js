/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.svelte",
    ],
  theme: {
    extend: {
        text: {
            'title': '48px',
            'text': '24px',
            'subtext': '20px',
        },
        color: {
            'primary': '#1F1F1F',
        }
    },
  },
  plugins: [],
}

