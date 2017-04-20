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
    <div class="entry__leadin--gradient container-fluid wrap">
      <?php if ( $leadin = get_field( 'omed_leadin' ) ): ?>
        <h4><?php echo $leadin; ?></h4>
      <?php endif; ?>
    </div>
	</header><!-- .entry-header -->


