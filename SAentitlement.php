
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
<script>
var el = document.getElementById("theform");
if(el)
{
  el.addEventListener("click", fireatwill);
}
//document.getElementById("theform").addEventListener("click", fireatwill);
function fireatwill(event)
{
  document.getElementById('hidden_emp_fullname').value = document.getElementById('emp_fullname').innerHTML;
  console.log(document.getElementById('hidden_emp_fullname').value);
}
</script>
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
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

	$sql= "SELECT * FROM employees"; //DESC means latest medical ID will be shown first.

	echo " <table cellpadding='8' bgcolor='#000000' style=color:#ffffff width='80%'>
			<tr bgcolor='#8e1106'>

			<th>Name</th>
	        <th>Entitlement</th>
			<th>Medical Leave<br> ( Days )</th>
			<th>Hospital Leave<br> ( Days )</th>
			<th>Update</th>
			</tr>";

		$result = mysqli_query($dbc, $sql);

        //while($row = mysql_fetch_array($result)) {
		// mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
        while($row = mysqli_fetch_array($result)) {

?>
      <form name="theform" action="SAEntitlementCommit.php" method="POST">
	          <tr>
				            <td id='emp_fullname' contentEditable align='center' bgcolor='#ffffff' style=color:#000000 width='4%'><?php echo $row["emp_fullname"];?></td>
                    <input type="hidden" id='hidden_emp_fullname' name='hidden_emp_fullname'>
			              <td id='med_entitlement' contentEditable align='center' bgcolor='#ffffff' style=color:#000000 width='4%'><?php echo $row["med_entitlement"];?></td>
                    <input type="hidden" id='hidden_med_entitlement' name='hidden_med_entitlement'>
                  	<td id='med_leave' contentEditable align='center' bgcolor='#ffffff' style=color:#000000 width='6%'><?php echo $row["med_leave"];?></td>
                    <input type="hidden" id='hidden_med_leave' name='hidden_med_leave'>
                  	<td id='hosp_leave' contentEditable align='center' bgcolor='#ffffff' style=color:#000000 width='6%'><?php echo $row["hosp_leave"];?></td>
                    <input type="hidden" id='hidden_hosp_leave' name='hidden_hosp_leave'>

			              <td width='5%'bgcolor='#ffffff' style=color:#000000 align='center'>
                      <!--<button name="doModify">Update</button>-->

<!--                        <button id="btnSend" name="btnSend" type="submit">Update</button>-->
                        <input type="submit" id="submit" name="submit" value="Update">
                      </form>
                    </td>
<?php
            echo "</tr>";
            $_SESSION['emp_id'] = $row['emp_id'];
			}
			echo "</table>";
			echo "</br></br>";
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
