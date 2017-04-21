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
      <div class="footer__col--half">
        <a href="http://osteopathic.org">
          <svg class="icon icon-aoa-logo" preserveAspectRatio="xMidYMid meet" width="70" height="33">
            <use xlink:href="<?php echo get_template_directory_uri(); ?>/public/defs.svg?version=<?php echo filemtime(get_template_directory() . '/public/defs.svg'); ?>#aoaLogoNoFill" />
          </svg>
        </a>
      </div>
      
      <div class="footer__col--quarter">
hi from quarter        
      </div>

      <div class="footer__col--quarter">
hi from quarter        
      </div>
		</div><!-- .wrap -->
    <div class="copyright">
      
    </div>
	</footer>
</div><!-- #page -->

<?php echo file_get_contents( get_template_directory_uri() . '/public/defs.svg'); ?>

<?php wp_footer(); ?>

<?php omed_livereload(); ?>

</body>
</html>
