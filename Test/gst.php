<html>
<tr> 
                <td>Amount Paid</td>
                <td><input type="text" name="paid"input id="price"></td>
				 <br><br>
                <td><button onclick="getPrice()">GST</button></td>
                <br><br>
				</tr>
				 <tr>
	            <td>GST</td>
	            <td><input readonly id="total"></td>
            </tr> 
<script>
getPrice = function() {
        var numVal1 = Number(document.getElementById("price").value);
        var totalValue = numVal1 - (numVal1/107*7)
        document.getElementById("total").value = totalValue.toFixed(2);
		}
		</script>
		<html>