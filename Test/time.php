<html>
<form>
Join Date:<input type="text" id="startdate"><br>
Date at EOY:<input type="text" id="enddate"><br>
Days worked:<input type="text" name="days" id="days">
<input type="button" onClick="multiplyBy()" Value="Multiply" />
</form>
<p>The Result is : <br>
<span id = "result"></span>
</p>

<script src="https://code.jquery.com/jquery-1.8.3.js"></script>
<script src="https://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" />
<script>

$(document).ready(function() { 


$( "#startdate,#enddate" ).datepicker({
changeMonth: true,
changeYear: true,
firstDay: 1,
dateFormat: 'dd/mm/yy',
})

$( "#startdate" ).datepicker({ dateFormat: 'dd-mm-yy' });
$( "#enddate" ).datepicker({ dateFormat: 'dd-mm-yy' });

$('#enddate').change(function() {
var start = $('#startdate').datepicker('getDate');
var end   = $('#enddate').datepicker('getDate');
var days = $days ;
if (start<end) {
var days   = (end - start)/1000/60/60/24;
$('#days').val(days);
}
else {
alert ("You cant come back before you have been!");
$('#startdate').val("");
$('#enddate').val("");
$('#days').val("");
}
function multiplyBy()
{
  num1 = document.getElementById("days").value;
  num2 = 0.5480;
  document.getElementById("result").innerHTML = days * num2;
  }
}); //end change function
}); //end ready
</script>
</html>