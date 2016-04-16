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
		
		.alert, #checkbox1_div, #checkbox2_div {
			display: none;
		}
		
		.form-group{
			padding-left: 15px;
			padding-right: 15px;
		}
		
		.modal-header, .modal-footer{
			padding-left: 30px;
			padding-right: 30px;
		}
		
		.ui-datepicker, .ui-datepicker-calendar{
			background-color: green;
			-webkit-box-shadow: 0px 0px 15px 5px rgba(0, 0, 0, .5);
			-moz-box-shadow: 0px 0px 15px 5px rgba(0, 0, 0, .5);
			box-shadow: 0px 0px 15px 5px rgba(0, 0, 0, .5);
		}
		
		.ui-datepicker-header {
			background: url('images/black-cover.jpg') repeat 0 0 #000;
			background-color: black;
			font-weight: bold;
			-webkit-box-shadow: inset 0px 1px 1px 0px rgba(250, 250, 250, 2);
			-moz-box-shadow: inset 0px 1px 1px 0px rgba(250, 250, 250, .2);
			box-shadow: inset 0px 1px 1px 0px rgba(250, 250, 250, .2);
			text-shadow: 1px -1px 0px #000;
			filter: dropshadow(color=#000, offx=1, offy=-1);
			line-height: 30px;
			border-width: 1px 0 0 0;
			border-style: solid;
			border-color: #111;
		}
	</style>
	
	<script>
	// Clear Alert every few seconds
	
	function valid_form() {
		//$("#alerts").children(".alert").fadeOut(250);
		if( $("#stud_purpose").val() == "" ){
			return 0;
		}
		if( $("#stud_date_of_arr").val() == "" ){
			return 0;
		}
		if( $("#stud_date_of_dep").val() == "" ){
			return 0;
		}
		if( $("#stud_em_address").val() == "" ){
			return 0;
		}
		if( $("#stud_address").val() == "" ){
			return 0;
		}
		if( $("#stud_phone").val() == "" ){
			return 0;
		}
		if( $("#hr1").text() == "Hr" || $("#min1").text() == "Min"){
			return 0;
		}
		if( $("#hr2").text() == "Hr" || $("#min2").text() == "Min"){
			return 0;
		}
		if($("#checkbox2").is(":checked") && $("#stud_file").val() == ""){
			return 0;
		}
		
		return 1;
	}
	
	$(document).ready(function() {
		$("#general_info").show( "blind", {times: 10, distance: 100}, 1000);
		$(".progress-bar").animate({
			width: "100%"
		}, 5000);
		
		$("#stud_phone").focus(function() { 
			$("#info_phone").show( "blind", {times: 10, distance: 100}, 1000);
		});
		
		$("#stud_address").focus(function() { 
			$("#info_address").show( "blind", {times: 10, distance: 100}, 1000);
		});
		
		$("#stud_name").bind("keypress change blur", function() {
			if( $("#stud_name").val() == "" ){
				$("#empty_stud_name").show( "blind", {times: 10, distance: 100}, 1000);
			} else {
				$("#empty_stud_name").hide("blind",1000);
			}
		});
		$("#stud_phone").bind("keypress change blur", function() {
			if( $("#stud_phone").val() == "" ){
				$("#empty_mobile_number").show( "blind", {times: 10, distance: 100}, 1000);
			} else {
				$("#empty_mobile_number").hide("blind",1000);
			}
		});
		$("#stud_email").bind("keypress change blur", function() {
			if( $("#stud_email").val() == "" ){
				$("#empty_email").show( "blind", {times: 10, distance: 100}, 1000);
			} else {
				$("#empty_email").hide("blind",1000);
			}
		});
		$("#stud_purpose").bind("keypress change blur", function() {
			if( $("#stud_purpose").val() == "" ){
				$("#empty_purpose").show( "blind", {times: 10, distance: 100}, 1000);
			} else {
				$("#empty_purpose").hide("blind",1000);
			}
		});
		$("#stud_date_of_dep").bind("keypress change blur", function() {
			if( $("#stud_date_of_dep").val() == "" ){
				$("#empty_date_of_dep").show( "blind", {times: 10, distance: 100}, 1000);
			} else {
				$("#empty_date_of_dep").hide("blind",1000);
			}
		});
		$("#stud_date_of_arr").bind("keypress change blur", function() {
			if( $("#stud_date_of_arr").val() == "" ){
				$("#empty_date_of_arr").show( "blind", {times: 10, distance: 100}, 1000);
			} else {
				$("#empty_date_of_arr").hide("blind",1000);
			}
		});
		$("#ppi_name").bind("keypress change blur", function() {
			if( $("#ppi_name").val() == "" ){
				$("#empty_ppi_name").show( "blind", {times: 10, distance: 100}, 1000);
			} else {
				$("#empty_ppi_name").hide("blind",1000);
			}
		});
		$("#project_code").bind("keypress change blur", function() {
			if( $("#project_code").val() == "" ){
				$("#empty_project_code").show( "blind", {times: 10, distance: 100}, 1000);
			} else {
				$("#empty_project_code").hide("blind",1000);
			}
		});
		$("#contract_up_to").bind("keypress change blur", function() {
			if( $("#contract_up_to").val() == "" ){
				$("#empty_contract_up_to").show( "blind", {times: 10, distance: 100}, 1000);
			} else {
				$("#empty_contract_up_to").hide("blind",1000);
			}
		});
		$(document).bind("mouseenter mouseleave click", function() {
			if( $("#hr1").text() == "Hr" || $("#min1").text() == "Min"){
				$("#empty_time_of_dep").show( "blind", {times: 10, distance: 100}, 1000);
			} else {
				$("#empty_time_of_dep").hide("blind",1000);
			}
		});
		$(document).bind("mouseenter mouseleave click", function() {
			if( $("#hr2").text() == "Hr" || $("#min2").text() == "Min"){
				$("#empty_time_of_arr").show( "blind", {times: 10, distance: 100}, 1000);
			} else {
				$("#empty_time_of_arr").hide("blind",1000);
			}
		});
		
		$("#forward_form").click(function() { 
			if( valid_form() == 1 ) {
				$("#fill_all_fields").hide("blind",1000);
				//$(".progress-bar").css("width","0%");
				$("#uploading_data").show("explode", 500);
				$.get("store_formdata.php", { phone : $("#stud_phone").val(), purpose : $("#stud_purpose").val(), date_of_dep : $("#stud_date_of_dep").val(),
				date_of_arr : $("#stud_date_of_arr").val(), address : $("#stud_address").val(), em_address : $("#stud_em_address").val(),
				filename : $("#stud_file").val(), guide_name : $("#stud_guide_name").val(), ppi_name : $("#ppi_name").val(),
				project_code : $("#project_code").val(), contract_up_to : $("#contract_up_to").val(), time_of_dep : $("#hr1").text()+":"+$("#min1").text()+":"+$("#am1").text(),
				time_of_arr : $("#hr2").text()+":"+$("#min2").text()+":"+$("#am2").text(), checkbox1 : $("#checkbox1").is(":checked"),
				checkbox2 : $("#checkbox2").is(":checked")})
				.done(function(data){
					//alert(data);
					setTimeout(function(){ $("#uploading_data").hide("drop", 500); $("#uploaded_data").show("explode", 500); }, 2000);
					setTimeout(function(){ $("#uploaded_data").hide("explode", 500); window.location.href='final_form.php' }, 5000);
					//setTimeout(function(){window.location.href='leave_form.php'},500);
				});
			} else {
				$("#fill_all_fields").show("blind",1000);
			}
		});
		// file upload
		$("#leave_form").on('submit',(function(e) {
			e.preventDefault();
			if($("#upload-msg").css("display") == "none" && $("#checkbox2").is(":checked") && $("#stud_file").val() == ""){
				$("#empty_file").show("blind", 500);
			} else if($("#upload-msg").css("display") == "none" && $("#checkbox2").is(":checked") && $("#stud_file").val() != ""){
				$("#empty_file").hide("blind", 500);
				$("#upload-msg").html('<strong> <span class="glyphicon glyphicon-sort"></span> Uploading File . . . </strong> Please Wait.<div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped active" role="progress-bar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;"><span class="sr-only"> 100% Complete </span> </div></div>');	
				$("#upload-msg").show("explode", 500);
				$.ajax({
					url: "post_file.php",        // Url to which the request is send
					type: "POST",             // Type of request to be send, called as method
					data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
					contentType: false,       // The content type used when sending data to the server.
					cache: false,             // To unable request pages to be cached
					processData:false,        // To send DOMDocument or non processed data file it is set to false
					success: function(data)   // A function to be called if request succeeds
					{
						$(".progress-bar").animate({
							width: "100%"
						}, 2000);
						setTimeout(function(){ $("#upload-msg").hide("drop", 500); $("#upload-msg").html(data); $("#upload-msg").show("explode", 500); }, 2500);
						setTimeout(function(){ $("#upload-msg").hide("explode", 500); }, 6000);
					}
				});
			}
		}));
	});
	
	var myVar = setInterval(function(){validation_checker()},2000);
	
	function validation_checker() {
			
		// Mobile Number Pattern Matching
		if( $("#stud_phone").val() != "" ){
			var mobile_no_pattern = /^\+?\d{1,4}\-?\d{7,10}$/;
			var mobile_no = $("#stud_phone").val();
			
			if( mobile_no_pattern.test(mobile_no) ) {
				$("#wrong_mobile_number").hide("blind",1000);
			} else {
				$("#wrong_mobile_number").show("blind",1000);
			}
		} else {
			$("#wrong_mobile_number").hide("blind",1000);
			return 0;
		}
		
		// Email Id Pattern Matching
		if( $("#stud_email").val() != "" ){
			var email_pattern = /[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+(?:[A-Z]{2}|com|org|net|in|edu|gov|mil|biz|info|mobi|name|aero|asia|jobs|museum)\b/;
			var email_id = $("#stud_email").val();
			
			if( email_pattern.test(email_id) ) {
				$("#wrong_stud_email").hide("blind",1000);
			} else {
				$("#wrong_stud_email").show("blind",1000);
			}
		} else {
			$("#wrong_stud_email").hide("blind",1000);
			return 0;
		}
		
		return 1;
	}
	
	
	</script>
	
</head>

<body style="background-color:#FFFF99;">
	<script>
	$(document).on('click', '#close-preview', function(){ 
		$('.image-preview').popover('hide');
		// Hover befor close the preview
		$('.image-preview').hover(
			function () {
			   $('.image-preview').popover('hide');
			}, 
			 function () {
			   $('.image-preview').popover('hide');
			}
		);    
	});

	$(function() {
		// Create the close button
		var closebtn = $('<button/>', {
			type:"button",
			text: 'x',
			id: 'close-preview',
			style: 'font-size: initial;',
		});
		closebtn.attr("class","close pull-right");
		// Set the popover default content
		$('.image-preview').popover({
			trigger:'manual',
			html:true,
			title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
			content: "There's no image",
			placement:'bottom'
		});
		// Clear event
		$('.image-preview-clear').click(function(){
			$('.image-preview').attr("data-content","").popover('hide');
			$('.image-preview-filename').val("");
			$('.image-preview-clear').hide();
			$('.image-preview-input input:file').val("");
			$(".image-preview-input-title").text("Browse"); 
		}); 
		// Create the preview image
		$(".image-preview-input input:file").change(function (){     
			var img = $('<img/>', {
				id: 'dynamic',
				width:250,
				height:200
			});      
			var file = this.files[0];
			var reader = new FileReader();
			// Set preview image into the popover data-content
			reader.onload = function (e) {
				$(".image-preview-input-title").text("Change");
				$(".image-preview-clear").show();
				$(".image-preview-filename").val(file.name);            
				img.attr('src', e.target.result);
				$(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("hide");
			}        
			reader.readAsDataURL(file);
		});  
	});
	
	
	$(document).ready(function() {
		// only date next to departure date is available as arrival date
		$("#stud_date_of_dep").change(function() {
			test = $(this).datepicker('getDate');
			testm = new Date(test.getTime());
			testm.setDate(testm.getDate() + 1);

			$("#stud_date_of_arr").datepicker("option", "minDate", testm);
		});
		
		// set checkbox display
		$('#checkbox1').on('change', function() { 
			if (this.checked) {
				$('#checkbox1_div').show( "blind", {times: 10, distance: 100}, 1000);
			} else {
				$('#checkbox1_div').hide( "blind", {times: 10, distance: 100}, 1000);
				$("#empty_ppi_name").hide("blind",1000);
				$("#empty_project_code").hide("blind",1000);
				$("#empty_contract_up_to").hide("blind",1000);
				$("#ppi_name").val("");
				$("#project_code").val("");
				$("#contract_up_to").val("");
			}
		});
		
		$('#checkbox2').on('change', function() { 
			if (this.checked) {
				$('#checkbox2_div').show( "blind", {times: 10, distance: 100}, 1000);
			} else {
				$('#checkbox2_div').hide( "blind", {times: 10, distance: 100}, 1000);
				$("#empty_guide_name").hide("blind",1000);
				$("#stud_guide_name").val("");
			}
		});
		
		// time click selection
		$(".category_selector").click(function() {
			$(this).parent().parent().prev().prev().html( $(this).text() );
			//$("#stud_batch").attr( "placeholder", $(this).text() );
		});
		
	});

	$(function() {
		$("#reg_Modal").modal({
			backdrop: false,
			keyboard: false
		});
	});
	
	$(function() {
		$( "#stud_date_of_dep" ).datepicker({ minDate: 0, maxDate: "+1M +15D", dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],});
		$( "#stud_date_of_arr" ).datepicker({ minDate: 0, maxDate: "+12M +15D", dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'], });
		$( "#contract_up_to" ).datepicker({ minDate: 0, maxDate: "+12M +15D", dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'], });
	});
	
	//ajax scripting
	$(document).ajaxSend(function() {  
		$("#connecting").fadeIn(1000);
	});
	$(document).ajaxComplete(function() {  
		$("#connecting").fadeOut(1000);
	});
	</script>

	<div class="container" style="float:left; width: 60%;">

		<!-- Modal -->
		<div class="modal fade" id="reg_Modal" role="dialog">
			<div style="margin-left: 5%;" class="modal-dialog">

			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">

				  <h4 style="color:blue;">
				  <span class="glyphicon glyphicon-list-alt"></span> Online Hostel Leaving Form <span class="badge"> Form No. 18 </span> </h4>
				</div>
				
				<div class="modal-body">
				  <form role="form" id="leave_form" method="post">
					<div class="form-group col-sm-6">
					  <label for="stud_name"><span class="glyphicon glyphicon-user"></span> Name</label>
					  <input type="text" class="form-control" id="stud_name" maxlength="40" placeholder="Enter your name" 
					  value="<?php echo $_SESSION['name'] ?>" readonly>
					</div>
					
					<div class="form-group col-sm-6">
					  <label for="stud_roll_no"><span class="glyphicon glyphicon-pencil"></span> Roll Number </label>
					  <input type="text" class="form-control" id="stud_roll_no" maxlength="15" placeholder="Enter your roll number" 
					  value="<?php echo $_SESSION['rollno'] ?>" readonly>
					</div>
					
					<div class="form-group col-sm-6">
					  <label for="stud_hostel"><span class="glyphicon glyphicon-folder-close"></span> Hostel</label>
					  <input type="text" class="form-control" id="stud_hostel" maxlength="40" placeholder="Enter your hostel" 
					  value="<?php echo $_SESSION['hostel'] ?>" readonly>
					</div>
					
					<div class="form-group col-sm-6">
					  <label for="stud_room"><span class="glyphicon glyphicon-inbox"></span> Room No. </label>
					  <input type="text" class="form-control" id="stud_room" maxlength="15" placeholder="Enter your room number" 
					  value="<?php echo $_SESSION['room'] ?>" readonly>
					</div>
					
					<div class="form-group col-sm-6">
					  <label for="stud_phone"><span class="glyphicon glyphicon-phone"></span> Phone No. </label>
					  <input type="text" class="form-control" id="stud_phone" maxlength="15" placeholder="Enter your phone number">
					</div>
					
					<div class="form-group col-sm-6">
					  <label for="stud_email"><span class="glyphicon glyphicon-envelope"></span> Email id </label>
					  <input type="text" class="form-control" id="stud_email" maxlength="15" placeholder="Enter your email id" 
					  value="<?php echo $_SESSION['webmail']."@iitg.ernet.in" ?>" readonly>
					</div>
					
					<div class="form-group col-sm-6">
						<label for="stud_checkbox1">
							<label class="checkbox-inline text-info"><input id="checkbox1" type="checkbox" value=""><strong>Project related leave</strong></label>
						</label>
					</div>
					
					<div class="form-group col-sm-6">
						<label for="stud_checkbox2">
							<label class="checkbox-inline text-info"><input id="checkbox2" type="checkbox" value=""><strong>M. Tech/Ph. D student</strong></label>
						</label>
					</div>
					
					<div class="form-group">
					  <label for="stud_purpose"><span class="glyphicon glyphicon-comment"></span> Purpose of hostel Leave (Please specify) </label>
					  <textarea style="resize: none;" maxlength="200" type="text" class="form-control" id="stud_purpose" placeholder="Purpose of hostel Leave" required></textarea>
					</div>
					
					<div id="checkbox2_div">
					
						<div class="form-group">
							<label for="stud_doc"><span class="glyphicon glyphicon-cloud-upload"></span> Attach a copy of medical document </label>
							<!-- image-preview-filename input -->
							<div class="input-group image-preview">
								<input type="text" class="form-control image-preview-filename" disabled="disabled" id="stud_file" name="stud_file"> <!-- don't give a name === doesn't send on POST/GET -->
								<span class="input-group-btn">
									<!-- image-preview-clear button -->
									<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
										<span class="glyphicon glyphicon-remove"></span> Clear
									</button>
									<!-- image-preview-input -->
									<div class="btn btn-default image-preview-input">
										<span class="glyphicon glyphicon-folder-open"></span>
										<span class="image-preview-input-title">Browse</span>
										<input type="file" accept="image/png, image/jpeg, image/gif, application/pdf, application/vnd.ms-excel,
										application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
										id="stud_doc" name="stud_doc"/> <!-- rename it -->
									</div>
								</span>
							</div><!-- /input-group image-preview --> 
						</div>
						
						<div class="form-group">
						  <label for="stud_guide_name"><span class="glyphicon glyphicon-user"></span> Name of Supervisor/Guide</label>
						  <input type="text" maxlength="30" class="form-control" id="stud_guide_name" placeholder="Name of Supervisor/Guide in case of M. Tech/Ph. D student">
						</div>
					
					</div>
					
					<div class="form-group col-sm-6">
					  <label for="stud_date_of_dep"><span class="glyphicon glyphicon-calendar"></span> Date of Departure</label>
					  <input type="text" class="form-control" maxlength="60" id="stud_date_of_dep" placeholder="Date of Departure" required>
					</div>
					
					<div class="form-group col-sm-6">
					  <label for="stud_date_of_arr"><span class="glyphicon glyphicon-calendar"></span> Date of Arrival</label>
					  <input type="text" class="form-control" maxlength="60" id="stud_date_of_arr" placeholder="Date of Arrival" required>
					</div>
					
					<div class="form-group col-sm-6">
						<label for="stud_time_of_dep"><span class="glyphicon glyphicon-time"></span> Time of Departure</label>
						<div class="btn-group">
							<div class="btn-group">
								<button type="button" id="hr1" class="btn btn-primary">Hr</button>
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><a class="category_selector" href="#">1</a></li>
									<li><a class="category_selector" href="#">2</a></li>
									<li><a class="category_selector" href="#">3</a></li>
									<li><a class="category_selector" href="#">4</a></li>
									<li><a class="category_selector" href="#">5</a></li>
									<li><a class="category_selector" href="#">6</a></li>
									<li><a class="category_selector" href="#">7</a></li>
									<li><a class="category_selector" href="#">8</a></li>
									<li><a class="category_selector" href="#">9</a></li>
									<li><a class="category_selector" href="#">10</a></li>
									<li><a class="category_selector" href="#">11</a></li>
									<li><a class="category_selector" href="#">12</a></li>
								</ul>
							</div>
							<div class="btn-group">
								<button type="button" id="min1" class="btn btn-primary">Min</button>
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><a class="category_selector" href="#">00</a></li>
									<li><a class="category_selector" href="#">15</a></li>
									<li><a class="category_selector" href="#">30</a></li>
									<li><a class="category_selector" href="#">45</a></li>
								</ul>
							</div>
							<div class="btn-group">
								<button type="button" id="am1" class="btn btn-primary">AM</button>
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><a class="category_selector" href="#">AM</a></li>
									<li><a class="category_selector" href="#">PM</a></li>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="form-group col-sm-6">
						<label for="stud_time_of_arr"><span class="glyphicon glyphicon-time"></span> Time of Arrival</label>
						<div class="btn-group">
							<div class="btn-group">
								<button type="button" id="hr2" class="btn btn-primary">Hr</button>
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><a class="category_selector" href="#">1</a></li>
									<li><a class="category_selector" href="#">2</a></li>
									<li><a class="category_selector" href="#">3</a></li>
									<li><a class="category_selector" href="#">4</a></li>
									<li><a class="category_selector" href="#">5</a></li>
									<li><a class="category_selector" href="#">6</a></li>
									<li><a class="category_selector" href="#">7</a></li>
									<li><a class="category_selector" href="#">8</a></li>
									<li><a class="category_selector" href="#">9</a></li>
									<li><a class="category_selector" href="#">10</a></li>
									<li><a class="category_selector" href="#">11</a></li>
									<li><a class="category_selector" href="#">12</a></li>
								</ul>
							</div>
							<div class="btn-group">
								<button type="button" id="min2" class="btn btn-primary">Min</button>
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><a class="category_selector" href="#">00</a></li>
									<li><a class="category_selector" href="#">15</a></li>
									<li><a class="category_selector" href="#">30</a></li>
									<li><a class="category_selector" href="#">45</a></li>
								</ul>
							</div>
							<div class="btn-group">
								<button type="button" id="am2" class="btn btn-primary">AM</button>
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu">
									<li><a class="category_selector" href="#">AM</a></li>
									<li><a class="category_selector" href="#">PM</a></li>
								</ul>
							</div>
						</div>
					</div>
					
					<div id="checkbox1_div">
					
						<div class="form-group">
						  <label for="ppi_name"><span class="glyphicon glyphicon-user"></span> Name: Principle project investigator</label>
						  <input type="text" maxlength="30" class="form-control" id="ppi_name" placeholder="Name of Principle project investigator">
						</div>
						
						<div class="form-group col-sm-6">
						  <label for="project_code"><span class="glyphicon glyphicon-barcode"></span> Project Code</label>
						  <input type="text" maxlength="30" class="form-control" id="project_code" placeholder="Project Code">
						</div>
						
						<div class="form-group col-sm-6">
						  <label for="contract_up_to"><span class="glyphicon glyphicon-calendar"></span> My contract up to</label>
						  <input type="text" class="form-control" maxlength="30" id="contract_up_to" placeholder="My contract up to">
						</div>
					
					</div>
					
					<div class="form-group">
					  <label for="stud_address"><span class="glyphicon glyphicon-home"></span> Home Address</label>
					  <textarea style="resize: none;" maxlength="200" type="text" class="form-control" id="stud_address" placeholder="Enter your home address"></textarea>
					</div>
					
					<div class="form-group">
					  <label for="stud_em_address"><span class="glyphicon glyphicon-home"></span> Contact addresses during Leave period (For emergency purpose)</label>
					  <textarea style="resize: none;" maxlength="200" type="text" class="form-control" id="stud_em_address" placeholder="Contact addresses during Leave period"></textarea>
					</div>
					
				  
				</div>
				
				<div class="modal-footer">
					<a href="logout.php"> 
						<button id="log_out" type="button" class="btn btn-danger btn-success pull-left"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout  </button>
					</a>
					<button id="forward_form" type="submit" class="btn btn-default btn-success pull-right"> To Confirmation Page &nbsp; <span class="glyphicon glyphicon-arrow-right"></span></button>
					</form>
				</div>
			  </div>
			</div>
		</div>
	</div>
	
		
	<div class="container" id="full_alert_div" style="margin-left: 60%; margin-top: 30px; margin-right: 20px; width: 30%">
		<div class="well" id="alerts">
			<div class="alert alert-info" id="connecting">
				<strong> <span class="glyphicon glyphicon-sort"></span> Connecting . . . </strong> Please Wait.
			</div>
			<div class="alert alert-info" id="upload-msg">
				<strong> <span class="glyphicon glyphicon-sort"></span> Uploading File . . . </strong> Please Wait.
				<div class="progress">
					<div id="pb1" class="progress-bar progress-bar-success progress-bar-striped active" role="progress-bar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
						<span class="sr-only"> 100% Complete </span> 
					</div>
				</div>
			</div>

			<div class="alert alert-success" id="uploading_data">
				<strong> <span class="glyphicon glyphicon-sort"></span>  Uploading Data . . . </strong> Please do not refresh or leave the page!
				<div class="progress">
					<div id="pb2" class="progress-bar progress-bar-success progress-bar-striped active" role="progress-bar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%;">
						<span class="sr-only"> 100% Complete </span> 
					</div>
				</div>
			</div>
			<div class="alert alert-success" id="uploaded_data">
				<strong> <span class="glyphicon glyphicon-info-sign"></span> Success ! </strong> Details uploaded.
			</div>

			<div class="alert alert-warning" id="empty_mobile_number" >
				<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> Warning !</strong> Mobile Number Field is empty.
			</div>
			<div class="alert alert-warning" id="empty_file" >
				<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> Warning !</strong> File is not selected yet.
			</div>
			<div class="alert alert-warning" id="empty_address" >
				<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> Warning !</strong> Address Field is empty.
			</div>
			<div class="alert alert-warning" id="empty_em_address" >
				<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> Warning !</strong> Emergency Address Field is empty.
			</div>
			<div class="alert alert-warning" id="empty_date_of_dep" >
				<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> Warning !</strong> Date of Departure is not provided.
			</div>
			<div class="alert alert-warning" id="empty_date_of_arr" >
				<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> Warning !</strong> Date of Arrival is not provided.
			</div>
			<div class="alert alert-warning" id="empty_guide_name" >
				<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> Warning !</strong> Guide Name is not provided.
			</div>
			<div class="alert alert-warning" id="empty_time_of_arr" >
				<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> Warning !</strong> Time of Arrival is not selected.
			</div>
			<div class="alert alert-warning" id="empty_time_of_dep" >
				<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> Warning !</strong> Time of Departure is not selected.
			</div>
			<div class="alert alert-warning" id="empty_ppi_name" >
				<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> Warning !</strong> Enter Principle Project Investigator's name.
			</div>
			<div class="alert alert-warning" id="empty_project_code" >
				<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> Warning !</strong> Project Code not provided.
			</div>
			<div class="alert alert-warning" id="empty_contract_up_to" >
				<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> Warning !</strong> Contract up to field is empty.
			</div>
			<div class="alert alert-warning" id="empty_purpose" >
				<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> Warning !</strong> Purpose field is empty.
			</div>
			
			<div class="alert alert-info" id="info_phone" >
				<strong> <span class="glyphicon glyphicon-info-sign"></span> Info ! </strong> Acceptable Formats: +919876543210 or +91-9876543210 or 9876543210.
				You can also enter landline number instead. Acceptable Formats: 0381-2345678.
			</div>
			<div class="alert alert-info" id="info_address" >
				<strong> <span class="glyphicon glyphicon-info-sign"></span> Info ! </strong> Provide address along with pin code.
			</div>
			<div class="alert alert-info" id="fill_all_fields" >
				<strong> <span class="glyphicon glyphicon-info-sign"></span> Info ! </strong> All form fields are mandatory.
			</div>
			
			<div class="alert alert-danger" id="wrong_stud_name" >
				<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> Invalid Student Name !</strong> Name can not contain digits or special characters.
			</div>
			<div class="alert alert-danger" id="wrong_stud_email" >
				<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> Error !</strong> Invalid e-mail address.
			</div>
			<div class="alert alert-danger" id="wrong_mobile_number" >
				<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> Error !</strong> Invalid Mobile Number.
			</div>
			
			<div class="alert alert-success" id="general_info">
				<strong> <span class="glyphicon glyphicon-info-sign"></span>  Info !</strong> PS/M.Tech./ Ph.D Students if you vacate the room on account 
				of completion/other reasons. Attach a copy medical document if any / leave approved from Dept. concerned.
			</div>
			
			
		</div>	
		
	</div>
</body>

</html>
