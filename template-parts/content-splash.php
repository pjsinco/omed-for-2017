<?php 
/**
 * Display the splash image and textk
 *
 * @package omed2016
 */

global $post;
$splash_header = get_field( 'omed_splash_header', $post->ID );
$splash_body = get_field( 'omed_splash_body', $post->ID );

?>
<section class="splash--<?php if ( is_page()): global $post; if ( isset( $post ) ): echo $post->post_name; endif; endif; ?> <?php // if ( is_front_page() ): echo 'splash--nomargin'; endif; ?>">
  <div class="splash__border--top"></div>
  <div class="splash__content wrap">
    <div class="splash__block">
      <h1 class="splash__header">
        <?php if ($splash_header): echo $splash_header; endif; ?>
      </h1>
      <p class="splash__body">
        <?php if ($splash_body): echo $splash_body; endif; ?>
      </p>
    </div> <!-- .splash__block -->
  </div> <!-- .splash__content -->
  <div class="splash__border--bottom"></div>
</section> <!-- .splash -->

