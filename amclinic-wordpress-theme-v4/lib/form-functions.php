<?php


function add_form_func($atts){

	extract( shortcode_atts( array(
		'type' => 'general'
	), $atts ) );

	wp_enqueue_script( 'am-theme-v4-range-slider' );

	switch($type) {
		case 'booking':
			wp_enqueue_script( 'am-theme-v4-form-booking' );
			break;
		default:
			wp_enqueue_script( 'am-theme-v4-form' );
	}
	wp_enqueue_style('amclinictheme-forms-styles');
	return get_template_part('assets/partials/forms/form',$type);
}
add_shortcode( 'form', 'add_form_func' );


/**
 * Check for form submissions
 *
 *
 */
function check_for_form_submissions() {
	if(isset($_POST['am-theme-form'])) {

		//check for bundled subscription
		if(isset($_POST['am-newsletter-subscribe']) && $_POST['am-newsletter-subscribe'] == 1){
			process_nl_sub();
		}

		//do form processing
		switch ( $_POST['am-theme-form'] ) {
			case 'am-advice-form':
				process_health_advice_form();
				break;
			case 'am-contact-form':
				process_contact_form();
				break;
		}

		die();
	}
}
add_action('template_redirect', 'check_for_form_submissions');



/*
 * Process newsletter subscription
 */
function process_nl_sub(){
	$form_id = 'newsletter_subscribe';
	$name = preg_replace('/[^ \w]+/','', $_POST['am-forename']);
	$name = empty($name) ? 'Subscriber' : $name;
	$email = $_POST['am-email'];
	$list_id = 10; //am clinic

	if(is_email($email)) {
		try {
			$email_manager = new Email_Phplist_Subscriber_Manager_byowner( $email, new Email_Phplist_Subscriber_Data_live );

			if ( !$email_manager->isUserSubscribed( $list_id ) ) {
				$email_manager->setName( empty($name) ? 'Subscriber' : $name);
				$email_manager->subscribeUser( $list_id );
				$email_manager->addNote( 'clinic.acumedic.com form ' . $_POST['am-theme-form'] );
				amclinic_track_form_submission($form_id, $email, $_POST);
			}

		} catch ( Exception $e ) {
			//silent errors
		}
	}
}



/**
 * Process Advice Form
 *
 *
 */
function process_health_advice_form() {
	$form_id = 'health_advice_form';

		//validate email
	if (!is_email($_POST['am-email'])) {
		MJM_Clinic::bf_ajax_header_error_response(__('Please enter a valid email address', '_amclinictheme'));
	}

	if (empty($_POST['am-forename'])) {
		MJM_Clinic::bf_ajax_header_error_response(__('Please enter your forename', '_amclinictheme'));
	}

	if (empty($_POST['am-surname'])) {
		MJM_Clinic::bf_ajax_header_error_response(__('Please enter your surname', '_amclinictheme'));
	}

	if (empty($_POST['am-phone'])) {
		MJM_Clinic::bf_ajax_header_error_response(__('Please enter a contact phone number', '_amclinictheme'));
	}

	$salutation = isset($_POST['am-salutation']) ? $_POST['am-salutation'] : null;
	$name =  $salutation.' '. $_POST['am-forename'].' '.$_POST['am-surname'];
	$email = $_POST['am-email'];
	$phone = isset($_POST['am-phone']) && !empty($_POST['am-phone']) ? $_POST['am-phone'] : 'N/A';
	$city = isset($_POST['am-city']) && !empty($_POST['am-city']) ? $_POST['am-city'] : 'N/A';
	$country = isset($_POST['am-country']) && !empty($_POST['am-country']) ? $_POST['am-country'] : 'N/A';
	$dob = isset($_POST['am-dob']) && !empty($_POST['am-dob'])  ? $_POST['am-dob'] : 'N/A';
	$sex = isset($_POST['am-sex']) && !empty($_POST['am-sex']) ? $_POST['am-sex'] : 'N/A';
	$condition = isset($_POST['am-condition']) && !empty($_POST['am-condition']) ? $_POST['am-condition'] : 'N/A';
	$symptoms = isset($_POST['am-symptoms']) && !empty($_POST['am-symptoms']) ? $_POST['am-symptoms'] : 'N/A';
	$symptoms_info = isset($_POST['am-symptominfo']) && !empty($_POST['am-symptominfo']) ? $_POST['am-symptominfo'] : 'N/A';
	$medications = isset($_POST['am-medications']) && !empty($_POST['am-medications']) ? $_POST['am-medications'] : 'N/A';
	$extra_info = isset($_POST['am-extrainfo']) && !empty($_POST['am-extrainfo']) ? $_POST['am-extrainfo'] : 'N/A';
	$stress_level = isset($_POST['am-stresslevel']) && !empty($_POST['am-stresslevel']) ? $_POST['am-stresslevel'] : 'N/A';
	$attend_clinic = isset($_POST['am-clinic-attend']) && !empty($_POST['am-clinic-attend']) ? $_POST['am-clinic-attend'] : 'N/A';


	$content =  __('Name', '_amclinictheme') .": ".$name.PHP_EOL.
		__('Email', '_amclinictheme')   . ": " . $email.PHP_EOL.
		__('Phone', '_amclinictheme')  . ": " . $phone.PHP_EOL.
//		__('City', '_amclinictheme') . ": " . $city.PHP_EOL.
//		__('Country', '_amclinictheme') . ": " . $country.PHP_EOL.
		__('Date of Birth', '_amclinictheme') . ": " . $dob.PHP_EOL.
		__('Sex', '_amclinictheme') . ": " . $sex.PHP_EOL.
		__('Condition', '_amclinictheme') . ": " . $condition.PHP_EOL.
		__('Symptoms', '_amclinictheme') . ": " . $symptoms.PHP_EOL.
		__('Symptom Length', '_amclinictheme') . ": " . $symptoms_info.PHP_EOL.
		__('Medications', '_amclinictheme') . ": " . $medications.PHP_EOL.
		__('Extra Info', '_amclinictheme') . ": " . $extra_info.PHP_EOL.
		__('Stress Level (1-10)', '_amclinictheme') . ": " . $stress_level.PHP_EOL.
		__('Can visit clinic', '_amclinictheme') . ": " . $attend_clinic.PHP_EOL
		;

	$noreply_email = "noreply@" . preg_replace('/^www\./', '', $_SERVER['SERVER_NAME']);

	$message       = array(
		'from_name' =>  str_replace(array("\r","\n"),array(" "," "),$_POST['am-forename']),
		'from_email' => empty($_POST['am-email']) ? $noreply_email : str_replace(array("\r","\n"),array(" "," "),$_POST['am-email']),
		'contents' => $content,
		'subject' => __("New Health Advice Request", '_amclinictheme'),
		'form_action_url' => '/',
	);


	$message = MJM_Clinic::akismet_check($message);

	if ($message) {
		$headers= array();
		$headers[] = 'From: ' . get_bloginfo('name') . ' <' . $noreply_email . '>';
		$headers[] = 'Reply-To: ' . $message['from_name'] . ' <' . $message['from_email'] . '>';
		wp_mail('clinic@acumedic.com', $message['subject'], $message['contents'], $headers);
		amclinic_track_form_submission($form_id, $email, $_POST);
		return;
	}

	MJM_Clinic::bf_ajax_header_error_response(__('Sorry your form could not be sent.', '_amclinictheme'));
}


