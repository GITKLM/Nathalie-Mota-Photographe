
<article id="post-<?php the_ID(); ?>" <?php post_class('flex-container'); ?>>
    <header class="entry-header flex-item">
        <h2 class="entry-title"><?php the_title(); ?></h2>
        <div class="entry-meta">
            <p class="">RÉFÉRENCE:
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
          
            $terms_categorie = get_the_terms( get_the_ID(), 'categorie' );
            if ( $terms_categorie && ! is_wp_error( $terms_categorie ) ) {
                $term_names_categorie = array();

                foreach ( $terms_categorie as $term ) {
                    $term_names_categorie[] = $term->name;
                }

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
            <div class="lignes">
            <img id="grande-ligne" src="<?php echo get_stylesheet_directory_uri() . '/images/Line 4.png'; ?>" alt="grande ligne">
            <img id="petite-ligne"src="<?php echo get_stylesheet_directory_uri() . '/images/Line 3.png'; ?>" alt="petite ligne">
            </div>
            <div class="contact-container">
                <p>Cette photo vous intéresse ?</p>
                <button id="boutonModale" class="modalBtn">Contact</button>
            </div>
        </div>
    </header>

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
                            echo '<a href="' . get_permalink($prev_post) . '" class="arrow-link prev-link mon-image" data-id="' . $prev_post_id . '"><img src="' . esc_url($prev_img_url) . '" alt="" class="arrow-img prev-img"></a>';
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
                            echo '<a href="' . get_permalink($next_post) . '" class="arrow-link next-link mon-image" data-id="' . $next_post_id . '"><img src="' . esc_url($next_img_url) . '" alt="" class="arrow-img next-img"></a>';
                        endif;
                        ?>
                        <a href="<?php echo esc_url(get_permalink($next_post)); ?>" class="arrow-link next-link" data-id="<?php echo $next_post_id; ?>"><img src="<?php echo esc_url(get_stylesheet_directory_uri()) . '/images/Line 7.png'; ?>" alt="" class="arrow-img-line next-arrow-img"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->
<footer class="footer">
    <p>VOUS AIMEREZ AUSSI</p>
    <div class="autre-img-container">
        <?php
        $current_post_id = get_the_ID();
        $current_post_categories = wp_get_post_terms($current_post_id, 'categorie', array('fields' => 'ids'));
        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => 2,
            'post__not_in' => array($current_post_id),
            'tax_query' => array(
                array(
                    'taxonomy' => 'categorie',
                    'field' => 'id',
                    'terms' => $current_post_categories,
                ),
            ),
        );
        $related_posts = new WP_Query($args);
        if ($related_posts->have_posts()) :
            while ($related_posts->have_posts()) : $related_posts->the_post();
                ?>
                <div class="thumbnail-container autre-img autre-img-<?php echo ($related_posts->current_post == 0) ? '1' : '2'; ?>">
                    <div style="overflow: hidden;">
                    <?php
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('full', array('class' => 'custom-thumbnail', 'id' => 'id-thumbnail', 'style' => 'width: 100%; height: 100%;'));
                    } else {
                        echo 'Pas d\'image disponible';
                    }
                    ?>
                    <div class="thumbnail-title">
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
                        <img class="top-image openModalImage" src="<?php echo get_stylesheet_directory_uri() . '/images/Icon_fullscreen.png'; ?>" alt="fullscreen">

                                <a href="<?php the_permalink(); ?>" class="centered-image-link">
                        <img class="centered-image" src="<?php echo get_stylesheet_directory_uri() . '/images/Icon_eye.png'; ?>" alt="oeil">
                        </a>
                    
                    </div>
            </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo 'Aucun autre article trouvé.';
        endif;
        ?>

    </div>
</footer>
<?php

$references = array();
$terms_references = get_the_terms(get_the_ID(), 'reference');
if ($terms_references && !is_wp_error($terms_references)) {
    foreach ($terms_references as $term_reference) {
        $references[] = $term_reference->name;
    }
}
?>

<script>
var reference_data = <?php echo json_encode($references); ?>;

</script>

<?php get_footer(); ?>