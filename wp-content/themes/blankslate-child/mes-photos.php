<?php
// Affichage personnalisé pour les articles individuels
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('flex-container'); ?>>
    <header class="entry-header flex-item">
        <h2 class="entry-title"><?php the_title(); ?></h2>
        <div class="entry-meta">
        <p>RÉFÉRENCE:
            <?php 
            $references = get_the_terms( get_the_ID(), 'reference' );
            if ( $references && ! is_wp_error( $references ) ) {
                $reference_names = array();
                foreach ($references as $reference) {
                    $reference_names[] = $reference->name;
                }
                echo join(', ', $reference_names);
            }
            ?>
            </p>

            <?php
            // Récupérer les termes de la taxonomie 'categorie' associés à cet article
            $terms_categorie = get_the_terms( get_the_ID(), 'categorie' );

            // Vérifier s'il y a des termes et les afficher le cas échéant
            if ( $terms_categorie && ! is_wp_error( $terms_categorie ) ) {
                $term_names_categorie = array();

                foreach ( $terms_categorie as $term ) {
                    $term_names_categorie[] = $term->name;
                }

                // Afficher les termes séparés par une virgule
                $term_list_categorie = join( ', ', $term_names_categorie );
                echo '<p>CATEGORIE: ' . $term_list_categorie . '</p>';
            }
            ?>
            
            <p>FORMAT: <?php $terms_format = get_the_terms( get_the_ID(), 'format' ); ?><?php echo join(', ', wp_list_pluck($terms_format, 'name')); ?></p>

            
            <p>TYPE: 
            <?php 
            $types = get_the_terms( get_the_ID(), 'type2' );
            if ( $types && ! is_wp_error( $types ) ) {
                $type_names = array();
                foreach ($types as $type) {
                    $type_names[] = $type->name;
                }
                echo join(', ', $type_names);
            }
            ?>
            </p>

            <p>ANNÉE: <?php $terms_annee = get_the_terms( get_the_ID(), 'annee' ); ?><?php echo join(', ', wp_list_pluck($terms_annee, 'name')); ?></p>
            <img src="<?php echo get_stylesheet_directory_uri() . '/images/Line 3.png'; ?>" alt="petite ligne">
            <div class="contact-container">
                <p>Cette photo vous intéresse ?</p>
                <button id="boutonModale" class="modalBtn">Contact</button>
            </div>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div class="entry-content flex-item">
    <?php the_content(); ?>
        <div id="img-nav-container">
            <div id="img-nav">
                <div id="img-min">
                    
                </div>
                <div id="arrow-container">
                    <div class="prev-arrow">
                        <?php
                        $prev_post = get_previous_post();
                        if (!empty($prev_post)) :
                            $prev_post_id = $prev_post->ID;
                            $prev_img_url = get_the_post_thumbnail_url($prev_post_id);
                            previous_post_link('%link', '', true, '', 'type2');
                            echo '<a href="' . get_permalink($prev_post) . '" class="arrow-link prev-link zebi" data-id="' . $prev_post_id . '"><img src="' . esc_url($prev_img_url) . '" alt="" class="arrow-img prev-img"></a>';
                        endif;
                        ?>
                        <a href="<?php echo esc_url(get_permalink($prev_post)); ?>" class="arrow-link prev-link" data-id="<?php echo $prev_post_id; ?>"><img src="<?php echo esc_url(get_stylesheet_directory_uri()) . '/images/Line 6.png'; ?>" alt="" class="arrow-img-line prev-arrow-img"></a>
                    </div>
                    <div class="next-arrow">
                        <?php
                        $next_post = get_next_post();
                        if (!empty($next_post)) :
                            $next_post_id = $next_post->ID;
                            $next_img_url = get_the_post_thumbnail_url($next_post_id);
                            next_post_link('%link', '', true, '', 'type2');
                            echo '<a href="' . get_permalink($next_post) . '" class="arrow-link next-link zebi" data-id="' . $next_post_id . '"><img src="' . esc_url($next_img_url) . '" alt="" class="arrow-img next-img"></a>';
                        endif;
                        ?>
                        <a href="<?php echo esc_url(get_permalink($next_post)); ?>" class="arrow-link next-link" data-id="<?php echo $next_post_id; ?>"><img src="<?php echo esc_url(get_stylesheet_directory_uri()) . '/images/Line 7.png'; ?>" alt="" class="arrow-img-line next-arrow-img"></a>
                    </div>
                </div>





            </div>
        </div>
    </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
<footer class="footer">
    <p>VOUS AIMEREZ AUSSI</p>
    <div class="autre-img-container">
        <?php
        // Récupérer les ID des articles ayant la même catégorie que l'article actuel
        $current_post_id = get_the_ID();
        $current_post_categories = wp_get_post_terms($current_post_id, 'categorie', array('fields' => 'ids'));
        
        // Paramètres de la requête pour récupérer un autre article de la même catégorie
        $args = array(
            'post_type' => 'photo', // Remplacez "photo" par le nom de votre type de publication personnalisé
            'posts_per_page' => 2, // Modifier pour récupérer 2 articles au lieu de 1
            'post__not_in' => array($current_post_id),
            'tax_query' => array(
                array(
                    'taxonomy' => 'categorie',
                    'field' => 'id',
                    'terms' => $current_post_categories,
                ),
            ),
        );

        // Requête WP_Query
        $related_posts = new WP_Query($args);

        // Boucle pour afficher les images des articles retournés
        if ($related_posts->have_posts()) :
            while ($related_posts->have_posts()) : $related_posts->the_post();
        ?>
                <div class="autre-img autre-img-<?php echo ($related_posts->current_post == 0) ? '1' : '2'; ?>">
                    <div style="width: 564px; height: 495px; overflow: hidden;">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('full', array('style' => 'width: 100%; height: 100%;'));
                        } else {
                            echo 'Pas d\'image disponible';
                        }
                        ?>

                            <img class="top-image openModalImage" src="<?php echo get_stylesheet_directory_uri() . '/images/Icon_fullscreen.png'; ?>" alt="fullscreen">

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
            wp_reset_postdata(); // Réinitialiser les données post
        else :
            echo 'Aucun autre article trouvé.';
        endif;
        ?>

    </div>
</footer>
<?php
// Récupérer les références de l'article
$references = array();
$terms_references = get_the_terms(get_the_ID(), 'reference');
if ($terms_references && !is_wp_error($terms_references)) {
    foreach ($terms_references as $term_reference) {
        $references[] = $term_reference->name;
    }
}
?>

<script>
// Définir une variable JavaScript pour stocker les références
var reference_data = <?php echo json_encode($references); ?>;
</script>





<?php get_footer(); ?>