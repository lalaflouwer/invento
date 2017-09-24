            <script type="text/javascript">
            function validate()
            {
                if(document.form1.car_id.value.length < 1)
			    {
                    alert("Please type Career ID!");
                     return false;
                }
                else
                {
                    alert("Deleted successfully!");
                    return true;
                }
                return false;
            }
                function setFocus()
                {
                    document.form1.emp_id.focus();
                }
</script>
<?php
	// Load the required files
	require_once 'dbconfig.php';
?>
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
<h1>All Career Applications</h1><br><br><br>

<?php
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

	$sql= "SELECT * FROM career ORDER BY car_id DESC";

	echo " <table cellpadding='8' bgcolor='#000000' style=color:#ffffff width='80%'>
			<tr bgcolor='#8e1106'>
			<th>ID</th>
            <th>Full Name</th>
			<th>Gender</th>
            <th>Age</th>
			<th>Nationality</th>
            <th>Position</th>
            <th>Salary ($)</th>
			<th>Email</th>
			<th>Phone Number</th>
			<th>Resume</th>
			</tr>";

		$result = mysqli_query($dbc, $sql);

        //while($row = mysql_fetch_array($result)) {
		// mysql_fetch_array is deprecated, we need to use mysqli_fetch_array
        while($row = mysqli_fetch_array($result)) {
?>
            <tr>
			<td align='center' bgcolor='#ffffff' style=color:#000000 width='5%' ><?php echo $row["car_id"];?></td>
			<td bgcolor='#ffffff' style=color:#000000 ><?php echo $row["car_fullname"];?></td>
			<td align='center' bgcolor='#ffffff' style=color:#000000 width='10%' ><?php echo $row["car_gender"];?></td>
			<td align='center' bgcolor='#ffffff' style=color:#000000 width='5%'><?php echo $row["car_age"];?></td>
			<td bgcolor='#ffffff' style=color:#000000><?php echo $row["car_nationality"];?></td>
			<td align='center' bgcolor='#ffffff' style=color:#000000><?php echo $row["car_position"];?></td>
			<td align='center' bgcolor='#ffffff' style=color:#000000><?php echo $row["car_salary"];?></td>
			<td bgcolor='#ffffff' style=color:#000000><?php echo $row["car_email"];?></td>
			<td align='center' bgcolor='#ffffff' style=color:#000000 ><?php echo $row["car_number"];?></td>
			<!--<td><?php echo $row["car_resume"];?></td>-->
			<td style='padding: 10px 4px 2px 4px;' bgcolor='#ffffff' >
			<?php echo "<a href='downloadResume.php?dow=".$row['car_resume']."' ><button style='color:black'>Download</button></a>"; ?>
			</td>
<?php
            echo "</tr>";
			}
			echo "</table>";
		//carry out query
	//echo $sql;
	mysqli_query($dbc, $sql);
	$id = null;
    $fname = null;
	$gender = null;
	$age = null;
	$nationality = null;
	$position = null;
	$salary = null;
	$email = null;
	$number = null;
	$resume = null;

     if (isset($_POST['car_id'])){

      $id = $_POST['car_id'];
	  $sql = "DELETE FROM `career` WHERE `car_id` = '$id'";

      $result = mysqli_query($dbc, $sql);
            if (mysqli_query($dbc,$sql)){
                echo "Application deleted";
            } else {
                echo "Error deleting Application" . mysqli_error($dbc);
            }
            mysqli_close($dbc);
			   echo "<meta http-equiv='refresh' content='0;url=careerDisplay.php'>";
            }
            ?>

</br>
           <form action="" name ="form1" method="post" onSubmit="return confirm('Confirm Delete?');">
		    <fieldset>
			<legend>Delete:</legend>
           Career ID:
                <input type="text" name="car_id" value=""/>
                <input type="submit" name="Delete" value="Delete"/>
			</fieldset>
            </form>
</div>
<div id="main">
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
