<?php

/**
 * Treatment Nav Widget
 *
 * @since 0.1.3
 */
class AMClinic_Treatment_Nav extends WP_Widget
{

	public function __construct()
	{

		$widget_options  = array('classname' => 'amclinic_treatment_nav_widget', 'description' => __('Treatment/service navigation collapsible', 'mjm-clinic'));
		$control_options = array('id_base' => 'amclinic_treatment_nav_widget');
		parent::__construct('amclinic_treatment_nav_widget', 'AM Clinic: Treatment Nav', $widget_options, $control_options);
	}

	public function widget($args, $instance)
	{
		if (!taxonomy_exists('mjm_clinic_service_category')) {
			return;
		}

		$title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);
		$active_term_ids = array();

		//		$c     = !empty( $instance['count'] ) ? '1' : '0';
		//		$d     = !empty( $instance['dropdown'] ) ? '1' : '0';
		//		$h     = !empty( $instance['hierarchical'] ) ? '1' : '0';
		//		$depth = ( isset( $instance['depth'] ) && is_numeric( $instance['depth'] ) ) ? $instance['depth'] : '0';

		echo $args['before_widget'];
		if ($title) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		if (is_tax('mjm_clinic_service_category')) {
			global $wp_query;
			$active_term_ids = array($wp_query->get_queried_object_id());
		}

		if (is_single()) {
			$terms  = wp_get_post_terms(get_the_ID(), 'mjm_clinic_service_category');
			//if a service has multiple categories how do you choose? Only if one.
			if (count($terms)) {
				foreach ($terms as $term) {
					$active_term_ids[] = $term->term_id;
				}
			}
		}
		$service_cats = mjm_clinic_get_all_service_categories();
		include(get_stylesheet_directory(__FILE__) . '/assets/partials/widgets/treatment_nav.php');

		echo $args['after_widget'];
	}

	public function update($new_instance, $old_instance)
	{
		$instance                 = $old_instance;
		$instance['title']        = strip_tags($new_instance['title']);
		return $instance;
	}

	public function form($instance)
	{
		//Defaults
		$instance     = wp_parse_args((array) $instance, array('title' => ''));
		$title        = esc_attr($instance['title']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>


	<?php
	}
}



/**
 * Child Page Nav
 *
 * @since 0.1.3
 */
class AMClinic_Page_SubNav extends WP_Widget
{

	public function __construct()
	{

		$widget_options  = array('classname' => 'amclinic_page_subnav_widget', 'description' => __('Shows navigation menu for a pages sub/child pages', 'mjm-clinic'));
		$control_options = array('id_base' => 'amclinic_page_subnav_widget');
		parent::__construct('amclinic_page_subnav_widget', 'AM Clinic: Page Sub Nav', $widget_options, $control_options);
	}

	public function widget($args, $instance)
	{

		if (!is_page()) {
			return;
		}
		global $post;
		$title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);

		$args = array(
			'sort_column' => 'menu_order',
			'title_li' => '',
			'echo' => 0,
			'link_before' => '',
			'link_after' => '',
		);

		if (is_page() && $post->post_parent) {
			$args['child_of'] =  $post->post_parent;
			$childpages = wp_list_pages($args);
		} else {
			$args['child_of'] =  $post->ID;
			$childpages = wp_list_pages($args);
		}

		if ($childpages) {
			if (isset($args['before_widget']) && $args['before_widget']) {
				echo $args['before_widget'];
			}

			if ($title) {
				echo $args['before_title'] . $title . $args['after_title'];
			}

			include(get_stylesheet_directory(__FILE__) . '/assets/partials/widgets/page_subnav.php');
			if (isset($args['after_widget']) && $args['after_widget']) {
				echo $args['after_widget'];
			}
		}
	}

	public function form($instance)
	{
		//Defaults
		$instance     = wp_parse_args((array) $instance, array('title' => ''));
		$title        = esc_attr($instance['title']);
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>


	<?php
	}

	public function update($new_instance, $old_instance)
	{
		$instance                 = $old_instance;
		$instance['title']        = strip_tags($new_instance['title']);
		return $instance;
	}
}


/**
 * Learn more about specific condtitions widget.
 *
 * @since 0.1.3
 */
class learn_more_about_specific_condtitions extends WP_Widget
{

	function __construct()
	{
		parent::__construct(

			// Base ID of your widget
			'learn_more_about_specific_condtitions',

			// Widget name will appear in UI
			__('Learn More About Specific Conditions', 'wpb_widget_domain'),

			// Widget description
			array('description' => __('Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain'),)
		);
	}

	// Creating widget front-end

