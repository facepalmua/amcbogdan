<?php
/*
Template Name: Clinic Case Study Single Post
*/
?>

<?php get_header(); ?>

<
<!-- START CONTENT -->

<?php
//SLIDER IMAGE / GALLERY
while ( have_posts() ) : the_post();
	include(locate_template('assets/partials/post_carousel.php'));
?>


	<section id="content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-8">

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

				<div class="col-xs-12 col-md-4" id="right-column">
                  
					<?php get_sidebar(); ?>
										
				</div>
			</div>
		</div>
		<?php
		get_sidebar('whitebar');
		get_sidebar('after-whitebar');
		?>
	</section>
		


<?php endwhile; // end of the loop. ?>

<?php get_footer();?>
