import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import "bootstrap";
import hljs from 'highlight.js/lib/core';
import javascript from 'highlight.js/lib/languages/javascript';
import $ from 'jquery';
// things on "window" become global variables
window.$ = $;
import 'select2';
//import 'select2/dist/css/select2.min.css';

hljs.registerLanguage('javascript', javascript);
hljs.highlightAll();

import '../assets/scripts/test.js';

// things on "window" become global variables
//window.$ = $;
import './styles/app.css';

// require jQuery normally
//const $ = require('jquery');

// create global $ and jQuery variables
// global.$ = global.jQuery = $;

console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
