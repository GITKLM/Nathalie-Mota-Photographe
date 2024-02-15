<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php //ajout du template qui gère les articles
    get_template_part( 'mes-photos' ); ?>
<?php endwhile; endif; ?>
<footer class="footer">
    <?php get_template_part( 'nav', 'below-single' ); ?>
</footer>
<?php get_footer(); ?>
