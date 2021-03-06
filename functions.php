<?php
/**
 * omed functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package omed
 */

  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
function omed_setup() {

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/
   *     featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
    'primary-nav' => 'Primary Navigation',
    'secondary-nav' => 'Secondary Navigation',
    'intro-block' => 'Homepage Intro',
    'footer-left' => 'Footer Left',
    'footer-center' => 'Footer Center',
    'footer-right' => 'Footer Right',
    'footer-policies' => 'Footer Policies',
  ) );

  add_image_size( 'omed-medium-square', 200, 200, true );


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
add_action( 'after_setup_theme', 'omed_setup' );

function omed_remove_widgets() {
  unregister_widget( 'WP_Widget_Pages' );
  unregister_widget( 'WP_Widget_Calendar' );
  unregister_widget( 'WP_Widget_Archives' );
  unregister_widget( 'WP_Widget_Links' );
  unregister_widget( 'WP_Widget_Meta' );
  unregister_widget( 'WP_Widget_Search' );
  unregister_widget( 'WP_Widget_Text' );
  unregister_widget( 'WP_Widget_Categories' );
  unregister_widget( 'WP_Widget_Recent_Posts' );
  unregister_widget( 'WP_Widget_Recent_Comments' );
  unregister_widget( 'WP_Widget_RSS' );
  unregister_widget( 'WP_Widget_Tag_Cloud' );
  //unregister_widget( 'WP_Nav_Menu_Widget' );
}
add_action( 'widgets_init' , 'omed_remove_widgets' );

/**
 * Remove default WordPress post type from admin menu
 *
 */
