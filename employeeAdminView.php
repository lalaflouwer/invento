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
<div id="container">
<br>
<h1>Profile Details</h1><br><br><br>
<?php
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
	
	//show only the selected employee.
	
	//echo $_GET["id"]; // Gets the id from the previous page.
	
	$sql= "SELECT * FROM employees WHERE emp_id='$_GET[id]'";
	//echo "ID " .$_GET["id"];

		$result = mysqli_query($dbc, $sql);
		
        //while($row = mysql_fetch_array($result)) { 
		// mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($row = mysqli_fetch_array($result)) {   
		echo "<img src='".$row['emp_img']."' width='150' height='180'> </br></br>"; 
?>
			<table border=0 cellpadding='3' width='85%'>
	  		<tr>
			<td style=color:#000000 >Employee ID</td><td style=color:#000000>:</td><td style=color:#000000><?php echo $row["emp_id"];?></td>
			<td style=color:#000000></td>

			</tr>
			
			<tr>
			<td style=color:#000000>Full Name</td><td style=color:#000000>:</td><td style=color:#000000><?php echo $row["emp_fullname"];?></td>
			<td style=color:#000000>Nationality</td><td style=color:#000000>:</td><td style=color:#000000><?php echo $row["emp_nationality"];?></td>
			</tr>

			<tr>
			<td style=color:#000000>NRIC </td><td style=color:#000000>:</td><td style=color:#000000><?php echo $row["emp_nric"];?></td>
			<td style=color:#000000>FIN No.</td><td style=color:#000000>:</td><td style=color:#000000><?php echo $row["emp_fin"];?>
			</tr>
			
			<tr>
			<td style=color:#000000>Date of Birth</td><td style=color:#000000>:</td><td style=color:#000000><?php echo $row["emp_dob"];?></td>
			<td style=color:#000000>WP / SP No.</td><td style=color:#000000>:</td><td style=color:#000000><?php echo $row["emp_permitNo"];?></td>
			</tr>

			<tr>
			<td style=color:#000000>Race</td><td style=color:#000000>:</td><td style=color:#000000><?php echo $row["emp_race"];?></td>
			<td style=color:#000000>WP / SP Expiry Date</td><td style=color:#000000>:</td><td style=color:#000000><?php echo $row["emp_permitExpiry"];?></td>
			</tr>
			
			<tr>
			<td style=color:#000000>Contact No. (Home)</td><td style=color:#000000>:</td><td style=color:#000000><?php echo $row["emp_homeContact"];?></td>
			<td style=color:#000000>Passport No.</td><td style=color:#000000>:</td><td style=color:#000000><?php echo $row["emp_passportNo"];?>
			</td>			
			</tr>
			
			<tr>
			<td style=color:#000000>Handphone No.</td><td style=color:#000000>:</td><td style=color:#000000><?php echo $row["emp_contact"];?></td>
			<td style=color:#000000>Passport Expiry</td><td style=color:#000000>:</td><td style=color:#000000><?php echo $row["emp_passportExpiry"];?>
			</tr>
			
			<tr>
			<td style=color:#000000>Email</td><td style=color:#000000>:</td><td style=color:#000000><?php echo $row["emp_email"];?></td>
		    <td style=color:#000000>Foreign Address</td><td style=color:#000000>:</td><td style=color:#000000><?php echo $row["emp_faddress"];?>
			</tr>
			
			<tr>
			<td style=color:#000000>Residential Address</td><td style=color:#000000>:</td><td style=color:#000000><?php echo $row["emp_address"];?></td>
			<td style=color:#000000>Department</td><td style=color:#000000>:</td><td style=color:#000000><?php echo $row["emp_dept"];?></td>
			</tr>
			
			<tr>
			<td style=color:#000000>Postal</td><td style=color:#000000>:</td><td style=color:#000000><?php echo $row["emp_postal"];?></td>
			<td style=color:#000000>Designation</td><td style=color:#000000>:</td><td style=color:#000000><?php echo $row["emp_designation"];?></td>
			</tr>
			
			
			<tr>			
			<td style=color:#000000>Resident Status</td><td style=color:#000000>:</td><td style=color:#000000><?php echo $row["emp_resid"];?></td>		
			<td style=color:#000000>Joined Date</td><td style=color:#000000>:</td><td style=color:#000000><?php echo $row["emp_joined"];?></td>
			</tr>
			
        </table>
    </form>
<?php			
			}     
		//carry out query
	//echo $sql;
	mysqli_query($dbc, $sql);
    $emp_id = null;
	$fullname = null;
	$email = null;
	$contact = null;
	$dob = null;
	$nric = null;
	$nationality = null;
	$resid = null;
	$address = null;
	$postal = null;
	$dept = null;
	$type = null;
	$joined = null;
	$pass = null;
	$repass = null;
	$image = null; 
?>
<br><br>   
</div> 
<div id="main">
</div>

<footer id="footer">
<a href="https://www.facebook.com/Invento-Engineers-Pte-Ltd-160632617407656/">
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