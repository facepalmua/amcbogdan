<?php
/**
 * @TODO Set this up as a widget that displays on post/pages and looks for a custom field 'cl_products' containing comma delimited SKU.
 *
 */

$related_products = get_the_terms($post->ID, 'related-product');
$url = "http://chinalifeweb.com/iframe-product-simple/{SKU}/";

if($related_products && ! is_wp_error( $related_products )) {

	foreach($related_products as $product){
		?>
		<h4><?php echo  $product->name?></h4>
		<?php echo  wpautop($product->description) ?>

		<?php
		$term_meta = get_option( "taxonomy_$product->term_id" );
		?>
		<strong><a href="http://chinalifeweb.com/xmakeorders_addtocart/<?php echo $term_meta['stockcode']?>/">BUY NOW</a></strong>
		<hr/>
		<?php
		//
		//print_iframe_product($url, $term_meta['stockcode']);
	}
}

?>