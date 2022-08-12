<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _amclinictheme
 */
?>


<!--footer-->
<footer id="site-footer">
	<a class="footer-button" href="/contact/book-appointment/">
		<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/book-appointment-icon.png" alt="">
		BOOK APPOINTMENT</a>
	<!-- Section 2 booking buttons-->
	<section id="booking-nlsignup">
		<div class="container">
			<h4 class="news-title">NEWSLETTER</h4>
			<div class="row">
				<div class="col-nlsignup col-md-12 col-lg-7">
					<form id="am-subscribe-form--frontpage" class="subscribe_ajax_json">
						<div class="newslatter-inputs-wrapper">

							<input id="nl-email-input" type="email" name="email" class="form-control" placeholder="your email:" />
							<a id="nl-email-submit" type="button" class="submit btn btn-lg">
								<span>&nbsp;</span>RECEIVE HEALTH NEWS
							</a>
							<input type="hidden" name="subtype" value="subscribe" />
						</div>
					</form>
				</div>
			</div>

		</div>

	</section>

	<section class="partners">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<h4 class="site-footer__title">CERTIFICATION</h4>
					<div class="partners-imgs-wrapper">
						<a href="http://www.cmir.org.uk/" target="_blank">
							<img id="footer-logo-cmir" alt="Cmir Logo" class="logo" src="<?php echo am_get_asset_img('header-logo-cmir.png'); ?>">
						</a>
						<a href="http://www.britishacupuncturefederation.co.uk/" target="_blank">
							<img id="footer-logo-baf" alt="BAF Logo" class="logo" src="<?php echo am_get_asset_img('header-logo-baf.png'); ?>">
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4">
					<h4 class="site-footer__title">Sister Companies</h4>
					<div class="partners-imgs-wrapper sister-companies">
						<a href="https://meileaf.com/" target="_blank">
							<img id="footer-logo-cmir" alt="MEI Leaf Logo" class="logo" src="<?php echo get_stylesheet_directory_uri()?>/assets/images/icons/mei-leaf.svg">
						</a>
						<a href="https://sinensis-skin.com/">
							<img id="footer-logo-baf" alt="Sinensis logo" class="logo" src="<?php echo get_stylesheet_directory_uri()?>/assets/images/icons/sinencis-logo.png">
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 socials-col">
					<h4 class="site-footer__title">FOLLOW US ON</h4>
					<div class="partners-imgs-wrapper">
						<div class="social-icon-container">
							<a href="https://www.facebook.com/AcuMedic/" target="_blank" class="fa-stack fa-1x">
								<i class="fab fa-stack-2x fa-facebook"></i>
							</a>
							<a href="https://twitter.com/acumedic_clinic" target="_blank" class="fa-stack fa-1x">
								<i class="fab fa-stack-2x fa-twitter "></i>
							</a>
							<a href="https://www.youtube.com/user/TheAcuMedic" target="_blank" class="fa-stack fa-1x">
								<i class="fab fa-stack-2x fa-youtube"></i>
							</a>
							<a href="https://www.instagram.com/acumedic_clinic/" target="_blank" class="fa-stack fa-1x">
								<i class="fab fa-stack-2x fa-instagram "></i>
							</a>
							<a href="https://uk.pinterest.com/acumedic/" target="_blank" class="fa-stack fa-1x">
								<i class="fab fa-stack-2x fa-pinterest-p"></i>
							</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- End Section 2 booking buttons-->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<p class="site-footer__title">As featured in</p>
				<div class="featured-brands">
					<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/footer-icons/1.png' ?>" alt="">
					<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/footer-icons/2.png' ?>" alt="">
					<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/footer-icons/3.png' ?>" alt="">
					<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/footer-icons/4.png' ?>" alt="">
					<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/footer-icons/5.png' ?>" alt="">
					<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/footer-icons/6.png' ?>" alt="">
					<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/footer-icons/7.png' ?>" alt="">
					<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/footer-icons/8.png' ?>" alt="">
					<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/footer-icons/9.png' ?>" alt="">
					<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/footer-icons/10.png' ?>" alt="">
					<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/footer-icons/11.png' ?>" alt="">
				</div>
			</div>

			<div class="col-lg-12">
				<?php
				$clinic_settings = get_option("mjm_clinic_settings");
				if ($clinic_settings['mjm_clinic_disclaimer_toggle'] && isset($clinic_settings['mjm_clinic_disclaimer_text'])) : ?>
					<div class="site-footer__legal-extended visible-lg visible-md">
						<p class="site-footer__title">Legal and Privacy</p>
						<p class="site-footer__legal-text">
							<?php echo $clinic_settings['mjm_clinic_disclaimer_text'] ?>
						</p>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 text-center">
				<address>AcuMedic, 101-105 Camden High Street, London, NW1 7JN, <a href="tel:+442073886704">+44 (0)207 388 6704</a></address>

				<?php
				$menu_params = array(
					'theme_location' => 'footer',
					'container' => false,
					'echo' => false,
					'depth' => 0,
					'fallback_cb' => false,
				);
				echo strip_tags(wp_nav_menu($menu_params), '<a>') . '</br>';
				?>
			</div>
		</div>
</footer>
<!-- END: footer -->


<?php wp_footer(); ?>
<?php get_template_part('assets/partials/footer_js'); ?>
</body>

</html>