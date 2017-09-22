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
<a href="loginAdmin.php" style="color:black">Login As Staff</a>
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
		 <li><a href="projectref2.php">Projects References</a></li>
		</ul>
		<li><a href="productDisplay.php">Products</a></li>
		<li><a href="career.php">Career</a></li>
		<li><a href="contact.php">Contact Us</a></li>
</ul>
<br>
</div>
<br>
</div>

<div id="container">
<br>
<h1>Login as Staff</h1>
<br><br><br>
<form method="post">
<table bgcolor="#8e1106" width="25%">
	  <tr valign="top">
 <th>
  <td>
  <br>
  <?php
	//session_start();
	require 'dbconfig.php';
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
	
	$email = '';
	$password = '';
	$emp_fullname='';
	
	if(isset($_POST['submit'])){

	$email=$_POST['email'];
	$password =$_POST['password'];
	$emp_fullname=$_GET['emp_fullname'];

	$_SESSION['email'] = $email;

	
	$emp=mysqli_query($dbc,"SELECT * FROM employees WHERE emp_email='$email' AND emp_pass='$password' AND emp_type='Employee'");
	$sa=mysqli_query($dbc,"SELECT * FROM employees WHERE emp_email='$email' AND emp_pass='$password' AND emp_type='SuperAdmin'");
	$admin=mysqli_query($dbc,"SELECT * FROM employees WHERE emp_email='$email' AND emp_pass='$password' AND emp_type='Admin'");

	
	$sql= "(SELECT emp_fullname FROM `employees` where emp_email='$email' && emp_pass='$password')";

	
	$result = mysqli_query($dbc, $sql);
    $row=mysqli_fetch_array($result);
		
		//For Employee Login
		if(mysqli_num_rows($emp)==1){
		$_SESSION["emp_fullname"] = $row["emp_fullname"];
		header("LOCATION:Employee.php");
		}
		//For Super Admin Login
		/*else if(mysqli_num_rows($sa)==1){
		$_SESSION["emp_fullname"] = $row["emp_fullname"];
		header("LOCATION:SAadmin.php");
		}*/
		//For administrator Login
		else if(mysqli_num_rows($admin)==1){
		$_SESSION["emp_fullname"] = $row["emp_fullname"];
		header("LOCATION:Admin.php");
		}

		else {
		echo "Error! No user found.";
		}
				
	echo "<br/>";
	mysqli_query($dbc, $sql);
	mysqli_close( $dbc ) ;
	}
?>
	  Email:<br>
	  <input type="email" name="email" autofocus><br>
	  <br>
	  Password:<br>
	  <input type="password" name="password"><br>
	  <br>

	  <input type="submit" name="submit" value="Submit">
	  <br><br>	
  </td>
  </th>
</tr>

</table>
</form>
</div>

<div id="main">
</div>
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