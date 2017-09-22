<html>
<head>
<title>Invento Engineering Pte Ltd</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>

 <!--<script type="text/javascript">
      function validate()
      {

		 if( document.myForm.empid.value == "" )
         {
            alert( "Please enter Employee ID!" );
            document.myForm.empid.focus() ;
            return false;
         }
		 
		  
         if( document.myForm.name.value == "" )
         {
            alert( "Please enter Full Name!" );
            document.myForm.name.focus() ;
            return false;
         }
		 
		 
		 if( document.myForm.entitlement.value == "")
          {
            alert( "Please enter Entitlement!" );
            document.myForm.entitlement.focus() ;
            return false;
         }	
		 
		 if(document.myForm.date.value == "")
          {
            alert( "Please enter Date" );
            document.myForm.date.focus() ;
            return false;
         }
		 
		 if( document.myForm.clinic.value == "")
          {
            alert( "Please enter Clinic!" );
            document.myForm.clinic.focus() ;
            return false;
         }		

		 if( document.myForm.receiptno.value == "")
          {
            alert( "Please enter Receipt No.!" );
            document.myForm.receiptno.focus() ;
            return false;
         }
		  if( document.myForm.days.value == "")
          {
            alert( "Please enter No. of Days!" );
            document.myForm.days.focus() ;
            return false;
         }
		  if( document.myForm.paid.value == "")
          {
            alert( "Please enter Amount Paid!" );
            document.myForm.paid.focus() ;
            return false;
         }
		  if( document.myForm.rate.value == "")
          {
            alert( "Please enter Exchange Rate!" );
            document.myForm.rate.focus() ;
            return false;
         }
		  if( document.myForm.claimed.value == "")
          {
            alert( "Please enter Amount Claimed!" );
            document.myForm.claimed.focus() ;
            return false;
         }
		  if( document.myForm.balance.value == "")
          {
            alert( "Please enter Balance!" );
            document.myForm.balance.focus() ;
            return false;
         }
      }
</script>-->

<?php
	// Load the required files
	require_once 'dbconfig.php';
	
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
	//echo $_SESSION['email'];

	
	
	
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
   // $posts[0] = $_POST['empid'];
   // $posts[1] = $_POST['name'];
    $posts[2] = $_POST['entitlement'];
    $posts[3] = $_POST['medleave'];
	$posts[4] = $_POST['hospleave'];
	
    return $posts;
}

// Search (drop downlist.)

if(isset($_POST['search']))
{
    $employee = getEmployee();
    
    $search_Query = "SELECT * FROM employees WHERE emp_id = '$employee[0]'";
    
    $search_Result = mysqli_query($dbc, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {				
				$empid=$row['emp_id'];
				$fullname=$row['emp_fullname'];
            }
        }else{
            echo 'No Data For This Id';
        }
    }else{
        echo 'Result Error';
    }
}

// Insert
if(isset($_POST['insert']))
{
	$employee = getEmployee();
    $data = getPosts();

	//insert statement
	$insert_Query= ("INSERT INTO medical(emp_id ,emp_fullname, med_entitlement,med_leave,hosp_leave) VALUES ('$employee[0]', '$employee[1]', '$data[2]', '$data[3]','$data[4]')");
	
	$insert_Result = mysqli_query($dbc, $insert_Query);

	

        if($insert_Result)
			{
            if(mysqli_affected_rows($dbc) > 0)
            {
                echo 'Data Inserted';
				
            }else{
                echo 'Data Not Inserted';
            }
			
		header("Location: SAmedfee.php");//redirect to claimDisplay.php page
		mysqli_close( $dbc ) ;		
		}
}
?>


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
	<li class="products"><a href="claimDisplay.php">Claims</a>
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
                <td><input type="submit" name="insert" value="Set"></td>
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