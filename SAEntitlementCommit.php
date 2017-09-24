
<?php
	// Load the required files
	require_once 'dbconfig.php';
?>
<html>
<head>
<script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script> <!-- jQuery source -->
<title>Invento Engineering Pte Ltd</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<a href="index.html">
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
<br>
<h1>Entitlement</h1><br><br><br>

           <?php

    //connect to database
    //$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

    if (isset($_POST['btnSend']))
    {
        $getmsg = $_POST['hidden_emp_fullname'];
        echo $getmsg;
    }
?>

            </body>
    </html>
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
