<?php
	session_start();
	
	// Load the required files
	require_once 'dbconfig.php';
	
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

	$sql="SELECT * FROM tools"; 

// get values from the form
function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['empid'];
    $posts[1] = $_POST['fullname'];
    $posts[2] = $_POST['entitlement'];
    $posts[3] = $_POST['prevbal'];
	$posts[4] = $_POST['date'];
	$posts[5] = $_POST['supplier'];
	$posts[6] = $_POST['itemdesc'];
	$posts[7] = $_POST['invoice'];
	$posts[8] = $_POST['paid'];
	//$posts[9] = $_POST['gst'];
	$posts[10] = $_POST['claimed'];
	$posts[11] = $_POST['balance'];
    return $posts;
}

// Search

if(isset($_POST['search']))
{
    $data = getPosts();
    
    $search_Query = "SELECT * FROM employees && medical WHERE emp_id = '$data[0]'";
    
    $search_Result = mysqli_query($dbc, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
				$empid=$row['empid'];
				$fullname=$row['fullname'];
				$entitlement=$row['entitlement'];
				$prevbal=$row['prevbal'];
				$date=$row['date'];
				$supplier=$row['supplier'];
				$itemdesc=$row['itemdesc'];
				$invoice=$row['invoice'];
				$paid=$row['paid'];
				$gst=$row['gst'];
				$claimed=$row['claimed'];
				$balance=$row['balance'];	
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
    $data = getPosts();
	
	$insert_Query ="INSERT INTO tools(emp_id ,emp_fullname, tool_entitlement, tool_prevbal , tool_date, tool_supplier, tool_itemdesc, tool_invoice, tool_paid, tool_gst, tool_claimed, tool_balance) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]', '$data[6]','$data[7]', '$data[8]',$data[9]/1.07,'$data[10]','$data[11]')";
	
        $insert_Result = mysqli_query($dbc, $insert_Query);
        
        if($insert_Result)
        {
            if(mysqli_affected_rows($dbc) > 0)
            {
                echo 'Data Inserted';
            }else{
                echo 'Data Not Inserted';
            }
}
}
/*
// Delete
if(isset($_POST['delete']))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM `users` WHERE `id` = $data[0]";
    try{
        $delete_Result = mysqli_query($dbc, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($dbc) > 0)
            {
                echo 'Data Deleted';
            }else{
                echo 'Data Not Deleted';
            }
        }
    } 
}

// Edit
if(isset($_POST['update']))
{
    $data = getPosts();
    $update_Query = "UPDATE `users` SET `fname`='$data[1]',`lname`='$data[2]',`age`=$data[3] WHERE `id` = $data[0]";
    try{
        $update_Result = mysqli_query($dbc, $update_Query);
        
        if($update_Result)
        {
            if(mysqli_affected_rows($dbc) > 0)
            {
                echo 'Data Updated';
            }else{
                echo 'Data Not Updated';
            }
        }
    }
  }*/
?>
		<html>
		<form action="" method="post" name="myForm" onsubmit="return(validate());" >
  
      <table width="25%" border="0">
  <br><br>
	        <tr> 
                <td>Employee ID</td>
                <td><input type="text" name="empid" maxlength="3" size="2" pattern="[A-Za-z]{3}"> <!-- required title="Min. 3 Alphabets ONLY" -->
				    <input type="submit" name="search" value="Find"></td>
            </tr>
            <tr> 
                <td>Full Name</td>
                <td><input type="text" name="fullname"></td>
            </tr>
            <tr> 
                <td>Entitlement</td>
                <td><input type="text" name="entitlement" ></td>
            </tr>
				<tr> 
                <td>Balance Fee</td>
                <td><input type="text" name="prevbal"></td>
            </tr>
			 <tr> 
                <td>Date</td>
                <td><input type="date" name="date"></td>
            </tr>
		
			<tr> 
                <td>Supplier</td>
                <td><input type="text" name="supplier"></td>
            </tr>
			 <tr> 
                <td>Item Description</td>
                <td><input type="text" name="itemdesc"></td>
            </tr>
				 <tr> 
                <td>Tax Cash Sale/Invoice No.</td>
                <td><input type="text" name="invoice"></td>
            </tr>
			<tr> 
                <td>Amount Paid</td>
                <td><input type="text" name="paid"input id="price"></td>
				 <br><br>
                <td><button onclick="getPrice()">GST</button></td>
                <br><br>
				</tr>
	        <tr>
	            <td>GST</td>
	            <td><input type="hidden" name="gst" readonly id="total"></td>
            </tr> 
			 
				<tr>
                <td>Amount Claimed</td>
                <td><input type="text" name="claimed"></td>
            </tr>
				 <tr> 
                <td>Balance</td>
                <td><input type="text" name="balance"></td>
            </tr>
			<tr> 
                <td></td>
                <td><input type="submit" name="insert" value="Add"></td>
                <input type="submit" name="update" value="Update">
                <input type="submit" name="delete" value="Delete">

            </tr>
			</th>
        </table>
    </form>
	</html>