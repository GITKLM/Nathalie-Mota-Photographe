<?php


/* CSS */



/* REF PHOTOS MODALE */



/* TEST FLECHES */








/* TRIER */
// Charger AJAX
// Enregistrer et localiser le script JavaScript
add_action('wp_enqueue_scripts', 'add_custom_scripts');

function add_custom_scripts() {
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/script.js', array('jquery'), null, true);
    wp_localize_script('custom-script', 'custom_ajax', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}

// Action pour filtrer les photos via Ajax
add_action('wp_ajax_filter_photos', 'filter_photos');
add_action('wp_ajax_nopriv_filter_photos', 'filter_photos');

function filter_photos() {
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $format = isset($_POST['format']) ? $_POST['format'] : '';
    $type_reference = isset($_POST['type_reference']) ? $_POST['type_reference'] : '';

    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => -1,
    );

    if (!empty($category)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'categorie',
            'field' => 'slug',
            'terms' => $category,
        );
    }

    if (!empty($format)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field' => 'slug',
            'terms' => $format,
        );
    }

    if (!empty($type_reference)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'annee',
            'field' => 'slug',
            'terms' => $type_reference,
        );
    }

    $photos_query = new WP_Query($args);

    ob_start();
    if ($photos_query->have_posts()) :
        while ($photos_query->have_posts()) : $photos_query->the_post();
            ?>
            <div class="column">
                <div class="thumbnail-container">
                    <?php
                    the_post_thumbnail(
                        array(564, 495),
                        array('class' => 'custom-thumbnail')
                    );
                    ?>
                    <img class="top-image openModalImage" src="<?php echo get_stylesheet_directory_uri() . '/images/Icon_fullscreen.png'; ?>" alt="fullscreen">
                    <div class="thumbnail-title" style="display: none;">
                        <p><?php the_title(); ?></p>
                        <?php
                        $categories = get_the_terms(get_the_ID(), 'categorie');
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
        echo 'Aucun élément trouvé.';
    endif;
    $content = ob_get_clean();

    echo $content;

    wp_die();
}

// Action pour charger plus de miniatures via Ajax
add_action('wp_ajax_load_more_thumbnails', 'load_more_thumbnails');
add_action('wp_ajax_nopriv_load_more_thumbnails', 'load_more_thumbnails');

function load_more_thumbnails() {
    $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'offset' => $offset,
    );

    $photos_query = new WP_Query($args);

    ob_start();

    if ($photos_query->have_posts()) :
        while ($photos_query->have_posts()) : $photos_query->the_post();
            $categories = get_the_terms(get_the_ID(), 'categorie');
            ?>
            <div class="column">
                <div class="thumbnail-container">
                    <?php
                    the_post_thumbnail(
                        array(564, 495),
                        array('class' => 'custom-thumbnail')
                    );
                    ?>
                    <img class="top-image openModalImage" src="<?php echo get_stylesheet_directory_uri() . '/images/Icon_fullscreen.png'; ?>" alt="fullscreen">
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
        echo 'end';
    endif;

    $response = ob_get_clean();
    echo $response;

    wp_die();
}




// nav article





?>





