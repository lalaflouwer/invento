<?php
	// Load the required files
	require_once 'dbconfig.php';
?>
<html>
<head>
<script src="http://cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script> <!-- jQuery source -->
<title>Invento Engineering Pte Ltd</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css"/>
</head>
<body>
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
<div id="container">
<br>
<h1>Entitlement</h1><br><br><br>
      
<table id="myTable"></table>
                    
    <script>
        var url = 'http://jsonplaceholder.typicode.com/posts';
        var currentEditedIndex = -1;
        $(document).ready(function () {
            $.getJSON(url,
            function (json) {
                var tr;
                tr = $('<tr/>');
                tr.append("<td>Name</td>");
                tr.append("<td>Entitlement</td>");
                tr.append("<td>Hospital Leaves</td>");
                tr.append("<td>Medical Leaves</td>");
                tr.append("<td>edit</td>");
                $('#myTable').append(tr);

                for (var i = 0; i < json.length; i++) {
                    tr = $('<tr/>');
                    tr.append("<td>" + json[i].fullname + "</td>");
                    tr.append("<td>" + json[i].entitlement + "</td>");
                    tr.append("<td>" + json[i].hospleave + "</td>");
                    tr.append("<td>" + json[i].medleave + "</td>");
                    tr.append("<td><input type='button' value='edit' id='edit' onclick='myfunc(" + i + ")' /></td>");
                    $('#myTable').append(tr);
                }
            });


        });


        function myfunc(rowindex) {

            rowindex++;
            console.log(currentEditedIndex)
            if (currentEditedIndex != -1) {  //not first time to click
                cancelClick(rowindex)
            }
            else {
                cancelClick(currentEditedIndex)
            }

            currentEditedIndex = rowindex; //update the global variable to current edit location

            //get cells values
            var cell1 = ($("#myTable tr:eq(" + (rowindex) + ") td:eq(0)").text());
            var cell2 = ($("#myTable tr:eq(" + (rowindex) + ") td:eq(1)").text());
            var cell3 = ($("#myTable tr:eq(" + (rowindex) + ") td:eq(2)").text());
            var cell4 = ($("#myTable tr:eq(" + (rowindex) + ") td:eq(3)").text());

            //remove text from previous click


            //add a cancel button
            $("#myTable tr:eq(" + (rowindex) + ") td:eq(4)").append(" <input type='button' onclick='cancelClick("+rowindex+")' id='cancelBtn' value='Cancel'  />");
            $("#myTable tr:eq(" + (rowindex) + ") td:eq(4)").css("width", "200");

            //make it a text box
            $("#myTable tr:eq(" + (rowindex) + ") td:eq(0)").html(" <input type='text' id='mycustomid' value='" + cell1 + "' style='width:30px' />");
            $("#myTable tr:eq(" + (rowindex) + ") td:eq(1)").html(" <input type='text' id='mycustomuserId' value='" + cell2 + "' style='width:30px' />");
            $("#myTable tr:eq(" + (rowindex) + ") td:eq(2)").html(" <input type='text' id='mycustomtitle' value='" + cell3 + "' style='width:130px' />");
            $("#myTable tr:eq(" + (rowindex) + ") td:eq(3)").html(" <input type='text' id='mycustomedit' value='" + cell4 + "' style='width:400px' />");

        }

        //on cancel, remove the controls and remove the cancel btn
        function cancelClick(indx)
        {

            //console.log('edit is at row>> rowindex:' + currentEditedIndex);
            indx = currentEditedIndex;

            var cell1 = ($("#myTable #mycustomid").val());
            var cell2 = ($("#myTable #mycustomuserId").val());
            var cell3 = ($("#myTable #mycustomtitle").val());
            var cell4 = ($("#myTable #mycustomedit").val()); 

            $("#myTable tr:eq(" + (indx) + ") td:eq(0)").html(cell1);
            $("#myTable tr:eq(" + (indx) + ") td:eq(1)").html(cell2);
            $("#myTable tr:eq(" + (indx) + ") td:eq(2)").html(cell3);
            $("#myTable tr:eq(" + (indx) + ") td:eq(3)").html(cell4);
            $("#myTable tr:eq(" + (indx) + ") td:eq(4)").find('#cancelBtn').remove();
        }



    </script>
                    
            </body>
    </html>
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