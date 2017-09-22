<?php
	// Load the required files
	require_once 'dbconfig.php';
?>
<html>
<head>
<title>Invento Engineering Pte Ltd</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<a href="admin.php">
<img src="logo.png" alt="logo">
</a>
<div id="login">
<?php echo 'User : ' .$_SESSION['emp_fullname'].'  ';?>
<a href="logout.php" style="color:black">Log Out</a>
<!--<a href="loginAdmin.php" style="color:black">Login As Staff</a> |
<a href="loginCust.php" style="color:black">Login As Customer</a> |
<a href="register.php" style="color:black"> Register</a>-->
</div>
</div><div class="nav">
<ul>
	<li class="employee"><a href="admin.php">Profile</a>

	<li class="employee"><a href="adminDisplay.php">Employees</a>
          <ul>
			<li><a href="addStaff.php">Add New Employee</a></li>
			<li><a href="updateStaff.php">Update Employee</a></li>

          </ul>
	<li class="products"><a href="product.php">Products</a>
          <!--<ul>
            <li><a href="#">Manage</a></li>
          </ul>-->
	<li class="products"><a href="#">Claims</a>
          <ul>
            <li><a href="medfee.php">Add Medical Fee</a></li>
			<li><a href="toolsfee.php">Add Tool Fee</a></li>
			<li><a href="displayMed.php">View Medical Fee</a></li>
			<li><a href="displayTool.php">View Tool Fee</a></li>
          </ul>
	<li class="leaves"><a href="http://www.justlogin.com" target="_blank">Leaves</a>
          <!--<ul>
            <li><a href="#">Manage</a></li>
          </ul>-->	  
	<li class="career"><a href="careerDisplay.php">Career Applications</a>
</ul>
<br>
</div>

 
<html>
<head>    

