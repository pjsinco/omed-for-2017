<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package omed
 */

?>

	</div><!-- #content -->

	<footer class="footer">
		<div class="footer__body container-fluid wrap">
      <div class="footer__col">
        <a href="http://osteopathic.org">
          <svg class="icon icon-aoa-with-tagline" preserveAspectRatio="xMidYMid meet">
            <use xlink:href="<?php echo get_template_directory_uri(); ?>/public/defs.svg?version=<?php echo filemtime(get_template_directory() . '/public/defs.svg'); ?>#aoa-with-tagline" />
          </svg>
        </a>
        <p>Serving as the professional family for more than 129,000 osteopathic physicians (DOs) and osteopathic medical students, the American Osteopathic Association (AOA) promotes public health and encourages scientific research.</p>
      </div> <!-- .footer__col -->
      
      <div class="footer__col">
        <?php
          $args = array(
            'menu' => 'footer-left',
            'theme_location' => 'footer-left',
            'container_class' => 'footer__col-item--highlight',
          );
        
          wp_nav_menu( $args );
        ?>

        <?php
          $args = array(
            'menu' => 'footer-center',
            'theme_location' => 'footer-center',
            'container_class' => 'footer__col-item',
          );
        
          wp_nav_menu( $args );
        ?>

        <?php

          if ( has_nav_menu( 'footer-right' ) ) {

            $args = array(
              'menu' => 'footer-right',
              'theme_location' => 'footer-right',
              'container_class' => 'footer__col-item',
            );
        
            wp_nav_menu( $args );
          }
        ?>
      </div> <!-- .footer__col -->

		</div><!-- .wrap -->
    <div class="copyright">
      <div class="copyright__body container-fluid wrap">
        <div class="copyright__block">
          Copyright <?php echo date('Y'); ?>, American Osteopathic Association. <span>All rights reserved.</span>
        </div>

        <?php 
          if ( has_nav_menu( 'footer-policies' ) ) {
            $args = array(
              'menu' => 'footer-policies',
              'theme_location' => 'footer-policies',
              'container_class' => 'copyright__block--menu',
            );

            wp_nav_menu( $args );
          }
        ?>

      </div> <!-- .container-fluid .wrap -->
    </div> <!-- .copyright -->
	</footer>
</div><!-- #page -->

<?php echo file_get_contents( get_template_directory_uri() . '/public/defs.svg'); ?>

<?php wp_footer(); ?>

<?php omed_livereload(); ?>

</body>
</html>