	public function widget($args, $instance)
	{
		$title = apply_filters('widget_title', $instance['title']);
		// <!-- first link -->
		$title_for_link_1 = apply_filters('widget_custom_link', $instance['title_for_link_1']);
		$uri_for_link_1 = apply_filters('widget_custom_link', $instance['uri_for_link_1']);
		// <!-- End of first link -->

		// <!-- first link -->
		$title_for_link_2 = apply_filters('widget_custom_link', $instance['title_for_link_2']);
		$uri_for_link_2 = apply_filters('widget_custom_link', $instance['uri_for_link_2']);
		// <!-- End of first link -->
		$folder_uri = get_stylesheet_directory_uri();
		$args = array(
			'before_widget' => '<div class="sidebar-item"> <div class="sidebar__more-about">',
			'after_widget' => '</div></div>',
			'before_title' => '<h6 class="sidebar-title">',
			'after_title' => '</h6>',
		);
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if (!empty($title))
			echo $args['before_title'] . $title . $args['after_title'];
		if (!empty($title_for_link_1))
			echo ('
			<a href="' . $uri_for_link_1 . '" class="btn-icon"><br>
			<span class="icon">
				<img src="' . $folder_uri . '/assets/images/widgets-icons/info-icon.svg" alt="">
			</span>
			<span class="text">' . $title_for_link_1 . '</span></a>
			');
			if (!empty($title_for_link_2))
			echo ('
			<a href="' . $uri_for_link_2 . '" class="btn-icon"><br>
			<span class="icon">
				<img src="' . $folder_uri . '/assets/images/widgets-icons/info-icon.svg" alt="">
			</span>
			<span class="text">' . $title_for_link_2 . '</span></a>
			');

		// This is where you run the code and display the output

		echo $args['after_widget'];
	}

	// Widget Backend
	public function form($instance)
	{
		if (isset($instance['title'])) {
			$title = $instance['title'];
		} else {
			$title = __('Learn More About Specific Conditions', 'wpb_widget_domain');
		}
		// <!-- first link -->
		isset($instance['title_for_link_1']) ? $title_for_link_1 = $instance['title_for_link_1'] : $title_for_link_1 = __('Anxiety', 'wpb_widget_domain');
		isset($instance['uri_for_link_1']) ? $uri_for_link_1 = $instance['uri_for_link_1'] : $uri_for_link_1 = __('/anxiety/', 'wpb_widget_domain');

		// <!-- End of first Link -->
		// <!-- first link -->
		isset($instance['title_for_link_2']) ? $title_for_link_1 = $instance['title_for_link_2'] : $title_for_link_2 = __('Depression', 'wpb_widget_domain');
		isset($instance['uri_for_link_2']) ? $uri_for_link_1 = $instance['uri_for_link_2'] : $uri_for_link_2 = __('/depression/', 'wpb_widget_domain');

		// <!-- End of first Link -->
		// Widget admin form
	?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>
		<!-- first link -->
		<p>
			<label for="<?php echo $this->get_field_id('title_for_link_1'); ?>"><?php _e('Title for link 1:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title_for_link_1'); ?>" name="<?php echo $this->get_field_name('title_for_link_1'); ?>" type="text" value="<?php echo esc_attr($title_for_link_1); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('uri_for_link_1'); ?>"><?php _e('Uri for link 1:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('uri_for_link_1'); ?>" name="<?php echo $this->get_field_name('uri_for_link_1'); ?>" type="text" value="<?php echo esc_attr($title_for_link_1); ?>" />
		</p>
		<!-- End of first Link -->
		<br>
		<!-- Second link -->
		<p>
			<label for="<?php echo $this->get_field_id('title_for_link_2'); ?>"><?php _e('Title for link 2:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title_for_link_2'); ?>" name="<?php echo $this->get_field_name('title_for_link_2'); ?>" type="text" value="<?php echo esc_attr($title_for_link_2); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('uri_for_link_2'); ?>"><?php _e('Uri for link 2:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('uri_for_link_2'); ?>" name="<?php echo $this->get_field_name('uri_for_link_2'); ?>" type="text" value="<?php echo esc_attr($title_for_link_2); ?>" />
		</p>
		<!-- End of Second Link -->
<?php
	}

	// Updating widget replacing old instances with new
	public function update($new_instance, $old_instance)
	{
		$instance = array();
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		// <!-- first link -->
		$instance['title_for_link_1'] = (!empty($new_instance['title_for_link_1'])) ? strip_tags($new_instance['title_for_link_1']) : '';
		$instance['uri_for_link_1'] = (!empty($new_instance['uri_for_link_1'])) ? strip_tags($new_instance['uri_for_link_1']) : '';
		// <!-- ENd of first link -->
		// <!-- first link -->
		$instance['title_for_link_2'] = (!empty($new_instance['title_for_link_2'])) ? strip_tags($new_instance['title_for_link_2']) : '';
		$instance['uri_for_link_2'] = (!empty($new_instance['uri_for_link_2'])) ? strip_tags($new_instance['uri_for_link_2']) : '';
		// <!-- ENd of first link -->
		return $instance;
	}

	// Class wpb_widget ends here
}

// Register and load the widget
function wpb_load_widget()
{
	register_widget('learn_more_about_specific_condtitions');
}
add_action('widgets_init', 'wpb_load_widget');
