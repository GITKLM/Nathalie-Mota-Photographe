<?php
// Affichage personnalisé pour les articles individuels
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('flex-container'); ?>>
    <header class="entry-header flex-item">
        <h2 class="entry-title"><?php the_title(); ?></h2>
        <div class="entry-meta">
        <p>REFERENCE: <?php echo get_post_meta( get_the_ID(), 'reference', true ); ?></p>
            <p>CATEGORIE: <?php echo get_the_category_list( ', ' ); ?></p>
            <p>FORMAT: <?php echo get_post_format( get_the_ID() ); ?></p>
            <p>TYPE: <?php echo get_post_type( get_the_ID() ); ?></p>
            <p>ANNEE: <?php echo get_post_meta( get_the_ID(), 'annee', true ); ?></p>
            <img src="<?php echo get_stylesheet_directory_uri() . '/images/Line 3.png'; ?>" alt="petite ligne">
            <div class="contact-container">
                <p>Cette photo vous intéresse ?</p>
                <button id="btnContact">CONTACT</button>
            </div>
            <!-- <span class="posted-on"><?php echo get_the_date(); ?></span>
            <span class="byline"><?php esc_html_e( 'by', 'text-domain' ); ?> <?php the_author(); ?></span> -->
        </div>
    </header><!-- .entry-header -->

    <div class="entry-content flex-item">
        <?php the_content(); ?>
    </div><!-- .entry-content -->

    <?php if ( comments_open() && ! post_password_required() ) : ?>
        <div class="comments-area">
            <?php comments_template(); ?>
        </div><!-- .comments-area -->
    <?php endif; ?>


</article><!-- #post-<?php the_ID(); ?> -->
<footer class="footer">
    <?php get_template_part( 'nav', 'below-single' ); ?>
</footer>
<?php get_footer(); ?>