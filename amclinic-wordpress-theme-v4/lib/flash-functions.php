<?php

function amclinic_flash_msg($return = false){
	$msg_info = isset($_SESSION['flash_msg']) ? $_SESSION['flash_msg'] : false;
	unset($_SESSION['flash_msg']);

	if(!$msg_info){
		return false;
	}

	$msg = isset($msg_info['msg']) ? $msg_info['msg'] : false;
	$context = isset($msg_info['context']) ? $msg_info['context'] : 'info';

	if($msg){
		if($return){
			return array(
				'msg' => $msg,
				'context' =>$context
			);
		}
		echo $msg;
	}
	return false;
}

function amclinic_set_flash_msg($msg, $context='info'){
	if($msg) {
		$_SESSION['flash_msg'] = array(
			'msg'     => $msg,
			'context' => $context
		);
	}
}