<?php
$atts = shortcode_atts(
    array(),
    $atts,
    'doctify_reviews'
);

?>

<!-- Section Doctify-->
<section id="doctify-feature">
    <div id="09kz4433" class="container"></div>
    <script src="https://widgets.doctify.com/get-script?widget_container_id=09kz4433&type=carousel-widget&tenant=athena-uk&language=en&profileType=practice&layoutType=layoutA&slug=acumedic&background=white&itemBackground=ffffff&outerFrame=true&itemFrame=true"></script>
</section>
<!-- END Section Doctify-->

<?php if (!function_exists('doctify_reviews_styles')) {
    function doctify_reviews_styles()
    { ?>
<?php }
}
add_action('wp_footer', 'doctify_reviews_styles', 100);
