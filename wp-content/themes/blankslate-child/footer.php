</main>


<footer id="footer" role="contentinfo">
</footer>

<div class="footer-content">
<ul>
        <li><a href="<?php echo esc_url(get_permalink(get_page_by_title('MENTIONS LÉGALES'))); ?>">MENTIONS LÉGALES</a></li>
        <li><a href="<?php echo esc_url(get_permalink(get_page_by_title('VIE PRIVÉE'))); ?>">VIE PRIVÉE</a></li>
        <li><a href="<?php echo esc_url(get_permalink(get_page_by_title('TOUS DROITS RÉSERVÉS'))); ?>">TOUS DROITS RÉSERVÉS</a></li>
      </ul>
</div>
<?php wp_footer(); ?>
   <!-- Inclure la modale de contact -->
<?php get_template_part( 'templates_part/modal-lightbox'); ?> 

 <!-- <button id="openModalBtn">Ouvrir la modal</button> -->
<?php include 'modal-contact.php'; ?>



</body>
</html>

