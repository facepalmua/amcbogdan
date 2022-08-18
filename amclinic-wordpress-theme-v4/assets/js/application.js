/*-------------------------------------------------

 Author : Dario Guida, Matt Manning
 Company : Acumedic
 Date of Development : 1/10/2015
 Version: 1.0
 --------------------------------------------------*/

var amclinic = {


	add_touch_support: function(){
		if(!jQuery.mobile) {
			jQuery.holdReady(true);
			jQuery.getScript(amcGlobals.themeUri+"/assets/js/vendor/jquery.mobile.custom.min.js", function (data, status, jqxhr) {
				jQuery.holdReady(false);
				console.log('added touch support');
			});
		}
	},

	add_form_support: function() {

		if(!jQuery().validator) {
			jQuery.holdReady(true);
			jQuery.getScript(amcGlobals.themeUri+"/assets/js/vendor/form_validator.min.js", function (data, status, jqxhr) {
				jQuery.holdReady(false);
				console.log('added form validation support');
			});
		}

		if(!this.date_fields_supported()){
			this.add_date_fields_support();
		}
	},

	date_fields_supported: function() {
		var input = document.createElement('input');
		input.setAttribute('type','date');

		var notADateValue = 'not-a-date';
		input.setAttribute('value', notADateValue);

		return (input.value !== notADateValue);
	},

	add_date_fields_support: function(){

		if(!Picker()) {
			var lnk = document.createElement('link');
			lnk.type='text/css';
			lnk.href=amcGlobals.themeUri+'/assets/css/picker.date.css';
			lnk.rel='stylesheet';
			document.getElementsByTagName('head')[0].appendChild(lnk);

			jQuery.holdReady(true);
			jQuery.getScript(amcGlobals.themeUri+"/assets/js/vendor/picker.date.min.js", function (data, status, jqxhr) {
				jQuery.holdReady(false);
				jQuery('.datepicker').pickadate();
				console.log('added date picker support');
			});
		} else {
			jQuery('.datepicker').pickadate();
		}
	},

	ajax_alert: function(msg, context){
		container = jQuery('#ajax-msg');
		container.attr('class', 'bg-'+context);
		container.find('.ajax-msg').html(msg);
		container.show(0).delay(5000).hide(0);
	},

	auto_accordion: function(hn){
		if(isNaN(parseInt(hn))){
			return;
		}

		var i = hn;
		var nextuntil = '';
		while (i > 0){
			nextuntil += 'h'+i+',';
			i--;
		}
		//nextuntil = nextuntil.slice(0, -1);
		nextuntil += 'hr';

		var h_count = 0;
		let toggleSelector = jQuery('.entry-content > h'+hn);
		if (toggleSelector.length == 0) {
			toggleSelector = jQuery('.list h'+hn);
		}
		console.log(toggleSelector)
		toggleSelector.each(function(index){
			h_count++;
			jQuery(this).nextUntil(nextuntil).wrapAll('<div class="collapse" id="autoaccordion'+h_count+'"></div>');
			jQuery(this).wrap('<a role="button" data-toggle="collapse" href="#autoaccordion'+h_count+'" aria-expanded="false" aria-controls="autoaccordion'+h_count+'"></a>');

		});
	},
	responsive_youtube: function(){
		//make oembed youtube videos responsive
		var all_oembed_videos = jQuery("iframe[src*='youtube']");
		all_oembed_videos.each(function() {
			jQuery(this).removeAttr('height').removeAttr('width').wrap( "<div class='youtube-embed-container'></div>" );
		});
	},
	carousel_add_parralax: function(){
		(function($) {
			console.log('parallax')
			//DO PARRALAX effect
			var $window = $(window)
			var $document = $(document)

			var itemContext = []
			var maxScrollTop = $document.height() - $window.height()
			var currentScrollTop = $window.scrollTop()

			function scrollContext(context) {
				// Can not see the current item
				if (currentScrollTop < context.scrollTop.min ||
					currentScrollTop > context.scrollTop.max) {
					return
				}

				var ratio = (currentScrollTop - context.scrollTop.min) / context.scrollTop.delta;

				context.$image.css('top', (1 - ratio) * context.imageTopMin)

				if (context.scrollTop.min === 0) {
					ratio = .5 + ratio / 2 // [0, 1] -> [.5, 1]
				} else if (context.scrollTop.max === maxScrollTop) {
					ratio = ratio / 2 // [0, 1] -> [0, .5]
				}
				context.$caption.css({
					//'top': ratio * context.captionTopMax,
					'opacity': 1 - Math.abs(.5 - ratio) * 2
				})
			}

			function updateContext(context) {
				var carouselTop = context.$carousel.offset().top
				var carouselHeight = context.$carousel.height()

				var scrollTop = {
					'min': carouselTop - $window.height(),
					'max': carouselTop + carouselHeight
				}

				if (scrollTop.min < 0) // show on top
					scrollTop.min = 0

				if (scrollTop.max > maxScrollTop) // show on bottom
					scrollTop.max = maxScrollTop

				scrollTop.delta = scrollTop.max - scrollTop.min
				context.scrollTop = scrollTop

				setTimeout(function () {
					// image: max is 0, delta is -min
					context.imageTopMin = carouselHeight - context.$image.height()
					// caption: min is 0, delta is max
					//context.captionTopMax = carouselHeight - context.$caption.height()
					// update position
					scrollContext(context)
				}, 0)
			}

			function scroll() {
				currentScrollTop = $window.scrollTop();

				for (var i = 0, l = itemContext.length; i < l; i++) {
					scrollContext(itemContext[i])
				}
			}

			function update() {
				maxScrollTop = $document.height() - $window.height()
				currentScrollTop = $window.scrollTop()

				for (var i = 0, l = itemContext.length; i < l; i++) {
					updateContext(itemContext[i])
				}
			}

			function addContext(carousel, item) {
				// build context of new items only
				for (var i = 0, l = itemContext.length; i < l; i++) {
					if (itemContext[i].item === item) {
						return
					}
				}

				// set some parallax style
				var $carousel = $(carousel)
				var $image = $('img', item).css('position', 'relative')
				var $caption = $('.carousel-caption', item); //.css('padding', 0)
				//$caption.children().css('margin', 0)

				// initialize the context
				var context = {
					'item': item,
					'$carousel': $carousel,
					'$image': $image,
					'$caption': $caption
				}

				updateContext(context)
				itemContext.push(context)
			}

			$window.on('load', function () {
				$('[data-ride="carousel"]').each(function () {
					addContext(this, $('.item', this)[0])
				})
			})

			var originalCarousel = $.fn.carousel
			$.fn.carousel = function () {
				originalCarousel.apply(this, arguments)
				addContext(this, $('.item', this)[0])
			}

			$document.on('slide.bs.carousel', function (event) {
				addContext(event.target, event.relatedTarget)
			})

			$window.on('resize', update);
			$window.on('scroll', scroll);
		})(jQuery)
	},
	carousel_setup: function(win_width){
		this.set_carousel_height(win_width);
		this.set_carousel_images(win_width);
	},
	set_carousel_height: function(win_width) {
		(function($) {
			if($('#main-carousel').length == 0){
				return;
			}
			var carousel_height = 500;
			console.log(win_width);
			if(win_width < 1920) {
				carousel_height = (500 / 1920) * win_width;
			}
			console.log('set '+carousel_height);
			$('#main-carousel').height(carousel_height);
		})(jQuery)
	},
	set_carousel_images: function(win_width){
		(function($) {
			if($('#main-carousel').length == 0){
				return;
			}

			//LOAD BEST SIZE IMAGES FOR CAROUSEL
			if (win_width >= 1000) {
				$( ".carousel-img-large" ).each(function( index ) {
					this.setAttribute("src", this.getAttribute("data-src"));
				});
				amclinic.carousel_add_parralax();
			}
			else if (win_width >= 760) {
				$( ".carousel-img-medium" ).each(function( index ) {
					this.setAttribute("src", this.getAttribute("data-src"));
				});
			}
			else if (win_width < 760) {
				$( ".carousel-img-small" ).each(function( index ) {
					this.setAttribute("src", this.getAttribute("data-src"));
				});
			}
		})(jQuery)
	}

}



