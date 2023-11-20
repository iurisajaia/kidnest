module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                lightgrey: {
                    DEFAULT: "#999999",
                },
                yellowLight: {
                    DEFAULT: "#FDEEC4",
                },
                yellowDark: {
                    DEFAULT: "#FFCC5C",
                },
                textColor: {
                    DEFAULT: "#444444",
                },
                red: {
                    DEFAULT: "red",
                },
                white: {
                    DEFAULT: '#F8F8F8',
                },
                'pencil-box' : {
                    DEFAULT: 'rgba(145, 158, 171, 0.08)',
                }
            }
        },
    },
    plugins: [

    ],
    darkMode: 'class'
}
