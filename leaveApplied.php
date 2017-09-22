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
<a href="loginAdmin.php" style="color:black">Login As Staff</a> |
<a href="loginCust.php" style="color:black">Login As Customer</a> |
<a href="register.php" style="color:black"> Register</a>
</div>

<div class="nav">
<ul>

	<li class="employee"><a href="employee.php">Profile</a>
	
	<li class="products"><a href="#">Products</a>
          <!--<ul>
            <li><a href="#">Manage</a></li>
          </ul>-->
	<li class="products"><a href="#">Claims</a>
          <ul>
            <li><a href="medfee.php">Medical</a></li>
			<li><a href="toolsfee">Tool</a></li>
          </ul>
	<li class="leaves"><a href="#">Leaves</a>
          <!--<ul>
            <li><a href="#">Manage</a></li>
          </ul>-->
		  
</ul>
</ul>
<br>
</div>
<div id="container">
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
	
	<?php
	session_start();
	// Load the required files
	require_once 'dbconfig.php';
	
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
	
	$sql= "(SELECT * FROM aleave)";

	
	echo " <table bgcolor='#8e1106' border= 1 width='70%'>
			<tr bgcolor='#FFFFFF'>
			<th>Leave ID</th>
            <th>Start</th>
            <th>End</th>
            <th>Type</th>
            <th>Status</th>
			<th>Days</th>
			<th>Description</th>
			</tr>";
			
		$result = mysqli_query($dbc, $sql);
		
		$sql= "(SELECT * FROM aleave)";
		
        //while($row = mysql_fetch_array($result)) { 
		// mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($row = mysqli_fetch_array($result)) {         
            echo "<tr>";
			echo "
			<td>".$row[0]."</td> <td>".$row[1]."</td> <td>".$row[2]."</td> <td>".$row[3]."</td> 
			<td>".$row[4]."</td> <td>".$row[5]."</td> <td>".$row[6]."</td>;
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