jQuery(document).ready(function($){

	var width = $(window).width();
	amclinic.carousel_setup(width);
	var timer_id;
	$(window).resize(function() {
		clearTimeout(timer_id);
		timer_id = setTimeout(function() {
				amclinic.set_carousel_height($(this).width());
		}, 300);
	});


	amclinic.responsive_youtube();


	//class to make div containers clickable
	$('div.clickable').click(function(event){

		var link = $(this).children("a").first();

		if(!$(event.target).is('a')) {
			if (HTMLElement.prototype.click) {
				link[0].click();
			} else {
				window.location = link.attr("href");
			}
			return false;
		}

	});


	//dropdown navigation effect
	$('ul.nav li.dropdown').hover(function() {
		$('.treatment-description-li').hide();

		/* Only show extra if screen window wide enough */
		if( $(window).width() < 768){
			return false;
		}
		$(this).find(' > .dropdown-menu').stop(true, true).delay(200).fadeIn();
	}, function() {
		/* Only show extra if screen window wide enough */
		if( $(window).width() < 768){
			return false;
		}
		$(this).find(' > .dropdown-menu').stop(true, true).delay(200).fadeOut();
	});

	//dropdown navigation effect
	$('.menu-second-dropdown-container li').hover(function() {

		/* Only show extra if screen window wide enough */
		if( $(window).width() < 900){
			return false;
		}

		/*
		 Each LI item in the second menu level can have a description.
		 This will be placed as the next LI with the class = 'treatment-description-li'
		 */
		var next_li = $(this).next();
		if(next_li.hasClass('treatment-description-li')){
			$('.treatment-description-li').hide();
			next_li.show();
			var img_item = next_li.find(".image-item");
			if(img_item) {
				img_item.unveil(0, function () {
					$(this).load(function () {
						this.style.opacity = 1;
					});
				});
			}
		}
	});

	//links can submit form
	$('form a.submit').click(function(){
		$(this).closest("form").submit();
		return false;
	});

	amclinic.carousel_add_parralax();

	//quick newsletter sign ups
	$("form.subscribe_ajax_json").submit(function(){
		var data = {};
		data = $(this).serialize() + "&" + $.param(data);
		dataLayer.push({
			'event' : 'eventTracking',
			'eventCategory' : 'Form',
			'eventAction' : 'Submit',
			'eventLabel' : 'am-subscribe-form'
		});
		$.ajax({
			type: "POST",
			dataType: "json",
			url: "/email-updates/process.php",
			data: data,
			success: function(data) {
				if(data["error"]){
					amclinic.ajax_alert(data["msg"],'danger');
					dataLayer.push({
						'event' : 'eventTracking',
						'eventCategory' : 'Form',
						'eventAction' : 'Error',
						'eventLabel' : 'am-subscribe-form'
					});
				} else {
					amclinic.ajax_alert(data["msg"],'success');
					dataLayer.push({
						'event' : 'eventTracking',
						'eventCategory' : 'Form',
						'eventAction' : 'Success',
						'eventLabel' : 'am-subscribe-form'
					});
				}
			}
		});
		return false;
	});

});


