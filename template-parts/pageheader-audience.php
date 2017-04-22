<?php
/**
 * Template part for the displaying top of an Audience template
 *
 * @package omed-for-2017
 */
?>

<div class="container-fluid wrap">
  <?php the_title( '<h1 class="entry__title--audience">', '</h1>' ); ?>

  <?php if ( $tagline = get_field( 'omed_audience_tagline' ) ): ?>
    <h4>
      <?php echo $tagline ?>
    </h4>
  <?php endif; ?>
</div>


