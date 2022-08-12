<div class="mjm_clinic_service_session_info_widget_output_session-info-container">

	<?php
	$special_offer =  get_post_meta( $this_post->ID, 'special_offer', true );
	if($special_offer): ?>
		<div class="special-offer" href="/clinic-brochure/">
			<span class="special-offer__text"><?php echo $special_offer ?></span>
		</div>
	<hr/>
	<?php endif;?>



	<?php
	if ( !empty( $title ) ) {
		echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
	} ?>


	<div class="mjm_clinic_service_session_info_widget_output_session-info">
		<?php echo wpautop( htmlspecialchars_decode( $this_post->session_info ) ) ?>
	</div>
</div>