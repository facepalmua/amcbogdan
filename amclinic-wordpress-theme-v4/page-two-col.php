<?php
/*
Template Name: Two Column Page
*/

get_header(); ?>

<?php
//SLIDER IMAGE / GALLERY
while (have_posts()) : the_post();
	include(locate_template('assets/partials/post_carousel.php'));
?>

	<section id="content">
		<div class="container">
			<?php if (!$slider_title) : ?>
				<header class="entry-header">
					<?php if (function_exists('do_breadcrumbs')) {
						do_breadcrumbs();
					} ?>
					<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
				</header><!-- .entry-header -->
			<?php endif; ?>
			<div class="row">
				<div class="col-xs-12 col-md-9" id="primary-content">

					<?php
					include(locate_template('content-single.php'));
					?>


					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if (comments_open() || '0' != get_comments_number()) :
					//comments_template();
					endif;
					?>


				</div>

				<div class="col-xs-12 col-md-3" id="right-column">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</section>

	<?php
	get_sidebar('whitebar');
	get_sidebar('after-whitebar');
	?>


<?php endwhile; // end of the loop. 
?>

<?php get_footer(); ?>