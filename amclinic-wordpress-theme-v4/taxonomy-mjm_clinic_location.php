<?php
/*
Template Name: MJM Clinic Service Location
*/

$location = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
$location_meta = get_option( "taxonomy_$location->term_id" );

get_header();
?>

<!-- START CONTENT -->
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8">

                    <header class="entry-header">
                        <h1 class="entry-title"><?php echo $location->name?></h1>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <p><?php echo $term_meta['excerpt']?></p>


                        <?php if(!empty($location_meta['open_hours'])){?>

                            <b> <?php echo __('Open Hours',',mjm-clinic')?>:</b>
                            <div class="mjm_clinic_service_locations_widget_output_open-hours">
                                <?php echo wpautop($location_meta['open_hours']) ?>
                            </div>

                        <?php } ?>



                        <?php if(!empty($location_meta['tel'])){?>
                            <p> <a href="tel:<?php echo wp_strip_all_tags($location_meta['tel'])?>">
                                    <i class="fas fa-phone"></i> <?php echo wp_strip_all_tags($location_meta['tel'])?>
                                </a></p>
                        <?php } ?>
                        <?php if(!empty($location_meta['contact_link'])){
                            $link = str_replace('{service_id}','', wp_strip_all_tags($location_meta['contact_link']));
                            $link = str_replace('{service_name}','', $link);
                            ?>
                            <p><a href="<?php echo $link?>">
                                    <i class="fas fa-calendar"></i> <?php echo __('Book Appointment',',mjm-clinic')?>
                                </a></p>
                        <?php } else if(!empty($location_meta['email'])){?>
<!--                            <p> <a href="mailto:--><?php //echo antispambot(wp_strip_all_tags($location_meta['email']))?><!--">-->
<!--                                    <i class="fa fa-envelope"></i>  --><?php //echo __('Email Us',',mjm-clinic')?>
<!--                                </a></p>-->
                        <?php } ?>


                        <hr/> <h4>Booking Form</h4>
                        <?php echo do_shortcode('[mjm-clinic-booking-form location='.$location->term_id.' no_location_select=1]'); ?>


                            <hr/>
                            <h2> <?php echo __('Practitioners',',mjm-clinic')?></h2>

                            <?php echo do_shortcode(' [mjm-clinic-staff locations='.$location->term_id.']'); ?>



                    </div>

                </div>

                <div class="col-xs-12 col-md-4" id="right-column">

                    <?php get_sidebar(); ?>

                </div>


            </div>

        </div>
        <?php
        get_sidebar('whitebar');
        get_sidebar('after-whitebar');
        ?>
    </section>

<?php
get_footer();
?>