function omed_remove_default_posts_from_admin_menu() {

  remove_menu_page( 'edit.php' );

}
add_action('admin_menu' , 'omed_remove_default_posts_from_admin_menu');



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function omed_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'omed_content_width', 1008 );
}
add_action( 'after_setup_theme', 'omed_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function omed_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'omed' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'omed' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'omed_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function omed_scripts() {

  $stylesheet_name = 'style.min.css';
  wp_register_style(  
    'omed-style',
    sprintf( '%s/%s', get_stylesheet_directory_uri(), $stylesheet_name ),
    array('owl-carousel-css'),
    filemtime( get_template_directory() . '/' . $stylesheet_name ), 
    'all'
  );

  $omed_bundle_path = get_template_directory_uri() . '/public/scripts/bundle.min.js';
  wp_register_script( 
    'omed-bundle', 
    $omed_bundle_path,
    array( 'jquery', 'vex-js', 'rellax-js', 'parallax-js' ),
    filemtime( $omed_bundle_path ), 
    true
  );

  wp_register_script(
    'vex-js',
    get_template_directory_uri() . '/scripts/vex.combined.min.js',
    array(),
    false,
    true
  );

  /**
   * WOW.js
   *
   */
  wp_register_script(
    'wowjs',
    get_template_directory_uri() . '/scripts/wow.min.js'
  );

  /**
   * Parallax JS
   *
   * @see https://github.com/pixelcog/parallax.js/
   */
  wp_register_script(
    'parallax-js',
    get_template_directory_uri() . '/scripts/parallax.min.js',
    array( 'jquery' ),
    false,
    true
  );

  /**
   * Rellax JS
   *
   * @see https://github.com/dixonandmoe/rellax
   */
  wp_register_script(
    'rellax-js',
    get_template_directory_uri() . '/scripts/rellax.min.js',
    array(),
    false,
    true
  );

  //wp_register_style(
    //'animate-css',
    //get_template_directory_uri() . '/styles/animate.min.css'
  //);

  /**
   * SVG4Everybody
   *
   */
  wp_register_script(
    'svg4everybody',
    get_template_directory_uri() . '/scripts/svg4everybody.min.js',
    array(),
    false,
    true
  );

  /**
   * Owl Carousel for Featured Sessions slider
   *
   */
  wp_register_script(
    'owl-carousel-js',
    get_template_directory_uri() . '/scripts/owl.carousel.min.js', 
    array( 'jquery' ),
    false,
    true
  );

  wp_register_style(
    'owl-carousel-css',
    get_template_directory_uri() . '/styles/owl.carousel.css', 
    array()
  );

  wp_register_style(
    'owl-theme-css',
    get_template_directory_uri() . '/styles/owl.theme.css', 
    array( 'owl-carousel-css' )
  );


  /**
   * Fitvids
   */
  wp_register_script( 
    'fitvids', 
    get_template_directory_uri() . '/scripts/jquery.fitvids.js', 
    array( 'jquery' ), 
    false, 
    true
  );

  /**
   * Move jQuery to footer
   *
   */  
  wp_deregister_script( 'jquery' );

  wp_register_script(
    'jquery',
    includes_url( 'js/jquery/jquery.js' ),
    array(),
    null,
    true
  );

  wp_register_script(
    'jquery-migrate',
    includes_url( 'js/jquery/jquery-migrate.min.js' ),
    array( 'jquery' ),
    null,
    true
  );


	wp_enqueue_style( 'omed-style' );
	//wp_enqueue_style( 'animate-css' );
  wp_enqueue_script( 'grunticon-loader' );
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'jquery-migrate' );
  //wp_enqueue_script( 'wowjs' );
  wp_enqueue_script( 'omed-bundle' );
  wp_enqueue_script( 'svg4everybody' );
  wp_enqueue_script( 'parallax-js' );
  wp_enqueue_script( 'rellax-js' );

  //if ( is_front_page() ) {
    wp_enqueue_style( 'owl-carousel-css' );
    wp_enqueue_style( 'owl-theme-css' );
    wp_enqueue_script( 'owl-carousel-js' );
    wp_enqueue_script( 'vex-js' );
  //}

}
add_action( 'wp_enqueue_scripts', 'omed_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Set up Custom post types
 */
require_once get_template_directory() . '/inc/custom-post-types.php';

/**
 * Set up widgets
 *
 */
require_once get_template_directory() . '/inc/widgets.php';

/**
 * Set up shortcodes
 *
 */
require_once get_template_directory() . '/inc/shortcodes.php';

/**
 * Pull the last item out of a url path.
 * Ex.: Returns 'registration' from "http://omed.dev/registration/"
 */
function get_last_url_component( $url ) {
  $filtered = array_filter(explode('/', $url)); 
  return array_pop($filtered);
}

function omed_add_page_slug_to_body_class( $classes ) {

  if ( !is_page() ) {
    return $classes;
  }

  global $post;

  if ( isset( $post ) ) {
    array_push( $classes, $post->post_type . '-' . $post->post_name );
  }
  
  return $classes;

}
add_filter( 'body_class', 'omed_add_page_slug_to_body_class' );


/**
 * @see http://www.wpbeginner.com/wp-themes/
 *      how-to-add-menu-descriptions-in-your-wordpress-themes/
 *
 * @see for $tag_meta, see our plugin, 
 *      https://github.com/pjsinco/elit-menu-item-custom-fields
 */
class Menu_With_Description extends Walker_Nav_Menu {

	function start_el(&$output, $item, $depth, $args) {

		global $wp_query;

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		
		$class_names = $value = '';

    $tag_meta = get_post_meta( $item->ID, 'menu-item-tag' );

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

		$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) .'"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) .'"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'><h5>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= ' <span class="arrow">&raquo;</span>';
    if ( ! empty( $tag_meta ) ) {
      $item_output .= sprintf( '<span class="tag">%s</span>', $tag_meta[0] );
    }
    $item_output .= '</a></h5>';
		$item_output .= $args->after;
		$item_output .= '<p>' . $item->description . '</p>';

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

class Omed_Major_Nav_Walker_Class extends Walker_Nav_Menu {
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat( "\t", $depth );
    $output .= "\n$indent<ul class=\"level-2 menu__list--major active\">\n";
  }

  function end_el( &$output, $item, $depth = 0, $args = array() ) {

    parent::end_el( $output, $item, $depth, $args );
  }
}

class Omed_Side_Nav_Walker_Class extends Walker_Nav_Menu {

  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat( "\t", $depth );
    $output .= "\n$indent<ul class=\"pagenav__items\">\n";
  }

  /**
   * We're not doing anything much different from the parent
   * class's start_el() method.
   *
   */
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

    global $post;

    if ( $item->menu_item_parent == '0' ) {
      return;
    }


    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;


    $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

    $class_names = 
      apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth );

    // We only care about 
    $class_names =  array_filter( $class_names, function($k) {
        return strpos( $k, 'current-menu-item') === 0;
      } 
    );

    $class_names[] = 'pagenav__item';

    $class_names = $class_names ? ' class="' . esc_attr( implode( ' ', $class_names ) ) . '"' : '';

    $output .= $indent . '<li ' . $class_names . '>';

    $atts = array();
    $atts['title'] = !empty( $item->attr_title ) ? $item->attr_title : '';
    $atts['target'] = !empty( $item->target ) ? $item->target : '';
    $atts['rel'] = !empty( $item->xfn ) ? $item->xfn : '';
    $atts['href'] = !empty( $item->url ) ? $item->url : '';

    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

    $attributes = '';
  
    foreach ( $atts as $attr => $value ) {

      if ( !empty( $value ) ) {
        $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
        $attributes .= ' ' . $attr . '="' . $value . '"';
      }
      
    }

    $title = apply_filters( 'the_title', $item->title, $item->ID );
    $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

    $item_output  = $args->before;
    $item_output .= '<a ' . $attributes . '>';
    $item_output .= $args->link_before . $title . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= 
      apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

  }

  function end_el( &$output, $item, $depth = 0, $args = array() ) {

    parent::end_el( $output, $item, $depth, $args );

  }

  /**
   * Help from:
   * http://code.tutsplus.com/tutorials/
   *   understanding-the-walker-class--wp-25401
   *
   */
  function display_element( $element, &$children_elements, $max_depth, 
        $depth=0, $args, &$output ) {

    // Check if an element is a 'current element' class
    $current_element_markers = array(
      'current-menu-item',
      'current-menu-parent',
      'current-menu-ancestor'
    );
    $current_class = 
      array_intersect( $current_element_markers, $element->classes );

    // If element has a 'current' class, it is an ancestor of the current 
    // menu item
    $is_ancestor_of_current = !empty( $current_class );

    // If this is a top-level link and not the current or ancestor of the 
    // current menu item, stop here
    if ( $depth == 0 && !$is_ancestor_of_current ) {
      return;
    }

    parent::display_element( $element, $children_elements, $max_depth,
        $depth, $args, $output );
  }
}


