<?php
	require_once 'config.php';
	session_start();
	
	$json_a = array();

	$phone = $_GET['phone'];
	$purpose = $_GET['purpose'];
	$date_of_dep = $_GET['date_of_dep'];
	$time_of_dep = $_GET['time_of_dep'];
	$date_of_arr = $_GET['date_of_arr'];
	$time_of_arr = $_GET['time_of_arr'];
	$address = $_GET['address'];
	$em_address = $_GET['em_address'];
	$filename = $_GET['filename'];
	$guide_name = $_GET['guide_name'];
	$ppi_name = $_GET['ppi_name'];
	$project_code = $_GET['project_code'];
	$contract_up_to = $_GET['contract_up_to'];
	$checkbox1 = $_GET['checkbox1'];
	$checkbox2 = $_GET['checkbox2'];
	
	$file_extension = strtolower(end(explode(".", $filename)));
	$filename = $_SESSION['rollno'].".".$file_extension;
	
	if($checkbox1 == "false"){
		$ppi_name = "";
		$project_code = "";
		$contract_up_to = "";
	}
	if($checkbox2 == "false"){
		$filename = "";
		$guide_name = "";
	}

	$_SESSION['phone'] = $phone;
	$_SESSION['purpose'] = $purpose;
	$_SESSION['date_of_dep'] = $date_of_dep;
	$_SESSION['time_of_dep'] = $time_of_dep;
	$_SESSION['date_of_arr'] = $date_of_arr;
	$_SESSION['time_of_arr'] = $time_of_arr;
	$_SESSION['address'] = $address;
	$_SESSION['em_address'] = $em_address;
	$_SESSION['filename'] = $filename;
	$_SESSION['guide_name'] = $guide_name;
	$_SESSION['ppi_name'] = $ppi_name;
	$_SESSION['project_code'] = $project_code;
	$_SESSION['contract_up_to'] = $contract_up_to;
	$_SESSION['checkbox1'] = $checkbox1;
	$_SESSION['checkbox2'] = $checkbox2;
	
?>