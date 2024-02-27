<?php
get_header();
?>
<div class="gallery-container">

<div class="select-box-container">
    <div class="select-box-left">
        <div class="select-box">
          <div class="select-box__current" tabindex="1">
            
            <div class="select-box__value">
              <input class="select-box__input" type="radio" id="0" value="1" name="category" checked>
              <p class="select-box__input-text">CATÉGORIES</p>
            </div>
            
            <?php
            $categories = get_terms('categorie');
            $index = 1;
            foreach ($categories as $category) {
                echo '
                <div class="select-box__value">
                  <input class="select-box__input" type="radio" id="' . $index . '" value="' . esc_attr($category->slug) . '" name="category">
                  <p class="select-box__input-text">' . esc_html($category->name) . '</p>
                </div>';
                $index++;
            }
            ?>
            <img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg" alt="Arrow Icon" aria-hidden="true">
          </div>
          <ul class="select-box__list">
            <li>
              <!-- <label class="select-box__option" for="0" aria-hidden>CATÉGORIES</label> -->
            </li>
            <?php
            $index = 1;
            foreach ($categories as $category) {
                echo '<li><label class="select-box__option" for="' . $index . '" aria-hidden>' . esc_html($category->name) . '</label></li>';
                $index++;
            }
            ?>
          </ul>
        </div>
        <div class="select-box">
            <div class="select-box__current" tabindex="1">
                <div class="select-box__value">
                    <input class="select-box__input" type="radio" id="format_all" value="" name="format" checked>
                    <p class="select-box__input-text">FORMATS</p>
                </div>
                
                <?php
                $formats = get_terms(array(
                    'taxonomy' => 'format',
                    'hide_empty' => false,
                ));
                $index = 1;
                foreach ($formats as $format) {
                    echo '
                    <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="format_' . $index . '" value="' . esc_attr($format->slug) . '" name="format">
                        <p class="select-box__input-text">' . esc_html($format->name) . '</p>
                    </div>';
                    $index++;
                }
                ?>
                <img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg" alt="Arrow Icon" aria-hidden="true">
            </div>
            <ul class="select-box__list">
                <li></li>
                <?php
                $index = 1;
                foreach ($formats as $format) {
                    echo '<li><label class="select-box__option" for="format_' . $index . '" aria-hidden>' . esc_html($format->name) . '</label></li>';
                    $index++;
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="select-box-right">
        <div class="select-box">
                <div class="select-box__current" tabindex="1">
                    <div class="select-box__value">
                        <input class="select-box__input" type="radio" id="type_reference_all" value="" name="type_reference" checked>
                        <p class="select-box__input-text">TRIER PAR</p>
                    </div>
                    
                    <?php
                    $terms = get_terms(array(
                        'taxonomy' => 'annee',
                        'orderby' => 'name',
                        'order' => 'DESC',
                        'hide_empty' => false,
                    ));
                    $index = 1;
                    foreach ($terms as $term) {
                        echo '
                        <div class="select-box__value">
                            <input class="select-box__input" type="radio" id="type_reference_' . $index . '" value="' . esc_attr($term->slug) . '" name="type_reference">
                            <p class="select-box__input-text">' . esc_html($term->name) . '</p>
                        </div>';
                        $index++;
                    }
                    ?>
                    <img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg" alt="Arrow Icon" aria-hidden="true">
                </div>
                <ul class="select-box__list">
                    <li></li>
                    <?php
                    $index = 1;
                    foreach ($terms as $term) {
                        echo '<li><label class="select-box__option" for="type_reference_' . $index . '" aria-hidden>' . esc_html($term->name) . '</label></li>';
                        $index++;
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    

        <div class="thumbnails-container">

            <div class="row" id="image-row">
                <?php
                $args = array(
                    'post_type' => 'photo',
                    'posts_per_page' => 8,
                );
    
                // Ajouter la logique pour filtrer par taxonomie
                if (isset($_GET['category']) && $_GET['category'] != '') {
                    $args['tax_query'][] = array(
                        'taxonomy' => 'categorie',
                        'field' => 'slug',
                        'terms' => $_GET['category'],
                    );
                }
    
                if (isset($_GET['format']) && $_GET['format'] != '') {
                    $args['tax_query'][] = array(
                        'taxonomy' => 'format',
                        'field' => 'slug',
                        'terms' => $_GET['format'],
                    );
                }
    
                if (isset($_GET['type_reference']) && $_GET['type_reference'] != '') {
                    $args['tax_query'][] = array(
                        'taxonomy' => 'annee',
                        'field' => 'slug',
                        'terms' => $_GET['type_reference'],
                    );
                }
    
                // Récupérer les éléments en fonction des paramètres de requête
                $photos_query = new WP_Query($args);
    
                // Afficher les éléments récupérés
                if ($photos_query->have_posts()) :
                    while ($photos_query->have_posts()) : $photos_query->the_post();
                        // Récupérer les catégories associées à la photo
                        $categories = get_the_terms(get_the_ID(), 'categorie');
    
                        // Afficher le thumbnail de chaque article
                        ?>

                        
                        <div class="column">
                            <div class="thumbnail-container">
                                <?php
                                // Afficher le thumbnail
                                the_post_thumbnail(
                                    array(564, 495),
                                    array('class' => 'custom-thumbnail')
                                );
                                ?>
                                <img class="top-image" id="openModalImage" src="<?php echo get_stylesheet_directory_uri() . '/images/Icon_fullscreen.png'; ?>" alt="fullscreen">
                                <div class="thumbnail-title" style="display: none;">
                                    <p><?php the_title(); ?></p>
                                    <?php
                                    // Afficher les catégories
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
                    wp_reset_postdata(); // Réinitialiser les données de publication
                else :
                    echo 'Aucun élément trouvé.';
                endif;
                ?>

            </div>
            <div class="load-more-container">
                <button id="load-more">Charger plus</button>
            </div>
        </div>
<?php
get_footer();
?>
