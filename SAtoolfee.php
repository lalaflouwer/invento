<html>
<head>
<title>Invento Engineering Pte Ltd</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>
 <script type="text/javascript">
 function validate()
      {

		 /*if( document.myForm.empid.value == "" )
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
*/function computeLoan(){
	var amount = document.getElementById('amount').value;
	var payment = amount -((amount/107)*7).toFixed(2);
	payment = payment.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	document.getElementById('payment').innerHTML = "Monthly Payment = $"+payment;
	if (!isNaN(payment)) {
           document.getElementById('payment').value = payment;
       }
}
      }
</script>

<?php
	if (isset($_POST['submit'])){
		
	session_start();
	// Load the required files
	require_once 'dbconfig.php';
	
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);


	
    //variable      $_POST is for the one given in the HTML.
	//$id=$_POST['id'];
	$empid=$_POST['empid'];
	$name=$_POST['name'];
    $entitlement=$_POST['entitlement'];
	$prevbal=$_POST['prevbal'];
	$date=$_POST['date'];
	$supplier=$_POST['supplier'];
	$itemdesc=$_POST['itemdesc'];
	$invoice=$_POST['invoice'];
	$paid=$_POST['paid'];
	$gst=$_POST['gst'];
	$claimed=$_POST['claimed'];
	$balance=$_POST['balance'];
	$payment=$_POST['payment'];

		
		$sql="INSERT INTO medical(emp_id ,emp_fullname, tool_entitlement, tool_prevbal , tool_date, tool_supplier, tool_itemdesc, tool_invoice, tool_paid, tool_gst, tool_claimed, tool_balance) VALUES ('$empid','$name','$entitlement','$prevbal','$date','$supplier', '$itemdesc','$invoice', '$paid',' $paid/1.07','$rate','$claimed','$balance')";
		//if (mysqli_query("INSERT INTO employees(emp_id,emp_fullname) VALUES('$empid','$name')") && mysqli_query("INSERT INTO medical(med_entitlement, med_date , med_clinic, med_receipt, med_days, med_paid, med_currency, med_rate, med_claimed, med_balance) VALUES ('$empid','$name','$entitlement','$date','$clinic','$receipt', '$days', '$paid','$currency','$rate','$claimed','$balance')";		
		mysqli_query($dbc, $sql);
		header("Location: addedmedfee.php");//redirect to addedmedfee.php page
	
	mysqli_close( $dbc ) ;
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
<div id="add">  
<form action="" method="post" name="myForm" onsubmit="return(validate());" >
  
      <table width="25%" border="0">
  <br><br>
	        
            <tr> 
                <td>Entitlement</td>
                <td><input type="text" name="entitlement" ></td>
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