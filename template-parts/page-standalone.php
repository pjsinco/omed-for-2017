<?php
/**
 * Template part for displaying standalone page content
 *
 * @package omed-for-2017
 */

?>

<?php while (have_posts()): the_post(); ?>

  <div class="container-fluid wrap content">

    <!--   Main content -->
    <section class="content__main--full">

      <?php get_template_part( 'template-parts/page', 'header' ); ?>

      <div class="content__block">
        <div class="content__block--primary">

          <?php get_template_part( 'template-parts/page', 'article' ); ?>

        </div> <!-- .content__block-primary -->

<?php endwhile; ?>

        <div class="content__block--secondary">
            <?php 
            //get_template_part( 'template-parts/sidebar', 'asides' );
            //get_template_part( 'template-parts/sidebar', 'related' );
            ?>
        </div> <!-- .content__block-secondary -->
      </div> <!-- .content__block -->

    </section>
  </div> <!-- .content -->

