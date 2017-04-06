<?php 

/**
 * Our template for the home page
 *
 * Template name: Home page
 * 
 * package: omed2016 
 */
?>
<?php 


  /** 
   * TODO
   * This is a temp switch to the 'nonav' header.
   * Call the normal header when we have menus.
   *
   */

 ?>

<?php get_header( 'nonav' ); ?>

<?php get_template_part( 'template-parts/content', 'splash' ); ?>

<?php 
  while ( have_posts() ): 
    the_post(); 
    the_content();

    get_template_part( 'template-parts/content', 'sponsors' );
  endwhile; 
?>


<?php get_footer(); ?>
