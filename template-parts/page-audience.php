<?php
/**
 * Template part for displaying audience page content
 *
 * @package omed-for-2017
 */
?>

<?php while ( have_posts() ): the_post(); ?>

  <div class="content">

    <!--   Main content -->
    <section class="content__main--full">

      <?php get_template_part( 'template-parts/page', 'header' ); ?>

      <div class="scroll-flip-here">

      	<?php the_content(); ?>

        <?php endwhile; ?>

      </div> <!-- .content__block -->
    </section>
  </div> <!-- .content -->

