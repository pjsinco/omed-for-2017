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
    <div class="intro__focus">
      <svg class="icon icon-omed-logo-full" preserveAspectRatio="xMidYMid meet" width="372" height="152">
        <use xlink:href="#omedLogoFull" />
      </svg>
      <i class="icon icon-arrow1"></i>
    </div>
    <div class="intro__context">
      <ul>
        <li>
          <h5>Lorem ipsum dolor</h5>
          <p>Donec id elit non mi porta gravida at eget metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </li>
        <li>
          <h5>Dolor lorem</h5>
          <p>Donec id elit non mi porta gravida at eget metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </li>
        <li>
          <h5>Lorem ipsum dolor</h5>
          <p>Donec id elit non mi porta gravida at eget metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </li>
        
      </ul>
    </div>
    <svg class="icon icon-arrow1" preserveAspectRatio="xMidYMid meet" width="19" height="19">
      <use xlink:href="#arrow1" />
    </svg>
    
    
  </section>




<?php 
  while ( have_posts() ): 
    the_post(); 
    the_content();

    get_template_part( 'template-parts/content', 'sponsors' );
  endwhile; 
?>


<?php get_footer(); ?>
