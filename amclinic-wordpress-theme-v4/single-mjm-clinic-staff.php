<?php
/*
Template Name: Clinic Staff Single Post
*/
get_header();
?>

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

				</div>

				<div class="col-xs-12 col-md-4" id="right-column">

					<!--pretend 'the clinic' child page -->
					<?php
					$args = array(
					'sort_column' => 'menu_order',
					'title_li' => '',
					'echo' => 0,
					'link_before' => '',
					'link_after' => '',
					'child_of' =>  45 // the clinic/about-us page'
					);
					$childpages = wp_list_pages( $args );

					include( get_stylesheet_directory( __FILE__ ) . '/assets/partials/widgets/page_subnav.php' );
					?>

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

<?php get_footer(); ?>
