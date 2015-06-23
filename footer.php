<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Single Page Events
 */
?>
<!-- #page -->

<footer id="contact">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="footer-address">
              <?php
              $contact_address        = html_entity_decode( esc_html( wp_unslash( sp_get_option( 'contact_address' ) ) ) );
              echo $contact_address;
              ?>
          </div>
          </div>
          <div class="col-md-4 social-connection">
            <div class="footer-share">
            <ul>
              <li><a href="#" class="twitter-icon" title="Twitter">Twitter</a></li>
              <li><a href="#" class="facebook-icon">Facebook</a></li>
              <li><a href="#" class="gplus-icon">Pintrest</a></li>
            </ul>
            </div>
          </div>
          <div class="col-md-4">
            <h3> Contact Us </h3>
            <div class="footer-contact">
            <?php           
              $form_id = esc_attr( sp_get_option('contact_shortcode') );
              echo do_shortcode('[contact-form-7 id="' . $form_id . '" title="Contact form"]');
            ?>
          </div>
          </div>

          <div class="col-md-6">
               <p>
              <a href="<?php echo home_url(); ?>"><?php echo bloginfo('name');?></a>, All Rights Reserved &copy; Copyright <?php echo date('Y'); ?>.
            </p>
          </div>
        </div>
      </div>
    </footer>

<?php wp_footer(); ?>

</body>
</html>