/**
 * Process Advice Form
 *
 *
 */
function process_contact_form() {

	$form_id = 'contact_form';

	//validate email
	if (!is_email($_POST['am-email'])) {
		MJM_Clinic::bf_ajax_header_error_response(__('Please enter a valid email address', '_amclinictheme'));
	}

	if (empty($_POST['am-forename'])) {
		MJM_Clinic::bf_ajax_header_error_response(__('Please enter your name', '_amclinictheme'));
	}

	$contact_msg = __('Name', '_amclinictheme') . ': ' . $_POST['am-forename'].PHP_EOL;
	$contact_msg .= __('Email', '_amclinictheme') . ': ' . $_POST['am-email'].PHP_EOL;

	if(isset($_POST['am-phone']) && !empty($_POST['am-phone'])){
		$contact_msg .= __('Phone', '_amclinictheme') . ': ' . $_POST['am-phone'].PHP_EOL;
	}

	$contact_msg .= __('Message', '_amclinictheme') . ': ' . $_POST['am-message'];

	$noreply_email = "noreply@" . preg_replace('/^www\./', '', $_SERVER['SERVER_NAME']);

	$message       = array(
		'from_name' =>  str_replace(array("\r","\n"),array(" "," "),$_POST['am-forename']),
		'from_email' => empty($_POST['am-email']) ? $noreply_email : str_replace(array("\r","\n"),array(" "," "),$_POST['am-email']),
		'contents' => $contact_msg,
		'subject' => __("New General Enquiry", '_amclinictheme'),
		'form_action_url' => '/',
	);


	$message = MJM_Clinic::akismet_check($message);

	if ($message) {
		$headers= array();
		$headers[] = 'From: ' . get_bloginfo('name') . ' <' . $noreply_email . '>';
		$headers[] = 'Reply-To: ' . $message['from_name'] . ' <' . $message['from_email'] . '>';
		wp_mail('clinic@acumedic.com', $message['subject'], $message['contents'], $headers);
		amclinic_track_form_submission($form_id, $_POST['am-email'], $_POST);
		return;
	}

	MJM_Clinic::bf_ajax_header_error_response(__('Sorry your form could not be sent.', '_amclinictheme'));
}

function process_booking_form(){
	$form_id = 'booking_form';
	$service_list = mjm_clinic_get_service_list();
	$category_list = mjm_clinic_get_service_category_list();

	$service_category_id = isset($_POST['am-treatment-type']) ? $_POST['am-treatment-type'] : null;
	$service_id = isset($_POST['mjm_clinic_bf_service_select']) ? $_POST['mjm_clinic_bf_service_select'] : null;
	$email = isset($_POST['mjm_clinic_bf_email']) ? $_POST['mjm_clinic_bf_email'] : null;

	$data = $_POST;
	$data['treatment_category'] = isset($category_list[$service_category_id]) ? $category_list[$service_category_id] : null;
	$data['treatment_name'] = isset($service_list[$service_id]) ? $service_list[$service_id] : null;
	amclinic_track_form_submission($form_id, $email, $data);
}
add_action('mjm-clinic_booking_form_sent', 'process_booking_form');





