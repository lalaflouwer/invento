
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

	ini_set('display_errors', 1); ini_set('log_errors',1); error_reporting(E_ALL); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
	//echo $_SESSION['email'];
    $id = "";
	$empid = "";
    $fullname = "";
    $entitlement = "";
	$date = "";
	$clinic = "";
	$type = "";
	$days = "";
	$currency = "";
	$paid = "";
	$rate = "";
	$claimed = "";
	$balance = "";
	$hospleave = "";
	$medleave = "";
	$remark = "";
	
function getEmployee()
{	
	$employee = array();
	$employee[0] = $_POST['empid'];
    $employee[1] = $_POST['fullname'];
	    return $employee;
}
	
// get values from the form
function getPosts(){
$posts = array();
	//$post[0] = $_POST['empid'];
    //$post[1] = $_POST['name'];
    $posts[2] = $_POST['entitlement'];
	$posts[3] = $_POST['date'];
	$posts[4] = $_POST['clinic'];
	$posts[5] = $_POST['days'];
	$posts[6] = $_POST['paid'];
	$posts[7] = $_POST['currency'];
	$posts[8] = $_POST['rate'];
	$posts[9] = $_POST['claimed'];
	$posts[10] = $_POST['balance'];
	$posts[11] = $_POST['remark'];
	$posts[12] = $_POST['hospleave'];
	$posts[13] = $_POST['medleave'];
	$posts[14] = $_POST['type'];
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
	$insert_Query=" INSERT INTO `medical` (`emp_id`, `emp_fullname`, `med_entitlement`, `med_date`, `med_clinic`, `med_days`, `med_paid`, `med_currency`, `med_rate`, `med_claimed`, `med_balance`, `med_remark`, `med_leave`, `hosp_leave`, `med_type`) VALUES ('$employee[0]', '$employee[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]', '$data[9]', '$data[10]', '$data[11]','$data[12]','$data[13]','$data[14]')";  
	$insert_Result = mysqli_query($dbc, $insert_Query);



        if($insert_Result)
			{
            if(mysqli_affected_rows($dbc) > 0)
            {
                echo 'Data Inserted';
				
            }else{
                echo 'Data Not Inserted';
            }
			
		header("Location: displaymed.php");//redirect to claimDisplay.php page
		mysqli_close( $dbc ) ;		
		}
}
?>
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
<div id="form">
<form action="medfee.php" method="post" name="myForm" onsubmit="return(validate());" enctype="multipart/form-data" >
      <table border=0 width='82%'>

			<tr><br><br>
			<td>Employee ID</td><td>:</td><td><input type="text" name="empid" maxlength="5" pattern="[A-Z]{3,5}" required title="Min.3, Max. 5 Capitial Letters ONLY!" value="<?php echo $empid;?>"><td><input type="submit" name="search" value="Find"></td></td>
			<td>Amount Paid</td><td>:</td><td><input type="text"  name="paid"></td>
			</tr>
			
			<tr>
			<td>Full Name</td><td>:</td><td><input type="text" name="fullname" value="<?php echo $fullname;?>"></td>
			<td></td>
			<td>Exchange Rate</td><td>:</td><td><input type="text" name="rate"></td>
			</tr>
			
			<tr>
			<td>Entitlement</td><td>:</td><td><input type="text" name="entitlement"></td>
			<td></td>
            <td>Amount Claimed (SGD)</td><td>:</td><td><input type="text" name="claimed" >
			</tr>
			
			<tr>
			<td>Date</td><td>:</td><td><input type="text" name="date" placeholder="DD-MMM-YYYY"></td>
			<td></td>
			<td>Amount Balance (SGD)</td><td>:</td><td><input type="text" name="balance"></td>
			</tr>
			
			<tr>
			<td>Hospital / Clinic</td><td>:</td><td><input type="text" name="clinic"></td>
			<td></td>
			<td>Balance Hospital Leave</td><td>:</td><td><input type="text" name="hospleave"></td>
			</tr>
			
			<tr>
			<td>Medical Type</td><td>:</td><td><select name="type">
				<option selected></option>
				<option value="Medical Leave">Medical Leave</option>
				<option value="Outpatient Leave">Outpatient Leave</option>
				<option value="Hospitalization Leave">Hospitalization Leave</option>
				
				</select></td>
			<td></td>
			<td>Balance Medical Leave</td><td>:</td><td><input type="text" name="medleave"></td>
			</tr>
			
			<tr>
			<td>Utilized (Days)</td><td>:</td><td><input type="text" name="days"></td>
			<td></td>
			<td>Remarks</td><td>:</td><td><input type="text" name="remark"  style="height:50px; rows="2" cols="25"></td>
			</tr>
			<tr>
			<td>SGD / RM</td><td>:</td><td><select name="currency">
				<option selected></option>
				<option value="SGD">SGD</option>
				<option value="RM">RM</option>
			    </select>
				</td>
			<td></td>
			</tr>
			
			<tr>
			<td></td>
			<td></td><td></td><td></td><td></td>
			<td align="right"><input type="submit" name="insert" value="Add"></td>
			</tr>	

			<tr>
			<td><br><br><br></td>
			<td></td>
			</tr>
        </table>
    </form>
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