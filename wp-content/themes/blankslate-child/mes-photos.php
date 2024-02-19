<?php
// Affichage personnalisé pour les articles individuels
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('flex-container'); ?>>
    <header class="entry-header flex-item">
        <h2 class="entry-title"><?php the_title(); ?></h2>
        <div class="entry-meta">
        <p>REFERENCE:
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

            <p>ANNEE: <?php $terms_annee = get_the_terms( get_the_ID(), 'annee' ); ?><?php echo join(', ', wp_list_pluck($terms_annee, 'name')); ?></p>
            <img src="<?php echo get_stylesheet_directory_uri() . '/images/Line 3.png'; ?>" alt="petite ligne">
            <div class="contact-container">
                <p>Cette photo vous intéresse ?</p>
                <button id="boutonModale" class="modalBtn">CONTACT</button>
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
        $prev_text = '<span class="meta-nav"><img src="' . esc_url( get_stylesheet_directory_uri() ) . '/images/Line 6.png" alt=""></span>';
        previous_post_link('%link', $prev_text);
        ?>
    </div>
    <div class="next-arrow">
        <?php
        $next_text = '<span class="meta-nav"><img src="' . esc_url( get_stylesheet_directory_uri() ) . '/images/Line 7.png" alt=""></span>';
        next_post_link('%link', $next_text);
        ?>
    </div>
</div>

            </div>
        </div>
    </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
<footer class="footer">
    <p>VOUS AIMEREZ AUSSI</p>
    <div class="autre-img-container">
        <div class="autre-img-1"></div>
        <div class="autre-img-2"></div>
        </div>
</footer>
<?php get_footer(); ?>