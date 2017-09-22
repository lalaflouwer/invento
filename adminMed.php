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
<h1>All Employees</h1><br><br><br>

<?php
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
	
	$sql= "SELECT * FROM employees ORDER BY `emp_fullname`";
	
	echo " <table bgcolor='#8e1106' border= 1 width='28%'>
			<tr bgcolor='#FFFFFF'>
			<th>Employee ID</th>
            <th>Full Name</th>
			<th>View Details</th>
			</tr>";
			
		$result = mysqli_query($dbc, $sql);
		
        //while($row = mysql_fetch_array($result)) { 
		// mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($row = mysqli_fetch_array($result)) {     
?>

            <tr>
			<td><?php echo $row["emp_id"];?></td>
			<td><?php echo $row["emp_fullname"];?></td>
			<!--<td><a href="employeeAdminView.php">View</a></td>-->
			<td><form method="post" action="displayMed.php?id=<?php echo $row["emp_id"];?>">
			<input type="submit" value="View" id="view_btn"></form></td>
			
<?php			

            echo "</tr>";
			}     
			echo "</table>";		
		//carry out query
	//echo $sql;
	mysqli_query($dbc, $sql);
    $emp_id = null;
	$fullname = null;
	$entitlement = null;
	$date = null;
	$clinic = null;
	$type = null;
	$days = null;
    $currency = null;
	$rate = null;
	$claimed = null;
	$balance = null;
	$paid = null;
	$medleave = null;
	$hospleave = null;

	
     if (isset($_POST['emp_id'])){
	
      $id = $_POST['emp_id'];
	  $sql = "DELETE FROM `employees` WHERE `emp_id` = '$id'";
      
      $result = mysqli_query($dbc, $sql);
            if (mysqli_query($dbc,$sql)){
                echo "Employee deleted";
            } else {
                echo "Error deleting employee" . mysqli_error($dbc);
            }
            mysqli_close($dbc);
			   echo "<meta http-equiv='refresh' content='0;url=adminDisplay.php'>";
            }
            ?>
            
            <script type="text/javascript">
            function validate()
            {
                if(document.form2.emp_id.value.length < 1)
			    {
                    alert("Please type Employee ID!");
                     return false;
                }
                else
                {
                    alert("Deleted successfully!");
                    return true;
                }
                return false;
            }
                function setFocus()
                {
                    document.form2.emp_id.focus();
                }

                </script>
</br>
           <form action="" name ="form2" method="post" onSubmit="return confirm('Confirm Delete?');">
		    <fieldset>
			<legend>Delete:</legend>
           Employee ID:
                <input type="text" name="emp_id" value=""/>
                <input type="submit" name="Delete" value="Delete"/>
			</fieldset>
            </form>
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