<?php
/**
 * Template part for the displaying article header 
 *
 * @package omed-for-2017
 */

?>
	<header class="entry__header">

    <?php if ( is_page_template( 'page-standalone.php' ) ): ?>

      <?php get_template_part( 'template-parts/pageheader', 'standalone' ) ?>

    <?php elseif ( is_page_template( 'page-audience.php' ) ): ?>

      <?php get_template_part( 'template-parts/pageheader', 'audience' ); ?>

    <?php endif; ?>
  
	</header><!-- .entry-header -->


