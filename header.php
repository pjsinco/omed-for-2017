<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package omed2016
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php wp_head(); ?>
  </head>

  <body <?php if ( is_page_template( 'page-standalone.php' ) || is_page_template( 'page-sublevel.php' ) || is_404() ): body_class('omedscrolled'); else: body_class(); endif; ?>>

    <?php get_template_part( 'template-parts/header', 'mainnav' ); ?>

    <div id="content" class="site-content">
