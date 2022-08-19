
const colors = require('tailwindcss/colors')
module.exports = {
  purge: { content: ['./public/**/*.html', './src/**/*.vue'] },
  darkMode: false, // or 'media' or 'class'
  theme: {

    borderWidth: {
      DEFAULT: '1px',
      '0': '0',
      '1': '1px',
      '2': '2px',
     '3': '3px',
      '4': '4px',
     '6': '6px',
     '8': '8px',
    },

    extend: {

      colors: {      
        //los mis :3
        pomarrosa: colors.pomarrosa,
        cuero: colors.cuero,
        hueso: colors.hueso,
        vino: colors.vino,
        tan: colors.tan,
      },



      spacing: {        
        '120': '30rem',
        '128': '32rem',
        '144': '36rem',
        '224': '56rem',
      },

      borderWidth:{
        '10': '10px',
        '12': '12px',
      },

      animation: {
        'ping1': 'ping 0.8s cubic-bezier(0, 0, 0.2, 1) infinite',
        'ping2': 'ping 1s cubic-bezier(0, 0, 0.2, 1) infinite',
        'ping3': 'ping 1.5s cubic-bezier(0, 0, 0.2, 1) infinite',
        'ping4': 'ping 1.8s cubic-bezier(0, 0, 0.2, 1) infinite',
        'ping5': 'ping 2s cubic-bezier(0, 0, 0.2, 1) infinite',         
        'ping10': 'ping 5s cubic-bezier(0, 0, 0.2, 1) infinite',

        'ping20': 'ping 2s cubic-bezier(0, 0, 0.2, 1) ',

        'pingonce': 'ping 0.5s cubic-bezier(0, 0, 0.2, 0.5) ',
        
        'pulseA': 'pulse 4s infinite',
        'pulseB': 'pulse 4.2s infinite',
        'pulseC': 'pulse 4.4s infinite',
        'pulseD': 'pulse 4.6s infinite',
        'pulseE': 'pulse 4.8s infinite',
        'pulseF': 'pulse 5s infinite',
       }
    },
    rotate:{
      '0': '0deg',
      '6': '6deg',
      '12': '12deg',
      '30': '30deg',
      '90': '90deg',
    },
    
    
    colors: {
      black: colors.black,
      white: colors.white,
      indigo: colors.indigo,
      rose: colors.rose,
      pink: colors.pink,
      fuchsia: colors.fuchsia,
      purple: colors.purple,
      violet: colors.violet,
      blue: colors.blue,
      lightBlue: colors.lightBlue,
      cyan: colors.cyan,
      teal: colors.teal,
      emerald: colors.emerald,
      green: colors.green,
      lime: colors.lime,
      yellow: colors.yellow,
      amber: colors.amber,
      orange: colors.orange,
      red: colors.red,
      warmGray: colors.warmGray,
      trueGray: colors.trueGray,
      gray: colors.gray,
      coolGray: colors.coolGray,
      blueGray: colors.blueGray,
      //los mis :3
      pomarrosa: colors.pomarrosa,
      cuero: colors.cuero,
      hueso: colors.hueso,
      vino: colors.vino,
      tan: colors.tan,
    }

    


  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
    // ...
  ],
}