class Omed_Minor_Nav_Walker_Class extends Walker_Nav_Menu {

  // TODO For now, nothing is happening here
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

    // Get an array of URL components
    $filtered = array_filter( explode('/', $item->url) );
    
    // The last item is the title
    $title = array_pop( $filtered );

    parent::start_el( $output, $item, $depth, $args );
  }
}

function omed_add_class_to_menu_minor_item( 
    $classes, $item, $args, $depth 
  ) {

  if ( $args-> menu != 'header-menu-minor') {
    return $classes;
  }

  $slug = mb_strtolower( get_last_url_component( $item->url ) );
  $classes[] = 'icon-' . $slug;

  return $classes;;

}

/**
 * Take the page title and format it for reference in our 
 * title => icon-class-name mapping.
 *
 * Ex.: "Exhibtors" becomes "for-exhibitors"
 *
 * @param string $title The title to format
 * @return string
 */
function omed_format_menu_slug( $title ) {

  return mb_strtolower( str_replace( " ", "-", $title ) );

}

function omed_get_icon_class_name( $title ) {

    $icon_class_names = array(
      'registration' => 'registration',
      'faqs' => 'faq',
      'for-exhibitors' => 'for-exhibitors',
      'aoa' => 'aoa',
      'program' => 'program',
    );


    if ( $icon_class_names[$title] ) {
      return 'icon-' . $icon_class_names[$title];
    }

    return NULL;
}

function omed_add_class_to_menu_minor_anchor_element( $item_output, $item, $depth, $args ) {

  if ( $args->menu == 'header-menu-minor') {

    $slug = omed_format_menu_slug( $item->title );
    $class = omed_get_icon_class_name( $slug ) . ' menu-icon';

    return preg_replace( 
      '/(<a.*?>[^>]*?)</',
      "<div class=\"$class\" data-grunticon-embed></div>" . "$1" . "<",
      $item_output 
    );

  } else if ( $args->menu == 'header-menu-major' && 
              $item->menu_item_parent == "0" &&
              $args->walker->has_children ) {
    return preg_replace(
      "/(<a.+?>)(\\w*)/u", 
      "$1$2 <i class=\"icon-ctrl-down\"></i>", 
      $item_output
    );
  }

  return $item_output;
}
add_filter( 'walker_nav_menu_start_el',
            'omed_add_class_to_menu_minor_anchor_element',
            10,
            4 );

