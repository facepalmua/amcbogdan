<div class="row btn-row">
	<?php foreach($b_array as $button): ?>
	<div class="btn-block">
		<a href="<?php echo $buttons[$button]['link']?>" class="btn btn-lg btn-primary btn-contact" style="margin-bottom:10px;">
			<?php echo $buttons[$button]['title']?>
		</a>
	</div>
	<?php endforeach; ?>
</div>