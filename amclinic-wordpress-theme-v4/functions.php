<?php
/****************************************
Theme Setup
*****************************************/

/**
 * Theme initialization
 */
require get_template_directory() . '/lib/init.php';

/**
 * API Routes
 */
require get_template_directory() . '/lib/api_endpoints.php';

/**
 * Widgets
 */
require get_template_directory() . '/lib/widgets.php';

/**
 * Shortcodes
 */
require get_template_directory() . '/lib/additonal-shortcodes.php';

/**
 * Flash messages
 */
require get_template_directory() . '/lib/flash-functions.php';

/**
 * Custom Tracking
 */
require get_template_directory() . '/lib/tracking-functions.php';

/**
 * Public one click links for blocking communications
 */
require get_template_directory() . '/lib/comblock-functions.php';

/**
 * Custom theme functions definited in /lib/init.php
 */
require get_template_directory() . '/lib/theme-functions.php';

/**
 *  Form processing functions
 */
require get_template_directory() . '/lib/form-functions.php';

/**
 * Helper functions for use in other areas of the theme
 */
require get_template_directory() . '/lib/theme-helpers.php';



/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/lib/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/lib/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/lib/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/lib/inc/customizer.php';



/****************************************
Require Plugins
*****************************************/

require get_template_directory() . '/lib/class-tgm-plugin-activation.php';
require get_template_directory() . '/lib/theme-require-plugins.php';

add_action( 'tgmpa_register', 'am_register_required_plugins' );


/****************************************
Misc Theme Functions
*****************************************/

/**
 * Define custom post type capabilities for use with Members
 */
add_action( 'admin_init', 'am_add_post_type_caps' );
function am_add_post_type_caps() {
	// am_add_capabilities( 'portfolio' );
}

/**
 * Filter Yoast SEO Metabox Priority
 */
add_filter( 'wpseo_metabox_prio', 'am_filter_yoast_seo_metabox' );
function am_filter_yoast_seo_metabox() {
	return 'low';
}