function omed_add_class_to_anchor( $nav_menu, $args ) {
  return preg_replace(
    "/<a (.*)>/",
    "<a class=\"nav__link\" $1>",
    $nav_menu
  );
}
//add_filter( 'wp_nav_menu', 'omed_add_class_to_anchor', 10, 2 );

function omed_remove_aoa_from_menu_link( $title, $item, $args, $depth ) {

  if ( $args->menu != 'header-menu-minor' ) {
    return $title;
  }

  if ( $title != 'AOA' ) {
    return $title;
  } 

  return '';


}
add_filter( 'nav_menu_item_title', 'omed_remove_aoa_from_menu_link', 10, 4 );

/**
 * Add our fitvids loader
 *
 * http://fitvidsjs.com/
 */
function omed_add_fitvids_script() {
  ?>
  <script>
    jQuery(document).ready(function() {
      jQuery('#videoContainer').fitVids();
    });
  </script>
  <?php
}

function omed_add_rellax_script() {
?>
  <script>
    var rellax = new Rellax('.rellax');
  </script>
<?php
}
//add_action('wp_footer' , 'omed_add_rellax_script', 9999);

function omed_call_svg4everybody() {
  ?>
  <script>
    svg4everybody();
  </script>
  <?php
}
add_action( 'wp_footer' , 'omed_call_svg4everybody', 9999);


function add_owl_carousel_script() {
  //if ( !is_front_page() ) {
    //return;
  //}
?>
  <script>
    jQuery(document).ready(function($) {

      //jQuery('#fsCarousel').owlCarousel({
        //'items': 3,
        //'itemsDesktop': [1199, 3],
      //});

      //jQuery('#qlCarousel').owlCarousel({
      $('#fsCarousel, #eventsCarousel').owlCarousel({
        items: 3,
        responsive: {
          0: {
            items: 1,
          },
          480: {
            items: 2,
          },
          768: {
            items: 3,
          },
        },
        slideBy: 'page',
        nav: true,
        navText: [
          '<svg class="icon icon-chevron-left" preserveAspectRatio="xMidYMid meet" width="40" height="40"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#chevron-left"></use></svg>',
          '<svg class="icon icon-chevron-right" preserveAspectRatio="xMidYMid meet" width="40" height="40"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#chevron-right"></use></svg>',
        ],
        itemElement: 'li',
        stageElement: 'ul'
      });

    });
  </script>

<?php
}
add_action( 'wp_footer' , 'add_owl_carousel_script', 50 );

function omed_add_google_analytics_code() {
  if ( is_dev_env() ) {
    return;
  }
?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
   
    ga('create', 'UA-2910609-39', 'auto');
    ga('send', 'pageview');
  </script>

<?php
}
add_action( 'wp_head', 'omed_add_google_analytics_code', 10 );

function omed_add_google_tag_manager_code() {
  if ( is_dev_env() ) {
    return;
  }
?>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-NHLFMJV');</script>
  <!-- End Google Tag Manager -->

<?php
}
add_action( 'wp_head', 'omed_add_google_tag_manager_code', 11 );

function omed_add_app_icons() {
  $theme_path = get_template_directory_uri();
?>

  <link rel="apple-touch-icon" href="<?php echo $theme_path; ?>/public/images/touch-icon-iphone.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $theme_path; ?>/public/images/touch-icon-ipad.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $theme_path; ?>/public/images/touch-icon-iphone-retina.png">
  <link rel="apple-touch-icon" sizes="167x167" href="<?php echo $theme_path; ?>/public/images/touch-icon-ipad-retina.png">
  <link rel="icon" sizes="192x192" href="<?php echo $theme_path; ?>/public/images/icon-hires.png">
  <link rel="icon" sizes="128x128" href="<?php echo $theme_path; ?>/public/images/icon-normal.png">

<?php
}
add_action( 'wp_head' , 'omed_add_app_icons' );

function omed_add_favicon() {
?>
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/public/images/favicon.ico" sizes="32x32">
<?php
}
add_action( 'wp_head' , 'omed_add_favicon' );


function omed_add_google_tag_manager_body_code() {
  if ( is_dev_env() ) {
    return;
  }
?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NHLFMJV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php
}
add_action( 'just_opened_body_tag' , 'omed_add_google_tag_manager_body_code' );

