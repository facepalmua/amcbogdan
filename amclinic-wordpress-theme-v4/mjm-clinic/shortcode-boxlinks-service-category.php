<div class="feature-posts">
	<div class="post clickable">

		<a class="post-image" href="<?php echo get_term_link($category) ?>">
			<?php if ($image) : ?>
				<img src="<?php echo  $image ?>" alt="Image: <?php echo $category->name ?>">
			<?php endif; ?>
		</a>


		<div class="post-body">
			<h3>
				<a href="<?php echo get_term_link($category) ?>">
					<?php echo  esc_html(ucwords(strtolower($category->name))) ?>
				</a>
			</h3>

			<p>
				<?php echo  $category_meta['excerpt'] ?>
			</p>
			<div class="post-more">
				<a href="<?php echo get_term_link($category) ?>"><span></span></a>
			</div>

		</div>
	</div>
</div>