<?php
/**
 * default search form
 */
?>

	 <h2 class="screen-reader-text" style="padding-left:5px;"><small><?php _e( 'Search for:', 'presentation' ); ?></small></h2>	 	
	 <form role="search" method="get" id="search-form" class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>"/>
	 <div class="form-group">
	<input class="input-lg form-control" type="search" size="50" placeholder="<?php echo esc_attr( 'Search…', 'presentation' ); ?>" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>"/>
	</div>
	<div class="form-group">
	<button class="screen-reader-text btn btn-lg" type="submit" id="search-submit" ><i class="fas fa-search"></i> Search</button>
		</div>
			</form>
	
<!-- MADE THE SEARCH FORM INLINE 
	
	<section class="white-stripe">
	<form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="search-wrap">
		<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'presentation' ); ?></label>
		<input class="input-lg form-control" type="search" placeholder="<?php echo esc_attr( 'Search…', 'presentation' ); ?>" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>" />
		<input class="screen-reader-text btn btn-lg" type="submit" id="search-submit" value="Search" />
	</div>
</form>
</section>-->