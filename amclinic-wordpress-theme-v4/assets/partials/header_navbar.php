<?php
function amclinic4_output_nav_service($service)
{
	$thumb = wp_get_attachment_image_src(get_post_thumbnail_id($service->ID), 'am_thumb');
	$img_tag = $thumb ? '<img class="image-item"  src="' . am_get_asset_img('trans_pixel.png') . '" data-src="' . $thumb[0] . '" />' : null;

	echo '
				<li class="treatment-list__service">
					<a class="treatment-list__service-link" href="' . get_post_permalink($service->ID) . '"
					   title="' . esc_html($service->post_title) . '">
						' . esc_html($service->post_title) . '
					</a>
				</li>

				<li class="treatment-description-li">
					<div class="treatment-description-item">
						' . $img_tag . '
						<h3>' . esc_html($service->post_title) . '</h3>
						<p>
							' . $service->post_excerpt . '
						</p>
					</div>
				</li>
		';
}
?>

<nav class="navbar navbar-inverse">
	<div class="container">

		<div class="navbar-header">
			<button aria-controls="navbar" aria-expanded="false" class="navbar-toggle collapsed" data-target="#navbar" data-toggle="collapse" type="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand visible-xs" href="#">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100.12 86.494">
					<path d="M78.58 23.96c3.027 4.965 4.93 10.715 5.325 16.92 1.307 20.44-14.202 38.07-34.643 39.38S11.19 66.055 9.883 45.614 24.088 7.542 44.53 6.235a36.9 36.9 0 0 1 20.008 4.384" fill="none" stroke="#8C8E95" stroke-miterlimit="10" stroke-width="2.5"></path>
					<path fill="#8C8E95" d="M91.1 6.39c-2.46.184-3.805.798-5.737 1.805l-3.476 1.966c-6.592 4.045-12.788 8.943-18.425 14.572-7.287 7.295-12.788 15.4-18.79 25.317l-1.28 2.12-1.3-2.996c-1.05-2.426-2.033-4.72-3.365-7.06-1.21-2.102-2.863-4.662-4.983-5.74-1.5-.764-3.38-.373-5.695 1.14l-.26.164c-1.05.682-1.648 1.143-1.995 1.462.292.038.604.097.904.216 2.435.994 4.16 3.47 5.512 5.77 1.37 2.305 2.224 4.213 3.208 6.425l.36.817c1.568 3.5 3.04 6.815 4.205 10.674.683 2.302 1.512 4.422 2.944 4.422.366 0 .802-.123 1.294-.36 2.05-1.01 3.188-3.813 4.193-6.278a37.04 37.04 0 0 1 .635-1.539c4.676-10.728 10.386-19.524 15.35-26.716 4.028-5.828 8.48-10.898 13.226-15.063 3.43-3.012 7.362-5.983 12.002-9.1l.54-.342c1.2-.737 1.96-1.305 2.295-1.688-.288-.04-.905-.025-1.36.005z"></path>
					<path d="M79.16 24.947c2.873 5.055 4.597 10.86 4.802 17.074.676 20.472-15.37 37.616-35.84 38.293s-37.618-15.37-38.295-35.84S25.2 6.856 45.67 6.18c7.23-.24 14.043 1.607 19.863 4.998" fill="none" stroke="#8C8E95" stroke-miterlimit="10" stroke-width="2.5"></path>
					<path fill="#8C8E95" d="M76.566 23.134c10.146 15.726 7.163 35.835-7.05 47.923-13.535 11.5-33.94 10.075-46.87-1.42C9.616 58.05 7.797 38.357 16.75 23.86c10.5-17 33.417-20.848 49.88-10.53 1.37.86 2.624-1.305 1.262-2.158-17.73-11.1-40.437-6.56-52.58 10.35-11.087 15.436-7.862 37.08 5.565 49.88 13.2 12.585 35.107 13.536 49.387 2.23 15.85-12.55 19.42-34.773 8.46-51.76-.87-1.35-3.036-.098-2.16 1.262z"></path>
					<path d="M79.335 25.258a36.93 36.93 0 0 1 4.637 17.12c.48 20.478-15.73 37.467-36.206 37.946s-37.47-15.73-37.95-36.208S25.55 6.65 46.027 6.17C53.26 6 60.055 7.912 65.842 11.358" fill="none" stroke="#8C8E95" stroke-miterlimit="10" stroke-width="2.5"></path>
					<path fill="#8C8E95" d="M78.334 26.03C87.14 42.887 81.857 63.224 65.96 73.6c-14.6 9.536-34.07 6.047-45.7-6.376-12.12-12.946-11.826-33.4-.928-46.887C31.675 5.06 54.172 3.727 69.38 15.32c1.282.98 2.525-1.194 1.262-2.158C54.18.6 31.106 2.95 17.563 18.568 5.31 32.7 6.1 53.834 17.638 68.017c11.986 14.73 33.7 17.332 49.583 7.743 17.426-10.52 22.463-33.398 13.27-51-.746-1.43-2.904-.166-2.158 1.26z"></path>
				</svg>
				Pioneers in Chinese Medicine since 1972</a>
		</div>


		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav" id="menu-primary">

				<?php
				$service_cats = mjm_clinic_get_all_service_categories();
				if (is_array($service_cats) && !empty($service_cats)) :
				?>
					<li class="menu-item-dropdown dropdown" id="menu-dropdown-treatments">
						<a href="/our-services" aria-haspopup="true" class="dropdown-toggle" data-toggle="dropdown" title="Treatments">
							Treatments
							<span class="caret"></span>
						</a>


						<ul class="menu-first-dropdown-container dropdown-menu" role="menu">
							<?php foreach ($service_cats as $key => $cat) : ?>
								<li class="dropdown">
									<a href="/our-services/<?php echo  $cat->slug ?>" title="<?php echo  esc_html($cat->name); ?>">
										<?php echo  esc_html($cat->name); ?>
									</a>

									<?php $cat_services = mjm_clinic_get_services_in_category($cat->term_id); ?>

									<?php if ($cat->children || $cat_services) : ?>
										<ul class="treatment-list menu-second-dropdown-container <?php echo 'menu-second-dropdown-container-'.$key ?> dropdown-menu" role="menu">
											<?php
											if (is_array($cat_services) && count($cat_services)) {
												foreach ($cat_services as $cat_service) {
													amclinic4_output_nav_service($cat_service);
												}
											}
											?>

											<?php
											if (is_array($cat->children) && count($cat->children)) {
												foreach ($cat->children as $cat_child) {
											?>
													<li class="treatment-list__heading">
														<a href="/our-services/<?php echo  $cat_child->slug ?>" title="<?php echo  esc_html($cat_child->name) ?>">
															<?php echo  esc_html($cat_child->name) ?>
														</a>
													</li>

											<?php
													$child_cat_services = mjm_clinic_get_services_in_category($cat_child->term_id);
													if (is_array($child_cat_services) && count($child_cat_services)) {
														foreach ($child_cat_services as $child_cat_service) {
															amclinic4_output_nav_service($child_cat_service);
														}
													}
												}
											}
											?>
										</ul>
									<?php endif; ?>
								</li>
							<?php endforeach; ?>
						</ul>
					</li>
				<?php endif; ?>


				<?php $header_links = wp_nav_menu(
					array(
						'theme_location' => 'header',
						'container' => false,
						'echo' => false,
						'depth' => 1,
						'fallback_cb' => false,
					)
				);
				echo preg_replace(array('#^<ul[^>]*>#', '#</ul>$#'), '', $header_links);
				?>

			</ul>
		</div>
	</div>
</nav>