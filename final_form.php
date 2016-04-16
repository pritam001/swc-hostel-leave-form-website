<?php
	require_once 'config.php';
	session_start();
	
	if( !isset($_SESSION['name']) ){
		header('Location:index.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Leave Form : SWC : IIT Guwahati</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css">
	<style>
		@import "http://fonts.googleapis.com/css?family=Lato:300,400,700,900italic&subset=latin";
		@charset "UTF-8";
		
		body{
			font-family: Lato,Arial,sans-serif;
		}
	</style>
	<link href="css/jquery-ui.css" rel="stylesheet">
	<script src="js/jquery-1.11.3.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery-ui.js"></script>
	<link type="image/vnd.microsoft.icon" rel="shortcut icon" href="favicon.gif"></link>
	<script src="js/basic.js"></script>
	<link rel="stylesheet" href="css/basic.css">
	
	<style>
		body {
			background-image: url("images/bg-8-full.jpg");
		}
		.well{
			box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.5);
		}
		.well-sm{
			margin-bottom: 0px;
			box-shadow: inset 0px 2px 25px rgba(0, 0, 0, 0.25);
		}
		.image-preview-input {
			position: relative;
			overflow: hidden;
			margin: 0px;    
			color: #333;
			background-color: #fff;
			border-color: #ccc;    
		}
		.image-preview-input input[type=file] {
			position: absolute;
			top: 0;
			right: 0;
			margin: 0;
			padding: 0;
			font-size: 20px;
			cursor: pointer;
			opacity: 0;
			filter: alpha(opacity=0);
		}
		.image-preview-input-title {
			margin-left:2px;
		}
		.alert {
			padding: 5px;
			margin-bottom: 5px;
		}
		
		
		#alerts {
			height: 100%;
			max-height: 100%;
		}
		
		.alert{
			display: none;
		}
		
		<?php if($_SESSION['checkbox1'] == "false") {echo "#checkbox1_div {display: none;}";} ?>
		<?php if($_SESSION['checkbox2'] == "false") {echo "#checkbox2_div {display: none;}";} ?>
		
		.form-group{
			padding-left: 15px;
			padding-right: 15px;
		}
		
		.modal-header, .modal-footer{
			padding-left: 30px;
			padding-right: 30px;
		}
		
	</style>
	
	<script>
	
	$(document).ready(function() {
		
		$("#confirm_form").click(function() { 
			$.get("store_in_database.php", { })
			.done(function(data){
				setTimeout(function(){ window.location.href='logout.php' }, 1000);
			});
		});
		
	});
	
	
	</script>
	
</head>

