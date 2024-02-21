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
    // Fonction pour gérer les changements de sélection
    $('.select-container select').change(function() {
        var category = $('select[name="category"]').val();
        var format = $('select[name="format"]').val();
        var type_reference = $('select[name="type_reference"]').val();

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
    var openModalImages = document.querySelectorAll("#openModalImage");
    var moda = document.getElementById("myModa");
    var modalContent = moda.querySelector(".modal-conten");
    var modalImage = modalContent.querySelector(".img-lightBox img");
    var modalTitle = modalContent.querySelector(".lightBox-categories p:first-child");
    var modalCategory = modalContent.querySelector(".lightBox-categories p:last-child");

    // Itérer sur tous les éléments avec l'id "openModalImage"
    openModalImages.forEach(function(openModalImage) {
        openModalImage.addEventListener("click", function() {
            // Récupérer les informations du thumbnail
            var thumbnailContainer = openModalImage.closest(".thumbnail-container");
            var thumbnailImageSrc = thumbnailContainer.querySelector(".custom-thumbnail").src;
            var thumbnailTitle = thumbnailContainer.querySelector(".thumbnail-title p").innerText;
            var thumbnailCategory = thumbnailContainer.querySelector(".categories-list li").innerText;

            // Placer les informations dans la modal
            modalImage.src = thumbnailImageSrc;
            modalTitle.innerText = thumbnailTitle;
            modalCategory.innerText = thumbnailCategory;

            moda.style.display = "block";
        });
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



/*  IMAGE Lightbox */


