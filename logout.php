<?php
	session_start();
	unset($_SESSION['webmail']);
	unset($_SESSION['rollno']);
	unset($_SESSION['name']);
	unset($_SESSION['hostel']);
	unset($_SESSION['room']);
	session_destroy();
	header('Location:index.php');
?>