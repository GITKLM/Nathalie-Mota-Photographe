
/* MODALE */
document.addEventListener("DOMContentLoaded", function() {
  // Récupérer le bouton et la modale
  var btnModal = document.getElementById("btnModal");
  var modal = document.getElementById("myModal");

  // Ajouter un gestionnaire d'événement de clic au bouton
  btnModal.addEventListener("click", function() {
      // Afficher la modale
      modal.style.display = "block";
  });

  // Ajouter un gestionnaire d'événement pour fermer la modale en cliquant en dehors de celle-ci
  window.addEventListener("click", function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  });
});


/* MODALE CONTACT CLIC */
jQuery(document).ready(function($) {
    // Ajoute un gestionnaire d'événements au clic sur l'élément de menu "Contact"
    $('#menu-item-136').on('click', function(event) {
        event.preventDefault(); // Empêche le comportement par défaut du lien
  
        // Affiche la modale
        $('#myModal').css('display', 'block');
    });
  
    // Ajoute un gestionnaire d'événements pour fermer la modale en cliquant en dehors de celle-ci
    $(window).on('click', function(event) {
        if ($(event.target).is('#myModal')) {
            $('#myModal').css('display', 'none');
        }
    });
  
    // Ajoute un gestionnaire d'événements pour afficher la modale lorsque vous cliquez sur un élément avec la classe modalBtn
    $('.modalBtn').on('click', function(event) {
        event.preventDefault(); // Empêche le comportement par défaut du lien
        $('#myModal').css('display', 'block');
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

// document.addEventListener('DOMContentLoaded', function() {
//   const imageRow = document.getElementById('image-row');
//   const loadMoreButton = document.getElementById('load-more');
//   const maxImagesPerPage = 8;
//   let loadedImages = 0;

//   function loadMoreImages() {
//       const imagesToLoad = 8;
//       for (let i = 0; i < imagesToLoad; i++) {
//           if (loadedImages >= maxImagesPerPage) return;
//           const imageContainer = document.createElement('div');
//           imageContainer.classList.add('column');
//           const image = document.createElement('img');
//           image.src = 'URL_DE_L_IMAGE';
//           image.alt = 'Description de l\'image';
//           imageContainer.appendChild(image);
//           imageRow.appendChild(imageContainer);
//           loadedImages++;
//       }
//   }

//   loadMoreButton.addEventListener('click', function() {
//       loadMoreImages();
//   });

//   loadMoreImages();
// });


/* Nav article */



/* LightBox */
document.addEventListener("DOMContentLoaded", function() {
    // Récupérer l'image et la modale
    var openModalImage = document.getElementById("openModalImage");
    var moda = document.getElementById("myModa");

    // Ajouter un gestionnaire d'événement de clic à l'image
    openModalImage.addEventListener("click", function() {
        // Afficher la modale
        moda.style.display = "block";
    });

    // Ajouter un gestionnaire d'événement de clic pour fermer la modale lorsque vous cliquez sur un élément avec la classe .close
    var closeButton = moda.querySelector(".close");
    closeButton.addEventListener("click", function() {
        // Cacher la modale
        moda.style.display = "none";
    });
});


