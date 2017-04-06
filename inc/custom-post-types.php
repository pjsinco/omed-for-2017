<?php 

/**
 * Session custom post type
 *
 */

add_action( 'init' , 'omed2016_custom_post_types' );

function omed2016_custom_post_types() {

  $featured_session_labels = array(
    'name'               => 'Featured Sessions',
    'singular_name'      => 'Featured Session',
    'menu_name'          => 'Featured Sessions',
    'name_admin_bar'     => 'Featured Session',
    'add_new'            => 'Add new',
    'add_new_item'       => 'Add new featured session',
    'edit_item'          => 'Edit featured session',
    'view_item'          => 'View featured session',
    'all_items'          => 'All featured sessions',
    'search_items'       => 'Search featured sessions',
    'not_found'          => 'No featured sessions found',
    'not_found_in_trash' => 'No featured sessions found in trash.',
  );

  $featured_session_args = array(
    'labels'              => $featured_session_labels,
    'public'              => false,
    'publicly_queryable'  => false,
    'exclude_from_search' => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 24,
    'capability_type'     => 'post',
    'hierarchical'        => false,
    'rewrite'             => array( 'slug' => 'featured-session' ),
    'supports'            => array( 'title', 'revision' ),
  );

  $aside_labels = array(
    'name'               => 'Asides',
    'singular_name'      => 'Aside',
    'menu_name'          => 'Asides',
    'name_admin_bar'     => 'Aside',
    'add_new'            => 'Add new',
    'add_new_item'       => 'Add new aside',
    'edit_item'          => 'Edit aside',
    'view_item'          => 'View aside',
    'all_items'          => 'All asides',
    'search_items'       => 'Search asides',
    'not_found'          => 'No asides found',
    'not_found_in_trash' => 'No asides found in trash.',
  );

  $aside_args = array(
    'labels'              => $aside_labels,
    'public'              => false,
    'publicly_queryable'  => false,
    'exclude_from_search' => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 21,
    'capability_type'     => 'post',
    'hierarchical'        => false,
    'rewrite'             => array( 'slug' => 'aside' ),
    'supports'            => array( 'title', 'editor', 'revision' ),
  );

  $quicklink_labels = array(
    'name'               => 'Quicklinks',
    'singular_name'      => 'Quicklink',
    'menu_name'          => 'Quicklinks',
    'name_admin_bar'     => 'Quicklink',
    'add_new'            => 'Add new',
    'add_new_item'       => 'Add new quicklink',
    'edit_item'          => 'Edit quicklink',
    'view_item'          => 'View quicklink',
    'all_items'          => 'All quicklinks',
    'search_items'       => 'Search quicklinks',
    'not_found'          => 'No quicklinks found',
    'not_found_in_trash' => 'No quicklinks found in trash.',
  );

  $quicklink_args = array(
    'labels'              => $quicklink_labels,
    'public'              => false,
    'publicly_queryable'  => false,
    'exclude_from_search' => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 24,
    'capability_type'     => 'post',
    'hierarchical'        => false,
    'rewrite'             => array( 'slug' => 'quicklink' ),
    'supports'            => array( 'title', 'revision' ),
  );

  $highlightable_labels = array(
    'name'               => 'Highlightables',
    'singular_name'      => 'Highlightable',
    'menu_name'          => 'Highlightables',
    'name_admin_bar'     => 'Highlightable',
    'add_new'            => 'Add new',
    'add_new_item'       => 'Add new highlightable',
    'edit_item'          => 'Edit highlightable',
    'view_item'          => 'View highlightable',
    'all_items'          => 'All highlightables',
    'search_items'       => 'Search highlightables',
    'not_found'          => 'No highlightables found',
    'not_found_in_trash' => 'No highlightables found in trash.',
  );

  $highlightable_args = array(
    'labels'              => $highlightable_labels,
    'public'              => false,
    'publicly_queryable'  => false,
    'exclude_from_search' => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 20,
    'capability_type'     => 'post',
    'hierarchical'        => false,
    'rewrite'             => array( 'slug' => 'highlightable' ),
    'supports'            => array( 'title', 'revision' ),
  );

  $splinkle_labels = array(
    'name'               => 'Splinkles',
    'singular_name'      => 'Splinkle',
    'menu_name'          => 'Splinkles',
    'name_admin_bar'     => 'Splinkle',
    'add_new'            => 'Add new splinkle',
    'add_new_item'       => 'Add new splinkle',
    'edit_item'          => 'Edit splinkles',
    'view_item'          => 'View splinkles',
    'all_items'          => 'All splinkles',
    'search_items'       => 'Search splinkles',
    'not_found'          => 'No splinkles found',
    'not_found_in_trash' => 'No splinkles found in trash.',
  );

  $splinkle_args = array(
    'labels'              => $splinkle_labels,
    'public'              => false,
    'publicly_queryable'  => false,
    'exclude_from_search' => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 20,
    'capability_type'     => 'post',
    'hierarchical'        => false,
    'rewrite'             => array( 'slug' => 'splinkle' ),
    'supports'            => array( 'title', 'revision' ),
  );

  register_post_type( 'omed_session', $featured_session_args );
  register_post_type( 'omed_aside', $aside_args );
  register_post_type( 'omed_quicklink', $quicklink_args );
  register_post_type( 'omed_highlightable', $highlightable_args );
  register_post_type( 'omed_splinkle', $splinkle_args );
}



