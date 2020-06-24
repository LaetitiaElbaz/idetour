/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.css';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
import $ from 'jquery';

// const $ = require('jquery');

// create global $ and jQuery variables
global.$ = global.jQuery = $;

// require('bootstrap');

console.log('Hello Webpack Encore !');

/**
 * Listen to when we change the value of one field : area or department
 */
$(document).on('change','#home_area', '#home_department', function(){
    // Get the field modified
    let $field = $(this);
    console.log($field);
    // Get the closest form
    let $form = $field.closest('form')
    // Prepare the data to send
    // console.log($field, $form);
    debugger
    let data = {}
    /**
     * Key = Value 
     * Field's name on which we clicked on : $field.attr('name')
     * Field's value on which we clicked on : $field.val()
     */
    data[$field.attr('name')] = $field.val()
    /**
     * Give the information to the system
     * URL : $form.attr('action')
     * data : data
     * action to do when it get the information
     */
    $.post($form.attr('action'), data).then(function (data) {
        let $input = $(data).find('#home_department.form-control')
        $('#home_department.form-control').replaceWith($input)
    })

})

