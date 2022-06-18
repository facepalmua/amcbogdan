<?php
/*
 * Included at top of page/post templates to allow gallery images into carousel
 */

$slider_images = array();

$gallery = get_post_gallery(0, false);

if($gallery && is_array($gallery) && isset($gallery['ids'])){
	$attachment_ids = explode(',',$gallery['ids']);
	foreach($attachment_ids as $attachment_id){
		$slider_images[] = wp_prepare_attachment_for_js($attachment_id);
	}
}

//could falll back to the feature image but probably better to use FI for thumbs and add to gallery if want carousel.
//$slider_images[] = wp_prepare_attachment_for_js(get_post_thumbnail_id( get_the_ID() ) );
$slider_title = false;
if(count($slider_images)){
	$hide_captions = true;
	include(locate_template('assets/partials/carousel_main.php'));
	$slider_title = true;
	?>
	<div id="carousel-page-title-container" class="container">
		<div class="carousel-page-title">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php if ( function_exists( 'do_breadcrumbs' ) ) { do_breadcrumbs(); } ?>
		</div>
	</div>
	<!-- End of CAROUSEL Section -->
	<?php
}