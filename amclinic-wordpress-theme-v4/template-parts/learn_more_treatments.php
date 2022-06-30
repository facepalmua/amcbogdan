<?php
global $wp_query;
$pageID = $wp_query->post->ID;
$treatments_learn_more = get_post_custom_values('treatments_learn_more');
if ($treatments_learn_more) {
    $array = preg_split("/\r\n|\n|\r/", $treatments_learn_more[0], $pageID, true);
}
?>

<?php if ($array) { ?>
<div class="sidebar-item">
    <div class="sidebar__more-about">
        <h6 class="sidebar-title">Learn More About Specific Conditions</h6>
        <div class="btns-container blue">
            <?php
            foreach ($array as $item) {
                $exploded_item = explode("|", $item); ?>
                <a href="<?php echo $exploded_item[1] ?>" class="btn-icon"><br>
                    <span class="icon"><br>
                        <svg xmlns="http://www.w3.org/2000/svg" width="56" height="55" viewBox="0 0 55.5 54.043">
                            <path d="M32.932 18.885l-6.754 23.38c-.386 1.35-.547 2.22-.547 2.638 0 .258.098.45.29.676.193.19.42.32.61.32.386 0 .74-.16 1.126-.482.997-.805 2.187-2.284 3.538-4.406l1.125.643c-3.313 5.757-6.818 8.65-10.55 8.65-1.414 0-2.572-.385-3.41-1.2s-1.254-1.8-1.254-3.054c0-.805.192-1.834.547-3.088l4.567-15.727c.45-1.51.643-2.67.643-3.41 0-.482-.193-.9-.61-1.287s-.996-.547-1.704-.547c-.322 0-.74 0-1.2.033l.418-1.32 11.16-1.8h1.994v-.032zm-2.06-15.147c1.352 0 2.51.482 3.44 1.416s1.383 2.1 1.383 3.41c0 1.35-.482 2.477-1.416 3.41s-2.1 1.415-3.408 1.415-2.445-.482-3.377-1.415a4.69 4.69 0 0 1-1.414-3.409c0-1.35.45-2.477 1.38-3.41s2.092-1.416 3.4-1.416z"></path>
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

<?php if (!function_exists('learn_more_treatments_styles')) {
    function learn_more_treatments_styles()
    { ?>
        <style>

        </style>
<?php }
}
add_action('wp_footer', 'learn_more_treatments_styles', 100);
