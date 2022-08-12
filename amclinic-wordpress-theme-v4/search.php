<?php
/** * The template for displaying search results pages. * * @package _amclinictheme */
get_header(); ?>

<section id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div class="container">
	        <section id="form">
			<div class="row">
				
				 <div class="col-sm-10 col-md-10 col-lg-10">
					 
				<?php get_search_form(); ?>
		</div><!-- #col-xs-12 -->
		</div><!-- #row -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="feature-posts">
                        <?php if ( have_posts() ) : ?>

                        <header class="page-header">
                            <h1 class="page-title"><?php printf( __( 'Search Results for: %s', '_amclinictheme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                        </header>
                        <!-- .page-header -->

                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>

                        <div class="post clickable">
                            <a class="post-image" href="<?php get_the_permalink(the_ID()); ?>">
                                <?php if(the_post_thumbnail()): ?>
                                <img src="<?php the_post_thumbnail();?>" alt="Image: <?php echo  esc_html(the_title())?>">
                                <?php endif; ?>
                            </a>

                            <div class="post-body">
                                <h3>
									<a href="<?php get_the_permalink(the_ID()); ?>">
										<?php echo  esc_html(ucwords(strtolower(the_title())))?>
									</a>
								</h3>

                                <p>
                                    <?php the_excerpt(); ?>
                                </p>
                                <div class="post-more">
                                    <a href="<?php get_the_permalink(the_ID()); ?>"><span></span></a>
                                </div>

                            </div>
                        </div>
                        <?php endwhile; ?>


                        <?php else : ?>

                        <?php get_template_part( 'content', 'none' ); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- #main -->
</section>
<!-- #primary -->

<!--<?php get_sidebar(); ?>-->
<?php get_footer(); ?>