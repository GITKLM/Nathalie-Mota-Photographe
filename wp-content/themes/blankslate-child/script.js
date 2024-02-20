/* MODALE */
jQuery(document).ready(function($) {
    var btnModal = $('#btnModal');
    var modal = $('#myModal');

    btnModal.on('click', function() {
        modal.css('display', 'block');
    });

    $(window).on('click', function(event) {
        if ($(event.target).is('#myModal')) {
            modal.css('display', 'none');
        }
    });

    // MODALE CONTACT CLIC
    $('#menu-item-136').on('click', function(event) {
        event.preventDefault();
        modal.css('display', 'block');
    });

});

  

/* REF PHOTO */
jQuery(document).ready(function($) {
    // Ajoute un gestionnaire d'événements pour afficher la modale lorsque vous cliquez sur un élément avec la classe modalBtn
    $('.modalBtn').on('click', function(event) {
        event.preventDefault(); // Empêche le comportement par défaut du lien
        
        // Récupérer les références de l'article
        var referencePhoto = reference_data.join(', ');
        
        // Remplir automatiquement le champ "RÉF. PHOTO" du formulaire Contact Form 7 avec les références récupérées
        $('#photo-reference').val(referencePhoto);
        
        // Afficher la modale
        $('#myModal').css('display', 'block');
    });
  
    // Ajoute un gestionnaire d'événements pour fermer la modale en cliquant en dehors de celle-ci
    $(window).on('click', function(event) {
        if ($(event.target).is('#myModal')) {
            $('#myModal').css('display', 'none');
        }
    });
});



/* FILTRE */
jQuery(document).ready(function($) {
  // Lorsqu'un élément de la liste est sélectionné
  $('.filter-select').change(function() {
      // Soumettre automatiquement le formulaire
      $('#filter-form').submit();
  });
});

/* TEST CHargement des images */



/* Nav article */



/* LightBox */
 document.addEventListener("DOMContentLoaded", function() {
     var openModalImage = document.getElementById("openModalImage");
     var moda = document.getElementById("myModa");

     openModalImage.addEventListener("click", function() {
         moda.style.display = "block";
     });

     var closeButton = moda.querySelector(".close");
     closeButton.addEventListener("click", function() {
         moda.style.display = "none";
     });
 });

/* OEIL */
document.addEventListener("DOMContentLoaded", function() {
    const centeredImage = document.querySelectorAll(".centered-image");
    const thumbnailTitle = document.querySelectorAll(".thumbnail-title");

    centeredImage.forEach(function(image, index) {
        image.addEventListener("click", function() {
            if (thumbnailTitle[index].style.display === "block") {
                thumbnailTitle[index].style.display = "none";
            } else {
                thumbnailTitle[index].style.display = "block";
                // Appliquer les styles CSS à thumbnail-title lors de son affichage
                thumbnailTitle[index].style.position = "absolute";
                thumbnailTitle[index].style.bottom = "0";
                thumbnailTitle[index].style.left = "0";
                thumbnailTitle[index].style.width = "92%";
                thumbnailTitle[index].style.height = "100%";
                thumbnailTitle[index].style.color = "#fff";
                thumbnailTitle[index].style.padding = "10px";
                thumbnailTitle[index].style.margin = "0";
                thumbnailTitle[index].style.opacity = "1";
                thumbnailTitle[index].style.transition = "opacity 0.3s ease";
                thumbnailTitle[index].style.display = "flex";
                thumbnailTitle[index].style.justifyContent = "space-between";
                thumbnailTitle[index].style.alignItems = "flex-end";
            }
        });
    });
});


/* CHARGEMENT SUPPLEMENTAIRE */
 

    




