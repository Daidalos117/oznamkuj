
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

var $ = require("jquery");
require('./bootstrap');
require('jquery-bar-rating');

require('jquery-bar-rating/dist/themes/bars-square.css');

require("components/school-detail.js");

$(function() {
    //must have for ajax
    $.ajaxSetup({
           headers: { 'X-CSRF-Token' : $('meta[name="_token"]').attr('content') }
       });

    
    

 
 });


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Example.vue'));
