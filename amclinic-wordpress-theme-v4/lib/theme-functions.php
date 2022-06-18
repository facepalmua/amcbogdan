<?php

/**
 * _amclinictheme theme functions definted in /lib/init.php
 *
 * @package _amclinictheme
 */


/**
 * Register Widget Areas
 */
function am_widgets_init()
{
	// Main Sidebar
	register_sidebar(
		array(
			'name'          => __('Sidebar', '_amclinictheme'),
			'id'            => 'sidebar',
			'description'   => '',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<p class="lead" style="margin-bottom: 0;">',
			'after_title'   => '</p>',
		)
	);

	//Content Whitebar
	register_sidebar(
		array(
			'name'          => __('Whitebar', '_amclinictheme'),
			'id'            => 'whitebar',
			'description'   => '',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<p class="lead" style="margin-bottom: 0;">',
			'after_title'   => '</p>',
		)
	);

	//Content Whitebar
	register_sidebar(
		array(
			'name'          => __('After Whitebar', '_amclinictheme'),
			'id'            => 'after-whitebar',
			'description'   => '',
			'before_widget' => '<div class="col-xs-12 col-md-6 col-lg-4">',
			'after_widget'  => '</div>',
			'before_title'  => '<p class="lead" style="margin-bottom: 0;">',
			'after_title'   => '</p>',
		)
	);


	register_widget('AMClinic_Treatment_Nav');
	register_widget('AMClinic_Page_SubNav');
}

/**
 * Remove Dashboard Meta Boxes
 */
