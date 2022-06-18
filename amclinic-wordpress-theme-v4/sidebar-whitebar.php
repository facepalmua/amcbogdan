<?php
/**
 * The whitebar that spans the main content area.
 *
 * @package _amclinictheme
 */

if ( ! is_active_sidebar( 'whitebar' ) ) {
	return;
}

?>
	<section class="white-stripe">
		<div class="container">
			<div class="row">
					<?php dynamic_sidebar( 'whitebar' ); ?>
			</div>
		</div>
	</section>

