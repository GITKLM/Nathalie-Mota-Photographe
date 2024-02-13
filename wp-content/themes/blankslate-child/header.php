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
    <a href="#">
    <img src="<?php echo get_stylesheet_directory_uri() . '/images/Nathalie Mota.png'; ?>" alt="Logo" class="image-with-padding">
</a>
    </div>
    <nav>
      <ul>
        <li><a href="#">ACCUEIL</a></li>
        <li><a href="#">À PROPOS</a></li>
        <li><a href="#">CONTACT</a></li>
      </ul>
    </nav>
</div>
<div class="banner">
  <h1>PHOTOGRAPHE EVENT</h1>
</div>
</header>
<div id="container">
<main id="content" role="main">