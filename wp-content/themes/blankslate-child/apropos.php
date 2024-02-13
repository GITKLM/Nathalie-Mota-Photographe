<?php
/*
Template Name: A propos
*/
?>

<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h2 class="entry-title"><?php the_title(); ?></h2>
            </header>
            <div class="entry-content">
        <p></p>
            </div>
        </article>
    </main>
</div>

<?php get_footer(); ?>
