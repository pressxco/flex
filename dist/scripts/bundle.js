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

/*! lazysizes - v5.3.2 */
window.lazySizesConfig = window.lazySizesConfig || {};
lazySizesConfig.loadMode = 1;
!function (e) { var t = function (u, D, f) { "use strict"; var k, H; if (function () { var e; var t = { lazyClass: "lazyload", loadedClass: "lazyloaded", loadingClass: "lazyloading", preloadClass: "lazypreload", errorClass: "lazyerror", autosizesClass: "lazyautosizes", fastLoadedClass: "ls-is-cached", iframeLoadMode: 0, srcAttr: "data-src", srcsetAttr: "data-srcset", sizesAttr: "data-sizes", minSize: 40, customMedia: {}, init: true, expFactor: 1.5, hFac: .8, loadMode: 2, loadHidden: true, ricTimeout: 0, throttleDelay: 125 }; H = u.lazySizesConfig || u.lazysizesConfig || {}; for (e in t) { if (!(e in H)) { H[e] = t[e] } } }(), !D || !D.getElementsByClassName) { return { init: function () { }, cfg: H, noSupport: true } } var O = D.documentElement, i = u.HTMLPictureElement, P = "addEventListener", $ = "getAttribute", q = u[P].bind(u), I = u.setTimeout, U = u.requestAnimationFrame || I, o = u.requestIdleCallback, j = /^picture$/i, r = ["load", "error", "lazyincluded", "_lazyloaded"], a = {}, G = Array.prototype.forEach, J = function (e, t) { if (!a[t]) { a[t] = new RegExp("(\\s|^)" + t + "(\\s|$)") } return a[t].test(e[$]("class") || "") && a[t] }, K = function (e, t) { if (!J(e, t)) { e.setAttribute("class", (e[$]("class") || "").trim() + " " + t) } }, Q = function (e, t) { var a; if (a = J(e, t)) { e.setAttribute("class", (e[$]("class") || "").replace(a, " ")) } }, V = function (t, a, e) { var i = e ? P : "removeEventListener"; if (e) { V(t, a) } r.forEach(function (e) { t[i](e, a) }) }, X = function (e, t, a, i, r) { var n = D.createEvent("Event"); if (!a) { a = {} } a.instance = k; n.initEvent(t, !i, !r); n.detail = a; e.dispatchEvent(n); return n }, Y = function (e, t) { var a; if (!i && (a = u.picturefill || H.pf)) { if (t && t.src && !e[$]("srcset")) { e.setAttribute("srcset", t.src) } a({ reevaluate: true, elements: [e] }) } else if (t && t.src) { e.src = t.src } }, Z = function (e, t) { return (getComputedStyle(e, null) || {})[t] }, s = function (e, t, a) { a = a || e.offsetWidth; while (a < H.minSize && t && !e._lazysizesWidth) { a = t.offsetWidth; t = t.parentNode } return a }, ee = function () { var a, i; var t = []; var r = []; var n = t; var s = function () { var e = n; n = t.length ? r : t; a = true; i = false; while (e.length) { e.shift()() } a = false }; var e = function (e, t) { if (a && !t) { e.apply(this, arguments) } else { n.push(e); if (!i) { i = true; (D.hidden ? I : U)(s) } } }; e._lsFlush = s; return e }(), te = function (a, e) { return e ? function () { ee(a) } : function () { var e = this; var t = arguments; ee(function () { a.apply(e, t) }) } }, ae = function (e) { var a; var i = 0; var r = H.throttleDelay; var n = H.ricTimeout; var t = function () { a = false; i = f.now(); e() }; var s = o && n > 49 ? function () { o(t, { timeout: n }); if (n !== H.ricTimeout) { n = H.ricTimeout } } : te(function () { I(t) }, true); return function (e) { var t; if (e = e === true) { n = 33 } if (a) { return } a = true; t = r - (f.now() - i); if (t < 0) { t = 0 } if (e || t < 9) { s() } else { I(s, t) } } }, ie = function (e) { var t, a; var i = 99; var r = function () { t = null; e() }; var n = function () { var e = f.now() - a; if (e < i) { I(n, i - e) } else { (o || r)(r) } }; return function () { a = f.now(); if (!t) { t = I(n, i) } } }, e = function () { var v, m, c, h, e; var y, z, g, p, C, b, A; var n = /^img$/i; var d = /^iframe$/i; var E = "onscroll" in u && !/(gle|ing)bot/.test(navigator.userAgent); var _ = 0; var w = 0; var M = 0; var N = -1; var L = function (e) { M--; if (!e || M < 0 || !e.target) { M = 0 } }; var x = function (e) { if (A == null) { A = Z(D.body, "visibility") == "hidden" } return A || !(Z(e.parentNode, "visibility") == "hidden" && Z(e, "visibility") == "hidden") }; var W = function (e, t) { var a; var i = e; var r = x(e); g -= t; b += t; p -= t; C += t; while (r && (i = i.offsetParent) && i != D.body && i != O) { r = (Z(i, "opacity") || 1) > 0; if (r && Z(i, "overflow") != "visible") { a = i.getBoundingClientRect(); r = C > a.left && p < a.right && b > a.top - 1 && g < a.bottom + 1 } } return r }; var t = function () { var e, t, a, i, r, n, s, o, l, u, f, c; var d = k.elements; if ((h = H.loadMode) && M < 8 && (e = d.length)) { t = 0; N++; for (; t < e; t++) { if (!d[t] || d[t]._lazyRace) { continue } if (!E || k.prematureUnveil && k.prematureUnveil(d[t])) { R(d[t]); continue } if (!(o = d[t][$]("data-expand")) || !(n = o * 1)) { n = w } if (!u) { u = !H.expand || H.expand < 1 ? O.clientHeight > 500 && O.clientWidth > 500 ? 500 : 370 : H.expand; k._defEx = u; f = u * H.expFactor; c = H.hFac; A = null; if (w < f && M < 1 && N > 2 && h > 2 && !D.hidden) { w = f; N = 0 } else if (h > 1 && N > 1 && M < 6) { w = u } else { w = _ } } if (l !== n) { y = innerWidth + n * c; z = innerHeight + n; s = n * -1; l = n } a = d[t].getBoundingClientRect(); if ((b = a.bottom) >= s && (g = a.top) <= z && (C = a.right) >= s * c && (p = a.left) <= y && (b || C || p || g) && (H.loadHidden || x(d[t])) && (m && M < 3 && !o && (h < 3 || N < 4) || W(d[t], n))) { R(d[t]); r = true; if (M > 9) { break } } else if (!r && m && !i && M < 4 && N < 4 && h > 2 && (v[0] || H.preloadAfterLoad) && (v[0] || !o && (b || C || p || g || d[t][$](H.sizesAttr) != "auto"))) { i = v[0] || d[t] } } if (i && !r) { R(i) } } }; var a = ae(t); var S = function (e) { var t = e.target; if (t._lazyCache) { delete t._lazyCache; return } L(e); K(t, H.loadedClass); Q(t, H.loadingClass); V(t, B); X(t, "lazyloaded") }; var i = te(S); var B = function (e) { i({ target: e.target }) }; var T = function (e, t) { var a = e.getAttribute("data-load-mode") || H.iframeLoadMode; if (a == 0) { e.contentWindow.location.replace(t) } else if (a == 1) { e.src = t } }; var F = function (e) { var t; var a = e[$](H.srcsetAttr); if (t = H.customMedia[e[$]("data-media") || e[$]("media")]) { e.setAttribute("media", t) } if (a) { e.setAttribute("srcset", a) } }; var s = te(function (t, e, a, i, r) { var n, s, o, l, u, f; if (!(u = X(t, "lazybeforeunveil", e)).defaultPrevented) { if (i) { if (a) { K(t, H.autosizesClass) } else { t.setAttribute("sizes", i) } } s = t[$](H.srcsetAttr); n = t[$](H.srcAttr); if (r) { o = t.parentNode; l = o && j.test(o.nodeName || "") } f = e.firesLoad || "src" in t && (s || n || l); u = { target: t }; K(t, H.loadingClass); if (f) { clearTimeout(c); c = I(L, 2500); V(t, B, true) } if (l) { G.call(o.getElementsByTagName("source"), F) } if (s) { t.setAttribute("srcset", s) } else if (n && !l) { if (d.test(t.nodeName)) { T(t, n) } else { t.src = n } } if (r && (s || l)) { Y(t, { src: n }) } } if (t._lazyRace) { delete t._lazyRace } Q(t, H.lazyClass); ee(function () { var e = t.complete && t.naturalWidth > 1; if (!f || e) { if (e) { K(t, H.fastLoadedClass) } S(u); t._lazyCache = true; I(function () { if ("_lazyCache" in t) { delete t._lazyCache } }, 9) } if (t.loading == "lazy") { M-- } }, true) }); var R = function (e) { if (e._lazyRace) { return } var t; var a = n.test(e.nodeName); var i = a && (e[$](H.sizesAttr) || e[$]("sizes")); var r = i == "auto"; if ((r || !m) && a && (e[$]("src") || e.srcset) && !e.complete && !J(e, H.errorClass) && J(e, H.lazyClass)) { return } t = X(e, "lazyunveilread").detail; if (r) { re.updateElem(e, true, e.offsetWidth) } e._lazyRace = true; M++; s(e, t, r, i, a) }; var r = ie(function () { H.loadMode = 3; a() }); var o = function () { if (H.loadMode == 3) { H.loadMode = 2 } r() }; var l = function () { if (m) { return } if (f.now() - e < 999) { I(l, 999); return } m = true; H.loadMode = 3; a(); q("scroll", o, true) }; return { _: function () { e = f.now(); k.elements = D.getElementsByClassName(H.lazyClass); v = D.getElementsByClassName(H.lazyClass + " " + H.preloadClass); q("scroll", a, true); q("resize", a, true); q("pageshow", function (e) { if (e.persisted) { var t = D.querySelectorAll("." + H.loadingClass); if (t.length && t.forEach) { U(function () { t.forEach(function (e) { if (e.complete) { R(e) } }) }) } } }); if (u.MutationObserver) { new MutationObserver(a).observe(O, { childList: true, subtree: true, attributes: true }) } else { O[P]("DOMNodeInserted", a, true); O[P]("DOMAttrModified", a, true); setInterval(a, 999) } q("hashchange", a, true);["focus", "mouseover", "click", "load", "transitionend", "animationend"].forEach(function (e) { D[P](e, a, true) }); if (/d$|^c/.test(D.readyState)) { l() } else { q("load", l); D[P]("DOMContentLoaded", a); I(l, 2e4) } if (k.elements.length) { t(); ee._lsFlush() } else { a() } }, checkElems: a, unveil: R, _aLSL: o } }(), re = function () { var a; var n = te(function (e, t, a, i) { var r, n, s; e._lazysizesWidth = i; i += "px"; e.setAttribute("sizes", i); if (j.test(t.nodeName || "")) { r = t.getElementsByTagName("source"); for (n = 0, s = r.length; n < s; n++) { r[n].setAttribute("sizes", i) } } if (!a.detail.dataAttr) { Y(e, a.detail) } }); var i = function (e, t, a) { var i; var r = e.parentNode; if (r) { a = s(e, r, a); i = X(e, "lazybeforesizes", { width: a, dataAttr: !!t }); if (!i.defaultPrevented) { a = i.detail.width; if (a && a !== e._lazysizesWidth) { n(e, r, i, a) } } } }; var e = function () { var e; var t = a.length; if (t) { e = 0; for (; e < t; e++) { i(a[e]) } } }; var t = ie(e); return { _: function () { a = D.getElementsByClassName(H.autosizesClass); q("resize", t) }, checkElems: t, updateElem: i } }(), t = function () { if (!t.i && D.getElementsByClassName) { t.i = true; re._(); e._() } }; return I(function () { H.init && t() }), k = { cfg: H, autoSizer: re, loader: e, init: t, uP: Y, aC: K, rC: Q, hC: J, fire: X, gW: s, rAF: ee } }(e, e.document, Date); e.lazySizes = t, "object" == typeof module && module.exports && (module.exports = t) }("undefined" != typeof window ? window : {});

