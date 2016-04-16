<?php
	require 'config.php';
	session_start();
	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["stud_doc"]["type"])){
		$msg = '';
		$uploaded = FALSE;
		$extensions = array("jpeg", "jpg", "png", "pdf", "docx"); // file extensions to be checked
		$fileTypes = array("image/png","image/jpg","image/jpeg","application/pdf", "application/asp-unknown", "application/vnd.ms-excel","application/msword", 
		"application/vnd.openxmlformats-officedocument.wordprocessingml.document"); // file types to be checked
		$file = $_FILES["stud_doc"];
		$file_extension = strtolower(end(explode(".", $file["name"])));
		//echo $file["type"];
		//file size condition can be included here   -- && ($file["size"] < 100000)
		if (in_array($file["type"],$fileTypes) && in_array($file_extension, $extensions)) {
			if ($file["error"] > 0)
			{
				$msg = 'Error Code: ' . $file["error"];
			}
			else
			{
				$sourcePath = $file['tmp_name']; //  source path of the file
				$targetPath = 'database/docs/'.$_SESSION['rollno'].".".$file_extension; // Target path where file is to be stored
				move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
				$msg = '<strong> File Uploaded Successfully . . . ! </strong>';
				$uploaded = TRUE;
			}
		}
		else
		{
			$msg = '***Invalid file Size or Type***';
		}
		echo ($uploaded ? $msg : '<span class="msg-error">'.$msg.'</span>');

	}

	die();
?>