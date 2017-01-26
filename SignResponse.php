<html>
<head>
<TITLE>Faspay - Generate Signature Test</TITLE>
<script src="sha1.js"></script>
<script language="JavaScript">
	function generateHash(form) {
	  var actionurl = form.actionurl.value;
	  form.action = actionurl;

	  if(form.GEN_HASH.value == "Yes"){
		var str = "##" + form.MERCHANTID.value.toUpperCase() + "##" + form.TXN_PASSWORD.value.toUpperCase() + "##" + form.MERCHANT_TRANID.value.toUpperCase() + "##" + form.AMOUNT.value.toUpperCase() + "##0##";
		form.SIGNATURE.value = hex_sha1(str);
		alert (str);
	  }
	}
	function generateTranID(form){
		var date = new Date();

		var yy = date.getFullYear();
		var m = date.getMonth() + 1;
		var d  = date.getDate();

		var day = (d < 10) ? '0' + d : d;
		var month = (m < 10) ? '0' + m : m;
		var year = (yy < 1000) ? yy + 2000 : yy;

		var hh = date.getHours();
		var mm = date.getMinutes();
		var ss = date.getSeconds();

		var hour = (hh<10)?'0'+hh:hh;
		var min = (mm<10)?'0'+mm:mm;
		var sec = (ss<10)?'0'+ss:ss;

		form.merchant_tranid.value = ''+year+month+day+'_'+hour+min+sec;
	}
</script>
</head>

<body >
<p align="left"><b>This is the payment test page for integrating to Generate Signature:</b></p>

<form ACTION="" method="POST" name="theForm" content-type="application/x-www-form-urlencoded">
  <div>
    <table border="1" cellspacing="1" cellpadding="2" style="width: 100%">
      <tr bgcolor="#FFFF99"> 
        <td width="301"><b>Remarks</b></td>
        <td width="320"><b>Parameter Name</b></td>
        <td width="333"><b>Value</b></td>
      </tr>
      <tr>
        <td>Merchant Id assigned by Faspay<font color="red"><b>**</b></font></td>
        <td>MERCHANTID</td>
        <td> <input name="merchant_id" size="30" value="TEST01" required> </td>
      </tr>
      <tr>
        <td>Merchant Reference no (must be unique, max 100 characaters)<font color="red"><b>**</b></font></td>
        <td>MERCHANT_TRANID &nbsp;&nbsp <input type="button" value="Generate ID" onClick="generateTranID(document.theForm);"/> </td>
        <td> <input name="merchant_tranid" size="30" value="" required> </td>
      </tr>
      <tr> 
        <td>Transaction amount (2 decimal, e.g. 54.20)<font color="red"><b>**</b></font></td>
        <td>AMOUNT</td>
        <td> <input name="amount" size="20" value="100.00" required> </td>
      </tr>
      <tr> 
        <td>Faspay assigned transaction id during authorization request</td>
        <td>TRANSACTION</td>
        <td> <input name="transaction_id" size="20" value="50126" required> </td>
      </tr>
      <tr> 
        <td colspan=2> <font color="#3300FF">Please enter your merchant transaction password </font>:
        <br>This is only required for testing with this page to generate your transaction signature. 
        <br>For production, you should never submit your transaction password.
        </td>
        <td> <input name="sTxnPassword" size="50" value="059B8125F" required> </td>
      </tr>
      <tr> 
        <td colspan="4" align="center"> 
        <button type="submit" name="submit" class="btn btn-success">Submit</button></a></td>
      </tr>
    </table>    

  </div>
</form>
<?php
  if(isset($_POST['submit'])){
    $merchant_id = $_POST['merchant_id'];
        $sTxnPassword = $_POST['sTxnPassword'];
        $merchant_tranid = $_POST['merchant_tranid'];
        $amount = $_POST['amount'];
        $transaction_id = $_POST['transaction_id'];
        $hash='##'.strtoupper($merchant_id).'##'.strtoupper($sTxnPassword).'##'.strtoupper($merchant_tranid).'##'.strtoupper($amount).'##'.strtoupper($transaction_id).'##';

        $hes = sha1($hash);
        echo strtoupper($hes);
}
?>

</body>
</html>
</html>
