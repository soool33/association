/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.scss');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
 const $ = require('jquery');

console.log('Hello Webpack Encore! Edit me in assets/js/app.js');

$(document).ready(function(){

    $(".menu-icon").on("click",function() {
        $("nav ul").toggleClass("showing");
    });


    $(window).on("scroll",function(){
        if ($(window).scrollTop()) {
            $('nav').addClass('darkblue');
            $('nav ul li a').addClass('blueman');
        } else {
            $('nav').removeClass('darkblue');
            $('nav ul li a').removeClass('blueman');
        }
    });


    $(".arrow a").on('click', function(event) {

        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function() {
                window.location.hash = hash;
            });
        }
    });


    $(".arrow a").on('click', function(event) {
        if ((".arrow a").onClick()) {
            (".arrow a").addClass('.aaa');
        }
    });

});