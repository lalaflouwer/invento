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
            <li><a href="medfee.php">Medical</a></li>
			<li><a href="toolsfee.php">Tool</a></li>
          </ul>
	<li class="leaves"><a href="leaves.php">Leaves</a>
          <!--<ul>
            <li><a href="#">Manage</a></li>
          </ul>-->	  
</ul>
<br>
</div>
<div id="add">
<form action="leaveApply.php" method="post" name="form1">
  
      <table width="25%" border="0">
            <tr> 
                <td>Start Date</td>
                <td><input type="date" name="start"></td>
            </tr>
			 <tr> 
                <td>End Date</td>
                <td><input type="date" name="end"></td>
            </tr>
			 <tr> 
                <td>Type</td>
                <td><input type="text" name="type"></td>
            </tr>
            <tr> 
                <td>Status</td>
                <td><input type="text" name="status"></td>
            </tr>
			 <tr> 
                <td>Days</td>
                <td><input type="date" name="days"></td>
            </tr>
			 <tr> 
                <td>Description</td>
                <td><input type="text" name="desc"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="submit" value="Apply"></td>
            </tr>
			</th>
        </table>
    </form>
</div>
<div id="container">
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