import { transform } from '@vue/compiler-core';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        fontFamily:{
            Logo:['Great Vibes','cursive']
        },


        maxWidth:{
            'custom':'87rem'
          },
          boxShadow: {
            // 'custom':'rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px'
              'custom': 'rgba(0, 0, 0, 0.1) 0px 0px 5px 0px, rgba(0, 0, 0, 0.1) 0px 0px 1px 0px'
            },

        colors:{
            'main':'#2563EB',
            'link-color':'#1A2B48',
            Primary:'#443c3e'
        },
        keyframes:{
            fade: {
                '0%, 100%': { opacity: 0.8 }, // Start and end opacity
                to: { opacity: 1 } // Final opacity
              },
            ToUp:{
                'from': {transform:'TranslateY(50%)' ,opacity:0},
                'to':{transform :'TranslateY(0)',opacity:1}
            },
            ToDown:{
                'from': {transform:'TranslateY(-100%)' ,opacity:0},
                'to':{transform :'TranslateY(0)',opacity:1}
            },
            P_ToUp:{
                'from': {transform:'TranslateY(30%)' ,opacity:0.5},
                'to':{transform :'TranslateY(0)',opacity:1}
            },
            Button_ToUp:{
                'from': {transform:'TranslateY(100%)' ,opacity:0.5},
                'to':{transform :'TranslateY(0)',opacity:1}
            },
            MenuToRight:{
                'from':{transform:'TranslateX(-100%)' , opacity:0},
                'to':{transform:'TranslateX(0)',opacity:1}
            },
            ServicesToRight:{
                'from':{transform:'TranslateX(-50%)' , opacity:0.1},
                'to':{transform:'TranslateX(0)',opacity:1}
            },
            ServicesToLeft:{
                'from':{transform:'TranslateX(50%)' , opacity:0.1},
                'to':{transform:'TranslateX(0)',opacity:1}
            },
            ToLeft:{
                'from':{ transform:'translateX(100%)' , opacity:0},
                'to':{ transform:'TranslateX(0),',opacity:1}
            },
            DestToRight:{
                'from':{transform:'translateX(-30%)',opacity:0},
                'to':{transform:'TranslateX(0)',opacity:1}
            },
            DestToLeft:{
                'from':{transform:'translateX(30%)',opacity:0},
                'to':{transform:'TranslateX(0)',opacity:1}
            },
            ImageSTR:{
                'from':{transform:'TranslateX(-50%)',opacity:0.5},
                'to':{transform:'TranslateX(0)',opacity:1}
            },
            ImageMTR:{
                'from':{transform:'TranslateX(0%)',opacity:0.5},
                'to':{transform:'TranslateX(50%)',opacity:1}
            },
            imageScale:{
                'from':{transform:'scale(100%)'},
                'to':{transform:'scale(110%)'}
            },
              },
        animation:{
            imageScale: 'imageScale 8s linear infinite',
            ToUp:'ToUp 1s linear',
            ToDown:'ToDown 0.7s  ease-out',
            P_ToUp:'P_ToUp 1s  linear',
            Button_ToUp:'Button_ToUp 0.7s  ease-out',
            MenuToRight:'MenuToRight 0.3s  linear' ,
            ServicesToRight:'ServicesToRight 0.6s  ease-out',
            ServicesToLeft:'ServicesToLeft 0.6s  ease-out',
            ToLeft: 'ToLeft 0.3s  linear',
            DestToRight:'DestToRight 1s  linear',
            DestToLeft:'DestToLeft 1s  linear',
            ImageSTR:'ImageSTR 0.3s linear ',
            ImageMTR:'ImageMTR 0.3s linear',
        }
      },
    },
    plugins: [
        require('@tailwindcss/typography'),
    ],
  }
