<?php
$output = '<div id="users">
            <div class="search-wrapper">
                <input class="search" placeholder="Select Condition" />
                <button class="sorting-button sort asc" data-sort="name">
                    A - Z <span></span>
                </button>
            </div>
            <div class="search-breadcrumbs__wrapper">
            <p>Can’t find what your looking for? Ask us!</p> 
            <a href="'.get_the_permalink(132).'">Contact Us</a>
            </div>
            <ul class="list">';
$posts = get_posts(
    array(
        'post_type' => 'mjm-clinic-condition',
        'order_by' => 'ASC',
        'post_status'  => 'publish',
        'posts_per_page' => -1,
    )
);

$output .= "<li>";
foreach ($posts as $post) {

    $output .= "<h5 class='name'>" . $post->post_title . "</h5>";
    $content = $post->post_content;
    $content = wp_strip_all_tags($content);
    $content = wpautop($content, false);
    $content = strip_shortcodes($content);
    $content = mb_strimwidth($content, 0, 590, '...');

    $output .= '

            <div class="filtered-post__content">
                <p>' . $content . '</p>
                <a class="testimonial-link" href="' . get_post_permalink($post->ID) . '">Read More</a>
            </div>
                        ';
    $output .= "<li>";
}
$output .= '</ul>
        </div>';
echo $output;
?>

<?php if (!function_exists('sorting_styles')) {
    function sorting_styles()
    { ?>
        <script>
            var options = {
                valueNames: [
                    'name',
                ]};
            var userList = new List('users', options);
            userList.sort("name", {
                order: "asc"
            })

            jQuery(document).ready(function() {
                amclinic.auto_accordion('5');
            });
        </script>
<?php }
    wp_enqueue_script('sort-script');
}
add_action('wp_footer', 'sorting_styles', 100);
