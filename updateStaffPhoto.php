<?php
	// Load the required files
	require_once 'dbconfig.php';
	
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

		//$result = mysqli_query($dbc, $sql);	
		echo $_GET['id'];
	$emp_img = "";
	$id = ""; //$id = null;
	$emp_id = "";
	$emp_fullname = "";
	
	$sql= "SELECT * FROM employees WHERE emp_id='$_GET[id]'";
	
		$result = mysqli_query($dbc, $sql);
		
        //while($row = mysql_fetch_array($result)) { 
		// mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($row = mysqli_fetch_array($result)) {     
		
		$emp_img = $row['emp_img'];
		echo "<img src='".$row['emp_img']."' width='150' height='180'> </br></br>"; 

		echo $_GET["id"]; // Gets the id from the previous page.
		

			if (isset($_POST['update']))
			{
				$emp_img=$_POST['image'];

			
		//Upload Image
		$emp_img = basename($_FILES['image']['name']);
				
				$update = "UPDATE employees SET emp_img='$emp_img' WHERE emp_id='$_GET[id]'";
				
			$update_Result = mysqli_query($dbc, $update);
			
			if (move_uploaded_file($_FILES['image']['tmp_name'], $emp_img)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
		}
		
		header("Location: adminDisplay.php");//redirect to adminDisplay.php page
	
			mysqli_close( $dbc ) ;}
		}	
?>

			<form action="updateStaffPhoto.php" method="post" enctype="multipart/form-data">
			Update Employee Photo:<br>
			<?php echo $emp_img;?>
			<input type="file" name="image" id="image" value="<?php echo $emp_img;?>"><br><br>
			<input type="submit" name="update" value="Update Photo">
			</form>