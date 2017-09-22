<script type="text/javascript">

	function calculateTotal() {
		
		var totalAmt = document.addem.total.value;

		var val = 0;
		
		for( i = 0; i < document.addem.discount_type.length; i++ ) {
		if( document.addem.discount_type[i].checked == true )
		val = document.addem.discount_type[i].value;
		}
		
		if(val == 'ring') {
			dType = document.addem.tb1.value;
		} else {
			dType = document.addem.tb2.value;
		}
		
		totalR = eval(totalAmt - dType);
		
		document.getElementById('update').innerHTML = totalR;
	}

</script>

<form name="addem" action="" id="addem" >	
	<span id="update">100</span>
	<p><input type="radio" name="discount_type" value="ring" checked > Ring: <input type="text" name="tb1" onkeyup="calculateTotal()"/>first textbox</p>
	<p><input type="radio" name="discount_type" value="percentage" > Percentage: <input type="text" name="tb2"  onkeyup="calculateTotal()"/>Second textbox</p>
	
	<input type="hidden" name="total" value="100" />
</form>