<body style="background-color:#FFFF99;">
	<script>

	$(function() {
		$("#reg_Modal").modal({
			backdrop: false,
			keyboard: false
		});
	});
	
	</script>

	<div class="container" style="width: 80%;">

		<!-- Modal -->
		<div class="modal fade" id="reg_Modal" role="dialog">
			<div style="margin-left: 20%;" class="modal-dialog">

			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">

				  <h4 style="color:blue;">
				  <span class="glyphicon glyphicon-list-alt"></span> Preview : Online Hostel Leaving Form <span class="badge"> Form No. 18 </span> </h4>
				</div>
				
				<div class="modal-body">
				  <form role="form" id="leave_form" method="post">
					<div class="form-group col-sm-6">
					  <label for="stud_name"><span class="glyphicon glyphicon-user"></span> Name</label><br/>
					  <div class="well well-sm"><?php echo $_SESSION['name'] ?></div>
					</div>
					
					<div class="form-group col-sm-6">
					  <label for="stud_roll_no"><span class="glyphicon glyphicon-pencil"></span> Roll Number </label>
					  <div class="well well-sm"><?php echo $_SESSION['rollno'] ?></div>
					</div>
					
					<div class="form-group col-sm-6">
					  <label for="stud_hostel"><span class="glyphicon glyphicon-folder-close"></span> Hostel</label>
					  <div class="well well-sm"><?php echo $_SESSION['hostel'] ?></div>
					</div>
					
					<div class="form-group col-sm-6">
					  <label for="stud_room"><span class="glyphicon glyphicon-inbox"></span> Room No. </label>
					  <div class="well well-sm"><?php echo $_SESSION['room'] ?></div>
					</div>
					
					<div class="form-group col-sm-6">
					  <label for="stud_phone"><span class="glyphicon glyphicon-phone"></span> Phone No. </label>
					  <div class="well well-sm"><?php echo $_SESSION['phone'] ?></div>
					</div>
					
					<div class="form-group col-sm-6">
					  <label for="stud_email"><span class="glyphicon glyphicon-envelope"></span> Email id </label>
					  <div class="well well-sm"><?php echo $_SESSION['webmail']."@iitg.ernet.in" ?></div> 
					</div>
					
					<div class="form-group col-sm-6">
						<label class="text-info"><strong>Project related leave</strong></label>
						<div class="well well-sm"><?php if($_SESSION['checkbox1'] == "true") {echo "Yes";} else {echo "No";} ?></div>
					</div>
					
					<div class="form-group col-sm-6">
						<label class="text-info"><strong>M. Tech/Ph. D student</strong></label>
						<div class="well well-sm"><?php if($_SESSION['checkbox2'] == "true") {echo "Yes";} else {echo "No";} ?></div>
					</div>
					
					<div class="form-group">
					  <label for="stud_purpose"><span class="glyphicon glyphicon-comment"></span> Purpose of hostel Leave (Please specify) </label>
					  <div class="well well-sm"><?php echo $_SESSION['purpose'] ?></div>
					</div>
					
					<?php 
						if($_SESSION['checkbox2'] == "true"){
							echo '<div class="form-group">
								<label for="stud_doc"><span class="glyphicon glyphicon-download-alt"></span> Copy of medical document </label>
								<div class="well well-sm"><a href="database/docs/'.$_SESSION['filename'].'">'.$_SESSION['filename'].'</a></div>
							</div>';
							
							echo '<div class="form-group">
							  <label for="stud_guide_name"><span class="glyphicon glyphicon-user"></span> Name of Supervisor/Guide</label>
							  <div class="well well-sm">'.$_SESSION['guide_name'].'</div>
							</div>';
						}
					?>
					
					<div class="form-group col-sm-6">
					  <label for="stud_date_of_dep"><span class="glyphicon glyphicon-calendar"></span> Date of Departure</label>
					  <div class="well well-sm"><?php echo $_SESSION['date_of_dep'] ?></div>
					</div>
					
					<div class="form-group col-sm-6">
					  <label for="stud_date_of_arr"><span class="glyphicon glyphicon-calendar"></span> Date of Arrival</label>
					  <div class="well well-sm"><?php echo $_SESSION['date_of_arr'] ?></div>
					</div>
					
					<div class="form-group col-sm-6">
						<label for="stud_time_of_dep"><span class="glyphicon glyphicon-time"></span> Time of Departure</label>
						<div class="well well-sm"><?php echo $_SESSION['time_of_dep'] ?></div>
					</div>
					
					<div class="form-group col-sm-6">
						<label for="stud_time_of_arr"><span class="glyphicon glyphicon-time"></span> Time of Arrival</label>
						<div class="well well-sm"><?php echo $_SESSION['time_of_arr'] ?></div>
					</div>
					
					<?php 
						if($_SESSION['checkbox1'] == "true"){
							echo '<div class="form-group">
							  <label for="ppi_name"><span class="glyphicon glyphicon-user"></span> Name: Principle project investigator</label>
							  <div class="well well-sm">'.$_SESSION['ppi_name'].'</div>
							</div>';
							
							echo '<div class="form-group col-sm-6">
							  <label for="project_code"><span class="glyphicon glyphicon-barcode"></span> Project Code</label>
							  <div class="well well-sm">'.$_SESSION['project_code'].'</div>
							</div>';
							
							echo '<div class="form-group col-sm-6">
							  <label for="contract_up_to"><span class="glyphicon glyphicon-calendar"></span> My contract up to</label>
							  <div class="well well-sm">'.$_SESSION['contract_up_to'].'</div>
							</div>';
						}
					?>
					
					<div class="form-group">
					  <label for="stud_address"><span class="glyphicon glyphicon-home"></span> Home Address</label>
					  <div class="well well-sm"><?php echo $_SESSION['address'] ?></div>
					</div>
					
					<div class="form-group">
					  <label for="stud_em_address"><span class="glyphicon glyphicon-home"></span> Contact addresses during Leave period (For emergency purpose)</label>
					  <div class="well well-sm"><?php echo $_SESSION['em_address'] ?></div>
					</div>
					
				  </form>
				</div>
				
				<div class="modal-footer">
					<div class="col-sm-6" style="padding-left:0px;">
						<a href="re_leave_form.php">
							<button id="go_back" type="button" class="btn btn-info btn-block pull-left"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp; Edit Form  </button>
						</a>
					</div>
					<div class="col-sm-6" style="padding-right:0px;">
						<button id="confirm_form" type="submit" class="btn btn-block btn-success pull-right"> Confirm Submission &nbsp; <span class="glyphicon glyphicon-send"></span></button>
					</div>
				</div>
			  </div>
			</div>
		</div>
	</div>
</body>

</html>
