<html>
<head>
<title>Invento Engineering Pte Ltd</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<a href="index.html">
<img src="logo.png" alt="logo">
</a>
<div id="login">
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
          </ul>
	<li class="products"><a href="#">Products</a>
          <!--<ul>
            <li><a href="#">Manage</a></li>
          </ul>-->
	<li class="products"><a href="#">Claims</a>
         <ul>
            <li><a href="medfee.php">Medical</a></li>
			<li><a href="#">Tool</a></li>
          </ul>
	<li class="leaves"><a href="#">Leaves</a>
          <!--<ul>
            <li><a href="#">Manage</a></li>
          </ul>-->	  
</ul>
<br>
</div>
<div id="container">
<br>
<h1>Employee Added</h1><br><br><br>
    <a href="medfee.php">Add Another Medical Fee Claim</a><br/><br/>	
<?php
	session_start();
	// Load the required files
	require_once 'dbconfig.php';
	
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
	
	$sql= "(SELECT * FROM medical)";

	
	echo " <table bgcolor='#8e1106' border= 1 width='70%'>
			<tr bgcolor='#FFFFFF'>
			<th>Employee ID</th>
            <th>Full Name</th>
            <th>Clinic</th>
			<th>Receipt No.</th>
            <th>No.of days taken</th>
            <th>Amount Paid</th>
			<th>Currency</th>
			<th>Exchange Rate</th>
			<th>Amount Claimed</th>
			<th>Balance</th>
			</tr>";
			
		$result = mysqli_query($dbc, $sql);
		
		
        //while($row = mysql_fetch_array($result)) { 
		// mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($row = mysqli_fetch_array($result)) {         
            echo "<tr>";
			echo "
			<td>".$row[1]."</td> <td>".$row[2]."</td> <td>".$row[3]."</td> <td>".$row[6]."</td> 
			<td>".$row[7]."</td> <td>".$row[8]."</td> <td>".$row[9]."</td> <td>".$row[10]."</td>";
 			?>
			
            <td><a href=\"edit.php?id= <?php $row['id'] ?>\">Edit</a> | <a href=\"delete.php?id= <?php $row[0]?>\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>
			
<?php			

            echo "</tr>";
			}     
			echo "</table>";		
		//carry out query
	//echo $sql;
	mysqli_query($dbc, $sql);

	mysqli_close( $dbc ) ;
?>
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