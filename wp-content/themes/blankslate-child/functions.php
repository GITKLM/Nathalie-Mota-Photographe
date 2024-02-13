<?php
function theme_enqueue_scripts() {
    // Enqueue du script JavaScript personnalisé
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/script.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
?>
