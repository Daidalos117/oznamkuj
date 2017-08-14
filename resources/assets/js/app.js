
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// js includes
var $ = require("jquery");
require('./bootstrap');
require('jquery-bar-rating');
require('bootstrap-select');

//css includes
require('jquery-bar-rating/dist/themes/bars-square.css');
require('jquery-bar-rating/dist/themes/css-stars.css');


//components
require('./components/rating.js');
require('./components/filters.js');

$(function() {
    //must have for ajax
    $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name="_token"]').attr('content') }
       });

    $(".js-search-toggle").on("click", function (e) {
        e.preventDefault();
        $(".search-bar").toggleClass("shown");
    });

    $(".js-ajaxify-me").on('submit', function (event) {
        event.preventDefault();
        var $this = $(this);
        var data = $this.serialize();
        data._token = $this.find('input[name=_token]');
        $.ajax({
            type: "POST",
            url: $this.data("url"),
            data:data,
            cache: false,
            success: function(data) {
                if($this.data("replace")) {
                     $($this.data("replace")).html( data.html );
                }
            },
            error: function(data) {

            }
        })
    })


    

 
 });


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Example.vue'));
