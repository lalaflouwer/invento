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
<h1>Register</h1><br><br>
<table bgcolor="#8e1106" width="50%">
	  <tr valign="top">
	 <br />

	 <script type="text/javascript">
      function validate()
      {
         if( document.myForm.firstname.value == "" )
         {
            alert( "Please enter your First Name!" );
            document.myForm.firstname.focus() ;
            return false;
         }
		 
		 if( document.myForm.lastname.value == "" )
         {
            alert( "Please enter your Last Name!" );
            document.myForm.lastname.focus() ;
            return false;
         }
		 
		 if( document.myForm.email.value == "")
          {
            alert( "Please enter your Email!" );
            document.myForm.email.focus() ;
            return false;
         }	
		 
		 if(document.myForm.email.value.indexOf('@') == -1 || document.myForm.email.value.indexOf('.') == -1)
          {
            alert( "Invalid Email, check if the '@' and '.'s in the email address" );
            document.myForm.email.focus() ;
            return false;
         }
		 
		 if( document.myForm.number.value == "")
          {
            alert( "Please enter your Number!" );
            document.myForm.number.focus() ;
            return false;
         }		 
		 
		 if( document.myForm.address.value == "")
          {
            alert( "Please enter your Address!" );
            document.myForm.address.focus() ;
            return false;
		  }

		 if( document.myForm.postal.value == "")
          {
            alert( "Please enter your Postal Code!" );
            document.myForm.postal.focus() ;
            return false;
         }	

		 if( document.myForm.password.value == "")
          {
            alert( "Please enter your Password!" );
            document.myForm.password.focus() ;
            return false;
         }		

		 if( document.myForm.repassword.value == "")
          {
            alert( "Please enter your Re-Password!" );
            document.myForm.repassword.focus() ;
            return false;
         }
		 
		 //to check whether both password and re-password matches.
		 if( document.myForm.repassword.value != document.myForm.password.value)
          {
            alert( "Password does not match!" );
            document.myForm.repassword.focus() ;
            return false;
         }					 
         return( true );
      }
</script>
	
	<?php
	if (isset($_POST['submit'])){
	//error_reporting(0);
	session_start();
	// Load the required files
	require_once 'dbconfig.php';
	
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

	//variable      $_POST is for the one given in the HTML.
	$fname=$_POST["firstname"];
    $lname=$_POST["lastname"];
    $email=$_POST["email"];
	$number=$_POST["number"];
    $address=$_POST["address"];
	$postal=$_POST["postal"];
    $password=$_POST["password"];
    $repassword=$_POST["repassword"];

	//query statement

		//to check if email is used already.
		$sql= "SELECT * FROM customers where cust_email = '$email'";
		$result = mysqli_query($dbc, $sql);
		if(mysqli_num_rows($result)>0)
		{
			echo '<script language="javascript">';
			echo 'alert("Email is taken, please use another email.")';
			echo '</script>';
		}
		else{
	//INSERT into "table name" followed by "names in mysql"  VALUES "the variables given from above"
	$sql="INSERT INTO customers(cust_fname, cust_lname, cust_email, cust_number, cust_address,cust_postal,cust_pass,cust_repass) VALUES ('$fname','$lname','$email',$number,'$address',$postal,'$password','$repassword')";
		
		mysqli_query($dbc, $sql);
		header("Location: addReg.php");//redirect to addReg.php page
	
	mysqli_close( $dbc ) ;
		}
}
?>
	
	<form action="register.php" name="myForm" method="post" onsubmit="return(validate());" >

	 <th>
	  <td>
	  <br>First Name:<br>
	  <input type="text" name="firstname" maxlength="20" size="20" autofocus ><br>
	  Last Name:<br>
	  <input type="text" name="lastname" maxlength="20" size="20"><br>
	  Email:<br>
	  <input type="text" name="email" maxlength="30" size="30"><br>
	  Phone Number:<br>
	  <input type="number" min="1" name="number" maxlength="10" size="8" ><br>
	  Address:<br>
	  <input multiple="text" name="address" maxlength="40" size="30" style="height:50px; width:300px" rows="2" cols="25" > <br>
	  Postal Code:<br>
	  <input type="number" min="1" name="postal" maxlength="6" size="6" ><br>
	  Password:<br>
	  <input type="password" name="password"><br>
	  Re-Password:<br>
	  <input type="password" name="repassword"><br><br>
	  
	  <input type="reset" value="Reset">
	  <input type="submit" name="submit" value="Submit"/><br><br>
	  </td>
	  </th>

	</form>
	</tr>

</table>
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