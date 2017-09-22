<html>
<head>
<title>Invento Engineering Pte Ltd</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<a href="index.html">
<img src="logo.png" alt="logo">
</a>
<div id="login" >
<a href="loginAdmin.php" style="color:black">Login As Staff</a> |
<a href="loginCust.php" style="color:black">Login As Customer</a> |
<a href="register.php" style="color:black"> Register</a>
</div>
<div class="nav">
<ul>
<li class="about"><a href="#">About</a>
<ul>
<li><a href="mv.html">Mission & Vision</a></li>
<li><a href="history.html">History</a></li>
</ul>
<li class="services"><a href="services.html">Services</a>
<ul>
<li><a href="quotation.html">Request Services</a></li>
 <li><a href="projectref.html">Projects References</a></li>
</ul>
<li><a href="productDisplay.php">Products</a></li>
<li><a href="career.php">Career</a></li>
<li><a href="contact.php">Contact Us</a></li>
</ul>
<br>
</div>

<div id="container">
<br>
<h1>Profile Information</h1><br><br>
	<?php
	session_start();
	// Load the required files
	require_once 'dbconfig.php';
	
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
	
	$sql= "(SELECT * FROM `employees` where emp_email='$_SESSION[email]')";

	
	echo " <table bgcolor='#8e1106' border= 1 width='70%'>
		<tr bgcolor='#FFFFFF'>
			<th><b>Employee ID</b></th>
			<th><b>Name</b></th>
			<th><b>Email</b></th>
			<th><b>DOB</b></th>
			<th><b>NRIC</b></th>
			<th><b>Nationality</b></th>
			<th><b>Resident Status</b></th>
			<th><b>Address</b></th>
			<th><b>Postal</b></th>
			<th><b>Department</b></th>
			<th><b>Type</b></th>
			<th><b>Joined Date</b></th>
			</tr>";
			
	$result = mysqli_query($dbc, $sql);
		while($row = mysqli_fetch_row($result))
		{
			
		echo "<br/>";
		$comma = " ,";
		echo 'Welcome ' .$row[1]. $comma; //Selects and shows the user's name.
		echo "<br/><br/>";
	
		echo "<tr>";
		echo "<td>".$row[0]."</td> <td>".$row[1]."</td> <td>".$row[2]."</td> <td>".$row[5]."</td> <td>".$row[6]." <td>".$row[7]."</td> <td>".$row[8]."</td> <td>".$row[9]."</td> <td>".$row[10]."</td> <td>".$row[11]."</td> <td>".$row[12]."</td> <td>".$row[13]."</td> ";
		echo "</tr>";		
		}
	
		echo "</table>";
	
	//carry out query
	//echo $sql;
	mysqli_query($dbc, $sql);
	mysqli_close( $dbc ) ;
?>
<br>
<a href="logout.php">Log Out</a>

</div>

<div id="main">
</div>
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