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
<?php
    //connect to database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);

	$sql="SELECT * FROM employees"; 

		//$result = mysqli_query($dbc, $sql);	
		
	$emp_img = "";
	$image = "";
	$id = ""; //$id = null;
	$emp_id = "";
	$emp_fullname = "";
	$emp_email = "";
	$emp_contact = "";
	$emp_homeContact = "";
	$emp_dob = "";
	$emp_nric = "";
	$emp_nationality = "";
	$emp_race = "";
	$emp_resid = "";
	$emp_permitNo = "";
	$emp_permitExpiry = "";
	$emp_fin = "";
	$emp_passportNo = "";
	$emp_passportExpiry = "";
	$emp_address = "";
	$emp_postal = "";
	$emp_faddress = "";
	$emp_dept = "";
	$emp_designation = "";
	$emp_type = "";
	$emp_joined = "";
	$emp_status = "";
	$emp_pass = "";
	//$emp_repass = "";
				
		function getPosts()
		{	
			$posts = array();
			//$posts[0] = $_POST['image'];
			//$posts[1] = $_POST['id'];
			$posts[2] = $_POST['empid'];
			$posts[3] = $_POST['fullname'];
			$posts[4] = $_POST['email'];
			$posts[5] = $_POST['contact'];
			$posts[6] = $_POST['homeContact'];
			$posts[7] = $_POST['dob'];
			$posts[8] = $_POST['nric'];
			$posts[9] = $_POST['nationality'];
			$posts[10] = $_POST['race'];
			$posts[11] = $_POST['resid'];
			$posts[12] = $_POST['permitNo'];
			$posts[13] = $_POST['permitExpiry'];
			$posts[14] = $_POST['fin'];
			$posts[15] = $_POST['passportNo'];
			$posts[16] = $_POST['passportExpiry'];
			$posts[17] = $_POST['address'];
			$posts[18] = $_POST['postal'];
			$posts[19] = $_POST['faddress'];
			$posts[21] = $_POST['dept'];
			$posts[22] = $_POST['designation'];
			//$posts[23] = $_POST['type'];
			$posts[24] = $_POST['joined'];
			//$posts[25] = $_POST['status'];
			//$posts[26] = $_POST['password'];
			return $posts;
		}		
		
		//Search employee..
		if(isset($_POST['search']))
		{
			$data = getPosts();
			
			$search_Query = "SELECT * FROM employees WHERE emp_id = '$data[2]'"; //Search employee via their 3-5 letter employee ID.
			
			$search_Result = mysqli_query($dbc, $search_Query);
			
			if($search_Result)
			{		
				if(mysqli_num_rows($search_Result))
				{	
					while($row = mysqli_fetch_array($search_Result)) 
					{    
					$id = $row['id'];
					$emp_id = $row['emp_id'];
					$emp_fullname = $row['emp_fullname'];
					$emp_img = $row['emp_img'];
					echo "<img src='".$row['emp_img']."' width='180' height='180'>";
					$emp_email = $row['emp_email'];
					$emp_pass = $row['emp_pass'];
					$emp_contact = $row['emp_contact'];
					$emp_homeContact = $row['emp_homeContact'];
					$emp_dob = $row['emp_dob'];
					$emp_nationality = $row['emp_nationality'];
					$emp_race = $row['emp_race'];
					$emp_nric = $row['emp_nric'];
					$emp_permitNo = $row['emp_permitNo'];
					$emp_permitExpiry = $row['emp_permitExpiry'];
					$emp_fin = $row['emp_fin'];
					$emp_passportNo = $row['emp_passportNo'];
					$emp_passportExpiry = $row['emp_passportExpiry'];
					$emp_resid = $row['emp_resid'];
					$emp_address = $row['emp_address'];
					$emp_postal = $row['emp_postal'];
					$emp_faddress = $row['emp_faddress'];
					$emp_dept = $row['emp_dept'];
					$emp_designation = $row['emp_designation'];
					$emp_type = $row['emp_type'];
					$emp_joined = $row['emp_joined'];
					$emp_status = $row['emp_status'];
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
				$emp_img = $_POST['image'];
				$emp_id = $_POST['empid'];
				$emp_fullname = $_POST['fullname'];
				$emp_email = $_POST['email'];
				$emp_contact = $_POST['contact'];
				$emp_homeContact = $_POST['homeContact'];
				//$emp_pass = $_POST['password'];
				$emp_dob = $_POST['dob'];
				$emp_nric = $_POST['nric'];
				$emp_nationality = $_POST['nationality'];
				$emp_race = $_POST['race'];
				$emp_resid = $_POST['resid'];
				$emp_address = $_POST['address'];
				$emp_postal = $_POST['postal'];
				$emp_dept = $_POST['dept'];
				$emp_joined = $_POST['joined'];
				//$emp_type = $_POST['type'];
				$emp_permitNo = $_POST['permitNo'];
				$emp_permitExpiry  = $_POST['permitExpiry'];
				$emp_fin = $_POST['fin'];
				$emp_passportNo= $_POST['passportNo'];
				$emp_passportExpiry = $_POST['passportExpiry'];
				$emp_faddress = $_POST['faddress'];
				$emp_designation = $_POST['designation'];
				//$emp_status = $_POST['status'];
				
		//Upload Image
		$emp_img = basename($_FILES['image']['name']);
				
				$update = "UPDATE employees SET emp_fullname='$emp_fullname', emp_email='$emp_email', emp_contact='$emp_contact', emp_homeContact='$emp_homeContact', emp_dob='$emp_dob', emp_nric='$emp_nric', emp_fin='$emp_fin', emp_passportExpiry='$emp_passportExpiry', emp_passportNo='$emp_passportNo', emp_permitExpiry='$emp_permitExpiry', emp_permitNo='$emp_permitNo',  emp_nationality='$emp_nationality', emp_race='$emp_race', emp_resid='$emp_resid', emp_address='$emp_address', emp_postal='$emp_postal', emp_faddress='$emp_faddress', emp_dept='$emp_dept', emp_designation='$emp_designation', emp_type='$emp_type', emp_status='$emp_status', emp_joined='$emp_joined', emp_img='$emp_img' WHERE emp_id='$emp_id'";
				
			$update_Result = mysqli_query($dbc, $update);
			
			if (move_uploaded_file($_FILES['image']['tmp_name'], $emp_img)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
		}
		
		header("Location: adminDisplay.php");//redirect to adminUpdate.php page
	
	mysqli_close( $dbc ) ;
			}	
?>

<div id="form">
<form action="updateStaff.php" method="post" enctype="multipart/form-data">
      <table border=0 width='97%'>
	  
			<!--<tr>
			<td>ID :<?php echo $id;?></td>
			<td></td>
			</tr>-->
			
			<tr><br><br>
			<td>Employee ID</td><td>:</td><td><input type="text" name="empid" maxlength="5" size="1" pattern="[A-Z]{3,5}" required title="Min.3, Max. 5 Capitial Letters ONLY! " value="<?php echo $emp_id;?>" ><input type="submit" name="search" value="Find"></td>
			<td></td>
			
			</tr>
			<tr>
			<td>Full Name</td><td>:</td><td><input type="text" name="fullname" readonly="readonly" value="<?php echo $emp_fullname;?>"></td>
			<td>Nationality</td><td>:</td><td><select name="nationality">
					<option value="<?php echo $emp_nationality; ?>"><?php echo $emp_nationality; ?></option>
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
			<td>NRIC </td><td>:</td><td><input type="text" name="nric" value="<?php echo $emp_nric;?>" ></td>
			<td>FIN No.</td><td>:</td><td><input type="text" name="fin" value="<?php echo $emp_fin;?>" >
			<input type="hidden" name="fin">
			</tr>
			
			<tr>
			<td>Date of Birth</td><td>:</td><td><input type="text" name="dob" placeholder="          DD-MM-YYYY" value="<?php echo $emp_dob;?>" ></td>
			<td>WP / SP No.</td><td>:</td><td><input type="text" name="permitNo" value="<?php echo $emp_permitNo ;?>" ></td>
			</tr>

			<tr>
			<td>Race</td><td>:</td><td><input type="text" name="race" value="<?php echo $emp_race ;?>"></td>
			<td>WP / SP Expiry Date</td><td>:</td><td><input type="text" name="permitExpiry" placeholder="          DD-MM-YYYY" value="<?php echo $emp_permitExpiry ;?>" ></td>
			</tr>
			
			<tr>
			<td>Contact No. (Home)</td><td>:</td><td><input type="text" name="homeContact" value="<?php echo $emp_homeContact; ?>" ></td>
			<td>Passport No.</td><td>:</td><td><input type="text" name="passportNo" value="<?php echo $emp_passportNo ;?>" >
			</td>			
			</tr>
			
			<tr>
			<td>Handphone No.</td><td>:</td><td><input type="text" name="contact" value="<?php echo $emp_contact; ?>" ></td>
			<td>Passport Expiry</td><td>:</td><td><input type="text" name="passportExpiry" placeholder="          DD-MM-YYYY" value="<?php echo $emp_passportExpiry; ?>">
			</tr>
			
			<tr>
			<td>Email</td><td>:</td><td><input type="text" name="email" value="<?php echo $emp_email;?>"></td>
			<td>Foreign Address</td><td>:</td><td><input type="text" name="faddress" maxlength="100" size="30" style="height:50px; width:300px" rows="2" cols="25" value="<?php echo $emp_faddress;?>">
			</tr>
			
			<tr>
			<td>Residential Address</td><td>:</td><td><input type="text" name="address" maxlength="100" size="30" style="height:50px; width:300px" rows="2" cols="25" value="<?php echo $emp_address;?>"></td>
			<td>Department</td><td>:</td><td><select name="dept">
				<option value="<?php echo $emp_dept; ?>"><?php echo $emp_dept; ?></option>
				<option value="Management">Management</option>
				<option value="Admin">Admin</option>
				<option value="Site Operation">Site Operation</option>
				<option value="Design">Design</option>
				<option value="Autocad">Autocad</option>
				</select></td>
			</tr>
			
			<tr>
			<td>Postal</td><td>:</td><td><input type="text" name="postal" value="<?php echo $emp_postal; ?>"></td>
			<td>Designation</td><td>:</td><td><input type="text" name="designation" value="<?php echo $emp_designation; ?>"></td>
			</tr>
			
			<tr>
			<td>Resident Status</td><td>:</td><td><select name="resid">
					<option value="<?php echo $emp_resid; ?>"><?php echo $emp_resid; ?></option>
					<option value="Singapore Citizen">Singapore Citizen</option>
					<option value="PR">PR</option>
					<option value="Foreigner">Foreigner</option>
				</select></td>
				
			<td>Joined Date</td><td>:</td><td><input type="text" name="joined" placeholder="          DD-MM-YYYY" value="<?php echo $emp_joined; ?>"></td>
			</tr>
			
			<tr>
			<td></td><td></td><td></td>
			<td>Employee Photo</td><td>:</td><td><input align="left" type="file" name="image" id="image" ></td>
			<td></td>
			</tr>

			<tr>
			<td></td>
			<td></td><td></td><td></td><td></td>
			<td align="right"><input type="submit" name="update" value="Update"></td>
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