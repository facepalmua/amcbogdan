<?php
/*
Template Name: MJM Clinic Indication Tags
*/

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

get_header();

?>


<!-- START CONTENT -->
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="9">

                    <header class="entry-header">
                        <h1 class="entry-title">Symptom: <?php echo $term->name?></h1>
                    </header>

                    <div class="entry-content">
                        <p><?php echo wpautop($term->description)?></p>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3" id="right-column">

                    <?php get_sidebar(); ?>

                </div>

             </div>
        </div>

            <?php
            get_sidebar('whitebar');
            get_sidebar('after-whitebar');
            ?>
    </section><!-- #primary -->

<?php
get_footer();
?>