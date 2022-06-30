<?php
global $wp_query;
$pageID = $wp_query->post->ID;
$check_specialist_conditions = get_post_custom_values('check_specialist_conditions');
if ($check_specialist_conditions) {
    $array = preg_split("/\r\n|\n|\r/", $check_specialist_conditions[0], $pageID, true);
}
?>

<?php if ($array) { ?>
<div class="sidebar-item1">
    <div class="sidebar__specialist_clinics">
        <div class="btns-container blue">
            <?php
            foreach ($array as $item) {
                $exploded_item = explode("|", $item); ?>
                <a href="<?php echo $exploded_item[1] ?>" class="btn-icon"><br>
                    <span class="icon"><br>
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="specialist_clinics_icon" x="0px" y="0px"
	                     width="8px" height="8px" viewBox="0 0 8 8" enable-background="new 0 0 8 8" xml:space="preserve">
                        <rect x="0.336" y="3.097" width="7.328" height="1.807"/>
                        <rect x="3.097" y="0.336" width="1.807" height="7.328"/>
                        </svg><br>
                    </span><br>
                    <span class="text"><?php echo $exploded_item[0] ?></span><br>
                </a><br>
            <?php } ?>
        </div>
        <p></p>
    </div>
    <p></p>
</div>
<?php } ?>

<?php if (!function_exists('check_specialist_conditions_styles')) {
    function check_specialist_conditions_styles()
    { ?>
        <style>

        </style>
<?php }
}
add_action('wp_footer', 'check_specialist_conditions_styles', 100);
