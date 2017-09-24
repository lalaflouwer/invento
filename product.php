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

<div class="nav">
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
			<li><a href="SAentitlement.php">Set Medical Entitlement</a></li>
			<li><a href="SATools.php">Set Tool Entitlement</a></li>
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

<html>
<head>
    <title>Homepage</title>
</head>

<body>
    <a href="addStaff.php">Add New Products</a><br/><br/>

<?php
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

	$sql= "(SELECT * FROM product)";


	echo " <table bgcolor='#8e1106' border= 1 width='70%'>
			<tr bgcolor='#FFFFFF'>
			<th>Staff ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>DOB</th>
            <th>NRIC</th>
			<th>Nationality</th>
			<th>Resident Status</th>
			<th>Address</th>
			<th>Postal Code</th>
			<th>Department</th>
			<th>Type</th>
			<th>Joined Date</th>
			<th>Password</th>
			</tr>";

		$result = mysqli_query($dbc, $sql);

		$sql= "(SELECT * FROM staff)";

        //while($row = mysql_fetch_array($result)) {
		// mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
			echo "
			<td>".$row[0]."</td> <td>".$row[1]."</td> <td>".$row[2]."</td> <td>".$row[4]."</td>
			<td>".$row[5]."</td> <td>".$row[6]."</td> <td>".$row[7]."</td> <td>".$row[8]."</td> <td>".$row[9]."</td>
			<td>".$row[10]."</td> <td>".$row[11]."</td> <td>".$row[12]."</td> <td>".$row[3]."</td>";
 			?>

            <td><a href=\"edit.php?id= <?php $row[0] ?>\">Edit</a> | <a href=\"delete.php?id= <?php $row[0]?>\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>

<?php
            echo "</tr>";
			}
			echo "</table>";
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
