<?php
/**
 * Template part for the displaying article header 
 *
 * @package omed-for-2017
 */

?>
	<header class="entry__header">
    <div class="entry__gradient">
      <div class="container-fluid wrap">
        <?php the_title( '<h1 class="entry__title">', '</h1>' ); ?>
      </div>
    </div>
	</header><!-- .entry-header -->
  <?php if ( $leadin = get_field( 'omed_leadin' ) ): ?>
    <h4 class="leadin"><?php echo $leadin; ?></h4>
  <?php endif; ?>


