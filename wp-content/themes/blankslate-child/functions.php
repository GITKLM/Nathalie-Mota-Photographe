<?php


/* CSS */
function ajouter_css() {
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'ajouter_css');


/* JS */
function theme_enqueue_scripts() {
    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/script.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');


/* REF PHOTOS MODALE */



/* TEST FLECHES */




// Charger AJAX
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');

function my_enqueue_scripts() {
    wp_enqueue_script('my-custom-script', get_template_directory_uri() . '/script.js', array('jquery'), null, true);
    wp_localize_script('my-custom-script', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
}


/* CHARGER + */


?>