
jQuery(document).ready(($) => {

  /**
   * Convert a YYYYMMDD-formatted date into
   * a string that can be used in an event modal.
   *
   */
  function formatDate(dateString) {
    let isoDate;

    try {
      isoDate = `${dateString.slice(0, 4)}-${dateString.slice(4, 6)}-${dateString.slice(6)}`;
    } catch(e) {
      return;
    }

    // https://stackoverflow.com/questions/4310953/
    //         invalid-date-in-safari#answer-5646753

    const date = new Date(isoDate.replace(/-/g, '/'));

    const months = [
      "Jan.", "Feb.", "March",
      "April", "May", "June", "July",
      "Aug.", "Sept.", "Oct.",
      "Nov.", "Dec."
    ];

    const days = [
      "Sunday", "Monday", "Tuesday",
      "Wednesday", "Thursday", "Friday",
      "Saturday", "Sunday" 
    ];

    const stringDate = `${days[date.getDay()]}, ${months[date.getMonth()]} ${date.getDate()}`;

    return stringDate;
  }

  /**
   * --------------------------------------------------------------------------
   *
   * Modals
   *
   * --------------------------------------------------------------------------
   */
  vex.defaultOptions.className = 'vex-theme-omed';

  $('.button-modal').on('click', (evt) => {

    evt.preventDefault();

    const dataset = evt.target.dataset; 
    
    const date = formatDate(dataset.omedModalDate);

    if (! date) return;
    
    vex.dialog.buttons.YES.text = 'Done';

    vex.dialog.alert({
      //appendLocation: '.event__items',
      showCloseButton: true,
      appendLocation: '.site-content',
      unsafeMessage: `<div class="omed-modal">
                        <h3>${dataset.omedModalHeader}</h3>
                        <div class="omed-modal__deets">
                          <h5><span>When: </span> ${date || ''}${ dataset.omedModalTime ? ', ' + dataset.omedModalTime : ''}</h5>
                          ${dataset.omedModalLocation ? '<h5><span>Where: </span>' + dataset.omedModalLocation + '</h5>': ''}
                        </div>
                        ${dataset.omedModalBlurb || ''}
                        ${dataset.omedModalLink ? '<p><a href=' + dataset.omedModalLink + ' class="btn btn--audience" target="_blank">More details</a></p>' : ''}
                      </div>`,
    });

    // Scroll to top of modal
    $('.vex-content').offset(function(i, coords) {
      return {
        top: $(window).scrollTop(),
        left: coords.left,
      };
    }); 
  });

  /**
   * --------------------------------------------------------------------------
   *
   * FAQs
   *
   * --------------------------------------------------------------------------
   * Custom jQuery :icontains selector for finding element based on its text
   * @see https://gist.github.com/pklauzinski/b6f836f99cfa11100488
   */
  $.expr[':'].icontains = $.expr.createPseudo(function(text) {
    return function(evt) {
      return $(evt).text().toLowerCase().indexOf(text.toLowerCase()) > -1;
    };
  });

  $('#faqFilter').on('input', function(evt) {
    const s = $(this).val().trim();
    if (s == '') {
      $('.faqs section').show();

    } else {
      $('.faqs section').hide();
      const $matches = $('.faqs section:icontains(' + s + ') ');
      $matches.show();
    }
  });

  $('.faqs__form').submit(function(evt) {
    evt.preventDefault();
  });

  /**
   * @see https://stackoverflow.com/questions/6258521/
   *              clear-icon-inside-input-text
   *
   */
  $(document).on('input', '.clearable', function(evt) {
    if ($(this).val() == '') {
      $(this).removeClass('has-content');
    } else {
      $(this).addClass('has-content');
    }
  }).on('touchstart', '.has-content', function(evt) {
    if ((this.offsetWidth - 73) < (evt.originalEvent.touches[0].pageX - this.getBoundingClientRect().left)) {
      $(this).addClass('onX');
    } else {
      $(this).removeClass('onX');
    }
  }).on('mousemove', '.has-content', function(evt) {
    if ((this.offsetWidth - 73) < (evt.clientX - this.getBoundingClientRect().left)) {
      $(this).addClass('onX');
    } else {
      $(this).removeClass('onX');
    }
  }).on('touchstart click', '.onX', function(evt) {
    evt.preventDefault();
    console.log('clickonX');
    $(this).removeClass('has-content onX').val('').trigger('input');
  });
  

  /**
   * Track outbound links for Google Analytics
   *
   */

//  ga('create', 'UA-2910609-39', 'auto');
//
//  const trackOutboundLink = (evt) => {
//
//    // Make sure tag is an anchor and that it is outbound
//    if (evt.target.tagName !== 'A' || evt.target.hostname === window.location.hostname) {
//      return;
//    }
//
//    const url = evt.target.href;
//    const text = evt.target.text;
//
//
//    ga('send', 'event', 'Outbound Link', url, text, {
//      'transport': 'beacon',
//      'hitCallback': () => document.location = url
//    });
//  };
//
//  document.addEventListener('click', trackOutboundLink, false);
  

  /**
   * --------------------------------------------------------------------------
   *
   * Hide and show nav bars
   *
   * --------------------------------------------------------------------------
   * @see https://codyhouse.co/gem/auto-hiding-navigation
   */
  let scrolling = false,
      currentTop = 0,
      previousTop = 0,
      scrollDelta = 10,
      scrollOffset = 150;

  const $belowSplash = $('.splash'),
        $mainHeader  = $('.header'),
        headerHeight = $mainHeader.height(),
        $secondaryNavigation = $('.secondary-nav'),
        $scrollFlipHere = $('.scroll-flip-here'),
        $body = $('body');

  const checkOmedScrolledPoint = (currentTop) => {
    if (currentTop > scrollOffset) {
      $body.addClass('omedscrolled');
    } else {
      $body.removeClass('omedscrolled');
    }
  };

  const checkSimpleNavigation = (currentTop) => {

    checkOmedScrolledPoint(currentTop);

    if (previousTop - currentTop > scrollDelta) {
      $mainHeader.removeClass('is-hidden');
    } else if (currentTop - previousTop > scrollDelta && 
               currentTop > scrollOffset) {
      $mainHeader.addClass('is-hidden');
    }
  };

	const checkStickyNavigation = (currentTop) => {

    checkOmedScrolledPoint(currentTop);

		//secondary nav below intro section - sticky secondary nav
		var secondaryNavOffsetTop = $scrollFlipHere.offset().top - 
                                $secondaryNavigation.height() - 
                                $mainHeader.height();
		
		if (previousTop >= currentTop ) {
	    	//if scrolling up... 
	    	if( currentTop < secondaryNavOffsetTop ) {
	    		//secondary nav is not fixed
          //console.log('1');
	    		$mainHeader.removeClass('is-hidden');
	    		$secondaryNavigation.removeClass('fixed slide-up');
	    		$scrollFlipHere.removeClass('secondary-nav-fixed');
	    	} else if( previousTop - currentTop > scrollDelta ) {
          //console.log('2');
	    		//secondary nav is fixed
	    		$mainHeader.removeClass('is-hidden');
	    		$secondaryNavigation.removeClass('slide-up').addClass('fixed'); 
	    		$scrollFlipHere.addClass('secondary-nav-fixed');
	    	}
	    	
	    } else {
	    	//if scrolling down...	
	 	  	if( currentTop > secondaryNavOffsetTop + scrollOffset ) {
          //console.log('3');
	 	  		//hide primary nav
	    		$mainHeader.addClass('is-hidden');
	    		$secondaryNavigation.addClass('fixed slide-up slide-down');
	    		$scrollFlipHere.addClass('secondary-nav-fixed');
	    	} else if( currentTop > secondaryNavOffsetTop ) {
          //console.log('4');
	    		//once the secondary nav is fixed, do not hide primary nav if you haven't scrolled more than scrollOffset 
	    		$mainHeader.removeClass('is-hidden');
	    		$secondaryNavigation.addClass('fixed slide-down').removeClass('slide-up');
	    		$scrollFlipHere.addClass('secondary-nav-fixed');
	    	}

	    }
	};


  const autoHideHeader = () => {
    currentTop = $(window).scrollTop();

    ($scrollFlipHere.length > 0) ? 
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

  /**
   * --------------------------------------------------------------------------
   *
   * Fix font weight issues in Safari
   * @see http://stackoverflow.com/questions/31056543/safari-font-rendering-issues
   *
   * --------------------------------------------------------------------------
   */
  const is_chrome = navigator.userAgent.indexOf('Chrome') > -1;
  const is_explorer = navigator.userAgent.indexOf('MSIE') > -1;
  const is_firefox = navigator.userAgent.indexOf('Firefox') > -1;
  let is_safari = navigator.userAgent.indexOf('Safari') > -1;
  const is_opera = navigator.userAgent.indexOf('Presto') > -1;
  const is_mac = navigator.userAgent.indexOf('Mac OS') != -1;
  const is_windows = !is_mac;

  if (is_chrome && is_safari) {
    is_safari = false;
  }

  if (is_safari || is_windows) {
    $('body').css('-webkit-text-stroke', '0.25px');
  }

  /**
   * Nav behavior
   *
   */
  $mainHeader.on('click', '.nav-trigger', (evt) => {
    evt.preventDefault();
    $mainHeader.toggleClass('nav-open');
  });


});
