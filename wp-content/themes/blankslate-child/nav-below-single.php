<?php $args = array(
'prev_text' => '<span class="meta-nav"><img src="' . esc_url( get_stylesheet_directory_uri() ) . '/images/Line 6.png" alt=""></span>',
'next_text' => '<span class="meta-nav"><img src="' . esc_url( get_stylesheet_directory_uri() ) . '/images/Line 7.png" alt=""></span>'
);
the_post_navigation( $args );