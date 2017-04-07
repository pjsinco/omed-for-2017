/* @source https://codyhouse.co/gem/auto-hiding-navigation */

jQuery(document).ready(($) => {

  let scrolling = false,
      currentTop = 0,
      previousTop = 0,
      scrollDelta = 10,
      scrollOffset = 150;

  const $belowSplash = $('.splash'),
        $mainHeader  = $('.header'),
        headerHeight = $mainHeader.height();

  const checkNavigation = (currentTop) => {

    if (previousTop - currentTop > scrollDelta) {
      $mainHeader.removeClass('is-hidden');
    } else if (currentTop - previousTop > scrollDelta && 
               currentTop > scrollOffset) {
      $mainHeader.addClass('is-hidden');
    }
  };

  const autoHideHeader = () => {
    currentTop = $(window).scrollTop();

    checkNavigation(currentTop);

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
