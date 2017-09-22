<?php
	// Load the required files
	require_once 'dbconfig.php';?>
<!--<script type="text/javascript">
      function validate()
      {
		 if( document.myForm.email.value == "")
          {
            alert( "Please enter your email!" );
            document.myForm.email.focus() ;
            return false;
         }	
		 
		 if(document.myForm.contact.value == "")
          {
            alert( "Please enter your contact number!" );
            document.myForm.contact.focus() ;
            return false;
         }
		 
		 if( document.myForm.address.value == "")
          {
            alert( "Please choose your address!" );
            document.myForm.address.focus() ;
            return false;
         }		 
		 
		 if( document.myForm.postal.value == "")
          {
            alert( "Please enter your postal!" );
            document.myForm.postal.focus() ;
            return false;
		  }
		  
		 if( document.myForm.pass.value == "")
          {
            alert( "Please enter your Password!" );
            document.myForm.pass.focus() ;
            return false;
         }		

		 if( document.myForm.repass.value == "")
          {
            alert( "Please enter your Re-Password!" );
            document.myForm.repass.focus() ;
            return false;
         }
		 
		 //to check whether both password and re-password matches.
		 if( document.myForm.repass.value != document.myForm.pass.value)
          {
            alert( "Password does not match!" );
            document.myForm.repass.focus() ;
            return false;
         }					 
         return( true );
      }
</script>
 -->
 <html>
<head>
<title>Invento Engineering Pte Ltd</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<a href="employee.php">
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
	<li class="employee"><a href="employee.php">Profile</a>
	
	<li class="products"><a href="employeeproduct.php">Products</a>
          <!--<ul>
            <li><a href="#">Manage</a></li>
          </ul>-->
	<li class="products"><a href="#">Claims</a>
          <ul>
            <li><a href="empmed.php">Medical</a></li>
			<li><a href="emptool.php">Tool</a></li>
          </ul>
	<li class="leaves"><a href="http://www.justlogin.com" target="_blank">Leaves</a>
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
<h1>Profile Details</h1><br><br>
</head>
<body>
<?php
	
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
	$sql= "(SELECT * FROM employees where emp_email='$_SESSION[email]')";
		
	
	//define variables
	$id = "";
	$emp_id = "";
	$emp_fullname = "";
	$emp_email = "";
	$emp_contact = "";
	$emp_homeContact = "";
	$emp_dob = "";
	$emp_nric = "";
	$emp_nationality = "";
	$emp_race = "";
	$emp_resid = "";
	$emp_permitNo = "";
	$emp_permitExpiry = "";
	$emp_fin = "";
	$emp_passportNo = "";
	$emp_passportExpiry = "";
	$emp_address = "";
	$emp_postal = "";
	$emp_faddress = "";
	$emp_fpostal = "";
	$emp_dept = "";
	$emp_designation = "";
	$emp_type = "";
	$emp_joined = "";
	$emp_pass = "";
	//$emp_repass = "";
			
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
		}
					mysqli_query($dbc, $sql);
				
		if (isset($_POST['update']))
			{
				//$emp_id=$_POST['empid'];
				//$emp_fullname=$_POST['fullname'];
				//$emp_email=$_POST['email'];
				//$emp_contact=$_POST['contact'];
				$emp_pass=$_POST['pass'];
				//$emp_repass=$_POST['repass'];
				//$emp_dob=$_POST['dob'];
				//$emp_nric=$_POST['nric'];
				//$emp_nationality=$_POST['nationality'];
				//$emp_resid=$_POST['resid'];
				//$emp_address=$_POST['address'];
				//$emp_postal=$_POST['postal'];
				//$emp_dept=$_POST['dept'];
				//$emp_joined=$_POST['joined'];
				//$emp_type=$_POST['type'];
				
				$update = "UPDATE employees SET emp_pass='$emp_pass' WHERE emp_id='$emp_id'";
			
			$update_Result = mysqli_query($dbc, $update);
		header("Location: employee.php");//redirect to employee.php page
	
	mysqli_close( $dbc ) ;
			}	
					
			$comma = " , ";echo "</br>";
			echo 'Welcome ' .$_SESSION['emp_fullname'] .$comma; //Selects and shows the emp's name.
			echo "Staff ID : ".$emp_id."";
	        echo "</br>";echo "</br>";
			echo " 
			<form action='employee.php' name='myForm' method='post' onsubmit='return(validate());'>
			<table bgcolor='#000000' border=0 width='55%'>
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
			</tr>
			<tr>
			<td bgcolor='#8e1106' style=color:#FFFFFF>Password</td> <td><input type='text' name='pass' value='".$emp_pass."'</td>
			<input type='submit' name='update' value='Update'>
			</tr>";
			
            echo "</tr>";    
			echo "</table>";	
			echo "<br>";		
?>
</form>
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