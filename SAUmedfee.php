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
<?php
	session_start();
	
	// Load the required files
	require_once 'dbconfig.php';
	
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

	$sql="SELECT * FROM medical"; 
		
		
		
	$id = "";
	$empid = "";
	$fullname = "";
	$entitlement = "";
	$medleave = "";
	$hospleave = "";
				
				
				
function getEmployee()
{	
	$employee = array();
	$employee[0] = $_POST['empid'];
    $employee[1] = $_POST['fullname'];
	    return $employee;
}
	
// get values from the form
function getPosts()
{
    $posts = array();
    //$posts[0] = $_POST['empid'];
    //$posts[1] = $_POST['name'];
    $posts[2] = $_POST['entitlement'];
    $posts[3] = $_POST['medleave'];
	$posts[4] = $_POST['hospleave'];
	
   return $posts;
}
		
		//Search employee..
		if(isset($_POST['search']))
		{
			$data = getPosts();
			
			$search_Query = "SELECT * FROM employees WHERE emp_id = '$data[1]'"; //Search employee via their 3 letter employee ID.
			
			$search_Result = mysqli_query($dbc, $search_Query);
			
			if($search_Result)
			{		
				if(mysqli_num_rows($search_Result))
				{	
					while($row = mysqli_fetch_array($search_Result)) 
					
					{    
					
					$empid=$row['emp_id'];
				    $fullname=$row['emp_fullname'];
					$entitlement =$row['med_entitlement'];
	                $medleave = $row['med_leave'];
	                $hospleave = $row['hosp_leave'];
					}	
				}else{
					echo 'No Data For This Employee ID';
				}
			}else{ echo 'Result Error';
		}
	}

		$sql = mysqli_query ($dbc, "select * from employees where emp_id = '$id' ");
		$check = mysqli_fetch_array($sql);

			if (isset($_POST['update']))
			{
				$employee = getEmployee();
                $data = getPosts();
				
				$update = "UPDATE medical SET med_entitlement='$entitlement' , med_leave='$medleave' , hosp_leave='$hospleave' WHERE emp_id='$empid'";

			$update_Result = mysqli_query($dbc, $update);
		header("Location: SAUmedfee.php");//redirect to adminUpdate.php page
	
	mysqli_close( $dbc ) ;
			}	
?>
<div id="add">  
<form action="" method="post" name="myForm" onsubmit="return(validate());" enctype="multipart/form-data" >
  
       <table width="25%" border="0">
  <br><br>
  <tr>
                <td>Employee ID</td>
                <td><input type="text" name="empid" value="<?php echo $empid;?>"><br>
				<input type="submit" name="search" value="Find"></td><br> 
</tr>
      
			 <tr>
                <td>Full Name</td>
                <td><input type="text" name="fullname" value="<?php echo $fullname;?>"></td>
            </tr>
			  <tr>
	        <tr>
                <td>Entitlement</td>
                <td><input type="text" name="entitlement" value="<?php echo $entitlement;?>"></td>
            </tr>
			  <tr>
                <td>Medical Leaves</td>
                <td><input type="text" name="medleave" value="<?php echo $medleave;?>"></td>
            </tr>
			  <tr>
                <td>Hospitalisation Leaves</td>
                <td><input type="text" name="hospleave" value="<?php echo $hospleave;?>"></td>
            </tr>
			<tr>
                <td></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
			
		
                
			</th>
        </table>
    </form>
</div>
<div id="container">
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