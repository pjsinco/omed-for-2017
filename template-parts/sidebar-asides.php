<?php
/**
 * Template part for displaying asides
 *
 * @package omed-for-2017
 */

global $post;
$asides = get_field( 'omed_asides', $post->ID );
if ( !empty( $asides ) ):
  foreach ($asides as $aside):
?>
  <aside class="breakout">
    <h3><?php echo $aside->post_title ?></h3>
    <?php echo $aside->post_content; ?>
  </aside>
  
<?php endforeach; endif;