</head>
<body>
<div id="container">
<h1>Profile Details</h1><br><br><br>
<?php	
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

	$sql= "(SELECT * FROM employees where emp_email='$_SESSION[email]')";
			
		$result = mysqli_query($dbc, $sql);
		
        //while($row = mysql_fetch_array($result)) { 
		// mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($row = mysqli_fetch_array($result)) {   		
		
					$id = $row['id'];
					$emp_id = $row['emp_id'];
					$emp_fullname = $row['emp_fullname'];
					$emp_email = $row['emp_email'];
					//$emp_pass = $row['emp_pass'];
					$emp_contact = $row['emp_contact'];
					$emp_homeContact = $row['emp_homeContact'];
					$emp_dob = $row['emp_dob'];
					$emp_nationality = $row['emp_nationality'];
					$emp_race = $row['emp_race'];
					$emp_nric = $row['emp_nric'];
					$emp_permitNo = $row['emp_permitNo'];
					$emp_permitExpiry = $row['emp_permitExpiry'];
					$emp_fin = $row['emp_fin'];
					$emp_passportNo = $row['emp_passportNo'];
					$emp_passportExpiry = $row['emp_passportExpiry'];
					$emp_resid = $row['emp_resid'];
					$emp_address = $row['emp_address'];
					$emp_postal = $row['emp_postal'];
					$emp_faddress = $row['emp_faddress'];
					$emp_fpostal = $row['emp_fpostal'];
					$emp_dept = $row['emp_dept'];
					$emp_designation = $row['emp_designation'];
					$emp_type = $row['emp_type'];
					$emp_joined = $row['emp_joined'];
					//$emp_status = $row['emp_status'];

			$comma = " ,";
			echo 'Welcome ' .$row[2] .$comma; //Selects and shows the emp's name
			//$row[2] = $_SESSION['fullname'];
			//$_SESSION['fullname']=$fullname;
			//echo $fullname;
	        echo "</br>";
			echo "</br>";
			/* echo " <table cellpadding='4' bgcolor='#000000' style=color:'#ffffff' width='15%'>";
            echo "<tr>";
			echo "
			<td bgcolor='#8e1106'>Staff ID</td> <td bgcolor='#ffffff' style=color:#000000 >".$emp_id."</td>
			</tr>
			</table>";*/
			echo " <table cellpadding='4' bgcolor='#000000' style=color:'#ffffff' width='55%'>";
			echo "
			<tr>
			<td bgcolor='#8e1106' style=color:#FFFFFF>Full Name</td> <td bgcolor='#ffffff' style=color:#000000>".$emp_fullname."</td>
			<td bgcolor='#8e1106' style=color:#FFFFFF>Nationality</td> <td bgcolor='#ffffff' style=color:#000000>".$emp_nationality."</td>
			</tr>
			
			<tr>
			<td bgcolor='#8e1106' style=color:#FFFFFF>NRIC</td> <td bgcolor='#ffffff' style=color:#000000>".$emp_nric."</td>
			<td bgcolor='#8e1106' style=color:#FFFFFF>FIN</td> <td bgcolor='#ffffff' style=color:#000000>".$emp_fin ."</td>
			</tr>
			
			<tr>
			<td bgcolor='#8e1106' style=color:#FFFFFF>Date Of Birth</td> <td bgcolor='#ffffff' style=color:#000000>".$emp_dob."</td>
			<td bgcolor='#8e1106' style=color:#FFFFFF>WP / SP Expiry Date </td> <td bgcolor='#ffffff' style=color:#000000>".$emp_permitNo ."</td>
			</tr>
			
			<tr> 
			<td bgcolor='#8e1106' style=color:#FFFFFF>Race</td> <td bgcolor='#ffffff' style=color:#000000>".$emp_race ."</td>
			<td bgcolor='#8e1106' style=color:#FFFFFF>WP / SP Expiry</td> <td bgcolor='#ffffff' style=color:#000000>".$emp_permitExpiry ."</td>
			</tr>

			<tr>
			<td bgcolor='#8e1106' style=color:#FFFFFF>Home Number</td> <td bgcolor='#ffffff' style=color:#000000>".$emp_homeContact."</td>
			<td bgcolor='#8e1106' style=color:#FFFFFF>Passport No. </td> <td bgcolor='#ffffff' style=color:#000000>".$emp_passportNo ."</td>
			</tr>
			
			<tr>
			<td bgcolor='#8e1106' style=color:#FFFFFF>Contact Number</td> <td bgcolor='#ffffff' style=color:#000000>".$emp_contact."</td>
			<td bgcolor='#8e1106' style=color:#FFFFFF>Passport Expiry</td> <td bgcolor='#ffffff' style=color:#000000>".$emp_passportExpiry ."</td>
			</tr>
			
			<tr>
			<td bgcolor='#8e1106' style=color:#FFFFFF>Email</td> <td bgcolor='#ffffff' style=color:#000000>".$emp_email."</td>
			<td bgcolor='#8e1106' style=color:#FFFFFF>Foreign Address</td> <td bgcolor='#ffffff' style=color:#000000>".$emp_faddress."</td>
			</tr>
			
						<tr>
			<td bgcolor='#8e1106' style=color:#FFFFFF>Residential Address</td> <td bgcolor='#ffffff' style=color:#000000>".$emp_address."</td>
			<td bgcolor='#8e1106' style=color:#FFFFFF>Department</td> <td bgcolor='#ffffff' style=color:#000000>".$emp_dept."</td>
			</tr>
			
			<tr>
			<td bgcolor='#8e1106' style=color:#FFFFFF>Postal Code</td> <td bgcolor='#ffffff' style=color:#000000>".$emp_postal."</td>
			<td bgcolor='#8e1106' style=color:#FFFFFF>Designation</td> <td bgcolor='#ffffff' style=color:#000000>".$emp_designation."</td>
			</tr>
			
			<tr>
			<td bgcolor='#8e1106' style=color:#FFFFFF>Resident Status</td> <td bgcolor='#ffffff' style=color:#000000>".$emp_resid."</td>
			<td bgcolor='#8e1106' style=color:#FFFFFF>Joined Date</td> <td bgcolor='#ffffff' style=color:#000000>".$emp_joined."</td>
			</tr>";
			}     
			echo "</table>";	
			echo "</br>";	
			echo "</br>";					
		//carry out query
	//echo $sql;
	mysqli_query($dbc, $sql);

	mysqli_close( $dbc ) ;
?>
</div>
</body>
</html>
<div id="main">
</div>
<footer id="footer">
<a href="https://www.facebook.com/Invento-Engineers-Pte-Ltd-160632617407656/" target="_blank">
<center><img src="facebook.png" alt="facebook"
stye="width:304px;height:228px;">
</a>
<p style="font-size:10px">ACMV . Electrical . System Integration . Plumbing . Fire Protection Security & Monitoring . Solar & Green Energy . Critical Environment Application . EMA Licensing
<br>
<br>
Residential . Commercial . Industrial<br></p>

<h2>Copyright &copy; 2005 - 2011 by Invento Engineers Pte Ltd. All Right Reserved.</h2>
<h3>Associated with Invento Design Pte Ltd. Invento Engineering Sdn Bhd.</h3>
</center>
</footer>
</body>
</html>