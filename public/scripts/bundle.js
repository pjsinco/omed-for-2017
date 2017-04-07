'use strict';

/* @source https://codyhouse.co/gem/auto-hiding-navigation */

jQuery(document).ready(function ($) {

  var scrolling = false,
      currentTop = 0,
      previousTop = 0,
      scrollDelta = 10,
      scrollOffset = 150;

  var $belowSplash = $('.splash'),
      $mainHeader = $('.header'),
      headerHeight = $mainHeader.height();

  var checkNavigation = function checkNavigation(currentTop) {

    if (previousTop - currentTop > scrollDelta) {
      $mainHeader.removeClass('is-hidden');
    } else if (currentTop - previousTop > scrollDelta && currentTop > scrollOffset) {
      $mainHeader.addClass('is-hidden');
    }
  };

  var autoHideHeader = function autoHideHeader() {
    currentTop = $(window).scrollTop();

    checkNavigation(currentTop);

    previousTop = currentTop;
    scrolling = false;
  };

  $(window).on('scroll', function () {

    if (!scrolling) {
      scrolling = true;

      !window.requestAnimationFrame ? setTimeout(autoHideHeader, 250) : requestAnimationFrame(autoHideHeader);
    }
  });

  $mainHeader.on('click', '.nav-trigger', function (evt) {
    evt.preventDefault();
    $mainHeader.toggleClass('nav-open');
  });
});
//# sourceMappingURL=bundle.js.map
