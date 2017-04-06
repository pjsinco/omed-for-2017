<?php
/**
 * Template part for sponsors
 *
 * @package omed2016
 */

$images = get_field( 'omed_sponsor_images', $post->ID );
if ( empty( $images ) ) {
  return;
}

?>
<div class="container-fluid pageblock wrap">
  <div class="sponsors__block">
    <ul class="sponsors__items">
    <?php foreach( $images as $image ): ?>
      <li class="sponsors__item">
        <img src="<?php echo $image->guid; ?>" alt="<?php echo $image->post_title; ?>" />
      </li>        
    <?php endforeach ?>
    </ul>
    <a href="https://omed.osteopathic.org/become-an-omed-sponsor" class="btn btn--primary">Become a sponsor</a>
  </div>
</div>
