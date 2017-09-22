<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Fish Weight Calculator</title>
</head>

<body>
<form id="fishWeight" action="">

	<legend>Entitlement</legend>
		<p>
		<label for="entitlement">Entitlement</label>
		<input id="entitlement" name="entitlement" type="number" />
	</p>
	<p>
		<label for="amountpaid">Amount Paid</label>
		<input id="amountpaid" name="amountpaid" type="number" />
	</p>
	<p>
		<label for="balance">Balance</label>
		<input id="balance" name="balance" type="number" />
	</p>
		<p>
		<label for="rate">Exchange Rate</label>
		<input id="rate" name="rate" type="number" />
	</p>
		</p>
		<p>
		<label for="petty">Petty</label>
		<input id="petty" name="petty" type="number" />
	</p>
	<p>
		<input type="submit" value="Calculate" />
		or
		<input type="reset" value="Reset" />
	</p>

</form>

<script>
(function () {
	function calculateBalance(entitlement,amountpaid, balance,rate,petty) {
		entitlement = parseFloat(entitlement).toFixed(4);
		amountpaid = parseFloat(amountpaid).toFixed(4);

		return (entitlement-amountpaid);
	}
	function calculatePetty(amountpaid,rate){
		rate = parseFloat(rate).toFixed(4);
		amountpaid = parseFloat(amountpaid).toFixed(4);
		petty=parseFloat(petty).toFixed(4);
		return (rate/amountpaid);
	}
    
	var fishWeight = document.getElementById("fishWeight");
	if (fishWeight) {
		fishWeight.onsubmit = function calculate() {
			(this.balance.value = calculateBalance(this.entitlement.value, this.amountpaid.value))&& (this.petty.value = calculatePetty(this.rate.value, this.amountpaid.value));
			return false;
		};
		
	}
}());
</script>
</body>
</html>
