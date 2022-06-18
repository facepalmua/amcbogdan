<?php

// ADDS entry to DB
function amclinic_comblock_email($provider, $email){
	global $wpdb;
	$provider = trim(strtolower($provider));
	$email = trim(strtolower($email));

	$known_providers = array(
		'clinicoffice'
	);

	if(!in_array($provider,$known_providers)){
		return false;
	}

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		return false;
	}

	$sql = "INSERT INTO {$wpdb->prefix}amclinic_coms_blocked 
	(provider,email) VALUES (%s,%s) ON DUPLICATE KEY UPDATE updated = NOW()";
	$sql = $wpdb->prepare( $sql, $provider, $email );
	$wpdb->query( $sql );
	return true;
}
//Picks up URL action
function amclinic_comblock_url() {

	global $wp;
	$home_url = home_url();
	$current_url = home_url( $wp->request );
	$params = wp_parse_url($current_url);
	if(isset($params['path']) && ($params['path'] == '/comsblock')){
		$email = isset($_GET['e']) ? $_GET['e'] : false;
		$provider = isset($_GET['p']) ? $_GET['p'] : false;

		if($email && $provider) {
			if ( amclinic_comblock_email( $provider, $email ) ) {
				amclinic_set_flash_msg( 'Success! Your communications preference has been saved', 'info');
			}
		}
		//redirect to home
		wp_redirect( $home_url );
		exit;
	}

}
add_action( 'template_redirect', 'amclinic_comblock_url');



/**
 * Schema updates
 */

function amclinic_create_coms_blocked_table(){
	global $wpdb;

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

	$table_name = $wpdb->prefix . "amclinic_coms_blocked";  //get the database table prefix to create my new table

	$sql = "CREATE TABLE $table_name (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `provider` varchar(255) DEFAULT NULL,
			  `email` varchar(255) DEFAULT NULL,
			  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			  PRIMARY KEY (`id`),
			  UNIQUE KEY `provider_email` (`provider`,`email`),
			  KEY `email` (`email`),
			  KEY `provider` (`provider`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

	dbDelta( $sql );
}
add_action("after_switch_theme", "amclinic_create_coms_blocked_table");



