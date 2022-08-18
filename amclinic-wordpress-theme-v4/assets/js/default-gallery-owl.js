jQuery(document).ready(function ($) {
  // default wp gallery
  let siteWideCarousel = $('.site-wide-carousel');
  siteWideCarousel.owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    dots: true,
    center: true,
    items: 1,
    autoHeight: true,
  });

  $('.custom-next').click(function () {
    siteWideCarousel.trigger('next.owl.carousel');
  });
  $('.custom-prev').click(function () {
    siteWideCarousel.trigger('prev.owl.carousel');
  });
});
