<div id="form_success" class="collapse alert alert-success" role="alert">
	<h3>
		<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span>
		Success!
	</h3>
	<?php if (function_exists('ls_content_block_by_slug')) : ?>
		<?php echo ls_content_block_by_slug('form-success-message-general-enquiry', 'paragraphs-no-shortcodes'); ?>
	<?php endif; ?>
</div>

<div class="contact-form__wrapper">
	<div class="container">
		<div class="row form__contact-info">
			<div class="col-sm-6">
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
			<div class="col-sm-6">
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
		<form class="am-theme-form" id="am-contact-form" role="form" data-toggle="validator">


			<div class="row">
				<div class="col col-xs-12 col-md-6 general-enq__form">
					<fieldset>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Name <span class="small" style="color:red">*</span></label>
									<input id="input_name" type="text" name="am-forename" class="form-control" placeholder="Your Name" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label>Email <span class="small" style="color:red">*</span></label>
									<input type="email" name="am-email" class="input-email form-control" placeholder="eMail" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Phone </label>
									<input type="tel" name="am-phone" class="input-phone form-control" placeholder="Phone">
									<div class="help-block with-errors"></div>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="form-group">
									<label for="newsletter">Would you like to receive our newsletter?</label>
									<select name="am-newsletter-subscribe" class="form-control">
										<option value="0" selected="selected">No Thank You</option>
										<option value="1">Yes Please</option>
									</select>
								</div>
							</div>
						</div>
					</fieldset>
					<div class="col">
						<div class="form-group">
							<label>Please let us know your enquiry:</label>
							<textarea class="form-control" name="am-message" cols="70" rows="5" wrap="physical"></textarea>
						</div>
						<div class="">
							<input type="hidden" name="form_success_msg" value="Your enquiry has been received. Please be assured that we will get back to you as soon as we can." />
							<input class="btn btn-lg btn-block btn-primary submit-btn" type="submit" value="Send" />
						</div>
					</div>
				</div>

			</div>
	</div>
	</form>
</div>
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

<?php if (!function_exists('include_forms_styles')) {
	function include_forms_styles()
	{
		wp_enqueue_style('amclinictheme-forms-styles');
	}
}
add_action('wp_footer', 'include_forms_styles', 100);
