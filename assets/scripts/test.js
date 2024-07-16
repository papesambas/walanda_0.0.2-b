import $ from 'jquery';
$(document).ready(function() {
    alert('je suis prêt');
});

import canvasconfetti from 'canvas-confetti';

document.body.addEventListener('click', () => {
    canvasconfetti();
})