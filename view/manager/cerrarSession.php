<?php

	session_start();
	error_reporting(0);

	$name = $_SESSION['name'];
	if($name == NULL || $name == ''){
		header("location: ../../");
		die();
	}
	
	session_destroy();
	header("location: ../../")

?>