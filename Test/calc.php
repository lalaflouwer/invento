<?php
	session_start();
	
	// Load the required files
	require_once 'dbconfig.php';
	
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

	$id = "";
	$empid = "";
	$fullname = "";
	$entitlement = "";
	$date = "";
	$clinic = "";
	$receipt = "";
	$image = "";
	$days = "";
	$currency = "";
	$rate = "";
	$claimed = "";
	$balance = "";
	$paid = "";
	
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
    $posts[3] = $_POST['date'];
	$posts[4] = $_POST['clinic'];
	//$posts[5] = $_POST['receipt'];
	$posts[6] = $_POST['days'];
	$posts[7] = $_POST['currency'];
	$posts[8] = $_POST['rate'];
	$posts[9] = $_POST['claimed'];
	$posts[10] = $_POST['balance'];
	$posts[11] = $_POST['paid'];
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

	//Upload Image(receipt)
	$image = basename($_FILES['receipt']['name']);
	
	//insert statement
	$insert_Query= ("INSERT INTO medical(emp_id ,emp_fullname, med_entitlement, med_date , med_clinic, med_receipt, med_days, med_paid, med_currency, med_rate, med_claimed, med_balance) VALUES ('$employee[0]', '$employee[1]', '$data[2]', '$data[3]', '$data[4]', '$image', '$data[6]', '$data[11]', '$data[7]', '$data[8]', '$data[9]', '$data[10]')");
	
	$insert_Result = mysqli_query($dbc, $insert_Query);

	if (move_uploaded_file($_FILES['receipt']['tmp_name'], $image)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
		}

        if($insert_Result)
			{
            if(mysqli_affected_rows($dbc) > 0)
            {
                echo 'Data Inserted';
				
            }else{
                echo 'Data Not Inserted';
            }
			
		header("Location: claimDisplay.php");//redirect to claimDisplay.php page
		mysqli_close( $dbc ) ;		
		}
}
?>
