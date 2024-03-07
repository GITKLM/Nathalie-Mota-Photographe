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
    $('.modalBtn').on('click', function(event) {
        event.preventDefault();      
        var referencePhoto = reference_data.join(', ');
        $('#photo-reference').val(referencePhoto);
        $('#myModal').css('display', 'block');
    });

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
        body.style.overflow = 'hidden';
      } else {
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
    $('.select-box__input').change(function() {
        var category = $('input[name="category"]:checked').val();
        var format = $('input[name="format"]:checked').val();
        var type_reference = $('input[name="type_reference"]:checked').val();

        $.ajax({
            url: custom_ajax.ajaxurl,
            type: 'POST',
            data: {
                action: 'filter_photos',
                category: category,
                format: format,
                type_reference: type_reference,
            },
            success: function(response) {
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
    var openModalImages;

    function updateModalContent(index) {
        var thumbnailContainer = openModalImages[index].closest(".thumbnail-container");
        var thumbnailTitle = thumbnailContainer.querySelector(".thumbnail-title p").innerText;
        var thumbnailCategoryElement = thumbnailContainer.querySelector(".categories-list li");
        var thumbnailCategory = thumbnailCategoryElement ? thumbnailCategoryElement.innerText : "";
        var thumbnailImageSrc = thumbnailContainer.querySelector(".custom-thumbnail").getAttribute("src");

        modalImage.src = thumbnailImageSrc;
        modalTitle.innerText = thumbnailTitle;
        modalCategory.innerText = thumbnailCategory;
        currentIndex = index;
    }

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('openModalImage')) {
            openModalImages = document.querySelectorAll(".openModalImage");
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

    function showPreviousImage() {
        if (currentIndex > 0) {
            updateModalContent(currentIndex - 1);
        }
    }

    function showNextImage() {
        if (currentIndex < openModalImages.length - 1) {
            updateModalContent(currentIndex + 1);
        }
    }
});

/* OEIL ouvrir */

    document.addEventListener("DOMContentLoaded", function() {
        var centeredImages = document.querySelectorAll('.centered-image');

        centeredImages.forEach(function(image) {
            image.addEventListener('click', function() {
                var articleURL = this.closest('.thumbnail-container, .autre-img').querySelector('.top-image').getAttribute('href');
                
                window.location.href = articleURL;
            });
        });
    });

  
/* CHARGEMENT SUPPLEMENTAIRE */

jQuery(document).ready(function($) {
    var offset = 8;

    $('#load-more').on('click', function() {
        $.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                action: 'load_more_thumbnails',
                offset: offset,
            },
            success: function(response) {
                console.log('Response from server:', response); // Débogage
                if (response.trim() !== '') { // Vérifier si la réponse n'est pas vide
                    $('#image-row').append(response);
                    offset += 8;
                } else {
                    $('#load-more').hide();
                }
            }
        });
    });
});





