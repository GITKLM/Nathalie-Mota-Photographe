<?php
// Affichage personnalisé pour les articles individuels
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="entry-meta">
            <span class="posted-on"><?php echo get_the_date(); ?></span>
            <span class="byline"><?php esc_html_e( 'by', 'text-domain' ); ?> <?php the_author(); ?></span>
        </div>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php the_content(); ?>
    </div><!-- .entry-content -->

    <?php if ( comments_open() && ! post_password_required() ) : ?>
        <div class="comments-area">
            <?php comments_template(); ?>
        </div><!-- .comments-area -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
