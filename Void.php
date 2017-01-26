<html>
<head>
<TITLE>Faspay - Void API Test</TITLE>
<script src="sha1.js"></script>
<script language="JavaScript">
  function generateHash(form) {
    if(form.GEN_HASH.value == "Yes"){
    var str = "##" + form.MERCHANTID.value.toUpperCase() + "##" + form.TXN_PASSWORD.value.toUpperCase() + "##" + form.MERCHANT_TRANID.value.toUpperCase() + "##" + form.AMOUNT.value.toUpperCase() + "##0##";

    form.SIGNATURE.value = hex_sha1(str);
    alert (str);
    }
  }
</script>
</head>

<body >
<p align="left"><b>This is the payment test page for integrating to Faspay Void API:</b></p>
<form ACTION="" method="POST" name="theForm" content-type="application/x-www-form-urlencoded">
    <table border="1" cellspacing="1" cellpadding="2" style="width: 100%">
      <!-- Action URL -->
      <tr>
          <td>Action URL</td>
          <td colspan="2"><input name="actionurl" size="100%" value="https://ucdev.faspay.co.id/payment/PaymentInterface.jsp" disabled></td>
      </tr>
      <tr bgcolor="#FFFF99"> 
        <td width="301"><b>Remarks</b></td>
        <td width="320"><b>Parameter Name</b></td>
        <td width="333"><b>Value</b></td>
      </tr>
       <!-- Generate Hash -->
      <tr>
        <td>Generate Hash</td>
        <td>GEN_HASH</td>
        <td><select name="GEN_HASH">
          <option value="Yes" selected>Yes</option>
          <option value="No">No</option>
        </select>
        </td>
      </tr>
      <!-- TRANSACTIONTYPE -->
      <tr> 
        <td>Indicate credit card payment model to use<font color="red"><b>**</b></font></td>
        <td>TRANSACTIONTYPE</td>
        <td>
          <input name="TRANSACTIONTYPE" size="2" value="10" required>
        </td>
      </tr>
      <!-- PAYMENT_METHOD -->
      <tr>
        <td>Payment method  <font color="red">&nbsp;</font></td>
        <td>PAYMENT METHOD</td>
        <td> <input name="PAYMENT_METHOD" size="1" value="1"></td>
      </tr>
      <!-- MERCHANTID -->
      <tr>
        <td>Merchant Id assigned by Faspay<font color="red"><b>**</b></font></td>
        <td>MERCHANTID</td>
        <td> <input name="MERCHANTID" size="30" value="MI_test" required> </td>
      </tr>
       <!-- MERCHANT_TRANID -->
      <tr>
        <td>Merchant Reference no (must be unique, max 100 characaters)<font color="red"><b>**</b></font></td>
        <td>MERCHANT_TRANID &nbsp;&nbsp</td>
        <td> <input name="MERCHANT_TRANID" size="30" value="20161223_090100" required> </td>
      </tr>
      <!-- TRANSACTIONID -->
      <tr>
        <td>Faspay assigned transaction id during authorization request.<font color="red"><b>**</b></font></td>
        <td>TRANSACTIONID</td>
        <td> <input name="TRANSACTIONID" size="30" value="39515" required> </td>
      </tr>
       <!-- AMOUNT -->
      <tr> 
        <td>Transaction amount (2 decimal, e.g. 54.20)<font color="red"><b>**</b></font></td>
        <td>AMOUNT</td>
        <td> <input name="AMOUNT" size="20" value="100000.50" required> </td>
      </tr>
      <!-- RESPONSE_TYPE -->     
      <tr> 
        <td>Indicate how the system should provide the transaction result. <font color="red"><b>**</b></font></td>
        <td>RESPONSE_TYPE</td>
        <td><font face="Arial"> 
          <input type="text"  size="1" value="3" name="RESPONSE_TYPE" required>
          </font></td>
      </tr>
      <tr> 
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr> 

       <!-- Password -->     
      <tr> 
        <td colspan=2> <font color="#3300FF">Please enter your merchant transaction password </font>:
        <br>This is only required for testing with this page to generate your transaction signature. 
        <br>For production, you should never submit your transaction password.
        </td>
        <td> <input name="TXN_PASSWORD" size="50" value="tjzga"> </td>
      </tr>      
       <!-- SIGNATURE -->
      <tr> 
        <td>Transaction Signature <font color="#3300FF">(auto-generated on this test page)</font></td> 
        <td>SIGNATURE</td>       
        <td> <input name="SIGNATURE" size="50" value=""> </td>
      </tr>              
      <tr> 
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>


      <tr> 
        <td colspan="4" align="center"> 
        <input type="button" value="Generate Signature" onClick="generateHash(document.theForm);"> &nbsp;&nbsp;
        <button type="submit" name="submit" class="btn btn-success">Submit</button> &nbsp;&nbsp;
        <input type="reset" value="Cancel"> </td>
      </tr>
    </table>    

  </div>
</form>

 <?php
            if(isset($_POST['submit'])){
                $signaturecc=sha1('##'.strtoupper($_POST['MERCHANTID']).'##'.strtoupper($_POST['TXN_PASSWORD']).'##'.$_POST['MERCHANT_TRANID'].'##'.$_POST['AMOUNT'].'##'.$_POST['TRANSACTIONID'].'##');
                $post = array(
                            "PAYMENT_METHOD"                    => $_POST['PAYMENT_METHOD'],
                            "TRANSACTIONTYPE"                   => $_POST['TRANSACTIONTYPE'],
                            "MERCHANTID"                        => $_POST['MERCHANTID'],
                            "MERCHANT_TRANID"                   => $_POST['MERCHANT_TRANID'],   
                            "TRANSACTIONID"                     => $_POST['TRANSACTIONID'],
                            "AMOUNT"                            => $_POST['AMOUNT'],
                            "RESPONSE_TYPE"                     => $_POST['RESPONSE_TYPE'],
                            "SIGNATURE"                         => $signaturecc,
                );
                
                $post_string = http_build_query($post);
                $curl_connection =
                curl_init("https://ucdev.faspay.co.id/payment/PaymentInterface.jsp");
                curl_setopt($curl_connection, CURLOPT_CONNECTTIMEOUT, 30);
                curl_setopt($curl_connection, CURLOPT_USERAGENT,
                "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)");
                curl_setopt($curl_connection, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl_connection, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($curl_connection, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($curl_connection, CURLOPT_POSTFIELDS, $post_string);
                $result = curl_exec($curl_connection);
                $lines = explode(';',$result);
                $result = array();
                foreach($lines as $line){
                  list($key,$value) = array_pad(explode('=', $line, 2), 2, null);
                  $result[trim($key)] = trim($value);
                }
                
                echo "<div class='alert alert-success' style='text-transform:uppercase;' ><pre>";
                print_r($result);
                echo "</pre></div>";
                curl_close($curl_connection);
            }               
        ?>



</body>
</html>
