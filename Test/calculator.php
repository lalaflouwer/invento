<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script>
// This script is explained line by line in depth in the following video:
// http://www.developphp.com/view.php?tid=1389
function computeLoan(){
	var amount = document.getElementById('amount').value;
	var payment = amount -((amount/107)*7).toFixed(2);
	payment = payment.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	document.getElementById('payment').innerHTML = "Monthly Payment = $"+payment;
}
</script>
</head>
<body>
<p>Amount: $<input id="amount" type="number" min="1" max="1000000" onchange="computeLoan()"></p>
<h2 id="payment"></h2>
</body>
</html>