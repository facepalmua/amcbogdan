<?php
/*
 Template Name: Search Page
 
 * @package _amclinictheme
 */

get_header(); ?>

<div id="primary" class="content-area">
	<div class="container">
		<section id="form">
			<div class="row">

				<div class="col-sm-10 col-md-10 col-lg-10">

					<?php //get_search_form(); 
					?>
				</div><!-- #col-xs-12 -->
			</div><!-- #row -->
		</section>
		<!--Results-->
		<section id="latest-news">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="search-posts">

						<h2 class="page-title"> Latest News </h2>

						<div class="search-page__posts">

							<?php
							$args = array(
								'numberposts' => 50,
								'offset' => 0,
								'category_name' => 'latest-am-clinic-news',
								'orderby' => 'post_date',
								'order' => 'DESC',
								'post_type' => 'post',
								'post_status' => 'publish',
								'suppress_filters' => true
							);

							$recent_posts = wp_get_recent_posts($args, 'OBJECT');
							foreach ($recent_posts as $post) :
								setup_postdata($post);
								$excerpt = trim(get_the_excerpt());
								$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'am_thumb');
							?>

								<!-- News Post -->
								<div class="feature-posts">
									<div class="post clickable">
										<a class="post-image" href="<?php echo get_permalink($post->ID) ?>">
											<?php if ($thumb) { ?>
												<img src="<?php echo  $thumb[0] ?>" alt="Image: <?php echo  esc_html($post->post_title) ?>">
											<?php } else { ?>
												<img style="max-height: 100% !important;" src="<?php echo get_stylesheet_directory_uri()?>/assets/images/icons/no-bg.jpg" alt="Image: <?php echo  esc_html($post->post_title) ?>">
											<?php } ?>
										</a>
										<div class="post-body">
											<h3>
												<a href="<?php echo get_permalink($post->ID) ?>">
													<?php echo  esc_html(ucwords(strtolower($post->post_title))) ?>
												</a>
											</h3>
											<p><?php echo $excerpt ?></p>
											<div class="post-more">
												<a href="<?php echo get_permalink($post->ID) ?>"><span></span></a>
											</div>
										</div>
									</div>
								</div>
								<!-- END: News Post -->

							<?php endforeach; ?>

						</div>
					</div>
					<!-- END: News Posts -->


				</div>
		</section><!-- End Rresults-->
	</div><!-- #container -->
</div><!-- #primary -->


<?php get_footer(); ?>