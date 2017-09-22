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
<h1>Login as Customer</h1>
<br><br><br>
<form method="post">
<table bgcolor="#8e1106" width="25%">
	  <tr valign="top">
 <th>
  <td>
  <br>
  <?php
	session_start();
	if(isset($_POST['submit'])){
	require 'dbconfig.php';
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
	
	$email=$_POST['email'];
	$password =$_POST['password'];
	
	
	$sql= "(SELECT * FROM `customers` where cust_email='$email' && cust_pass='$password')";
	$result = mysqli_query($dbc, $sql);
	
	if(mysqli_num_rows($result)==1){
	$_SESSION['email'] = $email;
	header('Location: customerLogin.php');
	}
	else
		echo "Account is invalid!!";
		echo "<br/>";

	mysqli_query($dbc, $sql);
	mysqli_close( $dbc ) ;
	}
?>
	  Email:<br>
	  <input type="email" name="email" autofocus ><br>
	  <br>
	  Password:<br>
	  <input type="password" name="password"><br>
	  <br>
	  <input type="button" onclick="location.href='register.php';" value="Register Here" />
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