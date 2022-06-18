<?php
/**
 * The area after the content/whitebar,  pre footer.
 *
 * @package _amclinictheme
 */

if ( ! is_active_sidebar( 'after-whitebar' ) ) {
	return;
}
?>

<section class="after-white-stripe">
	<div class="container">
		<div class="row">
				<?php dynamic_sidebar( 'after-whitebar' ); ?>
		</div>
	</div>
</section>