function omed_add_worldata_pixel() {
  if ( is_dev_env() || is_admin() ) {
    return;
  }
?>
<script>
var versaTag = {};
versaTag.id = "7475";
versaTag.sync = 0;
versaTag.dispType = "js";
versaTag.ptcl = "HTTPS";
versaTag.bsUrl = "bs.serving-sys.com/BurstingPipe";
versaTag.activityParams = { "Session":"" };
versaTag.retargetParams = {};
versaTag.dynamicRetargetParams = {};
versaTag.conditionalParams = {};
</script>
<script id="ebOneTagUrlId" src="https://secure-ds.serving-sys.com/SemiCachedScripts/ebOneTag.js"></script>
<noscript>
<iframe src="https://bs.serving-sys.com/BurstingPipe?cn=ot&amp;onetagid=7475&amp;ns=1&amp;activityValues=$$Session=[Session]$$&amp;retargetingValues=$$$$&amp;dynamicRetargetingValues=$$$$&amp;acp=$$$$&amp;" style="display:none;width:0px;height:0px"></iframe>
</noscript>
<?php
}
add_action('just_opened_body_tag' , 'omed_add_worldata_pixel');

function omed_add_custom_ninja_form_class ( $form_class, $form_id ) 
{

  if ( $form_id == 1 ) {
    $form_class .= ' contact-form';
  }

  return $form_class;
}
add_filter( 'ninja_forms_form_class', 'omed_add_custom_ninja_form_class', 10, 2 );

function omed_add_ninja_form_styles( $form_id ) {

  if ( $form_id == 1 ) {

    echo '<style> 

    .page-contact-us .ninja-forms-required-items {
      display: none;
    }

    .page-contact-us .ninja-forms-req-symbol {
      color: #d53847;
    }

    .page-contact-us .ninja-forms-field {
      width: 100% !important;
      margin-left: 0 !important;
      margin-right: 0 !important;
      margin-top: .5rem;
      border-color: #717271;
    }

    .page-contact-us .ninja-forms-error .ninja-forms-field {
      margin-bottom: .33rem;
    }

    .page-contact-us .ninja-forms-field-error p {
      font-size: .75rem;
      text-align: center;
      color: #d53847;
    }

    .ninja-forms-error-msg {
      margin-bottom: 1rem;
      text-align: center;
      background: #fcef06;
      padding: .5rem 0;
      font-size: .875rem;
      color: #717271;
    }

    .field-wrap:nth-last-child(2) {
      margin-bottom: 0;
    }

    </style>';
  }
}
add_action( 'ninja_forms_display_css' , 'omed_add_ninja_form_styles' );

function omed_adjust_caption_shortcode_width( $width, $atts, $content ) {

  // TODO fix magic number
  // Right now, 500 is the width of size of our 'large' image setting
  if ( $width >= 500 ) { 
    return '';
  }

  return $width;
}
add_filter ( 'img_caption_shortcode_width', 'omed_adjust_caption_shortcode_width', 10, 3 );

function is_dev_env() {
  return WP_ENV === 'development';
}

function omed_livereload() {

  if ( is_dev_env() ) {
    echo '<script src="//localhost:35729/livereload.js"></script>';
  }

}

/**
 * Add the AOA logo to the primary-nav menu.
 *
 * @see https://galengidman.com/2014/05/08/
 *      adding-static-menu-items-to-wp_nav_menu/
 *
 */
function primary_nav_wrap() {

  // original: <ul id="%1$s" class="%2$s">%3$s</ul>

  $wrap  = '<ul id="%1$s" class="%2$s">';
  $wrap .= '%3$s';

  // Add the AOA logo
  $wrap .=  '<li>';
  $wrap .=    '<a href="http://osteopathic.org">';
  $wrap .=      '<svg class="icon icon-aoa-logo" preserveAspectRatio="xMidYMid meet" width="70" height="33">';
  $wrap .=        '<use xlink:href="' .  get_template_directory_uri() . '/public/defs.svg?version=' . filemtime(get_template_directory() . '/public/defs.svg') . '#aoaLogoNoFill" />';
  $wrap .=       '</svg>';
  $wrap .=     '</a>';
  $wrap .=  '</li>';

  $wrap .= '</ul>';

  return $wrap;
}

/**
 * @see https://wordpress.stackexchange.com/questions/178322/
 *      wpautop-disable-br-tags-keep-p-tags
 *
 */
remove_filter( 'the_content', 'wpautop' );
$br = false;
add_filter( 'the_content', function( $content ) use ( $br ) {
  return wpautop( $content, $br );
}, 10);
