(function($) {




  // We don't care about resize events on screens below 768px wide
  var actionableScreenWidth = 768; // $large-start breakpoint
  var actionableScrollTop = 105;


  // The difference in pixel height between a highlightable image and 
  // its containing block
  var difference = 96;

  //var $html = $('html');

  var windowWidth = $(window).width();
  var $highlightableImage = $('#highlightableImage');
  var $highlightable = $('#highlightable');
  //adjustHighlightableHeight();

  $(document).on('scroll', function(evt) {
    var y = $(this).scrollTop();
    if (y > actionableScrollTop) {


      // TODO Sticky nav is temporarily disabled

      //$('html').addClass('omedscrolled');
      

    } else {


      // TODO Sticky nav is temporarily disabled

      //$('html').removeClass('omedscrolled');

    }
  });

  var $menu = $('#menu'),
  	  $menulink = $('.menu-link'),
  	  $menuTrigger = $('.menu-item-has-children > a');
  
  $menulink.click(function(e) {
  	e.preventDefault();
  	$menulink.toggleClass('active');
  	$menu.toggleClass('active');
  });
  
  $menuTrigger.click(function(e) {
  	var $this = $(this);
  	$this.toggleClass('active');
  });


  new WOW().init();

})(jQuery);

