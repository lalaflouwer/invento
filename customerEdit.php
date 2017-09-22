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
<h1>Update Details</h1><br><br>
<table bgcolor="#8e1106" width="50%">
	  <tr valign="top">
	 <br />	
<?php
	session_start();
	// Load the required files
	require_once 'dbconfig.php';
	
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

	$row = array();
	
	//Get ID from Database
	if(isset($_GET['edit_id'])){
	 $sql = "SELECT * FROM customers WHERE cust_id =" .$_GET['edit_id'];
	 $result = mysqli_query($dbc, $sql);
	 $fetched_row = mysqli_fetch_array($result);
	}
	//Update Information
		if(isset($_POST['update'])){
			
		$fname = $_POST["fname"];
		$lname=$_POST["lname"];
		$email=$_POST["email"];
		$number=$_POST["number"];
		$address=$_POST["address"];
		$postal=$_POST["postal"];
		$password=$_POST["password"];
		$repassword=$_POST["repassword"];
 
 
	 $update = "UPDATE customers SET cust_fname = '$fname', cust_lname = '$lname', cust_email = '$email', cust_number = '$number', cust_address = '$address' ,cust_postal = '$postal',cust_pass = '$password',cust_repass = '$repassword' WHERE cust_id=". $_GET['edit_id'];
	 
	 $up = mysqli_query($dbc, $update);
	 if(!isset($sql)){
	 die ("Error $sql" .mysqli_connect_error());
	 }
	 else
	 {
	 header("location: customerLogin.php");
	 }
	}
?>
	
	<form action="customerEdit.php" name="myForm" method="post" onsubmit="return(validate());" >
	 <th>
	  <td>
	  <br>First Name:<br>
	  <?php if(!empty($fname)) { ?>
	  <input type="text" name="fname" maxlength="20" size="20"  value='<?php echo $fetched_row['fname']; ?>' ><br>
	  <?php }?>
	  Last Name:<br>
	  <?php if(!empty($lname)) { ?>
	  <input type="text" name="lname" maxlength="20" size="20" value='<?php echo $fetched_row['lname']; ?>'><br>
	  <?php } ?>
	  Email:<br>
	  <?php if(!empty($email)) { ?>
	  <input type="text" name="email" maxlength="30" size="30" value='<?php echo $fetched_row['email']; ?>'><br>
	  <?php } ?>
	  Phone Number:<br>
	  <?php if(!empty($number)) { ?>
	  <input type="number" min="1" name="number" maxlength="10" size="8" value='<?php echo $fetched_row['number'];?>'><br>
	  <?php } ?>
	  Address:<br>
	  <?php if(!empty($address)) { ?>
	  <input multiple="text" name="address" maxlength="40" size="30" style="height:50px; width:300px" rows="2" cols="25" value='<?php echo $fetched_row['address']; ?>'  > <br>
	  <?php } ?>
	  Postal Code:<br>
	  <?php if(!empty($postal)) { ?>
	  <input type="number" min="1" name="postal" maxlength="6" size="6" value='<?php echo $fetched_row['postal'];?>'><br>
	  <?php } ?>
	  Password:<br>
	  <?php if(!empty($password)) { ?>
	  <input type="password" name="password" value='<?php echo $fetched_row['password'];?>'><br>
	  <?php } ?>
	  Re-Password:<br>
	  <?php if(!empty($repassword)) { ?>
	  <input type="password" name="repassword" value='<?php echo $fetched_row['repassword'];?>'><br><br>
	  <?php } ?>
	  <br>	
	  <input type="submit" name="update" value="Update" onClick="update()"/><br><br>
	  
	  </td>
	  </th>

	</form>
	</tr>
	<!-- Alert for Updating -->
<script>
function update(){
 var x;
 if(confirm("Updated data Sucessfully") == true){
 x= "update";
 }
}
</script>

</table>
<a href="customerLogin.php">Back</a>
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