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

<?php
$args = array(
    'post_type' => 'photo', // Votre type de contenu personnalisé
    'posts_per_page' => -1, // Afficher tous les éléments
);

// Vérifier si des filtres de catégorie et de format sont fournis dans l'URL
if ( isset( $_GET['category'] ) && ! empty( $_GET['category'] ) ) {
    $args['tax_query'][] = array(
        'taxonomy' => 'categorie',
        'field'    => 'slug',
        'terms'    => $_GET['category'],
    );
}
if ( isset( $_GET['format'] ) && ! empty( $_GET['format'] ) ) {
    $args['meta_query'][] = array(
        'key'   => 'format', // Clé du champ personnalisé "format" ACF
        'value' => $_GET['format'],
    );
}

// Récupérer les éléments en fonction des paramètres de requête
$photos_query = new WP_Query( $args );

// Afficher les éléments récupérés
if ( $photos_query->have_posts() ) :
    while ( $photos_query->have_posts() ) : $photos_query->the_post();
        // Afficher le contenu de chaque élément
        ?>
        <div class="photo">
            <h2><?php the_title(); ?></h2>
            <?php the_post_thumbnail(); ?>
            <div><?php the_content(); ?></div>
            <?php
            // Afficher la valeur du champ personnalisé "type" ACF
            $type = get_field( 'type' );
            if ( $type ) {
                echo '<p>Type: ' . esc_html( $type ) . '</p>';
            }
            ?>
            <?php
            // Afficher la valeur du champ personnalisé "référence" ACF
            $reference = get_field( 'reference' );
            if ( $reference ) {
                echo '<p>Référence: ' . esc_html( $reference ) . '</p>';
            }
            ?>
        </div>
        <?php
    endwhile;
    wp_reset_postdata(); // Réinitialiser les données de publication
else :
    echo 'Aucun élément trouvé.';
endif;
?>

<?php
get_footer();
?>
