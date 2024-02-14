
/* MODALE */

// var modalLink = document.querySelector('a[href="#myModal"]');


// var modal = document.getElementById('myModal');


// var closeButton = document.querySelector('.close');


// modalLink.addEventListener('click', function() {
//   modal.style.display = 'block';
// });

// closeButton.addEventListener('click', function() {
//   modal.style.display = 'none';
// });



/* FILTRE */
jQuery(document).ready(function($) {
  // Lorsqu'un élément de la liste est sélectionné
  $('.filter-select').change(function() {
      // Soumettre automatiquement le formulaire
      $('#filter-form').submit();
  });
});