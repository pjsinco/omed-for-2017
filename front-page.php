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


<section class="intro wrap pageblock">
  <div class="intro__block">
    <div class="intro__focus">
      <svg class="icon icon-omed-logo-full" preserveAspectRatio="xMidYMid meet" width="504" height="100">
        <use xlink:href="#omed2018LogoTagline" />
      </svg>
      <i class="icon icon-arrow1"></i>
    </div>

      <?php 
        $args = array(
          'menu' => 'intro-block',
          'theme_location' => 'intro-block',
          'container' => 'div',
          'container_class' => 'intro__context',
          'walker' => new Menu_With_Description(),
        );
      
        wp_nav_menu( $args );
      ?>
        
  </div> <!-- .intro__block -->
<!--   <svg class="icon icon-arrow1" preserveAspectRatio="xMidYMid meet"> -->
<!--     <use xlink:href="#arrow1" /> -->
<!--   </svg> -->
<!--   <div class="intro__button"> -->
<!--     <a class="btn btn--primary btn--lg btn--wide" href="/registration-housing">Register Now</a> -->
<!--   </div> -->
</section>

<!-- <section class="fragment__container--right"> -->
<!--   <div class="fragment-1"></div> -->
<!-- </section> -->

<!-- <section class="fragment__container--left rellax" data-rellax-speed="-4"> -->
<!--   <div class="fragment-2"></div> -->
<!-- </section> -->

<?php 
  while ( have_posts() ): 
    the_post(); 
    the_content();

    get_template_part( 'template-parts/content', 'sponsors' );
  endwhile; 
?>


<?php get_footer(); ?>
