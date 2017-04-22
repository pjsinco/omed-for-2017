<header class="header">

  <div class="logo">
    <a href="<?php echo esc_html( home_url('/') ); ?>">
      <svg class="icon icon-omed-logo-plain" preserveAspectRatio="xMidYMid meet" width="200" height="35">
        <use xlink:href="<?php echo get_template_directory_uri(); ?>/public/defs.svg?version=<?php echo filemtime(get_template_directory() . '/public/defs.svg'); ?>#omedLogoPlain" />
      </svg>
    </a>
  </div>

  <nav class="primary-nav">
    <a href="#navigation" class="nav-trigger">
      <span>
        <em aria-hidden="true"></em>
        Menu
      </span>
    </a> <!-- .nav-trigger -->

    <?php 

      $args = array(
        'menu' => 'primary-nav',
        'theme_location' => 'primary-nav',
        'menu_class' => 'navigation',
        'items_wrap' => primary_nav_wrap(),
      );

      wp_nav_menu( $args );
    ?>
  </nav> <!-- .primary-nav -->
</header> <!-- .header -->
