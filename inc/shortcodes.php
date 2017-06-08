<?php

function omed_block_shortcode( $atts ) {
  extract( 
    shortcode_atts(
      array(
      'type' => '',
      'title' => '',
      'animation' => '',
      'delay' => '',
      'offset' => '',
      ), $atts
    )
  );
  
  $attr  = ( !empty( $delay ) && !empty( $animation ) ? " data-wow-delay=\"$delay\"" : '' );
  $attr .= ( !empty( $offset ) && !empty( $animation ) ? " data-wow-offset=\"$offset\"" : '' );

  $args = array(
    'before_widget' => !empty( $animation ) ? '<div class="wow '. $animation . '" ' . $attr . '>' : '',
    'after_widget' => !empty( $animation ) ? '</div><!-- .wow -->' : '',
    'before_title' => '',
    'after_title' => '',
  );

  ob_start();
  the_widget( $type, $atts, $args );
  $output = ob_get_clean();

  return $output;
}

add_shortcode( 'block', 'omed_block_shortcode' );

function omed_video_shortcode($atts, $content = null ) {
  // we're going to need fitvids
  wp_enqueue_script('fitvids');
  add_action( 'wp_footer' , 'omed_add_fitvids_script', 50 );

  // Available types: 'pageblock', 'article'
  $a = shortcode_atts(
    array(
      'embed' => '',
      'caption' => '',
      'container' => 'article', 
    ), $atts
  );

  $output = '';
  $class = 'video__block' . ($a['container'] == 'pageblock' ? '--nopad' : '');

  if ( $a['container'] == 'pageblock' ) {
    $output .= '<div class="container-fluid pageblock wrap">' . PHP_EOL;
  }

  $output .= "<div class='$class'>" . PHP_EOL;
  $output .= '<figure class="video__container" id="videoContainer">';
  $output .= $a['embed'];
  $output .= '</figure>' . PHP_EOL;
  if ( $a['caption'] ) {
    $output .= '<figcaption class="video__caption">' . PHP_EOL;
    $output .= $a['caption'];
    $output .= '</figcaption>' . PHP_EOL;
  }
  $output .= '</div> <!-- .video__block -->' . PHP_EOL;

  if ( $a['container'] == 'pageblock' ) {
    $output .= '</div> <!-- hiya .container-fluid pageblock wrap -->' . PHP_EOL;
  }

  return $output;
  
}
add_shortcode('omed-video', 'omed_video_shortcode' );

function omed_section_title_shortcode( $atts, $content = null ) {
  $a = shortcode_atts(
    array(
      'title' => '',
    ), $atts
  );
  
  $output  = '<div class="container-fluid wrap">' . PHP_EOL;
  $output .= '<h3 class="section__header">' . PHP_EOL;
  $output .= $a['title'] . '</h3>' . PHP_EOL;
  $output .= '</div>' . PHP_EOL;

  return $output;
}
add_shortcode('section-title', 'omed_section_title_shortcode' );

function omed_button_shortcode( $atts, $content = null ) {
  extract(
    shortcode_atts(
      array(
        'link' => '',
        'text' => '',
        'style' => '',
        'target' => '',
      ), $atts
    )
  );

  $btn_style = ( empty( $style ) || $style == 'outline' ) ? '' : 'btn--solid';

  $output  = '' . PHP_EOL;
  $output .= '' . PHP_EOL;
  $output .= "<p class='omed-button'>" . PHP_EOL;
  $output .= 
    "<a href='$link' class='btn btn--primary $btn_style' "; 
  $output .= $target == '_blank' ? "target='_blank'" : "";
  $output .= ">$text</a>" .  PHP_EOL;
  $output .= "</p>" . PHP_EOL;
  
  return $output;

}
add_shortcode('omed-button', 'omed_button_shortcode' );

function omed_faq_search_shortcode( ) {
  $output  = '<form class="faqs__form">';
  $output .= '  <label>Search FAQs</label>';
  $output .= '  <input class="clearable" type="text"  id="faqFilter" value="" /><input class="btn btn--primary" type="submit" id="faqFilterSubmit" />';
  $output .= '</form>';

  return $output;
}
add_shortcode('faq-search', 'omed_faq_search_shortcode' );

function omed_event_format_date( $date ) {

  $new_date = DateTime::createFromFormat('Ymd', $date);
  return date_format($new_date, 'F j');
  
}

function omed_event_shortcode( $atts, $content = null ) {
  
  $a = shortcode_atts( array( 'id' => ''), $atts );

  $event_fields = get_fields( $a['id'] );

  if ( ! $event_fields || ! $event_fields['omed_event_modal'] ) return;

  $event_modal = $event_fields['omed_event_modal'];

  $modal = get_fields( $event_modal->ID );

  $output  = '<li class="event__item">';
  $output .= '  <div class="event__imagecontainer">';
  $output .= '    <img src="' . $event_fields['omed_event_image'] . '">';
  $output .= '  </div>';
  $output .= '  <div class="event__body">';
  $output .= '    <h4>' . $event_fields['omed_event_title'] . '</h4>';
  $output .= '    <p>' . $event_fields['omed_event_blurb'] . '</p>';
  $output .= '    <p><button class="btn btn--audience" ';
  $output .= '               data-omed-modal-title="' . $modal['omed_modal_title'] . '"';
  $output .= '               data-omed-modal-blurb="' . $modal['omed_modal_blurb'] . '"';
  $output .= '               data-omed-modal-date="' . omed_event_format_date( $modal['omed_modal_date'] ) . '"';
  $output .= '               data-omed-modal-time="' . $modal['omed_modal_time'] . '"';
  if ( $link = $modal['omed_modal_link'] ) {
    $output .= '               data-omed-modal-link="' . $link . '"';
  }
  $output .= '       >Learn more</button></p>';
  $output .= '  </div>';
  $output .= '</li>';

  return $output;

}
add_shortcode('event', 'omed_event_shortcode' );
