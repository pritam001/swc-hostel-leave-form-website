<?php
	require_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>SWC</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style>
		@charset "UTF-8";
		@import "http://fonts.googleapis.com/css?family=Lato:300,400,700,900italic&subset=latin";

		body{
			font-family: Lato,Arial,sans-serif;
		}
	</style>
	
	<link href="css/jquery-ui.css" rel="stylesheet">
	<script src="js/jquery-1.11.3.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery-ui.js"></script>
	<link type="image/vnd.microsoft.icon" rel="shortcut icon" href="favicon.ico"></link>	
	<script src="js/basic.js"></script>
	<link rel="stylesheet" href="css/basic.css">
	
	<style>

		.well{
			box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.5);
		}
		
		.alert {
			padding: 5px;
			margin-bottom: 5px;
			margin-top: 5px;
			display: none;
		}
	
		#loading_img {
			padding: 5px;
			margin-bottom: 5px;
			margin-top: 5px;
			display: none;
		}
		
	</style>
	
	<script>
		function valid_form() 
		{
			//$("#alerts").children(".alert").fadeOut(250);
			if( $("#stud_webmail").val() == "" ){
				return 0;
			}
			if( $("#stud_roll_no").val() == "" ){
				return 0;
			}
			
			return 1;
		}
		
		//var myVar = setInterval(function(){validation_checker()},2000);
		
		function validation_checker() {
			var validated = 1;
				
			// Roll number Matching
			if( $("#stud_roll_no").val() != "" ){
				var roll_no_pattern = /^\d{8,9}$/;
				var roll_no = $("#stud_roll_no").val();
				
				if( roll_no_pattern.test(roll_no) ) {
					$("#wrong_stud_roll_no").hide("blind",500);
				} else {
					$("#wrong_stud_roll_no").show("blind",500);
					validated = 0;
				}
			} else {
				$("#wrong_stud_roll_no").hide("blind",500);
			}
			
			// Webmail id Matching
			if( $("#stud_webmail").val() != "" ){
				var email_pattern = /[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(iitg\.ernet\.in|iitg\.ac\.in)\b/;
				var email_id = $("#stud_webmail").val();
				
				if( email_pattern.test(email_id) ) {
					$("#wrong_stud_webmail").hide("blind",500);
				} else {
					$("#wrong_stud_webmail").show("blind",500);
					validated = 0;
				}
			} else {
				$("#wrong_stud_webmail").hide("blind",500);
			}
			
			return validated;
		}
		
		$(document).ready(function() {
			$("#stud_roll_no").bind("keypress change blur", function() {
				if( $("#stud_roll_no").val() == "" ){
					$("#empty_stud_roll_no").show( "blind", {times: 10, distance: 100}, 500);
				} else {
					$("#empty_stud_roll_no").hide("blind",500);
				}
			});
			
			$("#stud_webmail").bind("keypress change blur", function() {
				if( $("#stud_webmail").val() == "" ){
					$("#empty_stud_webmail").show( "blind", {times: 10, distance: 100}, 500);
				} else {
					$("#empty_stud_webmail").hide("blind",500);
				}
			});
			
			$("#stud_roll_no").bind("keypress focus change blur", function() {
				if( $("#stud_roll_no").val() != "" ){
					validation_checker();
				}
			});
			
			$("#stud_webmail").bind("keypress focus change blur", function() {
				if( $("#stud_webmail").val() != "" ){
					validation_checker()
				}
			});
			
			$("#log_in_button").click(function() { 
				if( valid_form() == 1 && validation_checker() == 1) {
					$("#fill_all_fields").hide("blind",500);
					validation_checker();

					$.get("login.php", { roll_no : $("#stud_roll_no").val(), webmail_id : $("#stud_webmail").val() })
					.done(function(data){
						if(data == 2){
							$("#wrong_credentials").hide( "blind", 500);
							$("#loading_img").show( "blind", 100);
							setTimeout(function(){window.location.href='final_form.php'},500);
						} else if(data == 1){
							$("#wrong_credentials").hide( "blind", 500);
							$("#loading_img").show( "blind", 100);
							setTimeout(function(){window.location.href='leave_form.php'},500);
						} else if(data == 0){
							$("#wrong_credentials").show( "blind", 500);
						} else {
							alert("Server Error!");
						}
					});
				} else if( valid_form() == 1 && validation_checker() == 0){
					$("#wrong_credentials").hide( "blind", 500);
				} else {
					$("#fill_all_fields").show("blind",500);
				}
			});
		});
	</script>

</head>

<body style="background-color:#FFFF99;">
	
	<div id="login_div" class="container">
		<div id="reg_content" class="container well">
			<div id="reg-header">
			  <h4><span class="glyphicon glyphicon-globe"></span>
			  <span class="glyphicon glyphicon-modal-window"></span> SWC Login Portal , IIT Guwahati 
			  <span class="badge"> Login using webmail id and roll number </span> </h4>
			</div>
			
			<hr/>
			<div id="reg-body">
			  <form role="form" id="reg_form">
				<div class="form-group">
				  <label for="stud_roll_no"><span class="glyphicon glyphicon-user"></span> Roll Number</label>
				  <input type="text" class="form-control" id="stud_roll_no" maxlength="40" placeholder="Enter your roll number eg: 100000001" required>
				</div>
				
				<div class="form-group">
				  <label for="stud_webmail"><span class="glyphicon glyphicon-envelope"></span> Webmail</label>
				  <input type="email" class="form-control" id="stud_webmail" maxlength="40" placeholder="Enter your webmail id eg: a.sample@iitg.ernet.in" required>
				</div>
				
				<!--
				<div class="form-group">
				  <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
				  <input type="password" maxlength="30" class="form-control" id="psw" placeholder="Enter password" required>
				</div> -->
				
				<hr/>
				<button id="log_in_button" type="button" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-log-in"></span> Login</button>
			  </form>
			</div>
			
			<div id="reg-footer">
				<div id="loading_img" style="text-align: center;">
					<img src='images/loading.gif' alt="Loading image">
				</div>
				
				<div class="alert alert-danger" id="wrong_credentials" >
					<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> Invalid Credentials!</strong> Enter correct credentials.
				</div>
				
				<div class="alert alert-danger" id="wrong_stud_webmail" >
					<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> Invalid Webmail !</strong> Please enter IITG Webmail id.
				</div>
				
				<div class="alert alert-danger" id="wrong_stud_roll_no" >
					<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> Error !</strong> Invalid roll number.
				</div>
				
				<div class="alert alert-warning" id="empty_stud_roll_no" >
					<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> Warning !</strong> Roll Number Field is empty.
				</div>
				
				<div class="alert alert-warning" id="empty_stud_webmail" >
					<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> Warning !</strong> Webmail Address Field is empty.
				</div>
				
				<div class="alert alert-info" id="fill_all_fields" >
					<strong> <span class="glyphicon glyphicon-info-sign"></span> Info ! </strong> All form fields are mandatory.
				</div>
				
				<div class="alert alert-success" id="reg_success">
					<strong> <span class="glyphicon glyphicon-info-sign"></span>  Success ! Registration Complete. Verify your email to continue.</strong>
				</div>
			</div>
		
		</div>
	
	</div>
	
</body>
</html>