<?php
/**
 * Template part for the displaying top of a Standalone template
 *
 * @package omed-for-2017
 */
?>

<div class="entry__gradient">
  <div class="container-fluid wrap">
    <?php the_title( '<h1 class="entry__title">', '</h1>' ); ?>
  </div>
</div>

<div class="entry__leadin--gradient container-fluid wrap">
  <?php if ( $leadin = get_field( 'omed_leadin' ) ): ?>
    <h4><?php echo $leadin; ?></h4>
  <?php endif; ?>
</div>
