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

<a href="SAadmin.php">
<img src="logo.png" alt="logo">
</a>
<div id="login">
<?php echo 'User : ' .$_SESSION['emp_fullname'].'  ';?>
<a href="logout.php" style="color:black">Log Out</a>
<!--<a href="loginAdmin.php" style="color:black">Login As Staff</a> |
<a href="loginCust.php" style="color:black">Login As Customer</a> |
<a href="register.php" style="color:black"> Register</a>-->
</div>
<div class="nav">
<ul>
	<li class="employee"><a href="admin.php">Profile</a>

	<li class="employee"><a href="SAadminDisplay.php">Employees</a>
          <ul>
			<li><a href="SAaddStaff.php">Add New Employee</a></li>
			<li><a href="SAupdateStaff.php">Update Employee</a></li>

          </ul>
	<li class="products"><a href="product.php">Products</a>
          <!--<ul>
            <li><a href="#">Manage</a></li>
          </ul>-->
	<li class="products"><a href="#">Claims</a>
          <ul>
            <li><a href="medfee.php">Medical</a></li>
			<li><a href="toolsfee.php">Tool</a></li>
          </ul>
	<li class="leaves"><a href="leaves.php">Leaves</a>
          <!--<ul>
            <li><a href="#">Manage</a></li>
          </ul>-->	  
</ul>
<br>
</div>
<div id="container">
 
<html>
<head>    
    <br>
<h1>Profile Details</h1><br><br><br>
</head>
 
<body>

<?php	
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

	$sql= "(SELECT * FROM employees where emp_email='$_SESSION[email]')";

	echo " <table bgcolor='#8e1106' border= 1 width='50%'>";
			
		$result = mysqli_query($dbc, $sql);
		
        //while($row = mysql_fetch_array($result)) { 
		// mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($row = mysqli_fetch_array($result)) {   		
		
					$id = $row['id'];
					$emp_id = $row['emp_id'];
					$emp_fullname = $row['emp_fullname'];
					$emp_email = $row['emp_email'];
					$emp_pass = $row['emp_pass'];
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
            echo "<tr>";
			echo "
			<td bgcolor='#FFFFFF' style=color:#8e1106 width='20%'>Staff ID</td> <td width='60%'>".$emp_id."</td> 
			</tr>
			<tr>
			<td bgcolor='#FFFFFF' style=color:#8e1106>Full Name</td> <td>".$emp_fullname."</td>
			</tr>
			<tr>
			<td bgcolor='#FFFFFF' style=color:#8e1106>Email</td> <td>".$emp_email."</td>
			</tr>
			<tr>
			<td bgcolor='#FFFFFF' style=color:#8e1106>Contact Number</td> <td>".$emp_contact."</td>
			</tr>
			<tr>
			<td bgcolor='#FFFFFF' style=color:#8e1106>Home Number</td> <td>".$emp_homeContact."</td>
			</tr>
			<tr>
			<td bgcolor='#FFFFFF' style=color:#8e1106>Date Of Birth</td> <td>".$emp_dob."</td>
			</tr>
			<tr>
			<td bgcolor='#FFFFFF' style=color:#8e1106>NRIC</td> <td>".$emp_nric."</td>
			</tr>
			<tr> 
			<td bgcolor='#FFFFFF' style=color:#8e1106>Nationality</td> <td>".$emp_nationality."</td>
			</tr>
			<tr> 
			<td bgcolor='#FFFFFF' style=color:#8e1106>Race</td> <td>".$emp_race ."</td>
			</tr>
			<tr> 
			<td bgcolor='#FFFFFF' style=color:#8e1106>Permit No. </td> <td>".$emp_permitNo ."</td>
			</tr>
			<tr> 
			<td bgcolor='#FFFFFF' style=color:#8e1106>Permit Expiry</td> <td>".$emp_permitExpiry ."</td>
			</tr>
			<tr> 
			<td bgcolor='#FFFFFF' style=color:#8e1106>FIN</td> <td>".$emp_fin ."</td>
			</tr>
			<tr> 
			<td bgcolor='#FFFFFF' style=color:#8e1106>Passport No. </td> <td>".$emp_passportNo ."</td>
			</tr>
			<tr> 
			<td bgcolor='#FFFFFF' style=color:#8e1106>Passport Expiry</td> <td>".$emp_passportExpiry ."</td>
			</tr>
			
			<tr>
			<td bgcolor='#FFFFFF' style=color:#8e1106>Resident Status</td> <td>".$emp_resid."</td>
			</tr>
			<tr>
			<td bgcolor='#FFFFFF' style=color:#8e1106>Address</td> <td>".$emp_address."</td>
			</tr>
			<tr>
			<td bgcolor='#FFFFFF' style=color:#8e1106>Postal Code</td> <td>".$emp_postal."</td>
			</tr>
			<tr>
			<td bgcolor='#FFFFFF' style=color:#8e1106>Foreign Address</td> <td>".$emp_faddress."</td>
			</tr>
			<tr>
			<td bgcolor='#FFFFFF' style=color:#8e1106>Foreign Postal Code</td> <td>".$emp_fpostal."</td>
			</tr>
			<tr>
			<td bgcolor='#FFFFFF' style=color:#8e1106>Department</td> <td>".$emp_dept."</td>
			</tr>
			<tr>
			<td bgcolor='#FFFFFF' style=color:#8e1106>Designation</td> <td>".$emp_designation."</td>
			</tr>
			<tr>
			<td bgcolor='#FFFFFF' style=color:#8e1106>Type</td> <td>".$emp_type."</td>
			</tr>
			<tr>
			<td bgcolor='#FFFFFF' style=color:#8e1106>Joined Date</td> <td>".$emp_joined."</td>
			</tr>
			<tr>
			<td bgcolor='#FFFFFF' style=color:#8e1106>Password</td> <td>".$emp_pass."</td>
			</tr>";
            echo "</tr>";
			}     
			echo "</table>";	
			echo "</br>";	
			echo "</br>";					
		//carry out query
	//echo $sql;
	mysqli_query($dbc, $sql);

	mysqli_close( $dbc ) ;
?>
	
</body>
</html>
</div>
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