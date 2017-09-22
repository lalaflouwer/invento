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

 <script type="text/javascript">
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
		 
		 
		 if( document.myForm.email.value == "")
          {
            alert( "Please enter Email!" );
            document.myForm.email.focus() ;
            return false;
         }	
		 
		 if(document.myForm.email.value.indexOf('@') == -1 || document.myForm.email.value.indexOf('.') == -1)
          {
            alert( "Invalid Email, check if the '@' and '.'s in the email address" );
            document.myForm.email.focus() ;
            return false;
         }
		 
		 if( document.myForm.password.value == "")
          {
            alert( "Please enter Password!" );
            document.myForm.password.focus() ;
            return false;
         }		
/*
		 if( document.myForm.repassword.value == "")
          {
            alert( "Please enter Re-Password!" );
            document.myForm.repassword.focus() ;
            return false;
         }
		 
		 //to check whether both password and re-password matches.
		 if( document.myForm.repassword.value != document.myForm.password.value)
          {
            alert( "Password does not match!" );
            document.myForm.repassword.focus() ;
            return false;
         }					 
         return( true );
		 */
		 
		 if( document.myForm.contact.value == "")
          {
            alert( "Please enter Contact!" );
            document.myForm.contact.focus() ;
            return false;
         }		 
		 		 
		 if( document.myForm.nric.value == "")
          {
            alert( "Please enter NRIC!" );
            document.myForm.nric.focus() ;
            return false;
		  }
		 
		 if( document.myForm.address.value == "")
          {
            alert( "Please enter Address!" );
            document.myForm.address.focus() ;
            return false;
		  }

		 if( document.myForm.postal.value == "")
          {
            alert( "Please enter Postal Code!" );
            document.myForm.postal.focus() ;
            return false;
         }	


      }
</script>

