<?php
/**
 * Template part for the displaying article header 
 *
 * @package omed-for-2017
 */

?>
	<header class="entry__header">
		<?php the_title( '<h1 class="entry__title">', '</h1>' ); ?>
    <?php if ( get_field( 'omed2016_leadin' ) ): ?>
      <h4 class="leadin"><?php echo get_field( 'omed2016_leadin' ); ?></h4>
    <?php endif; ?>
	</header><!-- .entry-header -->


