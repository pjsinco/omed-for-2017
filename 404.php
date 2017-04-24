<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package omed2016
 */

get_header(); ?>

  <div class="container-fluid wrap content">
    <h1 class="entry__title--error">We're sorry! This page does not exist.</h1>
        
    <p>
      <?php echo do_shortcode( "[omed-button text='Back to home page' link='/' style='solid']" ); ?>
    </p>
  </div><!-- .container-fluid.wrap.content -->
<?php
get_footer();
