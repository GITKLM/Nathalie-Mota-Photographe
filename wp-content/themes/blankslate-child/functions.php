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
// add_action('wp_enqueue_scripts', 'my_enqueue_scripts');

// function my_enqueue_scripts() {
//     wp_enqueue_script('my-custom-script', get_template_directory_uri() . '/script.js', array('jquery'), null, true);
//     wp_localize_script('my-custom-script', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
// }


/* CHARGER + */
// Ajoutez cela dans votre fichier functions.php ou un plugin
function enqueue_custom_scripts() {
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/script.js', array('jquery'), null, true);
    wp_localize_script('custom-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');



add_action('wp_ajax_load_more_photos', 'load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos');

function load_more_photos() {
    $page = $_POST['page'];
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'paged' => $page
    );
    $photos_query = new WP_Query($args);
    
    if ($photos_query->have_posts()) :
        while ($photos_query->have_posts()) : $photos_query->the_post();
            $categories = get_the_terms(get_the_ID(), 'categorie');
            ?>
            <div class="column">
                <div class="thumbnail-container">
                    <?php the_post_thumbnail(array(564, 495), array('class' => 'custom-thumbnail')); ?>
                    <img class="top-image" id="openModalImage" src="<?php echo get_stylesheet_directory_uri() . '/images/Icon_fullscreen.png'; ?>" alt="fullscreen">
                    <div class="thumbnail-title" style="display: none;">
                        <p><?php the_title(); ?></p>
                        <?php
                        if ($categories) {
                            echo '<ul class="categories-list">';
                            foreach ($categories as $category) {
                                echo '<li>' . $category->name . '</li>';
                            }
                            echo '</ul>';
                        }
                        ?>
                    </div>
                    <img class="centered-image" src="<?php echo get_stylesheet_directory_uri() . '/images/Icon_eye.png'; ?>" alt="oeil">
                </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo 'No more posts';
    endif;
    die();
}


?>