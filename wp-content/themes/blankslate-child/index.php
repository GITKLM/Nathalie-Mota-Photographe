<?php
get_header();
?>

<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="GET">
    <select name="category">
        <option value="">CATÉGORIES</option>
        <?php
        // Récupérer toutes les catégories de votre taxonomie "catégorie"
        $categories = get_terms( 'categorie' );
        foreach ( $categories as $category ) {
            echo '<option value="' . esc_attr( $category->slug ) . '">' . esc_html( $category->name ) . '</option>';
        }
        ?>
    </select>
    <select name="format">
        <option value="">FORMATS</option>
        <?php
        // Récupérer toutes les options de votre champ personnalisé "format" ACF
        $formats = get_field_object( 'format', 'option' );
        foreach ( $formats['choices'] as $value => $label ) {
            echo '<option value="' . esc_attr( $value ) . '">' . esc_html( $label ) . '</option>';
        }
        ?>
    </select>
    <select name="type_reference">
        <option value="">TRIER PAR</option>
        <?php
        // Récupérer tous les termes des taxonomies "type" et "référence"
        $types = get_terms( array(
            'taxonomy' => array( 'type', 'reference' ),
            'hide_empty' => true,
        ) );
        foreach ( $types as $type ) {
            echo '<option value="' . esc_attr( $type->slug ) . '">' . esc_html( $type->name ) . '</option>';
        }
        ?>
    </select>
    <!-- <button type="submit">Filtrer</button> -->
</form>

<div class="thumbnails-container">
    <div class="row">
        <?php
        $args = array(
            'post_type' => 'photo', // Votre type de contenu personnalisé
            'posts_per_page' => -1, // Afficher tous les éléments
        );

        // Récupérer les éléments en fonction des paramètres de requête
        $photos_query = new WP_Query( $args );

        // Afficher les éléments récupérés
        if ( $photos_query->have_posts() ) :
            $count = 0;
            while ( $photos_query->have_posts() ) : $photos_query->the_post();
                // Afficher le thumbnail de chaque article
                if ($count % 2 === 0) {
                    echo '</div><div class="row">';
                }
                ?>
                <div class="column">
                    <?php
                    the_post_thumbnail(
                        array(564, 495),
                        array('class' => 'custom-thumbnail')
                    );
                    ?>
                </div>
                <?php
                $count++;
            endwhile;
            wp_reset_postdata(); // Réinitialiser les données de publication
        else :
            echo 'Aucun élément trouvé.';
        endif;
        ?>
    </div>
</div>

<?php
get_footer();
?>