(function (global, factory) {
  typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
  typeof define === 'function' && define.amd ? define(factory) :
  (global.scrollpup = factory());
}(this, (function () { 'use strict';

  var ScrollPup = function ScrollPup (opts) {
    var this$1 = this;

    var defaults = {
      background: 'linear-gradient(to right, #36d1dc, #5b86e5)',
      height: '10px'
    };

    Object.assign(this, defaults);
    Object.assign(this, opts);

    this.init = false;

    window.addEventListener('scroll', function (e) { return this$1.run(this$1); });
  };

  ScrollPup.prototype.run = function run (opts) {
    if (!this.init) {
      var scrollbar$1 = document.createElement('div');
      scrollbar$1.classList = 'scroll-pup';
      document.body.appendChild(scrollbar$1);

      this.init = true;
    }

    var scrollbar = document.querySelector('.scroll-pup');
    var fullPage = document.documentElement;
    var fullBody = document.body;
    var percent = Math.floor((fullPage['scrollTop'] || fullBody['scrollTop']) / ((fullPage['scrollHeight'] || fullBody['scrollHeight']) - fullPage.clientHeight) * 100);

    scrollbar.style.height = opts.height;
    scrollbar.style.background = opts.background;
    scrollbar.style.width = percent + '%';
    scrollbar.style.position = 'fixed';
    scrollbar.style.top = 0;
    scrollbar.style.right = 0;
    scrollbar.style.left = 0;
  };

  var scrollpup = function (opts) { return new ScrollPup(opts); };

  return scrollpup;

})));

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
