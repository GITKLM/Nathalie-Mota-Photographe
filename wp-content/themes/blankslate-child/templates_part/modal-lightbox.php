<?php
/*
Template Name: Lightbox
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <title>Lightbox</title>
</head>
<body>

<!-- La modal -->
<div id="myModa" class="moda">
  <!-- Contenu de la modal -->
  
  <div class="modal-conten">
    
    <!-- Bouton pour fermer la modal -->
    <span class="close">&times;</span>
  <div class="lightBox-container">
    <div class="prev-ar">
      <img src="<?php echo get_stylesheet_directory_uri() . '/images/left_white.png'; ?>" alt=""><p>Précédente</p>
    </div>

      <div class="img-lightBox">
      <img src="" alt="Thumbnail">
      </div>
      <div class="lightBox-categories">
          <p>Titre</p>
          <p>Categorie</p>
        </div>

   

    <div class="next-ar">
      <p>Suivante</p><img src="<?php echo get_stylesheet_directory_uri() . '/images/right_white.png'; ?>" alt="">
    </div>
  </div>
     
  </div>
</div>

</body>
</html>

