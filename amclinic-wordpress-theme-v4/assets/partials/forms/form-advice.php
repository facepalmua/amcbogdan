<div id="form_success" class="collapse alert alert-success" role="alert">
	<h3>
		<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span>
		Success!
	</h3>
	<?php if (function_exists('ls_content_block_by_slug')) : ?>
		<?php echo ls_content_block_by_slug('form-success-message-health-advice', 'paragraphs-no-shortcodes'); ?>
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
								<a href="//localhost:3000/contact/">
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
	<form class="am-theme-form" id="am-advice-form" role="form" data-toggle="validator">
		<div class="container">
			<fieldset>
				<legend>Contact Details</legend>
			</fieldset>

			<div class="row">
				<div class="col col-xs-12 col-sm-6">
					<fieldset>
						<div class="row">
							<div class="col col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Forename <span class="small" style="color:red">*</span></label>
									<input id="input--forename" type="text" name="am-forename" class="form-control" required>
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
									<label>Sex <span class="small" style="color:red">*</span></label>
									<select id="input--sex" name="am-sex" class="form-control" required>
										<option value="">- please select -</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Intersex">Intersex</option>
									</select>
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Date of Birth <span class="small" style="color:red">*</span></label>
									<input type="date" name="am-dob" class="input--dob form-control" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>

					</fieldset>
				</div>

				<div class="col col-xs-12 col-sm-6">

					<fieldset>
						<div class="row">
							<div class="col col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Phone Number <span class="small" style="color:red">*</span></label>
									<input type="tel" name="am-phone" class="input--phone form-control" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col col-xs-12 col-sm-6">
								<div class="form-group">
									<label for="newsletter">Would you able to visit our clinic?</label>
									<select name="am-clinic-attend" class="form-control">
										<option value="not-selected" disabled selected="selected">- please select -</option>
										<option value="Yes">Yes</option>
										<option value="No">No</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col col-xs-12 col-sm-6">
								<div class="form-group">
									<label>Email Address <span class="small" style="color:red">*</span></label>
									<input type="email" name="am-email" class="input--email form-control" required>
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="col col-xs-12 col-sm-6">
								<div class="form-group">
									<label for="newsletter">Would you like to receive our newsletter?</label>
									<select name="am-newsletter-subscribe" class="form-control">
										<option value="0" selected="selected" disabled>- please select -</option>
										<option value="0">No thank you</option>
										<option value="1">Yes Please</option>
									</select>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>

			<fieldset style="margin-top:25px;">
				<legend>Health Details</legend>
			</fieldset>


			<div class="row">
				<div class="col col-xs-12 col-sm-6">

					<fieldset>
						<div class="form-group">
							<label>What condition(s) are you suffering from (if known):</label>
							<textarea class="form-control" name="am-condition" cols="70" rows="5" wrap="physical"></textarea>
						</div>
					</fieldset>
				</div>
				<div class="col col-xs-12 col-sm-6">
					<fieldset>
						<div class="form-group">
							<label>What are your symptoms?</label>
							<textarea class="form-control" name="am-symptoms" cols="70" rows="5" wrap="physical"></textarea>
						</div>
					</fieldset>
				</div>
			</div>

			<div class="row">
				<div class="col col-xs-12 col-sm-6">
					<fieldset>
						<div class="form-group">
							<label>How long have you been suffering from these symptoms?</label>
							<textarea class="form-control" name="am-symptominfo" cols="70" rows="5" wrap="physical"></textarea>
						</div>
					</fieldset>
				</div>
				<div class="col col-xs-12 col-sm-6">
					<fieldset>
						<div class="form-group">
							<label>What medications are you taking?</label>
							<textarea class="form-control" name="am-medications" cols="70" rows="5" wrap="physical"></textarea>
						</div>
					</fieldset>
				</div>
			</div>

			<div class="row">
				<div class="col col-xs-12 col-sm-6">
					<fieldset>
						<div class="form-group">
							<label for="stresslevel">How would you rate your stress levels?</label>

							<div class="rangeslider--container" style="width:100%; margin-top:25px; ">
								<input type="range" min="1" max="10" value="1" step="1" name="am-stresslevel" />
								<div class="rangeslider__scale" style="width:100%; display:flex; justify-content: space-between;">
									<a data-value="1">1</a>
									<a data-value="2">2</a>
									<a data-value="3">3</a>
									<a data-value="4">4</a>
									<a data-value="5">5</a>
									<a data-value="6">6</a>
									<a data-value="7">7</a>
									<a data-value="8">8</a>
									<a data-value="9">9</a>
									<a data-value="10">10</a>
								</div>
								<div class="rangeslider__scale-label rangeslider__scale-label--left">Completely Relaxed</div>
								<div class="rangeslider__scale-label rangeslider__scale-label--right">Extremely Stressed</div>
								<script>
									document.addEventListener("DOMContentLoaded", function() {
										const currentLinks = document.querySelectorAll('.nav-link');
										const currentLocation = window.location.href;
										for (i = 0; i < currentLinks.length; i++) {

											let linkLocation = currentLinks[i].getAttribute("href");
											if (linkLocation === currentLocation) {
												console.log(currentLinks[i])
												currentLinks[i].classList.add('active')
											} else {
												currentLinks[i].classList.remove('active')
											}
										}
									});
									jQuery(document).ready(function($) {
										var $rangeInputs = $('input[type="range"]');
										$rangeInputs.rangeslider({
											polyfill: false
										});


										var $scale = $('.rangeslider__scale');
										if ($scale.length) {

											//Allow range input to be set by clicking on scale indicators
											$scale.on('click', 'a', function() {
												var $link = $(this);
												var value = $link.data('value');
												if (value) {
													var $container = $link.closest('.rangeslider--container');
													if ($container.length) {
														$rangeInput = $container.find('input[type="range"]');
														if ($rangeInput.length) {
															$rangeInput.val(value).change();
														}
													}

												}
											});

											//style scale indicators on slider value change
											$rangeInputs.on('change', function() {
												var $input = $(this);
												var $container = $input.closest('.rangeslider--container');
												var $scale = $container.find('.rangeslider__scale');
												if ($scale.length) {
													$scale.children().removeClass('active');
													var $scale_indicator = $scale.find('*[data-value="' + $input.val() + '"]');
													if ($scale_indicator.length) {
														$scale_indicator.addClass('active');
													}
												}
											});
										}
									});
								</script>
							</div>

						</div>
					</fieldset>
				</div>
				<div class="col col-xs-12 col-sm-6">
					<fieldset>
						<div class="form-group">
							<label>Any other information you would like to add?</label>
							<textarea class="form-control" name="am-extrainfo" cols="70" rows="5" wrap="physical"></textarea>
						</div>
					</fieldset>
				</div>
			</div>

			<div class="row">
				<div class="col col-xs-12" style="padding-left:30px; padding-right: 30px; margin-top:25px;">
					<input type="hidden" name="form_success_msg" value="Your health enquiry has been received. Please be assured that we will get back to you as soon as we can." />
					<input id="am-advice-form__submit" class="btn btn-primary btn--center" type="submit" value="Send" />
				</div>
			</div>
		</div>
	</form>
</div>