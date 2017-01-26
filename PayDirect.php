<html>
<head>
<TITLE>Faspay - Payment Direct API Test</TITLE>
<script src="sha1.js"></script>
<script language="JavaScript">
  function generateHash(form) {
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

    form.MERCHANT_TRANID.value = ''+year+month+day+'_'+hour+min+sec;
  }
</script>
</head>

<body >
<p align="left"><b>This is the payment test page for integrating to Faspay Payment Direct:</b></p>
<?php 
      echo "<div class='alert alert-success' style='text-transform:uppercase;' ><pre>";
      print_r($_GET);
      echo "</pre></div>";
  
?>
<form ACTION="" method="POST" name="theForm" content-type="application/x-www-form-urlencoded">
  <div align="center"><center>
    <table border="1" cellspacing="1" cellpadding="2">
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
          <select name="TRANSACTIONTYPE" size="1" required>
            <option value="1" selected>Sales</option>
            <option value="3">Authorize</option>
          </select></td>
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
        <td>MERCHANT_TRANID &nbsp;&nbsp <input type="button" value="Generate ID" onClick="generateTranID(document.theForm);"/> </td>
        <td> <input name="MERCHANT_TRANID" size="30" value="" required> </td>
      </tr>
       <!-- PAYMENT_METHOD -->
      <tr>
        <td>Payment method  <font color="red">&nbsp;</font></td>
        <td>PAYMENT METHOD</td>
        <td> <input name="PAYMENT_METHOD" size="30" value="1"></td>
      </tr>
       <!-- PYMT_IND -->
      <tr>
        <td>Payment Indicator (use symbol ; to delimit multiple indicators) <font color="red">&nbsp;</font></td>
        <td>PAYMENT INDICATOR</td>
        <td> <input name="PYMT_IND" type="text" size="30" value="">
          i.e. card_range_ind;3rd_party_ind</td>
      </tr>
       <!-- PYMT_CRITERIA -->
      <tr>
        <td>Payment Criteria (use symbol ; to delimit multiple indicators) <font color="red">&nbsp;</font></td>
        <td>PAYMENT CRITERIA</td>
        <td> <input name="PYMT_CRITERIA" size="30" value="">
          i.e. pbb_only;yes</td>
      </tr>
       <!-- CURRENCYCODE -->
      <tr> 
        <td>Currency<font color="red"><b>**</b></font></td>
        <td>CURRENCY_CODE</td>
        <td><select name="CURRENCYCODE" size="1" required>
            <option  value=""></option>
            <option value="AED">AED</option>
            <option value="AUD">AUD</option>
            <option value="BND">BND</option>
            <option value="CHF">CHF</option>
            <option value="CNY">CNY</option>
            <option value="EGP">EGP</option>
            <option value="EUR">EUR</option>
            <option value="GBP">GBP</option>
            <option value="HKD">HKD</option>
            <option selected value="IDR">IDR</option>
            <option value="INR">INR</option>
            <option value="JPY">JPY</option>
            <option value="KRW">KRW</option>
            <option value="LKR">LKR</option>
            <option value="MYR">MYR</option>
            <option value="NZD">NZD</option>
            <option value="PHP">PHP</option>
            <option value="PKR">PKR</option>
            <option value="SAR">SAR</option>
            <option value="SEK">SEK</option>
            <option value="SGD">SGD</option>
            <option value="THB">THB</option>
            <option value="TWD">TWD</option>
            <option value="USD">USD</option>
            <option value="ZAR">ZAR</option>
          </select></td>
      </tr>
       <!-- AMOUNT -->
      <tr> 
        <td>Transaction amount (2 decimal, e.g. 54.20)<font color="red"><b>**</b></font></td>
        <td>AMOUNT</td>
        <td> <input name="AMOUNT" size="20" value="100000.50" required> </td>
      </tr>
     <!-- DESCRIPTION -->
      <tr> 
        <td>Description for transaction, maximum 100 characters</td>
        <td>DESCRIPTION</td>
        <td> <input name="DESCRIPTION" size="100" value="Pembelian Barang"> </td>
      </tr>
       <!-- CUSTNAME -->
      <tr> 
        <td>Customer name<font color="red"><b>**</b></font></td>
        <td>CUSTNAME</td>
        <td><font face="Arial"> 
          <input type="text"  size="30" maxlength="50" value="test" name="CUSTNAME" required>
          </font></td>
      </tr> 
       <!-- CUSTEMAIL -->     
      <tr> 
        <td>Customer email<font color="red"><b>**</b></font></td>
        <td>CUSTEMAIL</td>
        <td><font face="Arial"> 
          <input type="text"  size="30" maxlength="50" value="test@mediaindonusa.com" name="CUSTEMAIL" required>
          </font></td>
      </tr>
      <!-- SHOPPER_IP -->
      <tr> 
        <td>IP address of the customer. <font color="red"><b>**</b></font></td>
        <td>SHOPPER_IP</td>
        <td><font face="Arial"> 
          <input type="text"  size="15" value="202.153.30.118" name="SHOPPER_IP" required>
          </font></td>
      </tr>
      <!-- RESPONSE_TYPE -->     
      <tr> 
        <td>Indicate how the system should provide the transaction result. <font color="red"><b>**</b></font></td>
        <td>RESPONSE_TYPE</td>
        <td><font face="Arial"> 
          <input type="text"  size="1" value="1" name="RESPONSE_TYPE" required>
          </font></td>
      </tr>
       <!-- PHONE_NO -->
      <tr> 
        <td>Customer Phone Number</td>
        <td>PHONE_NO</td>
        <td><input name="PHONE_NO" size="10" ></td>
      </tr>  
       <!-- RETURN_URL -->    
      <tr> 
        <td>Indicate the return page</td>
        <td>RETURN_URL</td>
        <td> <input name="RETURN_URL" size="55" value="http://localhost:8080/nativecredit/direct.php"> </td>
      </tr>
       <!-- handshake_url -->
      <tr>
        <td>Handshake URL</td>
        <td>handshake_url</td>
        <td> <input name="handshake_url" size="55" value="https://ucdev.faspay.co.id:443/API2/TestApiReturn.jsp"> </td>
      </tr>
       <!-- handshake_param -->
      <tr>
        <td>Handshake Param</td>
        <td>handshake_param</td>
        <td> <input name="handshake_param" size="55" value="jhsgiureg"> </td>
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
        <td colspan=3> <strong><font color="#3300FF">Card registration : </font></strong> 
        </td>
      </tr>
      <!-- CARDNO -->
      <tr> 
        <td>Shopper’s Credit Card number</td>
        <td>CARDNO</td>
        <td><input name="CARDNO" size="20" value="4434260000000008" required></td>
      </tr>
      <!-- CARDNAME -->
      <tr> 
        <td>Name on the Credit Card</td>
        <td>CARDNAME</td>
        <td><input name="CARDNAME" size="100" value="faspay" required></td>
      </tr>
      <!-- CARDTYPE -->
      <tr> 
        <td>Indicates the card type used.<font color="red"><b>**</b></font></td>
        <td>CARDTYPE</td>
        <td><select name="CARDTYPE" size="1" required>
            <option value="M">MasterCard</option>
            <option value="V" selected>Visa</option>
            <option value="A">Amex</option>
            <option value="J">JCB</option>
          </select></td>
      </tr>
      <!-- EXPIRYMONTH -->
      <tr> 
        <td>Month<font color="red"><b>**</b></font></td>
        <td>EXPIRYMONTH</td>
        <td><select name="EXPIRYMONTH" size="1" required>
            <option value="01">January</option>
            <option value="02">February</option>
            <option value="03">March</option>
            <option value="04">April</option>
            <option value="05" selected>May</option>
            <option value="06">June</option>
            <option value="07">July</option>
            <option value="08">August</option>
            <option value="09">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
          </select></td>
      </tr>
      <!-- EXPIRYYEAR -->
      <tr> 
        <td>Year<font color="red"><b>**</b></font></td>
        <td>EXPIRYYEAR</td>
        <td><select name="EXPIRYYEAR" size="1" required>
            <option value="2017" selected>2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
            <option value="2028">2028</option>
            <option value="2029">2029</option>
            <option value="2030">2030</option>
            <option value="2031">2031</option>
          </select></td>
      </tr>
      <!-- CARDCVC -->
      <tr> 
        <td>Card Verification Number (Last 3 digits located usually on the back of shopper’s credit card)</td>
        <td>CARDCVC</td>
        <td><input name="CARDCVC" size="4" value="101" required></td>
      </tr>
      <!-- CARD_ISSUER_BANK_COUNTRY_CODE -->
      <tr> 
        <td>Country of the credit card issuing bank <font color="red"><b></b></font></td>
        <td>CARD_ISSUER_BANK_COUNTRY_CODE</td>
        <td><select name="CARD_ISSUER_BANK_COUNTRY_CODE" size="1">
            <option value="ID">Indonesia</option>
          </select></td>
      </tr>
      <tr> 
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>

      <tr> 
        <td colspan=3> <strong><font color="#3300FF">For more acurate fraud analysis, 
          please provide the following details of your customer:</font></strong> 
        </td>
      </tr>
       <!-- BILLING_ADDRESS -->
      <tr> 
        <td>Billing address (no and street only, max 200 characters)</td>
        <td>BILLING_ADDRESS</td>
        <td><input name="BILLING_ADDRESS" size="40" value="57, Jalan Sentosa"></td>
      </tr>
       <!-- BILLING_ADDRESS_CITY -->
      <tr> 
        <td>Billing address city (max 50 characters)</td>
        <td>BILLING_ADDRESS_CITY</td>
        <td><input name="BILLING_ADDRESS_CITY" size="40" value="Petaling Jaya"></td>
      </tr>
       <!-- BILLING_ADDRESS_REGION -->
      <tr> 
        <td>Billing address region (max 100 characters)</td>
        <td>BILLING_ADDRESS_REGION</td>
        <td><input name="BILLING_ADDRESS_REGION" size="40" value=""></td>
      </tr>
       <!-- BILLING_ADDRESS_STATE -->
      <tr> 
        <td>Billing address state (max 100 characters)</td>
        <td>BILLING_ADDRESS_STATE</td>
        <td><input name="BILLING_ADDRESS_STATE" size="40" value="Selangor"></td>
      </tr>
       <!-- BILLING_ADDRESS_POSCODE -->
      <tr> 
        <td>Billing address poscode (max 10 characters)</td>
        <td>BILLING_ADDRESS_POSCODE</td>
        <td><input name="BILLING_ADDRESS_POSCODE" size="40" value="47610"></td>
      </tr>
       <!-- BILLING_ADDRESS_COUNTRY_CODE -->
      <tr> 
        <td>Billing address country (coded)</td>
        <td>BILLING_ADDRESS_COUNTRY_CODE</td>
        <td><input name="BILLING_ADDRESS_COUNTRY_CODE" size="10" value="MY"></td>
      </tr>
       <!-- RECEIVER_NAME_FOR_SHIPPING -->
      <tr> 
        <td>Receiver Name (max 100 characters)</td>
        <td>RECEIVER_NAME_FOR_SHIPPING</td>
        <td><input name="RECEIVER_NAME_FOR_SHIPPING" size="40" value="John Aims"></td>
      </tr>
       <!-- SHIPPING_ADDRESS -->
      <tr> 
        <td>Shipping address (no and street only) (max 200 characters)</td>
        <td>SHIPPING_ADDRESS</td>
        <td><input name="SHIPPING_ADDRESS" size="40" value="57, Jalan Sentosa"></td>
      </tr>
       <!-- SHIPPING_ADDRESS_CITY -->
      <tr> 
        <td>Shipping address city (max 50 characters)</td>
        <td>SHIPPING_ADDRESS_CITY</td>
        <td><input name="SHIPPING_ADDRESS_CITY" size="40" value="Petaling Jaya"></td>
      </tr>
       <!-- SHIPPING_ADDRESS_REGION -->
      <tr> 
        <td>Shipping address region (max 100 characters)</td>
        <td>SHIPPING_ADDRESS_REGION</td>
        <td><input name="SHIPPING_ADDRESS_REGION" size="40" value=""></td>
      </tr>
       <!-- SHIPPING_ADDRESS_STATE -->
      <tr> 
        <td>Shipping address state (max 100 characters)</td>
        <td>SHIPPING_ADDRESS_STATE</td>
        <td><input name="SHIPPING_ADDRESS_STATE" size="40" value="Selangor"></td>
      </tr>
       <!-- SHIPPING_ADDRESS_POSCODE -->
      <tr> 
        <td>Shipping address poscode (max 10 characters)</td>
        <td>SHIPPING_ADDRESS_POSCODE</td>
        <td><input name="SHIPPING_ADDRESS_POSCODE" size="40" value="47610"></td>
      </tr>
       <!-- SHIPPING_ADDRESS_COUNTRY_CODE -->
      <tr> 
        <td>Shipping address country (coded)</td>
        <td>SHIPPING_ADDRESS_COUNTRY_CODE</td>
        <td><input name="SHIPPING_ADDRESS_COUNTRY_CODE" size="10" value="MY"></td>
      </tr>
       <!-- SHIPPINGCOST -->
      <tr> 
        <td>Shipping cost (2 decimal, e.g. 54.20)</td>
        <td>SHIPPINGCOST</td>
        <td><input name="SHIPPINGCOST" size="10" value="2.00"></td>
      </tr>
       <!-- DOMICILE_ADDRESS -->
      <tr> 
        <td>Domicile address (no and street only, max 200 characters)</td>
        <td>DOMICILE_ADDRESS</td>
        <td><input name="DOMICILE_ADDRESS" size="40" value="57, Jalan Sentosa"></td>
      </tr>
      <!-- DOMICILE_ADDRESS_CITY -->
      <tr> 
        <td>Domicile address city (max 50 characters)</td>
        <td>DOMICILE_ADDRESS_CITY</td>
        <td><input name="DOMICILE_ADDRESS_CITY" size="40" value="Petaling Jaya"></td>
      </tr>
      <!-- DOMICILE_ADDRESS_REGION -->
      <tr> 
        <td>Domicile address region (max 100 characters)</td>
        <td>DOMICILE_ADDRESS_REGION</td>
        <td><input name="DOMICILE_ADDRESS_REGION" size="40" value=""></td>
      </tr>
      <!-- DOMICILE_ADDRESS_STATE -->
      <tr> 
        <td>Domicile address state (max 100 characters)</td>
        <td>DOMICILE_ADDRESS_STATE</td>
        <td><input name="DOMICILE_ADDRESS_STATE" size="40" value="Selangor"></td>
      </tr>
      <!-- DOMICILE_ADDRESS_POSCODE -->
      <tr> 
        <td>Domicile address poscode (max 10 characters)</td>
        <td>DOMICILE_ADDRESS_POSCODE</td>
        <td><input name="DOMICILE_ADDRESS_POSCODE" size="40" value="47610"></td>
      </tr>
      <!-- DOMICILE_ADDRESS_COUNTRY_CODE -->
      <tr> 
        <td>Domicile address country (coded)</td>
        <td>DOMICILE_ADDRESS_COUNTRY_CODE</td>
        <td><input name="DOMICILE_ADDRESS_COUNTRY_CODE" size="10" value="MY"></td>
      </tr> 
      <!-- DOMICILE_PHONE_NO -->  
      <tr> 
        <td>Domicile phone no (max 20 characters)</td>
        <td>DOMICILE_PHONE_NO</td>
        <td><input name="DOMICILE_PHONE_NO" size="40" value="+60-03-34567890"></td>
      </tr>

      <tr> 
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="4">&nbsp;</td>
      </tr>       
      <tr> 
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>


      <tr> 
        <td colspan=3> <strong><font color="#3300FF">Additional Order Information to be stored in Faspay</font></strong> 
        </td>
      </tr>
      <!-- MREF1 -->
      <tr> 
        <td>Item Description 1 (max 100 characters)</td>
        <td>MREF1</td>
        <td><input name="MREF1" size="100" ></td>
      </tr>
      <!-- MREF2 -->
      <tr> 
        <td>Item Description 2 (max 100 characters)</td>
        <td>MREF2</td>
        <td><input name="MREF2" size="100" ></td>
      </tr>
      <!-- MREF3 -->
      <tr> 
        <td>Item Description 3 (max 100 characters)</td>
        <td>MREF3</td>
        <td><input name="MREF3" size="100" ></td>
      </tr>
      <!-- MREF4 -->
      <tr> 
        <td>Item Description 4 (max 100 characters)</td>
        <td>MREF4</td>
        <td><input name="MREF4" size="100" ></td>
      </tr>  
      <!-- MREF5 -->   
      <tr> 
        <td>Item Description 5 (max 100 characters)</td>
        <td>MREF5</td>
        <td><input name="MREF5" size="100" ></td>
      </tr> 
      <!-- MREF6 --> 
      <tr> 
        <td>Item Description 6 (max 100 characters)</td>
        <td>MREF6</td>
        <td><input name="MREF6" size="100" ></td>
      </tr>   
      <!-- MREF7 -->
      <tr> 
        <td>Item Description 7 (max 100 characters)</td>
        <td>MREF7</td>
        <td><input name="MREF7" size="100" ></td>
      </tr>
      <!-- MREF8 -->
      <tr> 
        <td>Item Description 8 (max 100 characters)</td>
        <td>MREF8</td>
        <td><input name="MREF8" size="100" ></td>
      </tr>
      <!-- MREF9 -->
      <tr> 
        <td>Item Description 9 (max 100 characters)</td>
        <td>MREF9</td>
        <td><input name="MREF9" size="100" ></td>
      </tr>
      <!-- MREF10 -->
      <tr> 
        <td>Item Description 10 (max 100 characters)</td>
        <td>MREF10</td>
        <td><input name="MREF10" size="100" ></td>
      </tr>


      <tr> 
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>


      <tr> 
        <td colspan=3> <strong><font color="#3300FF">Additional Parameter to be passed back in response (not stored)</font></strong> 
        </td>
      </tr>
      <!-- MPARAM1 -->      
      <tr> 
        <td>MPARAM1 (max 50 characters)</td>
        <td>MPARAM1</td>
        <td><input name="MPARAM1" size="20" ></td>
      </tr> 
      <!-- MPARAM2 -->       
      <tr> 
        <td>MPARAM2 (max 50 characters)</td>
        <td>MPARAM2</td>
        <td><input name="MPARAM2" size="20" ></td>
      </tr> 


      <tr> 
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>


      <tr> 
        <td colspan=3> <strong><font color="#3300FF">Additional Parameter to be 
          passed back to bank (if applicable)</font></strong> </td>
      </tr>    
      <!-- CUSTOMER_REF -->  
      <tr> 
        <td>Customer refereces by bank (max 50 characters, may get truncated by bank)</td>
        <td>CUSTOMER_REF</td>
        <td><input name="CUSTOMER_REF" size="20" ></td>
      </tr>      
      <tr> 
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="4">&nbsp;</td>
        </tr>


      <tr> 


        <td colspan=6> <strong><font color="#3300FF">Additional Parameter to be 
          passed to FDS (if applicable)</font></strong> </td>
      </tr>
      <!-- FRISK1 -->
      <tr> 
        <td>FRISK1 (max 50 characters)</td>
        <td>FRISK1</td>
        <td colspan="4"><input name="FRISK1" size="20" maxlength="50" ></td>
      </tr>
      <!-- FRISK2 -->
      <tr> 
        <td>FRISK2 (max 50 characters)</td>
        <td>FRISK2</td>
        <td colspan="4"><input name="FRISK2" size="20" maxlength="50" ></td>
      </tr>


      <tr> 
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="4">&nbsp;</td>
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
      $hes='##'.strtoupper($_POST['MERCHANTID']).'##'.strtoupper($_POST['TXN_PASSWORD']).'##'.$_POST['MERCHANT_TRANID'].'##'.$_POST['AMOUNT'].'##'.'0'.'##';
      $signaturecc=sha1($hes);
      $post = array(       
                  "PAYMENT_METHOD"                  => $_POST['PAYMENT_METHOD'],
                  "TRANSACTIONTYPE"                 => $_POST['TRANSACTIONTYPE'],              
                  "MERCHANTID"                      => $_POST['MERCHANTID'],                                    
                  "MERCHANT_TRANID"                 => $_POST['MERCHANT_TRANID'],  
                  "PYMT_IND"                        => $_POST['PYMT_IND'],
                  "PYMT_CRITERIA"                   => $_POST['PYMT_CRITERIA'],     
                  "CURRENCYCODE"                    => $_POST['CURRENCYCODE'],
                  "AMOUNT"                          => $_POST['AMOUNT'],
                  "CUSTNAME"                        => $_POST['CUSTNAME'],
                  "CUSTEMAIL"                       => $_POST['CUSTEMAIL'],                                          
                  "DESCRIPTION"                     => $_POST['DESCRIPTION'],
                  "RETURN_URL"                      => $_POST['RETURN_URL'],
                  "SIGNATURE"                       => $signaturecc,
                  "SHOPPER_IP"                      => $_POST['SHOPPER_IP'],                                           
                  "RESPONSE_TYPE"                   => $_POST['RESPONSE_TYPE'], 
                  "CARDNO"                          => $_POST['CARDNO'],
                  "CARDNAME"                        => $_POST['CARDNAME'],
                  "CARDTYPE"                        => $_POST['CARDTYPE'],
                  "CARDCVC"                         => $_POST['CARDCVC'],
                  "EXPIRYMONTH"                     => $_POST['EXPIRYMONTH'],
                  "EXPIRYYEAR"                      => $_POST['EXPIRYYEAR'],
                  "CARD_ISSUER_BANK_COUNTRY_CODE"   => $_POST['CARD_ISSUER_BANK_COUNTRY_CODE'],
                  "BILLING_ADDRESS"                 => $_POST['BILLING_ADDRESS'],
                  "BILLING_ADDRESS_CITY"            => $_POST['BILLING_ADDRESS_CITY'],
                  "BILLING_ADDRESS_REGION"          => $_POST['BILLING_ADDRESS_REGION'],
                  "BILLING_ADDRESS_STATE"           => $_POST['BILLING_ADDRESS_STATE'],
                  "BILLING_ADDRESS_POSCODE"         => $_POST['BILLING_ADDRESS_POSCODE'],
                  "BILLING_ADDRESS_COUNTRY_CODE"    => $_POST['BILLING_ADDRESS_COUNTRY_CODE'],
                  "RECEIVER_NAME_FOR_SHIPPING"      => $_POST['RECEIVER_NAME_FOR_SHIPPING'],
                  "SHIPPING_ADDRESS"                => $_POST['SHIPPING_ADDRESS'],
                  "SHIPPING_ADDRESS_CITY"           => $_POST['SHIPPING_ADDRESS_CITY'],
                  "SHIPPING_ADDRESS_REGION"         => $_POST['SHIPPING_ADDRESS_REGION'],
                  "SHIPPING_ADDRESS_STATE"          => $_POST['SHIPPING_ADDRESS_STATE'],
                  "SHIPPING_ADDRESS_POSCODE"        => $_POST['SHIPPING_ADDRESS_POSCODE'],
                  "SHIPPING_ADDRESS_COUNTRY_CODE"   => $_POST['SHIPPING_ADDRESS_COUNTRY_CODE'],
                  "SHIPPINGCOST"                    => $_POST['SHIPPINGCOST'],                  
                  "PHONE_NO"                        => $_POST['PHONE_NO'],
                  "MREF1"                           => $_POST['MREF1'],
                  "MREF2"                           => $_POST['MREF2'],
                  "MREF3"                           => $_POST['MREF3'],
                  "MREF4"                           => $_POST['MREF4'],
                  "MREF5"                           => $_POST['MREF5'],
                  "MREF6"                           => $_POST['MREF6'],
                  "MREF7"                           => $_POST['MREF7'],
                  "MREF8"                           => $_POST['MREF8'],
                  "MREF9"                           => $_POST['MREF9'],
                  "MREF10"                          => $_POST['MREF10'],
                  "MPARAM1"                         => $_POST['MPARAM1'],
                  "MPARAM2"                         => $_POST['MPARAM2'],
                  "CUSTOMER_REF"                    => $_POST['CUSTOMER_REF'],
                  "FRISK1"                          => $_POST['FRISK1'],
                  "FRISK2"                          => $_POST['FRISK2'],
                  "DOMICILE_ADDRESS"                => $_POST['DOMICILE_ADDRESS'],
                  "DOMICILE_ADDRESS_CITY"           => $_POST['DOMICILE_ADDRESS_CITY'],
                  "DOMICILE_ADDRESS_REGION"         => $_POST['DOMICILE_ADDRESS_REGION'],
                  "DOMICILE_ADDRESS_STATE"          => $_POST['DOMICILE_ADDRESS_STATE'],
                  "DOMICILE_ADDRESS_POSCODE"        => $_POST['DOMICILE_ADDRESS_POSCODE'],
                  "DOMICILE_ADDRESS_COUNTRY_CODE"   => $_POST['DOMICILE_ADDRESS_COUNTRY_CODE'],
                  "DOMICILE_PHONE_NO"               => $_POST['DOMICILE_PHONE_NO'],
                  "handshake_url"                   => $_POST['handshake_url'],
                  "handshake_param"                 => $_POST['handshake_param'],    
                                        
      );
          $string = '<form method="post" name="form" action="https://ucdev.faspay.co.id/payment/PaymentInterface.jsp">';
          if ($post != null) {
                   foreach ($post as $name=>$value) {
              $string .= '<input type="hidden" name="'.$name.'" value="'.$value.'">';
              }
          }
          $string .= '</form>';
          $string .= '<script> document.form.submit();</script>';
          echo $string;
  }
?>



</body>
</html>
