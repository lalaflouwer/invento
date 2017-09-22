<?php
	// Load the required files
	require_once 'dbconfig.php';
	
	unset($_SESSION['email']);
	
	Header('Location:loginAdmin.php');
	
?>
	