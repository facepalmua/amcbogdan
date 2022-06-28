<?php
if (!$slider_images) {
	return;
}
?>

<!-- Owl carousel -->

<?php if (is_front_page()) { ?>
<div class="carousel-wrapper">
	<section class="hero-carousel owl-carousel owl-theme">
		<?php
		$count = 1;
		$reveal_placeholder = am_get_asset_img('trans_pixel.png');
		foreach ($slider_images as $image) {
			$img_large = wp_get_attachment_image_src($image['id'], 'slider_large');
			$link = (strpos($image['caption'], '/') === 0 || strpos($image['caption'], 'http') === 0) ? $image['caption'] : false;
		?>
			<div class="item">
				<a href="<?php echo $link ?>" class="hero-carousel__item">
					<img src="<?php echo $img_large[0] ?>" alt="" class="carousel-image">
					<div class="hero-carousel__item__inner">
						<?php if (!empty($image['description']) && !isset($hide_captions)) : ?>
								<?php echo  $image['description'] ?>
						<?php endif; ?>
					</div>
				</a>
			</div>
		<?php  } ?>
	</section>
	<ul class='carousel-custom-dots' class='owl-dots'>
		<?php for($i = 0; $i <= count($slider_images); $i++ ) { ?>
			<li class='owl-dot'></li>
		<?php } ?>
	</ul>
</div>
<?php } elseif(is_page(273)) { ?>
	<div class="carousel-wrapper">
	<section class="hero-carousel">
			<div class="item">
				<div class="hero-carousel__item remove-bg-offset" style="background-image: url('<?php echo get_the_post_thumbnail_url(273, 'full') ?>')">
				<img src="<?php echo get_the_post_thumbnail_url(273, 'full') ?>" alt="<?php the_title() ?>" class="slider-mobile-image__single">
				</div>
			</div>
		<?php   ?>
	</section>
</div>
<?php }

 else { ?>
	<div class="carousel-wrapper">
	<section class="hero-carousel owl-carousel owl-theme">
		<?php
		$count = 1;
		$reveal_placeholder = am_get_asset_img('trans_pixel.png');
		foreach ($slider_images as $image) {
			$img_large = wp_get_attachment_image_src($image['id'], 'slider_large');
			$link = (strpos($image['caption'], '/') === 0 || strpos($image['caption'], 'http') === 0) ? $image['caption'] : false;
		?>
			<div class="item">
				<div class="hero-carousel__item remove-bg-offset" style="background-image: url('<?php echo $img_large[0] ?>')">
				<img src="<?php echo $img_large[0] ?>" alt="<?php the_title() ?>" class="slider-mobile-image__single">
				</div>
			</div>
		<?php  } ?>
	</section>
</div>
<?php } ?>