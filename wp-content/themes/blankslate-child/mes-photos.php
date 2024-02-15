<?php
/*
Template Name: Mes Photos
*/
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="entry-content">
            <?php the_content(); ?>
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </div><!-- .entry-content -->

        <?php if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif; ?>
    </article><!-- #post-<?php the_ID(); ?> -->
<?php endwhile; endif; ?>

<footer class="footer">
    <?php get_template_part( 'nav', 'below-single' ); ?>
</footer>

<?php get_footer(); ?>
