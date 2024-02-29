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
    // Ajoutez un gestionnaire d'événements pour afficher la modale lorsque vous cliquez sur un élément avec la classe modalBtn
    $('.modalBtn').on('click', function(event) {
        event.preventDefault(); // Empêche le comportement par défaut du lien
        
        // Récupérer les références de l'article
        var referencePhoto = reference_data.join(', ');

        // Remplir automatiquement le champ "RÉF. PHOTO" du formulaire Contact Form 7 avec les références récupérées
        $('#photo-reference').val(referencePhoto);
        
        // Afficher la modale
        $('#myModal').css('display', 'block');
    });

    // Ajoutez un gestionnaire d'événements pour fermer la modale en cliquant en dehors de celle-ci
    $(window).on('click', function(event) {
        if ($(event.target).is('#myModal')) {
            $('#myModal').css('display', 'none');
        }
    });
});

// BURGER
document.getElementById('menu-toggle')
.addEventListener('click', function(){
  document.body.classList.toggle('nav-open');
});

// MENU DEROULANT

document.addEventListener("DOMContentLoaded", function() {
    var menuToggle = document.getElementById('menu-toggle');
    var dropdownMenu = document.querySelector('.dropdown-menu');
    var body = document.body;
  
    menuToggle.addEventListener('click', function() {
      dropdownMenu.classList.toggle('active');
  
      if (dropdownMenu.classList.contains('active')) {
        // Désactiver le défilement du corps lorsque le menu est ouvert
        body.style.overflow = 'hidden';
      } else {
        // Réactiver le défilement du corps lorsque le menu est fermé
        body.style.overflow = '';
      }
    });
  });
  



// nav article
jQuery(document).ready(function($) {
    $('.prev-arrow').hover(function() {
        var prevImgSrc = $('.prev-link').find('img').attr('src');
        $('#img-min').html('<img src="' + prevImgSrc + '" alt="Image précédente">');
    });

    $('.next-arrow').hover(function() {
        var nextImgSrc = $('.next-link').find('img').attr('src');
        $('#img-min').html('<img src="' + nextImgSrc + '" alt="Image suivante">');
    });
});




/* FILTRE */
jQuery(document).ready(function($) {
    // Fonction pour gérer les changements de sélection
    $('.select-box__input').change(function() {
        var category = $('input[name="category"]:checked').val();
        var format = $('input[name="format"]:checked').val();
        var type_reference = $('input[name="type_reference"]:checked').val();

        // Envoyer une requête Ajax à WordPress
        $.ajax({
            url: custom_ajax.ajaxurl, // Utilisation de custom_ajax.ajaxurl
            type: 'POST',
            data: {
                action: 'filter_photos', // Action à appeler dans votre fichier functions.php
                category: category,
                format: format,
                type_reference: type_reference,
            },
            success: function(response) {
                // Mettre à jour la section des photos avec la réponse
                $('.thumbnails-container .row').html(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});


/* LightBox */
document.addEventListener("DOMContentLoaded", function() {
    var moda = document.getElementById("myModa");
    var modalContent = moda.querySelector(".modal-conten");
    var modalImage = modalContent.querySelector(".img-lightBox img");
    var modalTitle = modalContent.querySelector(".lightBox-categories p:first-child");
    var modalCategory = modalContent.querySelector(".lightBox-categories p:last-child");
    var currentIndex = 0;

    function updateModalContent(index) {
        var openModalImages = document.querySelectorAll(".openModalImage"); // Déplacer la déclaration ici
        var thumbnailContainer = openModalImages[index].closest(".thumbnail-container");
        var thumbnailTitle = thumbnailContainer.querySelector(".thumbnail-title p").innerText;
        var thumbnailCategory = thumbnailContainer.querySelector(".categories-list li").innerText;

        // Récupérer l'URL de l'image de l'article photo
        var thumbnailImageSrc = thumbnailContainer.querySelector(".custom-thumbnail").getAttribute("src");

        modalImage.src = thumbnailImageSrc;
        modalTitle.innerText = thumbnailTitle;
        modalCategory.innerText = thumbnailCategory;
        currentIndex = index;
    }

    function showPreviousImage() {
        if (currentIndex > 0) {
            updateModalContent(currentIndex - 1);
        }
    }

    function showNextImage() {
        var openModalImages = document.querySelectorAll(".openModalImage"); // Déplacer la déclaration ici
        if (currentIndex < openModalImages.length - 1) {
            updateModalContent(currentIndex + 1);
        }
    }

    // Utilisation d'un événement délégué pour les éléments dynamiques
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('openModalImage')) {
            var openModalImages = document.querySelectorAll(".openModalImage"); // Déplacer la déclaration ici
            var index = Array.from(openModalImages).indexOf(event.target);
            updateModalContent(index);
            moda.style.display = "block";
        }
    });

    var prevButton = moda.querySelector(".prev-ar");
    var nextButton = moda.querySelector(".next-ar");

    prevButton.addEventListener("click", showPreviousImage);
    nextButton.addEventListener("click", showNextImage);

    var closeButton = moda.querySelector(".close");
    closeButton.addEventListener("click", function() {
        moda.style.display = "none";
    });
});



/* OEIL ouvrir */

    document.addEventListener("DOMContentLoaded", function() {
        // Sélectionnez tous les éléments avec la classe "centered-image"
        var centeredImages = document.querySelectorAll('.centered-image');

        // Parcourez tous les éléments sélectionnés
        centeredImages.forEach(function(image) {
            // Ajoutez un écouteur d'événements de clic à chaque élément
            image.addEventListener('click', function() {
                // Obtenez l'URL de l'article associé en remontant dans la structure DOM
                var articleURL = this.closest('.thumbnail-container, .autre-img').querySelector('.top-image').getAttribute('href');
                
                // Redirigez l'utilisateur vers l'URL de l'article
                window.location.href = articleURL;
            });
        });
    });
    
/* TEST TRI  */


  
/* CHARGEMENT SUPPLEMENTAIRE */

jQuery(document).ready(function($) {
    var offset = 8; // Offset initial

    $('#load-more').on('click', function() {
        $.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                action: 'load_more_thumbnails', // Action WordPress AJAX
                offset: offset, // Offset pour la requête
            },
            success: function(response) {
                if (response != 'end') {
                    $('#image-row').append(response); // Ajouter les miniatures à la fin de la rangée
                    offset += 8; // Mettre à jour l'offset
                } else {
                    $('#load-more').css('background-color', 'blue'); // Changer la couleur de fond du bouton
                    $('#load-more').prop('disabled', true); // Désactiver le bouton
                }
            }
        });
    });
});




