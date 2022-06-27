<?php

use function PHPSTORM_META\map;

$app_id       = isset($_GET['app_id']) ? $_GET['app_id'] : false;
$service_cats = mjm_clinic_get_all_service_categories();
$service_array = array();
foreach ($service_cats as $cat) {
	$services = array();
	$cat_services = mjm_clinic_get_services_in_category($cat->term_id);
	foreach ($cat_services as $service) {
		$services[$service->ID] = array(
			'name' => $service->post_title,
			'price' => get_post_meta($service->ID, 'session_info')
		);
	}
	if ($cat->children) {
		foreach ($cat->children as $child_cat) {
			$cat_services = mjm_clinic_get_services_in_category($child_cat->term_id);
			foreach ($cat_services as $service) {
				$services[$service->ID] = array(
					'name' => $service->post_title,
				);
			}
		}
	}
	$service_array[$cat->term_id] = array(
		'name' => $cat->name,
		'services' => $services
	);
}

//print_r($service_array);
?>
<script type="application/json" id="service_data">
	<?php echo json_encode($service_array); ?>
</script>
<script>
	document.addEventListener("DOMContentLoaded", function() {
		const currentLinks = document.querySelectorAll('.nav-link');
		const currentLocation = window.location.href;
		for (i = 0; i < currentLinks.length; i++) {
			console.log('testing')
			let linkLocation = currentLinks[i].getAttribute("href");
			if (linkLocation === currentLocation) {
				console.log(currentLinks[i])
				currentLinks[i].classList.add('active')
			} else {
				currentLinks[i].classList.remove('active')
			}
		}
	});
</script>

