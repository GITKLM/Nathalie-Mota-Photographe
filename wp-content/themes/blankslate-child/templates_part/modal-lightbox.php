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
<div id="myModa" class="moda">

  <div class="modal-conten">
    
    <span class="close">&times;</span>
  <div class="lightBox-container">
  <div class="prev-ar" id="prevArrow">
      <img src="<?php echo get_stylesheet_directory_uri() . '/images/left_white.png'; ?>" alt=""><p>Précédente</p>
   </div>
<div class="test">
  <div class="img-lightBox">
  <img src="" alt="Thumbnail">
  </div>
  <div class="lightBox-categories">
      <p>Titre</p>
      <p>Categorie</p>
    </div>
</div>
<div class="next-ar" id="nextArrow">
<p>Suivante</p><img src="<?php echo get_stylesheet_directory_uri() . '/images/right_white.png'; ?>" alt="">
    </div>
  </div>
     
  </div>
</div>
</body>
</html>

