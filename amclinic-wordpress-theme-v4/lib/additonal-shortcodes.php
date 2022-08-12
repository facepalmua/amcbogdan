<?php 

//Shortcode to display reviews from doctify
// [doctify_reviews]
function doctify_reviews_section($atts, $content=null){ ob_start();
    include( locate_template( '/template-parts/doctify-reviews-shortcode.php' ) );
    return ob_get_clean();
}
add_shortcode( 'doctify_reviews', 'doctify_reviews_section' );

//Shortcode to add spacing between sections
// [spacer amount="50px"]
function spacer_section($atts, $content=null){ ob_start();
    include( locate_template( '/template-parts/spacer-shortcode.php' ) );
    return ob_get_clean();
}
add_shortcode( 'spacer', 'spacer_section' );


//Shortcode Testimonials with sorting by A-Z and search
// [sorted_health_conditions]
function sorted_health_conditions_shortcode($atts, $content=null){ ob_start();
    include( locate_template( '/template-parts/sorting-testimonials-shortcode.php' ) );
    return ob_get_clean();
}
add_shortcode( 'sorted_health_conditions', 'sorted_health_conditions_shortcode' );

//Shortcode for prices
// [prices]
function prices_shortcode($atts, $content=null){ ob_start();
    include( locate_template( '/template-parts/prices-shortcode.php' ) );
    return ob_get_clean();
}
add_shortcode( 'prices', 'prices_shortcode' );


function contacts_shortcode($atts, $content=null){ ob_start();
    include( locate_template( '/template-parts/contact-phone.php' ) );
    return ob_get_clean();
}
add_shortcode( 'contact_phone', 'contacts_shortcode' );

function learn_more_treatments_shortcode($atts, $content=null){ ob_start();
    include( locate_template( '/template-parts/learn_more_treatments.php' ) );
    return ob_get_clean();
}
add_shortcode( 'learn_more_treatments', 'learn_more_treatments_shortcode' );

function check_specialist_conditions_shortcode($atts, $content=null){ ob_start();
    include( locate_template( '/template-parts/check_specialist_conditions.php' ) );
    return ob_get_clean();
}
add_shortcode( 'check_specialist_conditions', 'check_specialist_conditions_shortcode' );
