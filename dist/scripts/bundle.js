/**
 * T A B L E   O F   C O N T E N T S
 *
 * @author      Josh Sanger
 * @version     2.0.6
 *
 * 01. INIT MOBY
 * 02. CLASS VARIABLES
 * 03. CLOSE MOBY
 * 04. CLONE MENU
 * 05. OPEN MOBY
 * 06. BREAKPOINT RESIZE
 * 07. MOBY EXPAND SUB MENU
 * 06. MOBY PREVENT DUMMY LINKS
 */


/**
 * 01. INIT MOBY
 * Sets up the Moby class
 */


var Moby = function (options) {

  Moby.instances++;

  // Set defaults



  this.breakpoint = (typeof (options.breakpoint) == 'undefined' ? 1024 : options.breakpoint);
  this.enableEscape = (typeof (options.enableEscape) == 'undefined' ? true : options.enableEscape);
  this.menu = (typeof (options.menu) == 'undefined' ? jQuery('#main-nav') : options.menu);
  this.menuClass = (typeof (options.menuClass) == 'undefined' ? 'right-side' : options.menuClass);
  this.mobyTrigger = (typeof (options.mobyTrigger) == 'undefined' ? jQuery('#moby-button') : options.mobyTrigger);
  this.onClose = (typeof (options.onClose) == 'undefined' ? false : options.onClose);;
  this.onOpen = (typeof (options.onOpen) == 'undefined' ? false : options.onOpen);;
  this.overlay = (typeof (options.overlay) == 'undefined' ? true : options.overlay);
  this.overlayClass = (typeof (options.overlayClass) == 'undefined' ? 'dark' : options.overlayClass);
  this.subMenuOpenIcon = (typeof (options.subMenuOpenIcon) == 'undefined' ? '<span>&#x25BC;</span>' : options.subMenuOpenIcon);
  this.subMenuCloseIcon = (typeof (options.subMenuCloseIcon) == 'undefined' ? '<span>&#x25B2;</span>' : options.subMenuCloseIcon);
  this.template = (typeof (options.template) == 'undefined' ? false : options.template);

  // add the overlay to the beginning of the body
  if (this.overlay === true) {

    jQuery('body').prepend('<div class="moby-overlay ' + this.overlayClass + '" id="moby-overlay' + Moby.instances + '"></div>');
    this.overlaySelector = jQuery('body').find('#moby-overlay' + Moby.instances);
    this.overlaySelector.on('click', this.closeMoby.bind(this));
  }

  // add moby markup
  jQuery('body').prepend('<div class="moby moby-hidden ' + this.menuClass + '" id="moby' + Moby.instances + '"></div>');
  this.mobySelector = jQuery('body').find('#moby' + Moby.instances);
  this.cloneMenu();

  // assign close function
  this.mobySelector.on('click', '.moby-close', this.closeMoby.bind(this));

  // if the escapeLey functinality is desired (or left undefined), assign close function to the escape key
  if (this.enableEscape === true) {

    jQuery(document).on('keydown', function (e) {

      if (e.keyCode == 27) {
        this.closeMoby();
      }
    }.bind(this));
  }

  // assign the open function to the mobyTrigger
  this.mobyTrigger.on('click', this.openMoby.bind(this));

  // Assign breakpointResize function when the window resizes
  jQuery(window).on('resize', this.breakpointResize.bind(this));

  // Assign mobyExpandSubMenu to sub menu icons
  this.mobySelector.on('click', '.moby-expand', function (e) {

    e.preventDefault();
    e.stopPropagation();
    this.mobyExpandSubMenu(jQuery(e.currentTarget));
  }.bind(this));

  // Assign mobyPreventDummyLinks to links
  this.mobySelector.on('click', 'a', this.mobyPreventDummyLinks.bind(this));
};


/**
 * 02. CLASS VARIABLES
 * Variables that will be used throughout the class
 */
Moby.instances = 0;
Moby.slideTransition = 200;


/**
 * 03. CLOSE MOBY
 * Closes the Moby menu
 */
