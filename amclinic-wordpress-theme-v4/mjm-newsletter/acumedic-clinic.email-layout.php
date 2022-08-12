<?php
/*
MJM Newsletter Template:  AcuMedic Clinic
*/



$nl = get_post();
$list_profile = mjm_newsletter_get_list_profile($nl);
$logo = false;
$get_logo = wp_get_attachment_image_src(get_post_thumbnail_id($list_profile->ID), 'mjm-newsletter-list-header');

if($get_logo && isset($get_logo[0])){
    $logo = $get_logo[0];
}

$content_array = mjm_newsletter_get_content_array($nl);


$post_content_count = 0;
$large_article_count = 0;
$medium_article_count = 0;
$small_article_count = 0;


/*
 * OUTPUT THE HEADER
 */
include(plugin_dir_path(__FILE__).'/acumedic-clinic/head.tpl.php');




    /*
     * OUTPUT ALL THE CONTENT
     *
     */
    foreach ($content_array['content'] as $order => $type_array) {

        //Newsletter post inline content
        if(isset($type_array['post_content'])){

            $post_content_count++;
            $output = $type_array['post_content'];
            if($post_content_count == 1){
                $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id($nl->ID), 'mjm-newsletter-post-feature');
                if($featured_image && isset($featured_image[0])){
                    $featured_image = $featured_image[0];
                }
            }
            include(plugin_dir_path(__FILE__).'/acumedic-clinic/post-content.tpl.php');

        } else if(isset($type_array['shortcode'])){
            $post_content_count++;
            $output = do_shortcode($type_array['shortcode']);
            include(plugin_dir_path(__FILE__).'/acumedic-clinic/post-content.tpl.php');
        } else if(isset($type_array['mjm-nl-post'])){
            $output = false;
            $size = 'large';

            //large ones
            if(isset($type_array['mjm-nl-post']['large'])) {
                $size = 'large';
                $large_article_count++;
                $output = $type_array['mjm-nl-post']['large'];
                //not supported
                //mjm_newsletter_output_article($output,$size,$large_article_count);
            }

            //medium ones
            else if (isset($type_array['mjm-nl-post']['medium'])){
                $size = 'medium';
                $medium_article_count++;
                $output = $type_array['mjm-nl-post']['medium'];
                //not supported
                //mjm_newsletter_output_article($output,$size,$medium_article_count);
            }

            //small ones
            else if (isset($type_array['mjm-nl-post']['small']) && $small_article_count == 0) {

                //require three per row so we force all small shortcode output together in one block.
                foreach($content_array['articles']['small'] as $order => $output){
                    $size = 'small';
                    $small_article_count++;
                    //not supported
                    //mjm_newsletter_output_article($output,$size,$small_article_count);
                }

            }

        }
    }

/*
 * OUTPUT THE FOOTER
 */
include(plugin_dir_path(__FILE__).'/acumedic-clinic/footer.tpl.php');?>

