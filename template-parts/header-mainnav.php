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

    <ul class="navigation">
      <li><a href="#" >Physicians</a></li>
      <li><a href="#" >Residents</a></li>
      <li><a href="#" >Students</a></li>
      <li>
        <a href="http://osteopathic.org">
          <svg class="icon icon-aoa-logo" preserveAspectRatio="xMidYMid meet" width="70" height="33">
            <use xlink:href="<?php echo get_template_directory_uri(); ?>/public/defs.svg?version=<?php echo filemtime(get_template_directory() . '/public/defs.svg'); ?>#aoaLogoNoFill" />
          </svg>
        </a>
      </li>
    </ul>
    
  </nav> <!-- .primary-nav -->

  <nav class="secondary-nav">
    <ul>
      <li class="alt"><a href="#">Register</a></li>
      <li><a href="#">FAQs</a></li>
      <li><a href="#">Contact Us</a></li>
      <li><a href="#">For Exhibitors</a></li>
      <li><a href="#">Marketing Toolkit</a></li>
    </ul>
    
  </nav>
  
</header> <!-- .header -->
