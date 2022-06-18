<?php
/*
Template Name: MJM Clinic Staff Type
*/

$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
$term_meta = get_option("taxonomy_$term->term_id");


get_header();

?>
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8">

                <header class="entry-header">

                    <?php if (function_exists('do_breadcrumbs')) {
                        do_breadcrumbs();
                    } ?>

                    <h1 class="entry-title"><?php echo $term->name ?></h1>
                </header><!-- .entry-header -->

                <div class="entry-content">
                    <p><?php echo $term_meta['excerpt'] ?></p>
                    <?php //@TODO show staff list
                    ?>
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