<?php
/*
Template Name: Clinic Service Single Post
*/
get_header();
?>

<?php
//SLIDER IMAGE / GALLERY
while (have_posts()) : the_post();
	include(locate_template('assets/partials/post_carousel.php'));
?>


	<section id="content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-9">

					<?php
					include(locate_template('content-single.php'));
					?>


					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if (comments_open() || '0' != get_comments_number()) :
					//comments_template();
					endif;
					?>

					<?php include(locate_template('template-parts/tag-indicators.php')) ?>

				</div>

				<div class="col-xs-12 col-md-3" id="right-column">

					<?php get_sidebar(); ?>

				</div>
			</div>
		</div>

		<!--		<section class="white-stripe">-->
		<!--			<div class="container">-->
		<!--				<div class="row">-->
		<!--					<div class="col-xs-12">-->
		<!--						<h3>Not sure which treatment is best suited to you?</h3>-->
		<!--						<p>-->
		<!--							<button class="btn btn-lg btn-primary"> GET FREE PERSONALISED HEALTH ADVICE</button>-->
		<!--						</p>-->
		<!--					</div>-->
		<!--				</div>-->
		<!--			</div>-->
		<!--		</section>-->

		<?php
		get_sidebar('whitebar');
		get_sidebar('after-whitebar');
		?>


	</section>


<?php endwhile; // end of the loop. 
?>

<?php get_footer(); ?>