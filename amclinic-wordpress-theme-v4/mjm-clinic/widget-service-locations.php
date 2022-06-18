<div class="mjmclinic-widget widget--service-location">

	<span class="mjm_clinic_service_locations_widget_output_location-name">
		<?php echo wp_strip_all_tags($location->name) ?>
	</span>

	<span class="mjm_clinic_service_locations_widget_output_location-description">
		<?php echo wpautop($location->description) ?>
	</span>


	<?php if (!empty($location_meta['open_hours'])) { ?>
		<span class="mjm_clinic_service_locations_widget_output_open-hours">
			<?php echo wpautop($location_meta['open_hours']) ?>
		</span>
	<?php } ?>


	<?php if (!empty($location_meta['tel'])) { ?>
		<a class="location-link" href="tel:<?php echo wp_strip_all_tags($location_meta['tel']) ?>">
			<img class="location-icon" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/widgets-icons/phone-icon.svg' ?>" alt="phone icon"> <?php echo wp_strip_all_tags($location_meta['tel']) ?>
		</a>
	<?php } ?>
	<?php if (!empty($location_meta['contact_link'])) {
		$link = str_replace('{service_id}', $this_post->ID, wp_strip_all_tags($location_meta['contact_link']));
		$link = str_replace('{service_name}', urlencode($this_post->post_title), $link);
	?>
		<a class="location-link" href="<?php echo $link ?>">
			<img class="location-icon" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/widgets-icons/email-icon.svg' ?>" alt="email icon"> Contact Us
		</a>
	<?php } ?>

</div>