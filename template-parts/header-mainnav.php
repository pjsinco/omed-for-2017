<?php


?>


<header class="header ">
  <div class="menu__block container-fluid--alt relative " style="visibility: visible;">
    <div class="menu__logo">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="OMED 2016">
        <div class="branding--omed icon-omed-logo-alone" data-grunticon-embed></div>
      </a>
    </div> <!-- .menu__logo -->
    <div class="menu__nav">
      <a href="#menu" class="menu-link"></a>
      <div class="menu__items">
        <nav id="menu" class="menu wrap menu-container">
          <?php 
            $major_menu_args = array(
              'menu' => 'header-menu-major',
              'theme_location' => 'header-menu-major',
              'menu_class' => 'level-1 menu-major',
              'container' => false,
              'depth' => 0,
              'walker' => new Omed2016_Major_Nav_Walker_Class(),
            );
            wp_nav_menu( $major_menu_args );
          ?>
  
          <!-- .menu__list-minor  goes here -->
          <?php 
            $minor_menu_args = array(
              'menu' => 'header-menu-minor',
              'theme_location' => 'header-menu-minor',
              'menu_class' => 'level-1 menu-minor',
              'container' => false,
              'depth' => 0,
              //'walker' => new Omed2016_Minor_Nav_Walker_Class(),
            );
            wp_nav_menu( $minor_menu_args );
          ?>
        </nav>
      </div> <!-- .navmenu -->
    </div>
  </div> <!-- .menu__block -->
</header>
