<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package _amclinictheme
 */

get_header(); ?>


<section id="content">
	<div class="container">


		<div class="row">
			<div class="col-xs-12">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
							if ( is_category() ) :
								single_cat_title();

							elseif ( is_tag() ) :
								single_tag_title();

							elseif ( is_author() ) :
								printf( __( 'Author: %s', '_amclinictheme' ), '<span class="vcard">' . get_the_author() . '</span>' );

							elseif ( is_day() ) :
								printf( __( 'Day: %s', '_amclinictheme' ), '<span>' . get_the_date() . '</span>' );

							elseif ( is_month() ) :
								printf( __( 'Month: %s', '_amclinictheme' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', '_amclinictheme' ) ) . '</span>' );

							elseif ( is_year() ) :
								printf( __( 'Year: %s', '_amclinictheme' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', '_amclinictheme' ) ) . '</span>' );

							elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
								_e( 'Asides', '_amclinictheme' );

							elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
								_e( 'Galleries', '_amclinictheme' );

							elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
								_e( 'Images', '_amclinictheme' );

							elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
								_e( 'Videos', '_amclinictheme' );

							elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
								_e( 'Quotes', '_amclinictheme' );

							elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
								_e( 'Links', '_amclinictheme' );

							elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
								_e( 'Statuses', '_amclinictheme' );

							elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
								_e( 'Audios', '_amclinictheme' );

							elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
								_e( 'Chats', '_amclinictheme' );

							elseif (get_post_type()) :
								$details = get_post_type_object(get_post_type());
								echo $details->labels->name;

							else :
								_e( 'Archives', '_amclinictheme' );

							endif;
						?>
					</h1>
					<?php
						// Show an optional term description.
						$term_description = term_description();
						if ( ! empty( $term_description ) ) :
							printf( '<div class="taxonomy-description">%s</div>', $term_description );
						endif;
					?>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php

						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */

					if( get_post_format()) {
						get_template_part( 'content', get_post_format() );
					} else {
						get_template_part( 'content', 'list' );
					}


					?>

				<?php endwhile; ?>

				<?php _amclinictheme_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			</div>
		</div>
	</div>
</section><!-- #primary -->


<?php get_footer(); ?>
