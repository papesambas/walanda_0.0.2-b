import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import '../assets/scripts/test.js';

import $ from 'jquery';


// things on "window" become global variables
//window.$ = $;
import './styles/app.css';

// require jQuery normally
//const $ = require('jquery');

// create global $ and jQuery variables
// global.$ = global.jQuery = $;

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
