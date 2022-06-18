<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 12/02/2016
 * Time: 15:18
 */


get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xlg-12" style="padding-top: 45px;">
						<div class="jumbotron">
							<h1><?php _e( 'This is somewhat embarrassing, isn’t it?' , '_amclinictheme'); ?></h1>
							<p class="lead"><?php _e( 'It looks like nothing was found at this location. Maybe try a search?' , '_amclinictheme'); ?></p>
							<p><?php get_search_form(); ?></p>
						</div>
					</div>
				</div>	
			</div>		

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>