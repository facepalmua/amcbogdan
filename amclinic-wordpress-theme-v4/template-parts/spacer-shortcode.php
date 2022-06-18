<?php
$atts = shortcode_atts(
    array(
        'amount' => '25px',
    ),
    $atts,
    'spacer'
);
$amount = $atts['amount']

?>

<div style="height: <?php echo $amount ?>;"></div>

<?php if (!function_exists('spacer_styles')) {
    function spacer_styles()
    { ?>
        
<?php }
}
add_action('wp_footer', 'hon_page_styles', 100);
