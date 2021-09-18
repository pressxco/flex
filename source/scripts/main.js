/**
 * Theme Main JS
 *
 */

(function ($) {

  $('.hamburger').on('click', function () {

    $('nav.mobile').slideToggle(200);

  });

  new Moby({
    menu: $('.primary-menu'), // The menu that will be cloned
    mobyTrigger: $('.mobile-trigger'), // Button that will trigger the Moby menu to open
    breakpoint: 1024,
    enableEscape: true,
    overlay: true,
    overlayClass: 'dark',
    subMenuOpenIcon: '<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="ChevronDown"><path d="M4 9l8 8 8-8"/></svg></span>',
    subMenuCloseIcon: '<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="ChevronUp"><path d="M4 15l8-8 8 8"/></svg></span>',
    template: '<div class="moby-wrap"><div class="moby-close"><svg class="mr-2" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 1L1 9M9 9L1 1L9 9Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg> Close Menu</div><div class="moby-menu"></div></div>'
  });


})(jQuery);
