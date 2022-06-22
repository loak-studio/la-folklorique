const colors = require('tailwindcss/colors') 
 
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './vendor/filament/**/*.blade.php', 
        './resources/**/*.js'
    ],
    darkMode: 'class',
    theme: {
        extend: {
            colors: { 
                primary:   {
                    '50': '#FACAB7',
                    '100': '#F8BDA4',
                    '200': '#F6A17E',
                    '300': '#F38558',
                    '400': '#F06A32',
                    '500': '#E85011',
                    '600': '#DA4B10',
                    '700': '#CB460F',
                    '800': '#BD410E',
                    '900': '#AF3C0D',
                  },
                  dark:{
                    'DEFAULT':'#292825',
                  },
                  success: colors.green,
                  warning: colors.yellow,
                  danger: colors.rose,
            }, 
            fontFamily:{
                'outfit':['Outfit', 'sans-serif'],
                'folklard':['Folklard', 'sans-serif'],
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'), 
        require('@tailwindcss/typography'), 
    ],
}