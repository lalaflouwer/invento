<html>
<input type="text" id="txt1"  onkeyup="sum();" />
<input type="text" id="txt2"  onkeyup="sum();" />
<input type="text" id="txt3" />
<script>
function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt3').value = result;
            }
        }
		</script>
		</html>