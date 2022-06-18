<?php

/**
 * The template for displaying the front page.
 *
 * This is the template that displays on the front page only.
 *
 * @package _amclinictheme
 */

get_header(); ?>

<?php
$slider_images = get_images_bycategory('front-page-slider');
include(locate_template('assets/partials/carousel_main.php'));
?>


<!-- Section Blue Box Features-->
<section class="quick-navigation">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<a href="/conditions" class="quick_navigation__link">
					<span><img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/home-quick-nav-1.png' ?>" alt="icon"></span>
					Common Conditions
				</a>
			</div>
			<div class="col-md-6">
				<a href="/can-we-help/how-does-chinese-medicine-work/" class="quick_navigation__link">
				<span><img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/icons/home-quick-nav-2.png' ?>" alt="icon"></span>
					HOW CHINESE MEDICINE WORKS
				</a>
			</div>
		</div>
	</div>
</section>

<?php echo do_shortcode('[doctify_reviews]'); ?>


<!-- Section News aside Sinensis Advert-->
<section class="home-articles">
	<div class="container">
		<h2 class="title-h2"><span><img src="<?php echo get_stylesheet_directory_uri()?>/assets/images/icons/articles-icon.png" alt=""></span> Articles</h2>
		<div class="row home-articles-row">
			
			<?php
			$args = array(
				'numberposts' => 6,
				'offset' => 0,
				'category_name' => 'latest-am-clinic-news',
				'orderby' => 'post_date',
				'order' => 'DESC',
				'post_type' => 'post',
				'post_status' => 'publish',
				'suppress_filters' => true
			);

			$recent_posts = wp_get_recent_posts($args, 'OBJECT');
			foreach ($recent_posts as $key => $post) {
				setup_postdata($post);
				$excerpt = trim(get_the_excerpt());
				$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'am_thumb');
			?>
				<div class="col-md-6">
					<div class="article-preview__wrapper <?php echo ($key == count($recent_posts) - 1 ) ? 'remove-border-mobile' : '' ?> <?php echo ($key == count($recent_posts) - 1 || $key == count($recent_posts) - 2) ? 'remove-border' : '' ?>">
						<a href="<?php echo get_permalink($post) ?>" class="blog-article-preview">
						<h3 class="blog-article-preview__title"><?php echo  esc_html(ucwords(strtolower($post->post_title))) ?></h3>
							<p class="blog-article-preview__excerpt"><?php echo $excerpt ?></p>
						</a>
						<a href="<?php echo get_permalink($post) ?>">
							<img src="<?php echo $thumb[0] ?>" alt="<?php echo get_the_title($post) ?>">
						</a>
					</div>
				</div>
			<?php } ?>
		</div>

		<a href="/search" class="home-articles__read-more">
			<span>READ MORE</span>
		</a>
	</div>
</section>
<!-- END: Section News aside Sinensis Advert-->

<?php get_footer(); ?>