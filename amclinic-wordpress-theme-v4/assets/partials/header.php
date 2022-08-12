<div id="ajax-msg">
	<span class="ajax-msg">Success. Have a nice day.</span>
	<a class="ajax-msg-remove glyphicon glyphicon-remove" aria-hidden="true"></a>
</div>
<?php if ($flash_msg = amclinic_flash_msg(true)) : ?>
	<script>
		jQuery(document).ready(function($) {
			amclinic.ajax_alert("<?php echo $flash_msg['msg'] ?>", "<?php echo $flash_msg['context'] ?>");
		});
	</script>
<?php endif; ?>

<header id="site-header">


	<div id="site-header__container" class="container">
		<div class="row">
			<!-- AM LOGO -->
			<div class="col-sm-4 col-lg-3">
				<div class="site-header__logo-container">
					<a href="/">
						<img alt="AcuMedic" src="<?php echo am_get_asset_img('header-logo-acumedic.png'); ?>" id="header-logo-acumedic">
					</a>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="site-header__pioneers-container hidden-md hidden-xs hidden-sm">
					<?php echo file_get_contents(get_template_directory() . '/assets/images/icons/tick-circle.svg'); ?>
					<span class="header-text header-text--pioneer">Pioneers in Chinese Medicine since 1972</span>
				</div>
			</div>
			<div class="site-header__actions-container col-lg-4 col-sm-6" id="header-actions">
				<a class="site-header__action site-header__action--read-promise action__read-promise" data-toggle="modal" data-target="#promisesModal" href="#">
					<?php echo file_get_contents(get_template_directory() . '/assets/images/icons/info-circle.svg'); ?>
					<span class="header-text header-text--promise">Our Promises</span>
				</a>
				<a class="site-header__action site-header__action--call action__call" href="tel:02073886704">
					<?php echo file_get_contents(get_template_directory() . '/assets/images/icons/phone-circle.svg'); ?>
					<span class="header-text header-text--call">020 7388 6704</span>
				</a>
				<div style="clear: both;"></div>
			</div>
		</div>
	</div>


	<div class="container-fluid">
		<div class="row">
			<?php get_template_part('assets/partials/header_navbar'); ?>
		</div>
	</div>


</header>


<!-- #masthead -->

<?php if (function_exists('ls_content_block_by_slug')) : ?>

	<!-- Promises Modal -->
	<div class="modal fade" id="promisesModal" role="dialog" aria-labelledby="promisesModalLabel" tabindex="-1">
		<div class="modal-dialog" role="document">
			<div class="modal-content content">
				<div class="modal-header">
					<!--				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>-->
					<h4 class="modal-title" id="promisesModalLabel">OUR PROMISES</h4>
				</div>
				<div class="modal-body"><?php echo ls_content_block_by_slug('our-promise-text'); ?></div>
				<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Got It</button></div>
			</div>
		</div>
	</div>

	<!-- You should know modal -->
	<div class="modal fade" id="ushouldknowModal" role="dialog" aria-labelledby="ushouldknowModalLabel" tabindex="-1">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="promisesModalLabel">3 Things to Know</h4>
				</div>
				<div class="modal-body"><?php echo ls_content_block_by_slug('3-things-you-should-know'); ?></div>
				<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Got It</button></div>
			</div>
		</div>
	</div>

<?php endif; ?>