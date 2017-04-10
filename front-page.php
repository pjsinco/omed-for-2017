<?php 

/**
 * Our template for the home page
 *
 * Template name: Home page
 * 
 * package: omed 
 */
?>

<?php get_header(); ?>

<?php  get_template_part( 'template-parts/content', 'splash' ); ?>

<?php 

  // TODO just sketching for now
?>

  <section class="wrap intro">
    <div class="intro__context">
      <svg class="icon icon-omed-logo-full" preserveAspectRatio="xMidYMid meet" width="186" height="76">
        <use xlink:href="<?php echo get_template_directory_uri(); ?>/public/defs.svg?version=<?php echo filemtime(get_template_directory() . '/public/defs.svg'); ?>#omedLogoFull" />
      </svg>
    </div>
    <div class="intro__detail">
    </div>
    
    
  </section>




<?php 
  while ( have_posts() ): 
    the_post(); 
    the_content();

    get_template_part( 'template-parts/content', 'sponsors' );
  endwhile; 
?>


<?php get_footer(); ?>