<?php

	if (isset($_POST['submit'])){
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

		//In order to be inserted into the DB as a NULL value.
	$fin ="";
	$faddress ="";
	$permitExpiry="";
	$permitNo ="";
	$passportExpiry="";
	$passportNo ="";
	$homeContact ="";	
	
	//variable      $_POST is for the one given in the HTML.
	//$id=$_POST['id'];
	$empid = $_POST['empid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
	$password = $_POST['password'];
	//$repassword = $_POST['repassword'];
	$contact = $_POST['contact'];
	$dob = $_POST['dob'];
    $nric = $_POST['nric'];
	$nationality = $_POST['nationality'];
	$resid = $_POST['resid'];
    $address = $_POST['address'];
	$postal = $_POST['postal'];
	$dept = $_POST['dept'];
	$join = $_POST['join'];
	//$type = $_POST['type']; needs to be by default employee.
	$image = $_POST['image'];
	$homeContact = $_POST['homeContact'];
	$race = $_POST['race'];
	$permitNo = $_POST['permitNo'];
	$permitExpiry  = $_POST['permitExpiry'];
	$fin = $_POST['fin'];
	$passportNo= $_POST['passportNo'];
	$passportExpiry = $_POST['passportExpiry'];
	$faddress = $_POST['faddress'];
	//$fpostal = $_POST['fpostal'];
	$designation = $_POST['designation'];
	//$emp_status = $_POST['status']; needs to be by default active.
	
	
	//$password = password_hash($password, PASSWORD_BCRYPT);
	
		//to check if email and employee Id is used/taken already.
		$sql= "SELECT * FROM employees where emp_email = '$email'|| emp_id = '$empid' || emp_nric = '$nric'";
		$result = mysqli_query($dbc, $sql);
		if(mysqli_num_rows($result)>0)
		{
			echo '<script language="javascript">';
			echo 'alert("Employee ID/Email/NRIC is taken, please use another Employee ID/Email/NRIC.")';
			echo '</script>';
		}

		else{
			
	//Upload Image
		$image = basename($_FILES['image']['name']);
		
	//INSERT into "table name" followed by "names in mysql"  VALUES "the variables given from above"
		$sql="INSERT INTO `employees` (`id`, `emp_id`, `emp_fullname`, `emp_email`, `emp_pass`, `emp_contact`, `emp_homeContact`, `emp_dob`, `emp_nationality`, `emp_race`, `emp_nric`, `emp_fin`, `emp_permitNo`, `emp_permitExpiry`, `emp_passportNo`, `emp_passportExpiry`, `emp_resid`, `emp_address`, `emp_postal`, `emp_faddress`, `emp_dept`, `emp_designation`, `emp_type`, `emp_joined`, `emp_status`, `emp_img`) VALUES (NULL, '$empid', '$name', '$email', '$password', '$contact', '$homeContact', '$dob', '$nationality', '$race', '$nric', '$fin', '$permitNo', '$permitExpiry', '$passportNo', '$passportExpiry' , '$resid', '$address', '$postal', '$faddress', '$dept', '$designation', 'Employee', '$join', 'Active', '$image')";
			
		mysqli_query($dbc, $sql);
		
		if (move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
		}
		
		header("Location: adminDisplay.php");//redirect to addDisplay.php page
	
	mysqli_close( $dbc ) ;
		}
}
?>


<a href="admin.php">
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

<div id="form">
<form action="" method="post" name="myForm" onsubmit="return(validate());" enctype="multipart/form-data" >
 <!-- Disable/Enable fields when user is Singaporean.-->
				<script type="text/javascript"> 
					function disablefields(){ 
					if (document.getElementById('checkbox').checked == 1){ 
					document.getElementById('permitNo').disabled='disabled'; 
					document.getElementById('permitExpiry').disabled='disabled'; 
					document.getElementById('fin').disabled='disabled'; 
					document.getElementById('faddress').disabled='disabled'; 
					document.getElementById('fpostal').disabled='disabled'; 
					}else{ 
					document.getElementById('permitNo').disabled=''; 
					document.getElementById('permitExpiry').disabled=''; 
					document.getElementById('fin').disabled='';
					document.getElementById('faddress').disabled=''; 
					document.getElementById('fpostal').disabled=''; 					
					} 
					} 
				</script> 
      <table border=0 width='100%'>
			<tr><br><br>
			<td>Employee ID</td><td>:</td><td><input type="text" name="empid" maxlength="5" pattern="[A-Z]{3,5}" required title="Min.3, Max. 5 Capitial Letters ONLY!" ></td>
			<td>Password</td><td>:</td><td><input type="text" name="password" required pattern="[a-zA-Z0-9]+"></td>
			
			</tr>
			<tr>
			<td>Full Name</td><td>:</td><td><input type="text" name="name"></td>
			<td>Nationality</td><td>:</td><td><select name="nationality">
					<option selected></option>
					<option value="Afganistan">Afghanistan</option>
					<option value="Albania">Albania</option>
					<option value="Algeria">Algeria</option>
					<option value="American Samoa">American Samoa</option>
					<option value="Andorra">Andorra</option>
					<option value="Angola">Angola</option>
					<option value="Anguilla">Anguilla</option>
					<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
					<option value="Argentina">Argentina</option>
					<option value="Armenia">Armenia</option>
					<option value="Aruba">Aruba</option>
					<option value="Australia">Australia</option>
					<option value="Austria">Austria</option>
					<option value="Azerbaijan">Azerbaijan</option>
					<option value="Bahamas">Bahamas</option>
					<option value="Bahrain">Bahrain</option>
					<option value="Bangladesh">Bangladesh</option>
					<option value="Barbados">Barbados</option>
					<option value="Belarus">Belarus</option>
					<option value="Belgium">Belgium</option>
					<option value="Belize">Belize</option>
					<option value="Benin">Benin</option>
					<option value="Bermuda">Bermuda</option>
					<option value="Bhutan">Bhutan</option>
					<option value="Bolivia">Bolivia</option>
					<option value="Bonaire">Bonaire</option>
					<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
					<option value="Botswana">Botswana</option>
					<option value="Brazil">Brazil</option>
					<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
					<option value="Brunei">Brunei</option>
					<option value="Bulgaria">Bulgaria</option>
					<option value="Burkina Faso">Burkina Faso</option>
					<option value="Burundi">Burundi</option>
					<option value="Cambodia">Cambodia</option>
					<option value="Cameroon">Cameroon</option>
					<option value="Canada">Canada</option>
					<option value="Canary Islands">Canary Islands</option>
					<option value="Cape Verde">Cape Verde</option>
					<option value="Cayman Islands">Cayman Islands</option>
					<option value="Central African Republic">Central African Republic</option>
					<option value="Chad">Chad</option>
					<option value="Channel Islands">Channel Islands</option>
					<option value="Chile">Chile</option>
					<option value="China">China</option>
					<option value="Christmas Island">Christmas Island</option>
					<option value="Cocos Island">Cocos Island</option>
					<option value="Colombia">Colombia</option>
					<option value="Comoros">Comoros</option>
					<option value="Congo">Congo</option>
					<option value="Cook Islands">Cook Islands</option>
					<option value="Costa Rica">Costa Rica</option>
					<option value="Cote DIvoire">Cote D'Ivoire</option>
					<option value="Croatia">Croatia</option>
					<option value="Cuba">Cuba</option>
					<option value="Curaco">Curacao</option>
					<option value="Cyprus">Cyprus</option>
					<option value="Czech Republic">Czech Republic</option>
					<option value="Denmark">Denmark</option>
					<option value="Djibouti">Djibouti</option>
					<option value="Dominica">Dominica</option>
					<option value="Dominican Republic">Dominican Republic</option>
					<option value="East Timor">East Timor</option>
					<option value="Ecuador">Ecuador</option>
					<option value="Egypt">Egypt</option>
					<option value="El Salvador">El Salvador</option>
					<option value="Equatorial Guinea">Equatorial Guinea</option>
					<option value="Eritrea">Eritrea</option>
					<option value="Estonia">Estonia</option>
					<option value="Ethiopia">Ethiopia</option>
					<option value="Falkland Islands">Falkland Islands</option>
					<option value="Faroe Islands">Faroe Islands</option>
					<option value="Fiji">Fiji</option>
					<option value="Finland">Finland</option>
					<option value="France">France</option>
					<option value="French Guiana">French Guiana</option>
					<option value="French Polynesia">French Polynesia</option>
					<option value="French Southern Ter">French Southern Ter</option>
					<option value="Gabon">Gabon</option>
					<option value="Gambia">Gambia</option>
					<option value="Georgia">Georgia</option>
					<option value="Germany">Germany</option>
					<option value="Ghana">Ghana</option>
					<option value="Gibraltar">Gibraltar</option>
					<option value="Great Britain">Great Britain</option>
					<option value="Greece">Greece</option>
					<option value="Greenland">Greenland</option>
					<option value="Grenada">Grenada</option>
					<option value="Guadeloupe">Guadeloupe</option>
					<option value="Guam">Guam</option>
					<option value="Guatemala">Guatemala</option>
					<option value="Guinea">Guinea</option>
					<option value="Guyana">Guyana</option>
					<option value="Haiti">Haiti</option>
					<option value="Hawaii">Hawaii</option>
					<option value="Honduras">Honduras</option>
					<option value="Hong Kong">Hong Kong</option>
					<option value="Hungary">Hungary</option>
					<option value="Iceland">Iceland</option>
					<option value="India">India</option>
					<option value="Indonesia">Indonesia</option>
					<option value="Iran">Iran</option>
					<option value="Iraq">Iraq</option>
					<option value="Ireland">Ireland</option>
					<option value="Isle of Man">Isle of Man</option>
					<option value="Israel">Israel</option>
					<option value="Italy">Italy</option>
					<option value="Jamaica">Jamaica</option>
					<option value="Japan">Japan</option>
					<option value="Jordan">Jordan</option>
					<option value="Kazakhstan">Kazakhstan</option>
					<option value="Kenya">Kenya</option>
					<option value="Kiribati">Kiribati</option>
					<option value="Korea North">Korea North</option>
					<option value="Korea Sout">Korea South</option>
					<option value="Kuwait">Kuwait</option>
					<option value="Kyrgyzstan">Kyrgyzstan</option>
					<option value="Laos">Laos</option>
					<option value="Latvia">Latvia</option>
					<option value="Lebanon">Lebanon</option>
					<option value="Lesotho">Lesotho</option>
					<option value="Liberia">Liberia</option>
					<option value="Libya">Libya</option>
					<option value="Liechtenstein">Liechtenstein</option>
					<option value="Lithuania">Lithuania</option>
					<option value="Luxembourg">Luxembourg</option>
					<option value="Macau">Macau</option>
					<option value="Macedonia">Macedonia</option>
					<option value="Madagascar">Madagascar</option>
					<option value="Malaysia">Malaysia</option>
					<option value="Malawi">Malawi</option>
					<option value="Maldives">Maldives</option>
					<option value="Mali">Mali</option>
					<option value="Malta">Malta</option>
					<option value="Marshall Islands">Marshall Islands</option>
					<option value="Martinique">Martinique</option>
					<option value="Mauritania">Mauritania</option>
					<option value="Mauritius">Mauritius</option>
					<option value="Mayotte">Mayotte</option>
					<option value="Mexico">Mexico</option>
					<option value="Midway Islands">Midway Islands</option>
					<option value="Moldova">Moldova</option>
					<option value="Monaco">Monaco</option>
					<option value="Mongolia">Mongolia</option>
					<option value="Montserrat">Montserrat</option>
					<option value="Morocco">Morocco</option>
					<option value="Mozambique">Mozambique</option>
					<option value="Myanmar">Myanmar</option>
					<option value="Nambia">Nambia</option>
					<option value="Nauru">Nauru</option>
					<option value="Nepal">Nepal</option>
					<option value="Netherland Antilles">Netherland Antilles</option>
					<option value="Netherlands">Netherlands (Holland, Europe)</option>
					<option value="Nevis">Nevis</option>
					<option value="New Caledonia">New Caledonia</option>
					<option value="New Zealand">New Zealand</option>
					<option value="Nicaragua">Nicaragua</option>
					<option value="Niger">Niger</option>
					<option value="Nigeria">Nigeria</option>
					<option value="Niue">Niue</option>
					<option value="Norfolk Island">Norfolk Island</option>
					<option value="Norway">Norway</option>
					<option value="Oman">Oman</option>
					<option value="Pakistan">Pakistan</option>
					<option value="Palau Island">Palau Island</option>
					<option value="Palestine">Palestine</option>
					<option value="Panama">Panama</option>
					<option value="Papua New Guinea">Papua New Guinea</option>
					<option value="Paraguay">Paraguay</option>
					<option value="Peru">Peru</option>
					<option value="Phillipines">Philippines</option>
					<option value="Pitcairn Island">Pitcairn Island</option>
					<option value="Poland">Poland</option>
					<option value="Portugal">Portugal</option>
					<option value="Puerto Rico">Puerto Rico</option>
					<option value="Qatar">Qatar</option>
					<option value="Republic of Montenegro">Republic of Montenegro</option>
					<option value="Republic of Serbia">Republic of Serbia</option>
					<option value="Reunion">Reunion</option>
					<option value="Romania">Romania</option>
					<option value="Russia">Russia</option>
					<option value="Rwanda">Rwanda</option>
					<option value="St Barthelemy">St Barthelemy</option>
					<option value="St Eustatius">St Eustatius</option>
					<option value="St Helena">St Helena</option>
					<option value="St Kitts-Nevis">St Kitts-Nevis</option>
					<option value="St Lucia">St Lucia</option>
					<option value="St Maarten">St Maarten</option>
					<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
					<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
					<option value="Saipan">Saipan</option>
					<option value="Samoa">Samoa</option>
					<option value="Samoa American">Samoa American</option>
					<option value="San Marino">San Marino</option>
					<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
					<option value="Saudi Arabia">Saudi Arabia</option>
					<option value="Senegal">Senegal</option>
					<option value="Serbia">Serbia</option>
					<option value="Seychelles">Seychelles</option>
					<option value="Sierra Leone">Sierra Leone</option>
					<option value="Singapore">Singapore</option>
					<option value="Slovakia">Slovakia</option>
					<option value="Slovenia">Slovenia</option>
					<option value="Solomon Islands">Solomon Islands</option>
					<option value="Somalia">Somalia</option>
					<option value="South Africa">South Africa</option>
					<option value="Spain">Spain</option>
					<option value="Sri Lanka">Sri Lanka</option>
					<option value="Sudan">Sudan</option>
					<option value="Suriname">Suriname</option>
					<option value="Swaziland">Swaziland</option>
					<option value="Sweden">Sweden</option>
					<option value="Switzerland">Switzerland</option>
					<option value="Syria">Syria</option>
					<option value="Tahiti">Tahiti</option>
					<option value="Taiwan">Taiwan</option>
					<option value="Tajikistan">Tajikistan</option>
					<option value="Tanzania">Tanzania</option>
					<option value="Thailand">Thailand</option>
					<option value="Togo">Togo</option>
					<option value="Tokelau">Tokelau</option>
					<option value="Tonga">Tonga</option>
					<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
					<option value="Tunisia">Tunisia</option>
					<option value="Turkey">Turkey</option>
					<option value="Turkmenistan">Turkmenistan</option>
					<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
					<option value="Tuvalu">Tuvalu</option>
					<option value="Uganda">Uganda</option>
					<option value="Ukraine">Ukraine</option>
					<option value="United Arab Erimates">United Arab Emirates</option>
					<option value="United Kingdom">United Kingdom</option>
					<option value="United States of America">United States of America</option>
					<option value="Uraguay">Uruguay</option>
					<option value="Uzbekistan">Uzbekistan</option>
					<option value="Vanuatu">Vanuatu</option>
					<option value="Vatican City State">Vatican City State</option>
					<option value="Venezuela">Venezuela</option>
					<option value="Vietnam">Vietnam</option>
					<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
					<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
					<option value="Wake Island">Wake Island</option>
					<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
					<option value="Yemen">Yemen</option>
					<option value="Zaire">Zaire</option>
					<option value="Zambia">Zambia</option>
					<option value="Zimbabwe">Zimbabwe</option>
					</select></td>
			</tr>

			<tr>
			<td>NRIC </td><td>:</td><td><input type="text" name="nric"></td>
			<td>FIN No.</td><td>:</td><td><input id="fin" type="text" name="fin" disabled="disabled">
			<input type="hidden" name="fin">
			</tr>
			
			<tr>
			<td></td>
			<td></td>
			<td></td>
			<td>Untick if Foreigner.</td>
			<td></td>
			<td>
			<input type="checkbox" id="checkbox" align="right" checked onclick="disablefields();">
			</td>
			</tr>
			
			<tr>
			<td>Date of Birth</td><td>:</td><td><input type="text" name="dob" placeholder="          DD-MM-YYYY"></td>
			<td>WP / SP No.</td><td>:</td><td><input id="permitNo" type="text" name="permitNo" disabled="disabled"><br><br>
			<input type="hidden" name="permitNo"></td>
			</tr>
			

			<tr>
			<td>Race</td><td>:</td><td><input type="text"  name="race"></td>
			<td>WP / SP Expiry Date</td><td>:</td><td><input id="permitExpiry" type="text" name="permitExpiry" placeholder="          DD-MM-YYYY" required pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}" title="Enter a date in this formart DD-MM-YYYY" disabled="disabled">
			<input type="hidden" name="permitExpiry"></td>
			
			</tr>
			
			<tr>
			<td>Contact No. (Home)</td><td>:</td><td><input type="text" name="homeContact"></td>
			<td>Passport No.</td><td>:</td><td><input type="text" name="passportNo" >
			
			</tr>
			
			<tr>
			<td>Handphone No.</td><td>:</td><td><input type="text" name="contact" required pattern="[0-9]+"></td>
			<td>Passport Expiry</td><td>:</td><td><input type="text"  name="passportExpiry" placeholder="          DD-MM-YYYY" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}" title="Enter a date in this formart DD-MM-YYYY">
			</tr>
			
			<tr>
			<td>Email</td><td>:</td><td><input type="email" name="email" pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*" required title="Please input valid Email Address" ></td>
			<td>Foreign Address</td><td>:</td><td><input id="faddress" type="text" name="faddress" style="height:50px; rows="2" cols="25" disabled="disabled"></td>
			<input type="hidden" name="faddress">
			</tr>
			
			<tr>
			<td>Residential Address</td><td>:</td><td><input type="text" name="address"  style="height:50px; rows="2" cols="25" ></td>
			<td>Department</td><td>:</td><td><select name="dept">
				<option selected></option>
				<option value="Management">Management</option>
				<option value="Admin">Admin</option>
				<option value="Site Operation">Site Operation</option>
				<option value="Design">Design</option>
				<option value="Autocad">Autocad</option>
				</select></td>
			</tr>
			
			<tr>
			<td>Postal</td><td>:</td><td><input type="text" name="postal"></td>
			<td>Designation</td><td>:</td><td><input type="text" name="designation"></td>
			</tr>
			
			<tr>
			<td>Resident Status</td><td>:</td><td><select name="resid">
					<option selected></option>
					<option value="Singapore Citizen">Singapore Citizen</option>
					<option value="PR">PR</option>
					<option value="Foreigner">Foreigner</option>
				</select></td>
			<td>Joined Date</td><td>:</td><td><input type="text" placeholder="          DD-MM-YYYY" name="join"></td>
			</tr>
			
			<tr>
			<td></td><td></td><td></td>
			<td>Employee Photo</td><td>:</td><td><input align="left" type="file" name="image" id="image" ></td>
			</tr>

			<tr>
			<td></td>
			<td></td><td></td><td></td><td></td>
			<td align="right"><input type="submit" name="submit" value="Add"></td>
			</tr>	

			<tr>
			<td><br><br><br><br></td>
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