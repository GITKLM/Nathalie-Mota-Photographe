<?php
/*
Template Name: Formulaire
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>
<body>
<div id="myModal" class="modal">

  
  <div class="modal-content">
    <img src="<?php echo get_stylesheet_directory_uri() . '/images/Contact header.png'; ?>" alt="">
     <?php echo do_shortcode('[contact-form-7 id="23ee927" title="Formulaire-modale"]'); ?>  
  </div>
</div>
</body>
</html>
