          
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
<?php echo 'Entitlement : ' .$_SESSION['med_entitlement'].'  ';?>
<?php
	
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
	
	$sql= "SELECT * FROM tools WHERE emp_id='$_GET[id]'"; //DESC means latest medical ID will be shown first.

	echo " <table cellpadding='8' bgcolor='#000000' style=color:#ffffff width='80%'>
			<tr bgcolor='#8e1106'>
			
			<th>ID</th>
            
			<th>Date</th>
			<th>Supplier</th>
			<th>Item Description</th>
		    <th>Invoice No.</th>
			<th>Amt Paid<br>( SGD )</th>
			<th>GST</th>
			<th>Amt Claimed<br>( SGD )</th>
			<th>Amt Balance<br>( SGD )</th>
	
			</tr>";
		
		$result = mysqli_query($dbc, $sql);
		
        //while($row = mysql_fetch_array($result)) { 
		// mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($row = mysqli_fetch_array($result)) {    

?>


		
		          <tr>
			<td align='center' bgcolor='#ffffff' style=color:#000000 width='4%'><?php echo $row["tool_id"];?></td>
			
			<td align='center' bgcolor='#ffffff' style=color:#000000 width='7%'><?php echo $row["tool_date"];?></td>
			<td align='center' bgcolor='#ffffff' style=color:#000000 width='15%'><?php echo $row["tool_supplier"];?></td> 
			<td align='center' bgcolor='#ffffff' style=color:#000000 width='20%'><?php echo $row["tool_itemdesc"];?></td>
			<td align='center' bgcolor='#ffffff' style=color:#000000 width='7%'><?php echo $row["tool_invoice"];?></td>
			<td align='center' bgcolor='#ffffff' style=color:#000000 width='7%'><?php echo $row["tool_paid"];?></td>
			<td align='center' bgcolor='#ffffff' style=color:#000000 width='4%'><?php echo $row["tool_GST"];?></td> 
			<td align='center' bgcolor='#ffffff' style=color:#000000 width='7%'><?php echo $row["tool_claimed"];?></td> 
            <td align='center' bgcolor='#ffffff' style=color:#000000 width='7%'><?php echo $row["tool_balance"];?></td>			

			</td>
<?php			
            echo "</tr>";
			}     
			echo "</table>";
			echo "</br></br>";	
?>
			<form action="" name ="form" method="post" onSubmit="return confirm('Confirm Delete?');">
		    <fieldset>
			<legend>Delete:</legend>
           Tool ID:
		   <input type="text" name="id" value=""/>
           <input type="submit" name="Delete" value="Delete"/>
			</fieldset>
            </form><br/><br/>
	<?php			
			    
		//carry out query
	//echo $sql;
	mysqli_query($dbc, $sql);
	$empid = null;
    $fullname = null;
    $entitlement = null;
	$prevbal = null;
	$date = null;
	$supplier = null;
	$itemdesc = null;
	$invoice = null;
	$paid = null;
	$gst = null;
	$claimed = null;
	$balance = null;

?>		

<?php			
   	
	mysqli_query($dbc, $sql);


	//medical delete
	if (isset($_POST['id'])){
	
      $id = $_POST['id'];
	  $sql = "DELETE FROM `medical` WHERE `tool_id` = '$id'";
      
      $result = mysqli_query($dbc, $sql);
            if (mysqli_query($dbc,$sql)){
                echo "Tool Fee deleted";
            } else {
                echo "Error Deleting Tool Fee" . mysqli_error($dbc);
            }
            mysqli_close($dbc);
			   echo "<meta http-equiv='refresh' content='0;url=displaytool2.php'>";
            }

?>

</br></br>
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