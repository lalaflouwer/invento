<html>
<head>
<title>Invento Engineering Pte Ltd</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<?php
	if (isset($_POST['submit'])){
		
	session_start();
	// Load the required files
	require_once 'dbconfig.php';
	
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

	//variable      $_POST is for the one given in the HTML.
	$id=$_POST['id'];
    $start=$_POST['start'];
    $end=$_POST['end'];
	$type=$_POST['type'];
	$status=$_POST['status'];
	$days=$_POST['days'];
    $desc=$_POST['desc'];

	
	//query statement
	//INSERT into "table name" followed by "names in mysql"  VALUES "the variables given from above"
		$sql="INSERT INTO staff(aleave_start, aleave_end, aleave_type, aleave_status, aleave_days, aleave_desc) VALUES '$start','$end','$type','$status','$days','$desc')";
		
		mysqli_query($dbc, $sql);
		header("Location: leaveApplied.php");//redirect to leaveApplied.php page
	
	mysqli_close( $dbc ) ;
}
?>


<a href="index.html">
<img src="logo.png" alt="logo">
</a>
<!--
<div id="login">
<a href="loginstaff.php" style="color:black">Login As Staff</a> |
<a href="logincust.php" style="color:black">Login As Customer</a> |
<a href="register.php" style="color:black"> Register</a>
</div>-->

<div class="nav">
<ul>

	<li class="employee"><a href="employee.php">Profile</a>
	
	<li class="products"><a href="#">Products</a>
          <!--<ul>
            <li><a href="#">Manage</a></li>
          </ul>-->
	<li class="products"><a href="#">Claims</a>
          <ul>
            <li><a href="medfee.php">Medical</a></li>
			<li><a href="toolsfee">Tool</a></li>
          </ul>
	<li class="leaves"><a href="#">Leaves</a>
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