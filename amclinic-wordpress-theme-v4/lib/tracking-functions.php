<?php

function amclinic_get_tracking_vars(){
	return array(
		'sea_l' => array(
			'session_track' => true
		)
	);
}


function amclinic_custom_query_vars_filter($vars) {
	$new_vars = amclinic_get_tracking_vars();
	foreach($new_vars as $key => $options){
		$vars[] .= $key;
	}
	return $vars;
}
add_filter( 'query_vars', 'amclinic_custom_query_vars_filter' );


function amclinic_track_session_vars() {
	$tracking_group = 'query_tracking';
	if(!session_id()) {
		session_start();
		if(!isset($_SESSION[$tracking_group])){
			$_SESSION[$tracking_group] = array();
		}
	}

	$vars = amclinic_get_tracking_vars();

	foreach($vars as $var => $options){
		$value = get_query_var( $var, false );
		if($options['session_track']){
			if($value !== false){
				$_SESSION[$tracking_group][$var] = sanitize_text_field( $value );
			}
		}
	}
}
add_action('template_redirect', 'amclinic_track_session_vars', 1);



function amclinic_get_tracking_data(){
	$data = array();
	$tracking_group = 'query_tracking';
	$vars = amclinic_get_tracking_vars();
	foreach($vars as $var => $options ){
		if($options['session_track']){
			if(isset($_SESSION[$tracking_group][$var]) ){
				$data[$var] = $_SESSION[$tracking_group][$var];
			}
		} else {
			$value = get_query_var( $var, false );
			if($value){
				$data[$var] = $value;
			}
		}
	}
	return $data;
}

function amclinic_track_form_submission($form_id, $from_email, $form_data){
	$tracking_data = amclinic_get_tracking_data();
	$data = array(
		'form_id' => $form_id,
		'form_data' => json_encode($form_data),
		'from_email' => $from_email,
		'created_at' => date('Y-m-d H:i:s'),
		'tracking_data' => json_encode($tracking_data)
	);
	global $wpdb;
	$table_name = $wpdb->prefix . "amclinic_form_activity";
	$wpdb->insert(  $table_name, $data );
}


/**
 * Schema updates
 */

function amclinic_create_form_log_table(){
	global $wpdb;

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

	$table_name = $wpdb->prefix . "amclinic_form_activity";  //get the database table prefix to create my new table

	$sql = "CREATE TABLE $table_name (
      id int(11) unsigned NOT NULL AUTO_INCREMENT,
      form_id varchar(255) NOT NULL,
      form_data text DEFAULT NULL,
      from_email varchar(255) DEFAULT NULL,
      created_at datetime NOT NULL,
      tracking_data text DEFAULT NULL,
      PRIMARY KEY  (id),
      KEY email (from_email),
      KEY form_id (form_id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

	dbDelta( $sql );
}
add_action("after_switch_theme", "amclinic_create_form_log_table");

//function test_session(){
//	error_log(json_encode(amclinic_get_tracking_data()) );
//}
//add_filter('template_redirect', 'test_session');

