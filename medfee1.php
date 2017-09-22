<?php
	require_once 'dbconfig.php';
	ini_set('display_errors', 1); ini_set('log_errors',1); error_reporting(E_ALL); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
	echo $_SESSION['email'];
    $id = "";
	$empid = "";
    $name = "";
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
    $employee[1] = $_POST['name'];
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
	$posts[5] = $_POST['type'];
	$posts[6] = $_POST['days'];
	$posts[7] = $_POST['currency'];
	$posts[8] = $_POST['paid'];
	$posts[9] = $_POST['rate'];
	$posts[10] = $_POST['claimed'];
	$posts[11] = $_POST['balance'];
	$posts[12] = $_POST['hospleave'];
	$posts[13] = $_POST['medleave'];
	$posts[14] = $_POST['remark'];
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
				$name=$row['emp_fullname'];
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

	//Upload Image(receipt)

	//insert statement
//$insert_Query= ("INSERT INTO `medical`( `emp_id`,`emp_fullname`, `med_entitlement`, `med_date` , `med_clinic`, `med_days`, `med_paid`, `med_currency`, `med_rate`, `med_claimed`, `med_balance`,`hosp_leave`, `med_leave`,`med_remark`) VALUES ('$employee[0]', '$employee[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]', '$data[9]', '$data[10]', '$data[11]'),'$data[12]'),'$data[13]'),'$data[14]')");
	$insert_Query=" INSERT INTO `medical` (`med_id`, `emp_id`, `emp_fullname`, `med_entitlement`, `med_date`, `med_clinic`, `med_days`, `med_paid`, `med_currency`, `med_rate`, `med_claimed`, `med_balance`, `med_remark`, `med_leave`, `hosp_leave`, `med_type`) VALUES ('$employee[0]', '$employee[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]', '$data[9]', '$data[10]', '$data[11]'),'$data[12]'),'$data[13]'),'$data[14]')";  
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
<div id="form">
<form action="" method="post" name="myForm" onsubmit="return(validate());" enctype="multipart/form-data" >
      <table border=0 width='82%'>

			<tr><br><br>
			<td>Employee ID</td><td>:</td><td><input type="text" name="empid" maxlength="5" pattern="[A-Z]{3,5}" required title="Min.3, Max. 5 Capitial Letters ONLY!" ><td><input type="submit" name="search" value="Find"></td></td>
			<td>Amount Paid</td><td>:</td><td><input type="text"  name="paid"></td>
			</tr>
			
			<tr>
			<td>Full Name</td><td>:</td><td><input type="text" name="name"></td>
			<td></td>
			<td>Exchange Rate</td><td>:</td><td><input type="text" name="rate"></td>
			</tr>
			
			<tr>
			<td>Entitlement</td><td>:</td><td><input type="text" name="entitlement"></td>
			<td></td>
            <td>Amount Claimed (SGD)</td><td>:</td><td><input type="text" name="claimed" >
			</tr>
			
			<tr>
			<td>Date</td><td>:</td><td><input type="text" name="date" placeholder="DD-MM-YYYY"></td>
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
			<td>SGD / RM</td><td>:</td><td><input type="text" name="currency"></td>
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