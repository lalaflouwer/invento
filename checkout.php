<?php   
$date1 = ("#datepicker");
$date2 = ("#datepicker2");
$dateDiff = $date1 - $date2;
$fullDays = floor($dateDiff/(60*60*24));
echo "Difference is $fullDays days";  
?>