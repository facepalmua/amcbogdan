/**
 * Created by Matt on 20/01/2016.
 */

function responsiveTwitterWidget() {
  var widget = jQuery('#twitter-widget-0');
  var frame_style = widget.attr('style');
  widget.attr('style', frame_style + ' max-width:none !important; width:100%');
  if (widget) {
    var head = widget.contents().find('head');
    if (head.length) {
      head.append(
        '<style>.timeline-Widget{max-width: 100% !important; width: 100% !important;} .timeline { max-width: 100% !important; width: 100% !important; } .timeline .stream { max-width: none !important; width: 100% !important; }</style>',
      );
    }
    widget.append(jQuery('<div class=timeline>'));
    widget.contents().find('.MediaCard').hide();
    widget.contents().find('.timeline-Tweet-media').hide();
  }
}

jQuery(document).ready(function ($) {
  //TWITTER WIDGET
  !(function (d, s, id) {
    var js,
      fjs = d.getElementsByTagName(s)[0],
      p = /^http:/.test(d.location) ? 'http' : 'https';
    if (!d.getElementById(id)) {
      js = d.createElement(s);
      js.id = id;
      js.src = p + '://platform.twitter.com/widgets.js';
      js.setAttribute(
        'onload',
        "twttr.events.bind('rendered',function(e) {responsiveTwitterWidget()});",
      );
      fjs.parentNode.insertBefore(js, fjs);
    }
  })(document, 'script', 'twitter-wjs');

  //UNVEIL LARGE IMAGES
  $('#large-advert-images .reveal_img').unveil(200);
  const owl = $('.hero-carousel');
  owl.owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    dots: true,
    items: 1,
    dotsContainer: '.carousel-custom-dots',
    navText: [$('.am-next'), $('.am-prev')],
    // autoplay: true,
    // autoPlaySpeed: 5000,
    // autoPlayTimeout: 5000,
    // autoplayHoverPause: true,
  });

  $('.owl-dot').click(function () {
    owl.owlCarousel().trigger('to.owl.carousel', [$(this).index(), 300]);
  });
});
