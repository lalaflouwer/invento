            <script type="text/javascript">
            function validate()
            {
                if(document.form.id.value.length < 1)
			    {
                    alert("Please type Medical ID!");
                     return false;
                }
                else
                {
                    alert("Deleted successfully!");
                    return true;
                }
                return false;
            }
			            {
                if(document.form2.id.value.length < 1)
			    {
                    alert("Please type Tools ID!");
                     return false;
                }
                else
                {
                    alert("Deleted successfully!");
                    return true;
                }
                return false;
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
<h1>All Claims</h1><br><br><br>

<?php
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
	
	$sql= "SELECT * FROM medical ORDER BY `med_ID` DESC,emp_fullname"; //DESC means latest medical ID will be shown first.
	$sql2= "SELECT * FROM tools ORDER BY `emp_fullname`";

	
	echo " <table bgcolor='#8e1106' border= 1 width='70%'>
		<col width=40>
	<col width=60>
	<col width=100>
	<col width=67>
	<col width=50>
	<col width=40>
	<col width=50>
	<col width=40>
	<col width=55>
	<col width=60>
	<col width=60>
	<col width=60>
	<col width=100>
	<tr>
			<th>ID</th>
	        <th>Date</th>
            <th>Hospital/<br>Clinic</th>
            <th>Medical Type</th>
			<th>Utilized<br>(Days)</th>
			<th>SGD/<br>RM</th>
			<th>Amt Paid</th>
		    <th>Ex Rate</th>
			<th>Amt Claimed<br>(SGD)</th>
			<th>Amt Balance<br>(SGD)</th>
			<th>Balance <br>Hospital Leave</th>
			<th>Balance <br> Medical Leave</th>
			<th class='remark'>Remarks</th>
			</tr>";
			
		$result = mysqli_query($dbc, $sql);
		
        //while($row = mysql_fetch_array($result)) { 
		// mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($row = mysqli_fetch_array($result)) {     
?>
               <tr>
			<td><?php echo $row["med_id"];?></td>
			<td><?php echo $row["med_date"];?></td> 
			<td><?php echo $row["med_clinic"];?></td>
			<td><?php echo $row["med_type"];?></td>
			<td><?php echo $row["med_days"];?></td>
			<td><?php echo $row["med_currency"];?></td>
			<td><?php echo $row["med_paid"];?></td> 		
			<td><?php echo $row["med_rate"];?></td>
			<td><?php echo $row["med_claimed"];?></td>
			<td><?php echo $row["med_balance"];?></td>		
			<td><?php echo $row["hosp_leave"];?></td>
			<td><?php echo $row["med_leave"];?></td>
			<td><?php echo $row["med_remark"];?></td>
			</tr>
			
			
<?php			
            echo "</tr>";
			}     
			echo "</table>";
			echo "</br></br>";	

			echo " <table bgcolor='#8e1106' border= 1 width='70%'>
			<tr bgcolor='#FFFFFF'>
				<col width=40>
	<col width=60>
	<col width=100>
	<col width=67>
	<col width=50>
	<col width=40>
	<col width=50>
	<col width=70>
	<col width=55>
	<col width=60>
	<col width=60>
	<col width=60>
	<col width=100>
	 <tr>
			<th>Tool ID</th>
			<th>Employee ID</th>
            <th>Full Name</th>
            <th>Entitlement</th>
			<th>Previous Balance</th>
            <th>Date</th>
            <th>Supplier</th>
			<th>Item Description</th>
			<th>Invoice</th>
			<th>Paid</th>
			<th>GST</th>
			<th>Claimed</th>
			<th>Balance</th>
			</tr>";
?>
			<form action="" name ="form" method="post" onSubmit="return confirm('Confirm Delete?');">
		    <fieldset>
			<legend>Delete:</legend>
           Medical ID:
                <input type="text" name="id" value=""/>
                <input type="submit" name="Delete" value="Delete"/>
			</fieldset>
            </form><br/><br/>
			
<?php
		$result2 = mysqli_query($dbc, $sql2);
		
        //while($row = mysql_fetch_array($result)) { 
		// mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($row = mysqli_fetch_array($result2)) {  
?>		

            <tr>
			<td><?php echo $row["tool_id"];?></td>
			<td><?php echo $row["emp_id"];?></td>
			<td><?php echo $row["emp_fullname"];?></td>
			<td><?php echo $row["tool_entitlement"];?></td>
			<td><?php echo $row["tool_prevbal"];?></td> 
			<td><?php echo $row["tool_date"];?></td>
			<td><?php echo $row["tool_supplier"];?></td>
			<td><?php echo $row["tool_itemdesc"];?></td>
			<td><?php echo $row["tool_invoice"];?></td> 
			<td><?php echo $row["tool_paid"];?></td>
			<td><?php echo $row["tool_GST"];?></td>
			<td><?php echo $row["tool_claimed"];?></td>
			<td><?php echo $row["tool_balance"];?></td>
			</tr>
<?php			
            echo "</tr>";
			}     
			echo "</table>";	
		
		//carry out query
	//echo $sql;
	mysqli_query($dbc, $sql);
	mysqli_query($dbc, $sql2);

	//medical delete
	if (isset($_POST['id'])){
	
      $id = $_POST['id'];
	  $sql = "DELETE FROM `medical` WHERE `med_id` = '$id'";
      
      $result = mysqli_query($dbc, $sql);
            if (mysqli_query($dbc,$sql)){
                echo "Medical Fee deleted";
            } else {
                echo "Error Deleting Medical Fee" . mysqli_error($dbc);
            }
            mysqli_close($dbc);
			   echo "<meta http-equiv='refresh' content='0;url=claimDisplay.php'>";
            }
	//tool delete
	if (isset($_POST['id2'])){
	
      $id2 = $_POST['id2'];
	  $sql = "DELETE FROM `tools` WHERE `tool_id` = '$id2'";
      
      $result = mysqli_query($dbc, $sql);
            if (mysqli_query($dbc,$sql)){
                echo "Tool Fee deleted";
            } else {
                echo "Error Deleting Tool Fee" . mysqli_error($dbc);
            }
            mysqli_close($dbc);
			   echo "<meta http-equiv='refresh' content='0;url=claimDisplay.php'>";
            }		
?>
</br></br>
		<form action="" name ="form2" method="post" onSubmit="return confirm('Confirm Delete?');">
		    <fieldset>
			<legend>Delete:</legend>
           Tool ID:
                <input type="text" name="id2" value=""/>
                <input type="submit" name="Delete" value="Delete"/>
			</fieldset>
            </form>
			</br>
</div>
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