function am_remove_dashboard_widgets()
{
	global $wp_meta_boxes;
	// unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}

/**
 * Change Admin Menu Order
 */
function am_custom_menu_order($menu_ord)
{
	if (!$menu_ord) return true;
	return array(
		// 'index.php', // Dashboard
		// 'separator1', // First separator
		// 'edit.php?post_type=page', // Pages
		// 'edit.php', // Posts
		// 'upload.php', // Media
		// 'gf_edit_forms', // Gravity Forms
		// 'genesis', // Genesis
		// 'edit-comments.php', // Comments
		// 'separator2', // Second separator
		// 'themes.php', // Appearance
		// 'plugins.php', // Plugins
		// 'users.php', // Users
		// 'tools.php', // Tools
		// 'options-general.php', // Settings
		// 'separator-last', // Last separator
	);
}

/**
 * Hide Admin Areas that are not used
 */
function am_remove_menu_pages()
{
	// remove_menu_page( 'link-manager.php' );
}

/**
 * Remove default link for images
 */
function am_imagelink_setup()
{
	$image_set = get_option('image_default_link_type');
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}

function replace_core_jquery_version()
{
	wp_deregister_script('jquery-core');
	wp_register_script('jquery-core', get_template_directory_uri() . '/assets/js/vendor/jquery.min.js', array(), '3.4.0');
	wp_deregister_script('jquery-migrate');
	wp_register_script('jquery-migrate', get_template_directory_uri() . '/assets/js/vendor/jquery.migrate.js', array(), '3.0.1');
}


/**
 * Enqueue scripts
 */
function am_scripts()
{
	wp_enqueue_style('_amclinictheme-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), AMCLINIC_THEME_VERSION);
	wp_enqueue_style('_amclinictheme-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), AMCLINIC_THEME_VERSION);
	wp_enqueue_style('_amclinictheme-style', get_stylesheet_uri(), array('_amclinictheme-bootstrap', '_amclinictheme-font-awesome'), AMCLINIC_THEME_VERSION);
	wp_enqueue_style('amclinictheme-main-styles', get_template_directory_uri() . '/assets/css/style.min.css', array(), AMCLINIC_THEME_VERSION);
	wp_register_style('amclinictheme-forms-styles', get_template_directory_uri() . '/assets/css/forms.min.css', array(), AMCLINIC_THEME_VERSION);


	//not needed
	wp_deregister_script('wp-embed');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	if (!is_admin()) {
		replace_core_jquery_version();
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/vendor/bootstrap.js', array('jquery'), NULL, true);
		wp_enqueue_script('app', get_template_directory_uri() . '/assets/js/application.js', array('jquery'), NULL, true);
		wp_enqueue_script('unveil', get_template_directory_uri() . '/assets/js/vendor/jquery.unveil.min.js', array('jquery'), NULL, true);
	}

	if (is_front_page()) {
		wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/libs/owlCarousel/js/owl.carousel.js', array('jquery'), NULL, true);
		wp_enqueue_script('owl-carousel-navigations', get_template_directory_uri() . '/assets/libs/owlCarousel/js/owl.navigation.js', array('jquery'), NULL, true);
		wp_enqueue_script('owl-carousel-autoplay', get_template_directory_uri() . '/assets/libs/owlCarousel/js/owl.autoplay.js', array('jquery'), NULL, true);
		wp_enqueue_style('owl-carousel-styles-default', get_template_directory_uri() . '/assets/libs/owlCarousel/css/owl.theme.default.css', array(), AMCLINIC_THEME_VERSION);
		wp_enqueue_style('owl-carousel-styles', get_template_directory_uri() . '/assets/libs/owlCarousel/css/owl.carousel.css', array(), AMCLINIC_THEME_VERSION);


		wp_enqueue_script('frontpage', get_template_directory_uri() . '/assets/js/frontpage.js', array('jquery'), NULL, true);
	}

	//register scripts
	wp_register_script('am-theme-v4-form-validator', get_template_directory_uri() . '/assets/js/vendor/form_validator.min.js', array('jquery'), NULL, true);
	wp_register_script('am-theme-v4-mobile', get_template_directory_uri() . '/assets/js/vendor/jquery.mobile.custom.min.js', array('jquery'), NULL, true);
	wp_register_script('am-theme-v4-date-picker', get_template_directory_uri() . '/assets/js/vendor/picker.date.min.js', array('jquery'), NULL, true);
	wp_register_script('am-theme-v4-pdfobject', get_template_directory_uri() . '/assets/js/vendor/pdfobject.min.js', array('jquery'), NULL, true);
	wp_register_script('am-theme-v4-form-booking', get_template_directory_uri() . '/assets/js/booking_form.js', array('app', 'jquery', 'am-theme-v4-form-validator', 'am-theme-v4-mobile', 'am-theme-v4-date-picker'), NULL, true);
	wp_register_script('am-theme-v4-form', get_template_directory_uri() . '/assets/js/am_theme_form.js', array('app', 'jquery', 'am-theme-v4-form-validator', 'am-theme-v4-date-picker'), NULL, true);
	wp_register_script('am-theme-v4-range-slider', get_template_directory_uri() . '/assets/js/vendor/rangeslider.min.js', array('app', 'jquery', 'am-theme-v4-form-validator', 'am-theme-v4-mobile', 'am-theme-v4-date-picker'), NULL, true);
	wp_register_script('sort-script', get_template_directory_uri() . '/assets/libs/sortjs/sort.js');
}

/**
 * Remove Query Strings From Static Resources
 */
function am_remove_script_version($src)
{
	$parts = explode('?ver', $src);
	return $parts[0];
}


/**
 * Remove Read More Jump
 */
function am_remove_more_jump_link($link)
{
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"', $offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end - $offset);
	}
	return $link;
}

/**
 *  GET Images array by Category
 */
function get_images_bycategory($term_slug)
{
	$images = false;

	$args = array(
		'post_type' => 'attachment',
		'post_status' => 'any',
		'post_mime_type' => 'image',
		'tax_query' => array(
			array(
				'taxonomy' => 'media_category', // your taxonomy
				'field' => 'slug',
				'terms' => $term_slug // term id (id of the media category)
			)
		)
	);

	$attachments = get_posts($args);

	if (!$attachments) {
		return false;
	}

	foreach ($attachments as $attachment) {
		$images[] = wp_prepare_attachment_for_js($attachment->ID);
	}

	return $images;
}

/*
 * Do not Allow Gallery in the_content
 */
function strip_shortcode($code, $content)
{
	global $shortcode_tags;

	$stack = $shortcode_tags;
	$shortcode_tags = array($code => 1);

	$content = strip_shortcodes($content);

	$shortcode_tags = $stack;
	return $content;
}

function remove_gallery($content)
{
	return strip_shortcode('gallery', $content);
}

add_filter('the_content', 'remove_gallery', 6);




/*
 * SHORTCODES
 */

//CONTACT BUTTONS
function shortcode_contact_buttons($atts)
{

	$buttons = array(
		'booking' => array(
			'title' => 'BOOK APPOINTMENT',
			'link' => '/contact/book-appointment',
		),
		'advice' => array(
			'title' => 'FREE PERSONALISED HEALTH ADVICE',
			'link' => '/free-health-advice'
		),
		'contact' => array(
			'title' => 'GENERAL ENQUIRIES',
			'link' => '/contact/general'
		),
		'feedback' => array(
			'title' => 'FEEDBACK',
			'link' => 'http://acumedic.com/feedback/'
		)
	);

	$b_show = isset($atts['show']) ? $atts['show'] : 'booking,advice,contact,feedback';

	$b_array = explode(',', $b_show);

	if (!count($b_array)) {
		return false;
	}

	ob_start();
	include(get_stylesheet_directory(__FILE__) . '/assets/partials/shortcodes/contact-buttons.php');
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode('contact-buttons',  'shortcode_contact_buttons');

//CASE STUDIES
function auto_patient_case_studies_func()
{
	$output = '';

	$posts = get_posts(
		array(
			'post_type' => 'mjm-clinic-casestudy',
			'order_by' => 'post_title',
			'post_status'  => 'publish',
			'posts_per_page' => -1,
		)
	);

	$sorted_list = array();
	foreach ($posts as $post) {
		if (is_numeric($post->mjm_clinic_related_condition_id)) {
			$condition = get_post($post->mjm_clinic_related_condition_id);
			if ($condition) {
				$sorted_list[$condition->post_title][] = $post;
			}
		}
	}

	if (count($sorted_list) > 0) {
		ksort($sorted_list);
		foreach ($sorted_list as $condition_title => $case_studies) {
			$output .= "<h3>" . $condition_title . "</h3>";
			foreach ($case_studies as $case_study) {
				$output .= '<div>';
				$permalink = get_post_permalink($case_study->ID);
				$output .= '<br/><b><a href="' . $permalink . '">Case ID: ' . $case_study->mjm_clinic_case_name . ' </a></b>' .
					'<br/>' . $case_study->post_excerpt;
				$output .= '<br/>&gg; <a href="' . $permalink . '">Read More..</a><br/>';
				$output .= '</div>';
			}
			$output .= '<hr style="clear:left"/>';
		}
	}
	return $output;
}
add_shortcode('auto_casestudies', 'auto_patient_case_studies_func');

//PATIENT FEEDBACK
function auto_patient_feedback_func($atts)
{
	extract(shortcode_atts(array('h' => '3'), $atts));
	$output = '';

	$posts = get_posts(
		array(
			'post_type' => 'mjm-clinic-feedback',
			'order_by' => 'post_title',
			'post_status'  => 'publish',
			'posts_per_page' => -1,
		)
	);

	$sorted_list = array();
	foreach ($posts as $post) {
		if (is_numeric($post->mjm_clinic_related_condition_id)) {
			$condition = get_post($post->mjm_clinic_related_condition_id);
			if ($condition) {
				$sorted_list[$condition->post_title][] = $post;
			}
		}
	}

	if (count($sorted_list) > 0) {
		ksort($sorted_list);
		foreach ($sorted_list as $condition_title => $patient_feedback) {
			$output .= "<h$h>" . $condition_title . "</h$h>";
			foreach ($patient_feedback as $feedback_entry) {
				$content = $feedback_entry->post_excerpt;
				//$content = apply_filters('the_content', $content);
				//$content = str_replace(']]>', ']]&gt;', $content);
				$content = wp_strip_all_tags($content);
				$content = wpautop($content, false);

				$output .= '

				<blockquote>
					<p>
						' . $content . '
						<cite><p href="' . get_post_permalink($feedback_entry->ID) . '">' . $feedback_entry->mjm_clinic_patient_name . '</p></cite>
						<a class="testimonial-link" href="' . get_post_permalink($feedback_entry->ID) . '">Read Full Testimonial</a>
					</p>
					<span class="blockquote-decor">&ldquo;</span>
				</blockquote>
                            ';
			}
		}
	}
	return $output;
}
add_shortcode('auto_patientfeedback', 'auto_patient_feedback_func');


function auto_accordion($atts)
{
	extract(shortcode_atts(array('h' => '3'), $atts));
	$output = '<script>
				   jQuery(document).ready(function(){
					   amclinic.auto_accordion(' . $h . ');
				   });
			   </script>';

	return $output;
}
add_shortcode('auto_accordion', 'auto_accordion');

//YOUTUBE
function handle_youtubeid(
	$string,
	$post = null,
	$lfloat_width = '50%',
	$vid_im_width = 264,
	$vid_im_height = 214,
	$play_im_padleft = 136,
	$play_im_padtop = 86,
	$play_im_height = 128,
	$play_im_width = 128
) {

	$output = '';
	if (strstr($string, 'youtube.com')) {
		//etract id from url
		//http://www.youtube.com/watch?v=zcgug4tnr2m&feature=aso
		parse_str(parse_url($string, php_url_query), $params);
		$vid = $params['v'];
	} else {
		$vid = preg_replace('/[^a-z0-9]/i', '', $string);
	}
	//136px 86
	if (strlen($vid) > 3) {
		$output .=
			'
			<div style="width:' . $lfloat_width . '; float:left; margin-bottom:20px;">
 				<div style="background: url(http://img.youtube.com/vi/' . $vid . '/0.jpg)
							no-repeat center;
					 	    width:' . $vid_im_width . 'px;
							height:' . $vid_im_height . 'px;
							padding-left:' . $play_im_padleft . 'px;
							padding-top:' . $play_im_padtop . 'px;
							border: 1px solid #cccccc;
							" >

				<a class="fancybox" title="watch video"  href="#' . $vid . '">
				<img src="' . bloginfo('template_directory') . '/images/video_play.png"
				     style="width:' . $play_im_width . 'px; height' . $play_im_height . ':px"
					 alt="click to watch video"/>
 			    </a>
				</div>';

		$output .= '<div style="display:none">
						<div id="' . $vid . '">
							<iframe class="youtube-player" type="text/html"
									width="640" height="385"
									src="http://www.youtube.com/embed/' . $vid . '?rel=0"
									frameborder="0">
							</iframe>
						</div>
				  </div>';

		if ($post) {
			$output .= '<a href="' . $post->guid . '"><span>' . $post->post_title . ' </span></a>';
		}

		$output .= '</div>
			';
	}
	return $output;
}

function showvideogallery()
{
	$args = array('numberposts' => 10, 'category' => 6);
	$lastposts = get_posts($args);
	$i = 0;

	foreach ($lastposts as $post) : setup_postdata($post);

		$videos = get_post_meta($post->id, 'youtubeid', false);
		if (is_array($videos)) {
			foreach ($videos as $video) {
				echo handle_youtubeid($video, $post);
			}
		}
		$i++;
	endforeach;
}
add_shortcode('video_gallery', 'showvideogallery');

//PDFS
function pdf_func($atts)
{
	extract(shortcode_atts(array(
		'url' => '',
		'title' => '',
		'description' => '',
		'id' => 'pdf_' . rand(1, 9999999),
	), $atts));
	wp_enqueue_script('am-theme-v4-pdfobject');

	if (!$url) {
		return;
	}

	$theshiz = '
	<div id="' . $id . '" class="pdf-container"></div>
    <script>
		jQuery(document).ready(function($){
			var options = {
				fallbackLink: "<p>This browser does not support inline PDFs. Please download the PDF to view it: <a href=\'[url]\'>Download ' . $title . ' PDF</a></p>",
				height: "100%",
			};
			PDFObject.embed("' . $url . '", "#' . $id . '", options);
		});
    </script>
    ';
	return $theshiz;
}
add_shortcode('pdf', 'pdf_func');

//CL PRODUCTS
function cl_product_func($atts)
{
	extract(shortcode_atts(array(
		'sku' => 'oops'
	), $atts));

	$theshiz = '<iframe src="http://chinalifeweb.com/iframe-product-simple/' . $sku . '/"
                        frameborder="0"
                        scrolling="no"
                        seamless="seamless"
                        width="100%"></iframe>';
	return $theshiz;
}
add_shortcode('cl_product', 'cl_product_func');




///**
// * Button for sharing contents
// *
// */
//
//function facebook_share_button_shortcode() {
//	$url= get_site_url();
//    $script="<!-- Load Facebook SDK for JavaScript -->
//	<div id='fb-root'></div>
//    <script>(function(d, s, id) {
//    var js, fjs = d.getElementsByTagName(s)[0];
//    if (d.getElementById(id)) return;
//    js = d.createElement(s); js.id = id;
//    js.src = '//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6';
//    fjs.parentNode.insertBefore(js, fjs);
//    }(document, 'script', 'facebook-jssdk'));</script>
//	<!-- Your share button code -->
//	<div class='fb-share-button' data-href='".$url."' data-layout='button' data-mobile-iframe='true'></div>";
//
//	return $script;
//}
//
//add_shortcode( 'facebook_share_Button', 'facebook_share_button_shortcode' );
//
//
//function twitter_share_button(){
//
//	$script="<a href='https://twitter.com/share' class='twitter-share-button' data-hashtags='clinicAcumedic' style='margin-top:15px;'>Tweet</a>
//<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>";
//
// return $script;
//}
//
//add_shortcode('twitter_Button', 'twitter_share_button');
//
//
//function googlePlus_share_button(){
//
//	$url=get_site_url();
//	$script="<script src='https://apis.google.com/js/platform.js' async defer></script>
//<div class='g-plus' data-action='share'></div>";
//
//    return $script;
//}
//
//add_shortcode('googlePlus_Button', 'googlePlus_share_button');
//
//
//function share_by_email(){
//	$url=get_site_url();
//	$script="<a style='margin-left:-270px; color:#000000;' href='mailto:email@address.com?subject=".$url."'<i class='fa fa-envelope fa-lg' aria-hidden='true'></i></a>";
//	return $script;
//}
//
//add_shortcode('share_email', 'share_by_email');


/**
 * Count number of widgets in a sidebar
 * Used to add classes to widget areas so widgets can be displayed one, two, three or four per row
 */
function am_count_widgets($sidebar_id)
{
	// If loading from front page, consult $_wp_sidebars_widgets rather than options
	// to see if wp_convert_widget_settings() has made manipulations in memory.
	global $_wp_sidebars_widgets;
	if (empty($_wp_sidebars_widgets)) :
		$_wp_sidebars_widgets = get_option('sidebars_widgets', array());
	endif;

	$sidebars_widgets_count = $_wp_sidebars_widgets;

	if (isset($sidebars_widgets_count[$sidebar_id])) :
		$widget_count = count($sidebars_widgets_count[$sidebar_id]);
		return $widget_count;
	endif;
	return 0;
}

function do_breadcrumbs()
{
	$parents = array();
	$breadcrumbs = array();
	//$breadcrumbs[] = array('title' => 'Home', 'href' => '/');


	// Get the queried post.
	$current_post    = get_queried_object();
	$current_post_id  = get_queried_object_id();
	$current_post_type  = get_post_type($current_post_id);

	if ($current_post_type == 'mjm-clinic-condition') {
		$breadcrumbs[] = array('title' => 'Common Conditions', 'href' => '/conditions/');
	} else if ($current_post_type == 'mjm-clinic-service' || $current_post_type == 'mjm_clinic_service_category') {
		$breadcrumbs[] = array('title' => 'Treatments', 'href' => '/our-services/');
	} else if ($current_post_type == 'mjm-clinic-staff') {
		$breadcrumbs[] = array('title' => 'The Clinic', 'href' => '/about-us/');
		if (has_term(231, 'mjm_clinic_staff_type')) {
			$breadcrumbs[] = array('title' => 'Our Doctors', 'href' => '/about-us/our-medical-team/');
		} else if (has_term(241, 'mjm_clinic_staff_type')) {
			$breadcrumbs[] = array('title' => 'Our Therapists', 'href' => '/about-us/massage-therapists/');
		}
	} else {

		$post_id = $current_post_id;
		while ($post_id) {

			// Get the post by ID.
			$post = get_post($post_id);

			if (!$post) {
				break;
			}

			// If we hit a page that's set as the front page, bail.
			if ('page' == $post->post_type && 'page' == get_option('show_on_front') && $post_id == get_option('page_on_front')) {
				break;
			}

			// Add the formatted post link to the array of parents.
			if ($post_id !== $current_post_id) {
				$parents[] = array('title' => get_the_title($post_id), 'href' => esc_url(get_permalink($post_id)));
			}


			// If there's no longer a post parent, break out of the loop.
			if (0 >= $post->post_parent) {
				break;
			}

			// Change the post ID to the parent post to continue looping.
			$post_id = $post->post_parent;
		}

		//			// Get the post hierarchy based off the final parent post.
		//			$this->add_post_hierarchy( $post_id );

		if (count($parents)) {
			$breadcrumbs = array_merge($breadcrumbs, array_reverse($parents));
		}
	}


	include(locate_template('assets/partials/breadcrumbs.php'));
}
