<?php



add_action( 'rest_api_init', 'amclinic_add_api_routes');

function amclinic_add_api_routes(){

	$amclinic_api_route = 'amclinic';
	$amclinic_api_version = 1;

	register_rest_route( $amclinic_api_route.'/'.$amclinic_api_version, '/formactivity/(?P<token>[a-zA-Z0-9-]+)/(?P<type>[a-zA-Z0-9-]+)/(?P<datestart>[0-9-]+)/(?P<dateend>[0-9-]+)', array(
		'methods' => 'GET',
		'callback' => 'amclinic_api_get_form_activity',
	));

	register_rest_route( $amclinic_api_route.'/'.$amclinic_api_version, '/comsblock/get/(?P<token>[a-zA-Z0-9-]+)/(?P<provider>[a-zA-Z0-9-]+)/', array(
		'methods' => 'GET',
		'callback' => 'amclinic_api_get_coms_blocked',
	));
}

function amclinic_get_api_token(){
	$valid_token = md5(NONCE_SALT.date('m').'amclinic'.date('Y'));
	return $valid_token;
}

function amclinic_api_authorise_token($token){
	if($token == amclinic_get_api_token()){
		return true;
	}
	return false;
}

function amclinic_api_authorise_route($params) {
	if(!isset($params['token']) || !amclinic_api_authorise_token($params['token'])){
		return false;
	}
	return true;
}

function amclinic_api_invalid_request(){
	return new WP_REST_Response( 'Invalid Request', 400 );
}

function amclinic_api_validate_date($date, $format = 'Y-m-d') {
	$d = DateTime::createFromFormat($format, $date);
	return $d && $d->format($format) == $date;
}

function amclinic_get_valid_form_id($form_type){
	$form_types = array(
		'booking' => 'booking_form',
		'health-advice' => 'health_advice_form',
		'contact' => 'contact_form',
		'newsletter-subscribe' => 'newsletter_subscribe',
		'all' => '*'
	);

	return isset($form_types[$form_type]) ? $form_types[$form_type] : false;
}


function amclinic_api_get_coms_blocked( $request ) {
	global $wpdb;
	$params = $request->get_params();
	$provider = $params['provider'];

	if(amclinic_api_authorise_route($params) === true){

		$sql = $wpdb->prepare( 'SELECT * FROM wp_amclinic_coms_blocked 
								WHERE provider = "'.esc_sql( $provider ).'"');

		$rows = $wpdb->get_results( $sql );
		if($rows) {
			return new WP_REST_Response( $rows, 200 );
		}
		return new WP_REST_Response( array(), 200 );
	} else {
		return amclinic_api_invalid_request();
	}
}


function amclinic_api_get_form_activity( $request ) {
	global $wpdb;
	$params = $request->get_params();
	if(amclinic_api_authorise_route($params) === true){


		$sql = 'SELECT * FROM wp_amclinic_form_activity';

		$sql_where = array();
		if(!amclinic_api_validate_date($params['datestart'])){
			return amclinic_api_invalid_request();
		}
		$sql_where[] = "created_at >= '".$params['datestart']."'";

		if(!amclinic_api_validate_date($params['dateend'])){
			return amclinic_api_invalid_request();
		}
		$sql_where[] =  "created_at <= '".$params['dateend']." 23:59:59'";

		$form_lookup_id = amclinic_get_valid_form_id($params['type']);

		if($form_lookup_id === false){
			return amclinic_api_invalid_request();
		}

		if($form_lookup_id !== '*'){
			$sql_where[] =  "form_id = '".$form_lookup_id."'";
		}

		$count = 0;
		if(count($sql_where)){
			foreach($sql_where as $where){
				if($count == 0){
					$sql .= ' WHERE ';
				} else {
					$sql .= ' AND ';
				}
				$sql .= $where;
				$count++;
			}
		}

		$rows = $wpdb->get_results( $sql );
		if($rows) {
			foreach ( $rows as $id => $data ) {
				$rows[$id]->form_data    = json_decode( $rows[$id]->form_data );
				$rows[$id]->tracking_data = json_decode( $rows[$id]->tracking_data );
			}
		}
		return new WP_REST_Response( $rows, 200 );
	} else {
		return amclinic_api_invalid_request();
	}

}