<div class="contact-form__wrapper">
	<div class="container">
		<div class="row form__contact-info">
			<div class="col-md-6">
				<div class="breadcrumbs">
					<nav role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb">
						<ul class="trail-items" itemscope="" itemtype="http://schema.org/BreadcrumbList">
							<meta name="numberOfItems" content="1">
							<meta name="itemListOrder" content="Ascending">
							<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem" class="trail-item trail-end">
							<a href="<?php echo home_url('/contact/') ?>">
									<span itemprop="name">Contact Us</span>
								</a>
								<meta itemprop="position" content="1">
							</li>
						</ul>
					</nav>
				</div>
				<h1 class="entry-title"><?php the_title() ?></h1>
				<a target="_blank" href="https://diary.clinicoffice.co.uk/custref/102305" class="booking-form__link--clinic-office hug-h1">
					<?php echo file_get_contents(get_template_directory() . '/assets/images/icons/forms-icons/calendar-icon.svg'); ?>
					Already a client? Try our online booking system for clients
				</a>
			</div>
			<div class="col-md-6">
				<nav class="form-navigations">
					<a href="<?php echo get_permalink(155) ?>" class="nav-link active">
						<span>
							<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.35 28.35">
								<path d="M13.41,12.75V10.32a.71.71,0,1,1,1.41,0c0,1.45,0,2.9,0,4.34A.3.3,0,0,0,15,15l2.78,1.69a.77.77,0,0,1,.43.56.63.63,0,0,1-.27.67.66.66,0,0,1-.76.06c-.32-.18-.62-.37-.93-.56-.79-.49-1.58-1-2.39-1.45a.85.85,0,0,1-.45-.81C13.42,14.33,13.41,13.54,13.41,12.75Z" />
								<path d="M14.17,24.79A10.62,10.62,0,1,1,24.79,14.17,10.62,10.62,0,0,1,14.17,24.79Zm0-20.23a9.62,9.62,0,1,0,9.62,9.61A9.62,9.62,0,0,0,14.17,4.56Z" />
							</svg>
						</span>
						<span>Book Appointment</span>
					</a>
					<a href="<?php echo get_permalink(47) ?>" class="nav-link">
						<span>
							<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.35 28.35">
								<path d="M3.46,24.93,5,19.35a10.64,10.64,0,1,1,4.17,4.09ZM9.3,22.37l.17.1a9.65,9.65,0,1,0-4.89-8.4A9.53,9.53,0,0,0,6,19l.11.18L4.88,23.52Z" />
								<polygon class="cls-1" points="18.21 13.35 14.99 13.35 14.99 10.14 13.35 10.14 13.35 13.35 10.14 13.35 10.14 14.99 13.35 14.99 13.35 18.21 14.99 18.21 14.99 14.99 18.21 14.99 18.21 13.35" />
							</svg>
						</span>
						<span>Free Health Advice</span>
					</a>
					<a href="<?php echo get_permalink(197) ?>" class="nav-link">
						<span>
							<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 28.35 28.35">
								<path d="M3.46,24.93,5,19.34a10.64,10.64,0,1,1,4.17,4.09ZM9.3,22.36l.18.11A9.73,9.73,0,1,0,6,19l.11.18L4.88,23.52Z" />
								<rect x="13.3" y="17.33" width="1.66" height="1.64" />
								<path d="M16.62,10.19h0a3.58,3.58,0,0,0-2.46-.81,3.45,3.45,0,0,0-2.37.8,3.23,3.23,0,0,0-1,2.15h1.65a2.16,2.16,0,0,1,.63-1.19,1.76,1.76,0,0,1,1.15-.39,1.62,1.62,0,0,1,1.12.37,1.17,1.17,0,0,1,.42.9,1.14,1.14,0,0,1-.23.69,9.39,9.39,0,0,1-.94.84,3.78,3.78,0,0,0-1,1.15h0A2.78,2.78,0,0,0,13.3,16v.43h1.63a2.77,2.77,0,0,1,.13-1,2.74,2.74,0,0,1,.7-.76A7.54,7.54,0,0,0,17.2,13.2h0a2.1,2.1,0,0,0,.33-1.12A2.45,2.45,0,0,0,16.62,10.19Z" />
							</svg>
						</span>
						<span>General Enquiry</span>
					</a>
				</nav>
			</div>
		</div>
	</div>

	<div class="container">
		<a id="booking_form_top" name="booking_form_top"></a>
		<div class="row">
			<div id="booking_error" class="collapse alert alert-danger" role="alert">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				There was an error processing your form. Please check and try again.
			</div>

			<div id="booking_success" class="collapse alert alert-success" role="alert">
				<h3>
					<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span>
					Success!
				</h3>
				<?php if (function_exists('ls_content_block_by_slug')) : ?>
					<?php echo ls_content_block_by_slug('form-success-message-booking', 'paragraphs-no-shortcodes'); ?>
				<?php endif; ?>
			</div>


			<form id="booking_form" role="form" data-toggle="validator" novalidate="true" class="grid-divider">

				<div class="col col-xs-12 col-md-5 form-col-custom-width">

					<fieldset>
						<legend>Treatment Details</legend>

						<div class="form-white-bg custom-flex">
							<div class="col col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Select a treatment type <span class="small" style="color:red">*</span></label>
									<div id="buttons-container">
										<div class="radio-group">
											<input type="radio" value="no-value" id="id3" name="treatment_type">
											<label for="id3" class="form-input">I'm not sure</label>
										</div>
									</div>



									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Select a treatment <span class="small" style="color:red">*</span></label>
									<select id="select--treatment" name="mjm_clinic_bf_service_select" class="form-control" required>
										<option value="">- please select -</option>
									</select>
									<div class="prices">

									</div>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label>Please give us more information about your condition</label>
							<textarea class="form-control" name="mjm_clinic_bf_message" cols="70" rows="5" wrap="physical" style="width: 100%; display: block;"></textarea>
						</div>
					</fieldset>

				</div>
				<div class="col col-xs-12 col-md-6 form-col-custom-width">
					<fieldset>
						<legend>Appointment Details</legend>


						<div class="row">
							<div class="col col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Appointment Date <span class="small" style="color:red">*</span></label>
									<input type="date" name="mjm_clinic_bf_date_picker" class="form-control" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Preferred Time <span class="small" style="color:red">*</span></label>
									<select name="mjm_clinic_bf_preferred_time_select" class="form-control" required>
										<option value="">- please select -</option>
										<option value="morning">Morning</option>
										<option value="afternoon">Afternoon</option>
									</select>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Salutation <span class="small" style="color:red">*</span></label>
									<select id="input--salutation" name="am-salutation" class="form-control" required>
										<option value="">- please select -</option>
										<option value="Mr">Mr</option>
										<option value="Ms">Ms</option>
										<option value="Mrs">Mrs</option>
										<option value="Mrs">Miss</option>
										<option value="Dr">Dr</option>
										<option value="Prof">Prof</option>
										<option value="Rev">Rev</option>
									</select>
									<div class="help-block with-errors"></div>
								</div>

							</div>
							<div class="col col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Surname <span class="small" style="color:red">*</span></label>
									<input id="input--surname" type="text" name="am-surname" class="form-control" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Phone Number <span class="small" style="color:red">*</span></label>
									<input type="tel" name="mjm_clinic_bf_phone" class="input--phone form-control" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Email Address <span class="small" style="color:red">*</span></label>
									<input type="email" name="mjm_clinic_bf_email" class="input--email form-control" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col col-xs-12" style="padding-left:30px; padding-right: 30px; margin-top:25px;">
								<button type="submit" class="booking-form__submit btn btn-primary btn--center ">Send</button>
								<input type="hidden" id="mjm_clinic_bf_name" name="mjm_clinic_bf_name" value="" required>
								<input type="hidden" name="mjm_clinic_bf_location_select" value="15" required>
								<input type="hidden" name="mjm_clinic_bf_contact_via_select" value="phone" />
								<input type="hidden" name="mjm-clinic-bf" value="1" />
							</div>
						</div>
					</fieldset>
				</div>




			</form>

			<div id="booking_form_ajax_info"></div>
		</div>
	</div>
</div>

<?php if (!function_exists('include_forms_styles')) {
	function include_forms_styles()
	{
		wp_enqueue_style('amclinictheme-forms-styles');
	}
}
add_action('wp_footer', 'include_forms_styles', 100);
