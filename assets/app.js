// import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */

import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.css';


import './theme.scss'

import './styles/app.css';

const footer = document.querySelector('footer');

if (document.body.scrollHeight<window.innerHeight)
    {
        footer.className+=" footer";
    }else{
        footer.className="container-fluid";
    }

window.addEventListener('resize', () => {

if (document.body.scrollHeight<window.innerHeight)
{
    footer.className+=" footer";
}else{
    footer.className="container-fluid";
}
});
console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
