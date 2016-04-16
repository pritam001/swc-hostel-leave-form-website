<?php
	require_once 'config.php';
	session_start();
	
	$json_a = array();

	$string = file_get_contents("database/login_credentials.json");
	$json_a = json_decode($string, true);
	
	foreach ($json_a as $key => $value) {
		if($value['webmail'] == $_SESSION['webmail'] && $value['rollno'] == $_SESSION['rollno']) {
			$s_count = $value['submissioncount'] + 1;
			$value1 = array(
			"webmail" => $_SESSION['webmail'],
			"rollno" => $_SESSION['rollno'],
			"name" => $_SESSION['name'],
			"hostel" => $_SESSION['hostel'],
			"room" => $_SESSION['room'],
			"submissioncount" => $s_count,
			'phone' => $_SESSION['phone'], 
			'purpose' => $_SESSION['purpose'],
			'date_of_dep' => $_SESSION['date_of_dep'],
			'time_of_dep' => $_SESSION['time_of_dep'],
			'date_of_arr' => $_SESSION['date_of_arr'],
			'time_of_arr' => $_SESSION['time_of_arr'],
			'address' => $_SESSION['address'],
			'em_address' => $_SESSION['em_address'],
			'filename' => $_SESSION['filename'],
			'guide_name' => $_SESSION['guide_name'],
			'ppi_name' => $_SESSION['ppi_name'],
			'project_code' => $_SESSION['project_code'],
			'contract_up_to' => $_SESSION['contract_up_to'],
			'checkbox1' => $_SESSION['checkbox1'],
			'checkbox2' => $_SESSION['checkbox2']);
			
			/*$value['phone'] = $_SESSION['phone'];
			$value['purpose'] = $_SESSION['purpose'];
			array_push($value,"purpose",$_SESSION['purpose']);
			array_push($json_a, $value);
			unset($json_a[$value]);*/
			unset($json_a[$key]);
			array_push($json_a, $value1);
		}
	}
	
	$json_b = json_encode($json_a, true);
	file_put_contents("database/login_credentials.json", $json_b);
	echo "ok";
	
?>