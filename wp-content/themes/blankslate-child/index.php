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
        // Récupérer toutes les options de votre champ personnalisé "format" ACF
        $formats = get_field_object( 'format' );
        foreach ( $formats['choices'] as $value => $label ) {
            echo '<option value="' . esc_attr( $value ) . '">' . esc_html( $label ) . '</option>';
        }
        ?>
    </select>
    <select name="type_reference" class="right-select">
    <option value="">TRIER PAR</option>
    <?php
    // Récupérer tous les posts triés par date
    $args = array(
        'post_type' => 'post', // Remplacez "post" par le type de post que vous souhaitez trier
        'orderby' => 'date',
        'order' => 'DESC', // Vous pouvez changer pour 'ASC' si vous voulez trier par ordre ascendant
        'posts_per_page' => -1, // Récupérer tous les posts, vous pouvez ajuster ce nombre selon vos besoins
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) :
            $query->the_post();
            echo '<option value="' . esc_attr( get_the_ID() ) . '">' . esc_html( get_the_title() ) . ' - ' . esc_html( get_the_date() ) . '</option>';
        endwhile;
        
        wp_reset_postdata();
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
    <button id="load-more">Charger plus</button>
</div>
</div>
<?php
get_footer();
?>
