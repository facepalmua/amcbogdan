<div id="treatment-sidenav" class="treatment-sidenav panel-group hidden-xs hidden-sm" id="accordion" role="tablist" aria-multiselectable="true">


		<?php
		$bg_colours = array(null,'bgcolour-cosmetic-pink', 'bgcolour-therapeutic-blue','bgcolour-othergrey');
		$count=0;
		$active = null;
		$done_active = false;
		//print_r($service_cats);
		foreach( $service_cats as $cat) {

			$bg_colour = (current( $bg_colours ) === false) ? reset($bg_colours) : current( $bg_colours );
			$count++;
			/*
			 * Commented out active section detection. May allow widget to re-enable conditionally in future.
			 */
//			if($done_active) {
//				$active = null;
//			} else {
//				foreach ( $active_term_ids as $term_id ) {
//					$active = ( cat_is_ancestor_of( $cat, $term_id ) || ( $cat->term_id == $term_id ) ) ? 'in' : null;
//					if ( !empty( $active ) ) {
//						$done_active = true;
//						break;
//					}
//				}
//			}

			?>
			<div class="panel panel-default">
				<div class="panel-heading treatment-sidenav__parent-block clickable <?php echo  $bg_colour ?>" role="tab" id="treatment-sidenav__h<?php echo $count?>">

					<a class="treatment-sidenav__button" role="button" data-toggle="collapse" data-parent="#accordion" href="#treatment-sidenav__c<?php echo $count?>" aria-expanded="false" aria-controls="treatment-sidenav__c<?php echo $count?>">

						<span class="treatment-sidenav__icon">
							<?php echo file_get_contents( get_template_directory() . '/assets/images/icons/arrow-circle.svg' ); ?>
						</span>
						<span class="treatment-sidenav__heading">
							<?php echo  $cat->name ?>
						</span>
					</a>

				</div>

					<div id="treatment-sidenav__c<?php echo $count?>" class="panel-collapse collapse <?php echo $active?> <?php echo  $bg_colour ?>" role="tabpanel" aria-labelledby="treatment-sidenav__h<?php echo $count?>">
						<div class="panel-body">
							<ul class="treatment-list">
								<?php

								$child_cat_services = mjm_clinic_get_services_in_category( $cat->term_id );
								if ( is_array( $child_cat_services ) && count( $child_cat_services ) ) {
									foreach ( $child_cat_services as $child_cat_service ) {
										?>
										<li class="treatment-list__service">
											<a class="treatment-list__service-link" href="<?php echo  get_post_permalink( $child_cat_service->ID ) ?>" title="<?php echo  $child_cat_service->post_title ?>" data-treatmentid="<?php echo $child_cat_service->ID?>">
												<?php echo  $child_cat_service->post_title ?>
											</a>
										</li>
										<?php
									}
								}

								if ( is_array( $cat->children ) && count( $cat->children ) ) {
									foreach ( $cat->children as $cat_child ) {
										?>
										<li class="treatment-list__heading">
											<a href="/our-services/<?php echo  $cat_child->slug ?>"
											   title="<?php echo  esc_html( $cat_child->name ) ?>">
												<?php echo  esc_html( $cat_child->name ) ?>
											</a>
										</li>

										<?php
										$child_cat_services = mjm_clinic_get_services_in_category( $cat_child->term_id );
										if ( is_array( $child_cat_services ) && count( $child_cat_services ) ) {
											foreach ( $child_cat_services as $child_cat_service ) { ?>
												<li class="treatment-list__service">
													<a class="treatment-list__service-link" href="<?php echo  get_post_permalink( $child_cat_service->ID )  ?>" title="<?php echo  $child_cat_service->post_title ?>" data-treatmentid="<?php echo $child_cat_service->ID?>">
														<?php echo  $child_cat_service->post_title ?>
													</a>
												</li>
												<?php
											}
										}
									}
								}
								?>
							</ul>
						</div>
					</div>


			<?php next($bg_colours);?>
			</div>
		<?php } ?>
</div>
