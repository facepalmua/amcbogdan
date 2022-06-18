<div class="row">
	<?php foreach($b_array as $button): ?>
	<div class="col-sm-12 col-md-6 col-lg-6">
		<a href="<?php echo $buttons[$button]['link']?>" class="btn btn-lg btn-primary btn-block" style="margin-bottom:10px;">
			<?php echo $buttons[$button]['title']?>
		</a>
	</div>
	<?php endforeach; ?>
</div>