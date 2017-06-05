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


<section class="intro wrap pageblock--xl">
  <div class="intro__block">
    <div class="intro__focus">
      <svg class="icon icon-omed-logo-full" preserveAspectRatio="xMidYMid meet" width="372" height="152">
        <use xlink:href="#omedLogoFull" />
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
  <svg class="icon icon-arrow1" preserveAspectRatio="xMidYMid meet">
    <use xlink:href="#arrow1" />
  </svg>
  <div class="intro__button">
    <a class="btn btn--primary btn--lg btn--wide" href="/registration-housing">Register Now</a>
  </div>
</section>

<!-- <section class="fragment__container--right"> -->
<!--   <div class="fragment-1"></div> -->
<!-- </section> -->

<section class="highlightable container-fluid pageblock"  >
  <div class="highlightable__block wrap">
    <div class="highlightable__body">
      <div class="highlightable__imagecontainer">
      <?php if ( is_dev_env() ): ?>
        <img class="highlightable__image" src="wp-content/uploads/2017/04/omed-861.jpg" alt="OMT session">
      <?php else: ?>
        <img class="highlightable__image" src="wp-content/uploads/2016/11/omed-861.jpg" alt="OMT session">
      <?php endif ?>
      </div> <!-- .highlightable__imagecontainer -->
      <div class="highlightable__text">
        <h5 class="highlightable__header">Q: What is the Experience Zone?</h5>
        <h4 class="highlightable__blurb">The Experience Zone is the center of the action at OMED&mdash;a hub for gathering and networking and a place to discover technologies.</h4>
        <a href="/omed-2017-faqs/" class="highlightable__button btn btn--sm btn--reverse">See more FAQs</a>
      </div> <!-- .highlightable__text -->
    </div> <!-- .highlightable__body -->
  </div> <!-- .highlightable__block -->
</section>

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
