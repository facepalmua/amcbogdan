<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package _amclinictheme
 */

if ( ! is_active_sidebar( 'Sidebar' ) ) {
	return;
}
?>
<?php dynamic_sidebar( 'Sidebar' ); ?>
