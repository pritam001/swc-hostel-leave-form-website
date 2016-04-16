<?php
	require_once 'config.php';
	
	$json_a = array();

	$roll_no = $_GET['roll_no'];
	$webmail_id = $_GET['webmail_id'];
	$webmail_id_array = explode('@', $webmail_id);
	
	$string = file_get_contents("database/login_credentials.json");
	$json_a = json_decode($string, true);
	$found = 0;

	foreach ($json_a as $value) {
		if($value['webmail'] == $webmail_id_array[0] && $value['rollno'] == $roll_no) {
			session_start();
			$_SESSION['webmail'] = $value['webmail'];
			$_SESSION['rollno'] = $value['rollno'];
			$_SESSION['name'] = $value['name'];
			$_SESSION['hostel'] = $value['hostel'];
			$_SESSION['room'] = $value['room'];
			$_SESSION['submissioncount'] = $value['submissioncount'];
			if($value['submissioncount'] > 0){
				$_SESSION['phone'] = $value['phone'];
				$_SESSION['purpose'] = $value['purpose'];
				$_SESSION['date_of_dep'] = $value['date_of_dep'];
				$_SESSION['time_of_dep'] = $value['time_of_dep'];
				$_SESSION['date_of_arr'] = $value['date_of_arr'];
				$_SESSION['time_of_arr'] = $value['time_of_arr'];
				$_SESSION['address'] = $value['address'];
				$_SESSION['em_address'] = $value['em_address'];
				$_SESSION['filename'] = $value['filename'];
				$_SESSION['guide_name'] = $value['guide_name'];
				$_SESSION['ppi_name'] = $value['ppi_name'];
				$_SESSION['project_code'] = $value['project_code'];
				$_SESSION['contract_up_to'] = $value['contract_up_to'];
				$_SESSION['checkbox1'] = $value['checkbox1'];
				$_SESSION['checkbox2'] = $value['checkbox2'];
				echo 2;
			} else {
				echo 1;
			}
			$found = 1;
		}
	}
	
	if ($found == 0){
		echo 0;
	}
	
?>