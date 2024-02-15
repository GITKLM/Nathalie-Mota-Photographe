<?php
get_header();
?>
<div class="gallery-container">
<div class="select-container">
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="GET">
    <select name="category" class="left-select">
        <option value="">CATÉGORIES</option>
        <?php
        // Récupérer toutes les catégories de votre taxonomie "catégorie"
        $categories = get_terms( 'categorie' );
        foreach ( $categories as $category ) {
            echo '<option value="' . esc_attr( $category->slug ) . '">' . esc_html( $category->name ) . '</option>';
        }
        ?>
    </select>
<select name="format" class="left-select">
    <option value="">FORMATS</option>
    <?php
    // Récupérer toutes les catégories de votre taxonomie "format" (ou tout autre nom de taxonomie utilisé pour vos formats)
    $formats = get_terms( array(
        'taxonomy' => 'format', // Assurez-vous de spécifier le bon nom de la taxonomie ici
        'hide_empty' => false, // Afficher également les termes qui n'ont aucun contenu associé
    ) );
    foreach ( $formats as $format ) {
        echo '<option value="' . esc_attr( $format->slug ) . '">' . esc_html( $format->name ) . '</option>';
    }
    ?>
</select>

<select name="type_reference" class="right-select">
    <option value="">TRIER PAR</option>
    <?php
    // Récupérer tous les termes de votre taxonomie "annee"
    $terms = get_terms( array(
        'taxonomy' => 'annee', // Remplacez "annee" par le slug de votre taxonomie créée avec CPT UI
        'orderby' => 'name', // Vous pouvez changer l'ordre de tri si nécessaire
        'order' => 'DESC', // Vous pouvez changer pour 'ASC' si vous voulez trier par ordre ascendant
        'hide_empty' => false, // Afficher également les termes qui n'ont aucun contenu associé
    ) );
    if ( !empty( $terms ) && !is_wp_error( $terms ) ) :
        foreach ( $terms as $term ) :
            echo '<option value="' . esc_attr( $term->slug ) . '">' . esc_html( $term->name ) . '</option>';
        endforeach;
    endif;
    ?>
</select>


    <!-- <button type="submit">Filtrer</button> -->
</form>
</div>
<div class="thumbnails-container">
    <div class="row" id="image-row">
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
                    // Afficher le thumbnail
                    the_post_thumbnail(
                        array(564, 495),
                        array('class' => 'custom-thumbnail')
                    );
                    ?>
                    <div class="thumbnail-title">
                        <?php the_title(); ?>
                    </div>
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
    <button id="load-more">Charger plus</button>
</div>



</div>
<?php
get_footer();
?>
