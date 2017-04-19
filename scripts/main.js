/* @source https://codyhouse.co/gem/auto-hiding-navigation */

jQuery(document).ready(($) => {

  let scrolling = false,
      currentTop = 0,
      previousTop = 0,
      scrollDelta = 10,
      scrollOffset = 150;

  const $belowSplash = $('.splash'),
        $mainHeader  = $('.header'),
        headerHeight = $mainHeader.height(),
        $secondaryNavigation = $('.secondary-nav'),
        $belowNavHeroContent = $('.sub-nav-hero');

  const checkSimpleNavigation = (currentTop) => {

    if (previousTop - currentTop > scrollDelta) {
      $mainHeader.removeClass('is-hidden');
    } else if (currentTop - previousTop > scrollDelta && 
               currentTop > scrollOffset) {
      $mainHeader.addClass('is-hidden');
    }
  };

	const checkStickyNavigation = (currentTop) => {
		//secondary nav below intro section - sticky secondary nav
		var secondaryNavOffsetTop = $belowNavHeroContent.offset().top - 
                                $secondaryNavigation.height() - 
                                $mainHeader.height();
		
		if (previousTop >= currentTop ) {
	    	//if scrolling up... 
	    	if( currentTop < secondaryNavOffsetTop ) {
	    		//secondary nav is not fixed
          console.log('1');
	    		$mainHeader.removeClass('is-hidden');
	    		$secondaryNavigation.removeClass('fixed slide-up');
	    		$belowNavHeroContent.removeClass('secondary-nav-fixed');
	    	} else if( previousTop - currentTop > scrollDelta ) {
          console.log('2');
	    		//secondary nav is fixed
	    		$mainHeader.removeClass('is-hidden');
	    		$secondaryNavigation.removeClass('slide-up').addClass('fixed'); 
	    		$belowNavHeroContent.addClass('secondary-nav-fixed');
	    	}
	    	
	    } else {
	    	//if scrolling down...	
	 	  	if( currentTop > secondaryNavOffsetTop + scrollOffset ) {
          console.log('3');
	 	  		//hide primary nav
	    		$mainHeader.addClass('is-hidden');
	    		$secondaryNavigation.addClass('fixed slide-up slide-down');
	    		$belowNavHeroContent.addClass('secondary-nav-fixed');
	    	} else if( currentTop > secondaryNavOffsetTop ) {
          console.log('4');
	    		//once the secondary nav is fixed, do not hide primary nav if you haven't scrolled more than scrollOffset 
	    		$mainHeader.removeClass('is-hidden');
	    		$secondaryNavigation.addClass('fixed slide-down').removeClass('slide-up');
	    		$belowNavHeroContent.addClass('secondary-nav-fixed');
	    	}

	    }
	};


  const autoHideHeader = () => {
    currentTop = $(window).scrollTop();

    //checkNavigation(currentTop);

    ($belowNavHeroContent.length > 0) ? 
      checkStickyNavigation(currentTop) :
      checkSimpleNavigation(currentTop);

    previousTop = currentTop;
    scrolling = false;
  };


  $(window).on('scroll', () => {

    if (!scrolling) {
      scrolling = true;

      !window.requestAnimationFrame ? 
        setTimeout(autoHideHeader, 250) :
        requestAnimationFrame(autoHideHeader);
                                  
    }

  });

  $mainHeader.on('click', '.nav-trigger', (evt) => {
    evt.preventDefault();
    $mainHeader.toggleClass('nav-open');
  });
});
