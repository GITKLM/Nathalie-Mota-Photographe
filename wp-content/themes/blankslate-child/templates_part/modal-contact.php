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


<!-- La modal -->
<div id="myModal" class="modal">
  <!-- Contenu de la modal -->
  
  <div class="modal-content">
    <!-- Bouton pour fermer la modal -->
    <!-- <span class="close">&times;</span> -->
    <!-- ICI -->
    <img src="<?php echo get_stylesheet_directory_uri() . '/images/Contact header.png'; ?>" alt="">
    <!-- <img src="/images/Titre header.png" alt=""> -->
     <?php echo do_shortcode('[contact-form-7 id="23ee927" title="Formulaire-modale"]'); ?>
     
  </div>
</div>


</body>
</html>