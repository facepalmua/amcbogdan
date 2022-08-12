<?php

/**
 * The template for displaying all single posts.
 *
 * @package _amclinictheme
 */

get_header(); ?>

<?php
//SLIDER IMAGE / GALLERY
while (have_posts()) : the_post();
	include(locate_template('assets/partials/post_carousel.php'));


?>

	<section id="content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<?php
					include(locate_template('content-single.php'));
					?>

					<?php //_amclinictheme_post_nav(); 
					?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if (comments_open() || '0' != get_comments_number()) :
					//comments_template();
					endif;
					?>
				</div>
			</div>
		</div>

		<?php
		get_sidebar('whitebar');
		get_sidebar('after-whitebar');
		?>
	</section>

<?php endwhile; // end of the loop. 
?>

<?php //get_sidebar(); 
?>

<?php get_footer(); ?>