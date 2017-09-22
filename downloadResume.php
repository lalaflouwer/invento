<?php
	session_start();
	// Load the required files
	require_once 'dbconfig.php';
	
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
	
if  (isset($_GET['dow']))
{
	$resume = $_GET['dow'];
	$result = mysqli_query("SELECT * FROM career WHERE car_resume='$resume'");
	
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.basename($resume).'"');
	header('Content-Length: ' .filesize($resume));
	readfile($resume);
}
?>