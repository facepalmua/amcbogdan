<div class="feature-posts">
	<div class="post clickable">

		<a class="post-image" href="<?php echo  get_permalink($post->ID) ?>">
			<?php if($image): ?>
				<img src="<?php echo  $image_url ?>" alt="Image: <?php echo $post->post_title ?>">
			<?php endif; ?>
		</a>


		<div class="post-body">

			<h3>
				<a href="<?php echo  get_permalink($post->ID) ?>">
					<?php echo  esc_html($post->post_title)?>
				</a>
			</h3>

			<p>
				<?php echo mb_strimwidth($post->post_excerpt, 0, 80, '') . '...'?>
			</p>

			<div class="post-more">
				<a href="<?php echo get_permalink($post->ID) ?>"><span></span></a>
			</div>
		</div>
	</div>
</div>
