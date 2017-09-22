<?php
//Connection for database

session_start();
	// Load the required files
	require_once 'dbconfig.php';
	
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
	
	$sql= "(SELECT * FROM `customers` where cust_email='$_SESSION[email]')";
$result = $dbc->query($sql);
?>
<!doctype html>
<html>
<body>
<h1 align="center">Employee Details</h1>
<table border="1" align="center" style="line-height:25px;">
<tr>
<th>Customer ID</th>
<th>Name</th>
<th>surname</th>
<th>email</th>
<th>number</th>
<th>address</th>
<th>postal</th>
<th>pass</th>
<th>repass</th>

</tr>
<?php
//Fetch Data form database
if($result->num_rows > 0){
 while($row = $result->fetch_assoc()){
 ?>
 <tr>
 <td><?php echo $row['cust_id']; ?></td>
 <td><?php echo $row['cust_fname']; ?></td>
 <td><?php echo $row['cust_lname']; ?></td>
 <td><?php echo $row['cust_email']; ?></td>
 <td><?php echo $row['cust_number']; ?></td>
 <td><?php echo $row['cust_address']; ?></td>
 <td><?php echo $row['cust_postal']; ?></td>
 <td><?php echo $row['cust_pass']; ?></td>
 <td><?php echo $row['cust_repass']; ?></td>
 <!--Edit option -->
 <td><a href="customerEdit.php?cust_id=<?php echo $row['cust_id']; ?>" alt="edit" >Edit</a></td>
 </tr>
 <?php
 }
}
else
{
 ?>
 <tr>
 <th colspan="2">There's No data found!!!</th>
 </tr>
 <?php
}
?>
</table>
</body>
</html>