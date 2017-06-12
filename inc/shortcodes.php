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
  $output .= '    <p><button class="btn btn--audience modal-button" ';

  if ( $header = $modal['omed_modal_header'] ) {
    $output .= '               data-omed-modal-header="' . $header . '"';
  }

  if ( $blurb = $modal['omed_modal_blurb'] ) {
    $output .= '               data-omed-modal-blurb="' . $blurb . '"';
  }

  if ( $date = $modal['omed_modal_date'] ) {
    $output .= '               data-omed-modal-date="' . omed_event_format_date( $date ) . '"';
  }

  if ( $time = $modal['omed_modal_time'] ) {
    $output .= '               data-omed-modal-time="' . $time . '"';
  }

  if ( $location = $modal['omed_modal_location'] ) {
    $output .= '               data-omed-modal-location="' . $location . '"';
  }

  if ( $link = $modal['omed_modal_link'] ) {
    $output .= '               data-omed-modal-link="' . $link . '"';
  }

  $output .= '>Learn more</button>';
  $output .= '    </p>';
  $output .= '  </div>';
  $output .= '</li>';

  return $output;

}
add_shortcode('event', 'omed_event_shortcode' );

function omed_events_shortcode( $atts, $content = null ) {

  $a = shortcode_atts(
    array(
      'image-id' => '',
      'header' => '',
      'blurb' => '',
      'ids' => ''
    ), $atts
  );

  if ( ! $a['image-id'] || ! $a['ids'] ) return;

  $ids = array_map('trim', explode(',', $a['ids']));

  $output  = '<div class="events__container">';
  $output .= '  <div class="events__body wrap container-fluid">';
  $output .= '    <h3>🎉 Cras mattis consectetur purus sit amet fermentum</h3>';
  $output .= '    <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id elit non mi porta.</h5>';
  $output .= '  </div>';
  $output .= '  <div class="event__itemscontainer container-fluid">';
  $output .= '    <ul class="event__items wrap owl-carousel owl-theme" id="eventsCarousel">';

  foreach ( $ids as $id ) {
    $shortcode = sprintf( '[event id="%s"]', $id );
    $output .= do_shortcode( $shortcode );
  }

  $output .= '    </ul>';
  $output .= '  </div>';
  $output .= '</div>';

  return $output;
}
add_shortcode('events', 'omed_events_shortcode' );

function omed_parallax_window_shortcode( $atts, $content = null ) {

  $a = shortcode_atts(
    array(
      'header' => '',
      'blurb' => '',
      'action-text' => '',
      'action-link' => '',
      'image-id' => '',
    ),
    $atts 
  );

  if ( ! $a['image-id'] ) return;

  $image = wp_get_attachment_url($a['image-id']);

  if ( ! $image ) return;

  $output  = '<div class="window__container pageblock parallax-window relative container-fluid" data-parallax="scroll" data-image-src="' . $image . '">';
  $output .= '  <div class="window">';
  $output .= '    <div class="window__body wrap">';
  $output .= '      <h2>' . $a['header'] . '</h2>';
  $output .= '      <p>' . $a['blurb'] . ' <a href="' . $a['action-link'] . '" class="window__cta">' . $a['action-text'] . ' »</a></p>';
  $output .= '    </div>';
  $output .= '  </div>';
  $output .= '</div>';

  return $output;
}

add_shortcode( 'big-window', 'omed_parallax_window_shortcode' );

function omed_highlightable_shortcode( $atts, $content = null ) {

  $a = shortcode_atts(
    array(
      'id' => ''
    ), $atts
  );

  if ( ! $a['id'] ) return;

  $fields = get_fields( $a['id'] );

  if ( ! $fields ) return;

  $button_text = $fields['omed_highlightable_button_text'] ? $fields['omed_highlightable_button_text'] : 'Learn more';

  $output  = '<section class="highlightable container-fluid pageblock">';
  $output .= '  <div class="highlightable__block wrap">';
  $output .= '    <div class="highlightable__body">';
  $output .= '      <div class="highlightable__imagecontainer">';
  $output .= '        <img class="highlightable__image" src="' . $fields['omed_highlightable_image']['url'] . '" alt="' . $fields['omed_highlightable_image']['alt'] . '">';
  $output .= '      </div>';
  $output .= '      <div class="highlightable__text">';
  $output .= '        <h5 class="highlightable__header">' . $fields['omed_highlightable_header'] . '</h5>';
  $output .= '        <h4 class="highlightable__blurb">' . $fields['omed_highlightable_blurb'] . '</h4>';
  $output .= '        <p><a href="' . $fields['omed_highlightable_link'] . '" class="highlightable__button btn btn--sm btn--reverse">' . $button_text . '</a></p>';
  $output .= '      </div>';
  $output .= '    </div>';
  $output .= '  </div>';
  $output .= '</section>';

  return $output;
}
add_shortcode( 'highlightable', 'omed_highlightable_shortcode' );
