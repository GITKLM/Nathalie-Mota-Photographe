<?php
/**
 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package blankslate-child
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

    </main><!-- #main -->
</div><!-- #primary -->

<footer class="footer">
    <?php get_template_part( 'nav', 'below-single' ); ?>
</footer>

<?php
get_footer();
