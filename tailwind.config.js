/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                viga: ['viga', 'sans-serif'],
                agbalumo: ['Agbalumo', 'sans-serif'],
                zilla: ['Zilla Slab', 'serif'],
                farnaz: ['farnaz', 'serif'],
                helal: ['helal', 'sans-serif'],
            },
            boxShadow: {
                'title': '1px 1px 4px #fff',
            },
            dropShadow: {
                'title': '3px 2px 4px #fff',
                '3xl': '1px 1px 2px #000000',
                '3xl-h': '3px 2px 0px #000000',
                '4xl': [
                    '0 35px 35px rgba(0, 0, 0, 0.25)',
                    '0 45px 65px rgba(0, 0, 0, 0.15)'
                ]
            },
        },
    },
    plugins: [],
}
