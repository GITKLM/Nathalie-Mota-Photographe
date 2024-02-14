<?php
/*
Template Name: Formulaire
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>
<div id="myModal" class="modal">
  <div class="modal-content">
    <!-- Contenu de votre modale -->
    <span class="close">&times;</span>
    <img src="<?php echo get_stylesheet_directory_uri() . '/images/Contact header.png'; ?>" alt="contact-img" class="contact-img">
    <?php
// Incluez le fichier wp-load.php pour accéder aux fonctionnalités de WordPress
include_once("wp-load.php");

// Utilisez la fonction do_shortcode() pour ajouter le shortcode dans votre fichier .php
echo do_shortcode('[contact-form-7 id="23ee927" title="Formulaire-modale"]');
?>

    <p>Ca charge ??</p>
  </div>
</div>

</body>
</html>