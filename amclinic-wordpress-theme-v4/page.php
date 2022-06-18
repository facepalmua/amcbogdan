<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package _amclinictheme
 */

get_header(); ?>

<?php
//SLIDER IMAGE / GALLERY
while ( have_posts() ) : the_post();
	include(locate_template('assets/partials/post_carousel.php'));
?>


<section id="content">
	<div class="container">


		<div class="row">
			<div class="col-xs-12" id="primary-content">


					<?php
					include(locate_template('content-single.php'));
					?>


					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						//comments_template();
					endif;
					?>

			</div>
		</div>
	</div>
</section>

	<?php
	get_sidebar('whitebar');
	get_sidebar('after-whitebar');
	?>


<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>