Moby.prototype.closeMoby = function () {

  var mobyActive = jQuery('body').find('.moby.moby-active');

  if (mobyActive.length > 0) {

    if (this.overlay === true) {
      jQuery('body').find('.moby-overlay.moby-overlay-active').removeClass('moby-overlay-active');
    }
    mobyActive.removeClass('moby-active');
    jQuery('body').removeClass('moby-body-fixed');

    if (this.onClose !== false) {
      this.onClose();
    }
  }
};


/**
 * 04. CLONE MENU
 * Clones the menu that the user specified and removes all ids
 */
Moby.prototype.cloneMenu = function () {

  var mobyMarkup = '';
  var submenuIcon = this.subMenuOpenIcon;

  if (this.template === false) {
    mobyMarkup = '<div class="moby-wrap">';
    mobyMarkup += '<div class="moby-close"><span class="moby-close-icon"></span> Close Menu</div>';
    mobyMarkup += '<div class="moby-menu"></div>';
    mobyMarkup += '</div>';
  } else {
    mobyMarkup = this.template;
  }

  this.mobySelector.append(mobyMarkup);

  if (this.mobySelector.find('.moby-menu').length < 1) {
    console.error('You must have a moby-menu class in your template!');
    return false;
  }

  this.menu.clone().appendTo(this.mobySelector.find('.moby-menu'));

  this.mobySelector.find('.moby-menu *[id]').removeAttr('id');

  this.mobySelector.find('.moby-menu li').each(function () {

    if (jQuery(this).find('ul').length > 0) {
      jQuery(this).find('> a').append("<span class='moby-expand'>" + submenuIcon + '</span>');
    }
  });

  this.mobySelector.removeClass('moby-hidden');
};


/**
 * 05. OPEN MOBY
 * Opens the Moby menu
 */
Moby.prototype.openMoby = function () {

  // moby-active should be used to initiate the animation in your css file
  this.mobySelector.addClass('moby-active');

  // When the menu is open, don't allow the user to scroll through the page
  jQuery('body').addClass('moby-body-fixed');

  // Show the overlay
  if (this.overlay === true) {
    this.overlaySelector.addClass('moby-overlay-active');
  }

  if (this.onOpen !== false) {
    this.onOpen();
  }
};


/**
 * 06. BREAKPOINT RESIZE
 * Checks to see if the viewport width has changed. If so, close the menu
 */
Moby.prototype.breakpointResize = function () {

  var w = window.outerWidth;

  if (this.breakpoint === false) {
    return false;
  } else {

    if (w >= this.breakpoint && this.mobySelector.hasClass('moby-active')) {
      this.closeMoby();
    }
  }
};


/**
 * 07. MOBY EXPAND SUB MENU
 * Expands the sub menu (nested <ul>)
 *
 * @param       elem        element     The element that was clicked
 */
Moby.prototype.mobyExpandSubMenu = function (elem) {

  if (!elem.hasClass('moby-submenu-open')) {
    elem.addClass('moby-submenu-open');
    elem.html(this.subMenuCloseIcon);
    elem.parents('li').first().find('> ul').slideDown(Moby.slideTransition);
  } else {
    elem.removeClass('moby-submenu-open');
    elem.html(this.subMenuOpenIcon);
    elem.parents('li').first().find('> ul').slideUp(Moby.slideTransition);
  }
};


/**
 * 06. MOBY PREVENT DUMMY LINKS
 * Prevents the default link behavior on links with no URL, then triggers the .moby-expand
 */
Moby.prototype.mobyPreventDummyLinks = function (e) {

  var mobyExpand = jQuery(this).find('> .moby-expand');

  if (jQuery(this).attr('href') == "#") {

    e.preventDefault();

    if (mobyExpand.length > 0) {
      mobyExpand.trigger('click');
    }
  }
};

/**
 * Theme Main JS
 *
 */

(function ($) {

  $('.hamburger').on('click', function () {

    $('nav.mobile').slideToggle(200);

  });

  var menuItems = $(".primary-menu").find('li');

  $.each(menuItems, function () {

    if ($(this).hasClass('menu-item-has-children')) {

      $(this).children('a').append('<span class="chevron"><svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L4 4L7 1" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/></svg></span>');

    }

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
