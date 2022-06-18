<div class="mjm_clinic_widget_container mjm_clinic_widget_container_service_locations">
    <div class="mjmclinic-widget widget--service-location widget--service-location__shortcode">
        <a href="tel:+44(0)20 7388 6704">
            <img class="location-icon" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/widgets-icons/phone-icon.svg" alt="phone icon"> +44(0)20 7388 6704 </a>
        <a href="//localhost:3000/contact/">
            <img class="location-icon" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/widgets-icons/email-icon.svg" alt="email icon"> Contact Us
        </a>
    </div>
</div>

<?php if (!function_exists('contact_phone_styles')) {
    function contact_phone_styles()
    { ?>
        <style>
            .widget--service-location__shortcode a {
                display: flex;
                gap: 5px;
                width: max-content;
            }
        </style>
<?php }
}
add_action('wp_footer', 'contact_phone_styles', 100);
