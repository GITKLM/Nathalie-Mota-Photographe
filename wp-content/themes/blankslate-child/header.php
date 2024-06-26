<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="wrapper" class="hfeed">

<header id="header" role="banner">
<div id="branding">
<div id="site-title" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
<?php
if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; }
echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '" rel="home" itemprop="url"><span itemprop="name">' . esc_html( get_bloginfo( 'name' ) ) . '</span></a>';
if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; }
?>
</div>
<div id="site-description"<?php if ( !is_single() ) { echo ' itemprop="description"'; } ?>><?php bloginfo( 'description' ); ?></div>
</div>
<div class="container">
    <div class="logo">
    <a href="<?php echo esc_url(home_url('/')); ?>">
    <img src="<?php echo get_stylesheet_directory_uri() . '/images/Nathalie Mota.png'; ?>" alt="Logo" class="image-with-padding">
    </a>
    </div>
    <nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'link_before' => '<span itemprop="name">', 'link_after' => '</span>' ) ); ?>
<div class="burger-container">
  <a id="menu-toggle" class="menu-toggle">
    <span class="menu-toggle-bar menu-toggle-bar--top"></span>
    <span class="menu-toggle-bar menu-toggle-bar--middle"></span>
    <span class="menu-toggle-bar menu-toggle-bar--bottom"></span>
  </a>

</div>
</nav>
</div>

<div class="banner-container">
  <?php
  if (!is_single()) :
      $random_image_dir = get_stylesheet_directory() . '/images/random/';
      $random_images = glob($random_image_dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
      $random_image = $random_images[array_rand($random_images)];
  ?>
<?php if (!is_single()) : ?>
<div class="banner">
    <img src="<?php echo get_stylesheet_directory_uri() . '/images/random/' . basename($random_image); ?>" alt="Background Image" class="background-image">
    <div class="logo-container">
        <img src="<?php echo get_stylesheet_directory_uri() . '/images/Titre header.png'; ?>" alt="Logo" class="my-logo">
    </div>
</div>
<?php endif; ?>

  <?php endif; ?>

</div>

</header>
<div class="dropdown-menu">
    <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'link_before' => '<span class="menu-burger-nav" itemprop="name">', 'link_after' => '</span>' ) ); ?>
</div>
<div id="container">
<main id="content" role="main">