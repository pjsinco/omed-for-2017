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
      <div class="intro__context">
        <ul>
          <li>
            <h5><a href="/registration-housing">Housing and Registration <span>&raquo;</span></a></h5>
            <p>Reserve your spot at the premier osteopathic event of the year.</p>
          </li>
          <li>
            <h5><a href="http://mydigitalpublication.com/publication?i=403769">Conference Program <span>&raquo;</span></a></h5>
            <p>Browse hundreds of opportunities for learning and networking.</p>
          </li>
          <li>
            <h5><a href="/faq">Frequently Asked Questions <span>&raquo;</span></a></h5>
            <p>Get details on registration, housing, programming and more.</p>
          </li>
          
        </ul>
      </div>
    </div> <!-- .intro__block -->
    <svg class="icon icon-arrow1" preserveAspectRatio="xMidYMid meet">
      <use xlink:href="#arrow1" />
    </svg>
    <div class="intro__button">
      <a class="btn btn--primary btn--lg btn--wide" href="/registration-housing">Register Now</a>
    </div>
  </section>



    <section class="highlightable container-fluid pageblock"  >
      <div class="highlightable__block wrap">
        <div class="highlightable__body">
          <div class="highlightable__imagecontainer">
            <img class="highlightable__image" src="wp-content/uploads/2016/11/omed-861.jpg" alt="OMT session">
          </div> <!-- .highlightable__imagecontainer -->
          <div class="highlightable__text">
            <h5 class="highlightable__header">Q: What is the Experience Zone?</h5>
            <h4 class="highlightable__blurb">The Experience Zone is the center of the action at OMED&mdash;a hub for gathering and networking and a place to discover technologies.</h4>
            <a href="/omed-2017-faqs/" class="highlightable__button btn btn--sm btn--reverse">See more FAQs</a>
          </div> <!-- .highlightable__text -->
        </div> <!-- .highlightable__body -->
      </div> <!-- .highlightable__block -->
    </section>

<?php 
  while ( have_posts() ): 
    the_post(); 
    the_content();

    get_template_part( 'template-parts/content', 'sponsors' );
  endwhile; 
?>


<?php get_footer(); ?>
