
<div id="mjm_clinic_shortcode_condition_list_contain_<?php echo $container_id ?>" class="media action-box no-margin-bottom">

    <?php if($search){?>
        <input class="mjm_clinic_shortcode_condition_list_search input-sm form-control " placeholder="Search" />
    <?php } ?>
    <p class="am-menu-scroll__title">Select a Condition</p>
    <ul class="am_menu_list am_menu_list_scroll list-unstyled">
        <?php echo $entries ?>
    </ul>

</div>


<?php if($search){
//list options
    $value_names = '';
    $value_names .= $searchable_title ? "'mjm_clinic_shortcode_condition_list_name_".$container_id."'," : null;
    $value_names .= ($searchable_excerpt && $show_excerpt) ? "'mjm_clinic_shortcode_condition_list_excerpt_".$container_id."'," : null;
    $value_names .= ($searchable_tags && $show_indication_tags) ? "'mjm_clinic_shortcode_condition_list_tags_contain_".$container_id."'," : null;
    $value_names = empty($value_names) ? null : substr($value_names,0,-1);
    ?>

    <script>
        jQuery(document).ready(function(){
            var options = {
                listClass: 'am_menu_list',
                page: <?php echo $paginate?>,
                searchClass: 'mjm_clinic_shortcode_condition_list_search',
                valueNames: [ <?php echo  $value_names?> ],
            };


            var userList_<?php echo $container_id ?> = new List('mjm_clinic_shortcode_condition_list_contain_<?php echo $container_id ?>', options);

        });




    </script>

<?php }?>