<?php
/**
 * Template part for displaying page content
 *
 * @package omed-for-2017
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php
			the_content();
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

