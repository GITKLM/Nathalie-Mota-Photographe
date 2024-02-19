<?php


/* CSS */
function ajouter_css() {
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'ajouter_css');


/* JS */
function theme_enqueue_scripts() {
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/script.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');


/* REF PHOTOS MODALE */
// Enqueue le script JavaScript
function enqueue_custom_script() {
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/script.js', array('jquery'), null, true);

    // Récupérer les références de l'article
    $references = get_the_terms(get_the_ID(), 'reference');
    $reference_names = array();
    if ($references && !is_wp_error($references)) {
        foreach ($references as $reference) {
            $reference_names[] = $reference->name;
        }
    }
    // Passer les références à JavaScript
    wp_localize_script('custom-script', 'reference_data', $reference_names);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_script');



/* TEST FLECHES */


?>