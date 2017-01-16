<html>
<head>
</head>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
        <h1>Payment Direct</h1>
        </div>

        <?php 
               print_r($_GET);
            
        ?>
        <form action="" method="post" id="theForm" name="theForm">
            <p>Transaction Type
              <select name="transaction_type" class="form-control">
                <option value="1">1-Sales</option>
                <option value="3">3-Authorize</option>
              </select>
            </p>
            <p>Merchant ID <input type="text" name="merchant_id" class="form-control" value="MI_test" required></p>
            <p>Password <input type="password" name="password" class="form-control" value="tjzga" required></p>
            <p>Merchant TranID <input type="text" name="merchant_tranid" class="form-control" value="<?php echo date('Ymd_his') ?>" required></p>
            <p>Amount <input type="text" name="amount" class="form-control" value="100000.50" required></p>
            <p>Customer Name<input type="text" name="custname" class="form-control" value="test" required></p>
            <p>Customer Email<input type="text" name="custemail" class="form-control" value="test@mediaindonusa.com" required></p>
            <p>Description<input type="text" name="desc" class="form-control" value="Pembelian Barang" required></p>

            <h3> Card Registration </h3>
            <p>Card Name <input type="text" name="card_name" class="form-control" value="faspay" required></p>
            <p>Card Type 
              <select name="card_type" class="form-control">
                <option value="M">MasterCard</option>
                <option value="V" selected>Visa</option>
                <option value="J">JCB</option>
                <option value="A">Amex</option>
              </select>
            </p>
            <p>Card No <input type="text" name="card_no" class="form-control" value="4434260000000008" required></p>
            <p>Card Cvc <input type="text" name="card_cvc" class="form-control" value="101" required></p>

            <p>Expiry Month
              <select name="expiry_month" class="form-control">
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
              </select>
            </p>

            <p>Expiry Year
              <select name="expiry_year" class="form-control">
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
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
              </select>
            </p>

             <p>Card Issuer Bank Country Code
              <select name="card_issuer_bank_country_code" class="form-control">
                <option value="ID" selected>Indonesia</option>
              </select>
            </p>

            <button type="submit" name="submit" class="btn btn-success">Submit</button></a>
        </form>

        <?php
        if(isset($_POST['submit'])){
            $transaction_type=$_POST['transaction_type'];
            $passw=$_POST['password'];
            $mid=$_POST['merchant_id'];
            $trx_id=$_POST['merchant_tranid'];
            $bill_total=$_POST['amount'];
            $cust_name=$_POST['custname'];
            $cust_email=$_POST['custemail'];
            $desc=$_POST['desc'];

            $card_name=$_POST['card_name'];
            $card_no=$_POST['card_no'];
            $card_type=$_POST['card_type'];
            $card_cvc=$_POST['card_cvc'];
            $expiry_month=$_POST['expiry_month'];
            $expiry_year=$_POST['expiry_year'];
            $country=$_POST['card_issuer_bank_country_code'];


            $hes='##'.strtoupper($mid).'##'.strtoupper($passw).'##'.$trx_id.'##'.$bill_total.'##'.'0'.'##';

            $signaturecc=sha1('##'.strtoupper($mid).'##'.strtoupper($passw).'##'.$trx_id.'##'.$bill_total.'##'.'0'.'##');

            $post = array(       
                        "PAYMENT_METHOD"          => '1',
                        "TRANSACTIONTYPE"         => $transaction_type,              
                        "MERCHANTID"              => $mid,                                    
                        "MERCHANT_TRANID"         => $trx_id,  
                        "PYMT_IND"                => "",
                        "PYMT_CRITERIA"           => "",     
                        "CURRENCYCODE"            => 'IDR',
                        "AMOUNT"                  => $bill_total,
                        "SIGNATURE"               => $signaturecc,
                        "CUSTNAME"                => $cust_name,
                        "CUSTEMAIL"               => $cust_email,
                        "SHOPPER_IP"              => '202.153.30.118',                                           
                        "DESCRIPTION"             => $desc,
                        "RESPONSE_TYPE"           => '1', 
                        "RETURN_URL"              => 'http://localhost:8080/sandbox/assets/nativecredit/PayDirect.php',
                        "CARDNO"                 => $card_no,
                        "CARDNAME"               => $card_name,
                        "CARDTYPE"               => $card_type,
                        "CARDCVC"                => $card_cvc,
                        "EXPIRYMONTH"            => $expiry_month,
                        "EXPIRYYEAR"             => $expiry_year,
                        "CARD_ISSUER_BANK_COUNTRY_CODE"   => $country,
                        "BILLING_ADDRESS"           => '',
                          "BILLING_ADDRESS_CITY"             => '',
                          "BILLING_ADDRESS_REGION"      => '',
                          "BILLING_ADDRESS_STATE"       => '',
                          "BILLING_ADDRESS_POSCODE"     => '',
                          "BILLING_ADDRESS_COUNTRY_CODE"        => '',
                          "RECEIVER_NAME_FOR_SHIPPING"      => '',
                          "SHIPPING_ADDRESS"            => '',
                          "SHIPPING_ADDRESS_CITY"       => '',
                          "SHIPPING_ADDRESS_REGION"     => '',
                          "SHIPPING_ADDRESS_STATE"      => '',
                          "SHIPPING_ADDRESS_POSCODE"        => '',
                          "SHIPPING_ADDRESS_COUNTRY_CODE"   => '',
                          "SHIPPINGCOST"            => "",
                          "PHONE_NO"                => '', 
                          "MREF1"                   => "",
                          "MREF2"                   => "",     
                          "MREF3"                   => "",
                          "MREF4"                   => "",
                          "MREF5"                   => "",
                          "MREF6"                   => "",
                          "MREF7"                   => "",
                          "MREF8"                   => "",
                          "MREF9"                   => "",
                          "MREF10"                  => "",
                          "MPARAM1"                 => "",
                          "MPARAM2"                 => "",
                          "CUSTOMER_REF"            => "",
                          "FRISK1"                    => "", 
                          "FRISK2"                    => "", 
                          "LANG"                    => "", 
                          "DOMICILE_ADDRESS"        => "",
                          "DOMICILE_ADDRESS_CITY"        => "",
                          "DOMICILE_ADDRESS_REGION"        => "",
                          "DOMICILE_ADDRESS_STATE"        => "",
                          "DOMICILE_ADDRESS_POSCODE"        => "",
                          "DOMICILE_ADDRESS_COUNTRY_CODE"        => "",
                          "DOMICILE_PHONE_NO"        => "",
                          "handshake_url"        => "",
                          "handshake_param"        => "",
                                              
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

    </div>

</body>
</html>
