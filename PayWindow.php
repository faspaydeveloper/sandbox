<html>
<head>

    <script>
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
            
            form.merchant_tranid.value = ''+year+month+day+"_"+hour+min+sec;
        }
    </script>
</head>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
        <h1>Payment Window</h1>
        </div>
        <?php 
        print_r($_POST)
        ?>
        <form action="" method="post" id="theForm" name="theForm">
            <p>Merchant ID <input type="text" name="merchant_id" class="form-control" value="MI_test" required></p>
            <p>Password <input type="password" name="password" class="form-control" value="tjzga" required></p>
            <p>Merchant TranID <input type="button" value="Generate ID" onClick="generateTranID(document.theForm);" />
            <input type="text" name="merchant_tranid" class="form-control"  required></p>
            <p>Amount <input type="text" name="amount" class="form-control" value="100000.50" required></p>
            <p>Customer Name<input type="text" name="custname" class="form-control" value="test" required></p>
            <p>Customer Email<input type="text" name="custemail" class="form-control" value="test@mediaindonusa.com" required></p>
            <p>Description<input type="text" name="desc" class="form-control" value="Pembelian Barang" required></p>

            <button type="submit" name="submit" class="btn btn-success">Submit</button></a>
        </form>

        <?php
            if(isset($_POST['submit'])){
                $merchant_id=$_POST['merchant_id'];
                $password=$_POST['password'];
                $merchant_tranid=$_POST['merchant_tranid'];
                $amount=$_POST['amount'];
                $custname=$_POST['custname'];
                $custemail=$_POST['custemail'];
                $desc=$_POST['desc'];

                $hes='##'.strtoupper($merchant_id).'##'.strtoupper($password).'##'.$merchant_tranid.'##'.$amount.'##'.'0'.'##';

                $signaturecc=sha1('##'.strtoupper($merchant_id).'##'.strtoupper($password).'##'.$merchant_tranid.'##'.$amount.'##'.'0'.'##');


                $post = array(                  
                          "LANG"                    => "",           
                          "MERCHANTID"              => $merchant_id,                                    
                          "PAYMENT_METHOD"          => '1',
                          "MERCHANT_TRANID"         => $merchant_tranid,       
                          "CURRENCYCODE"            => 'IDR',
                          "AMOUNT"                  => $amount,
                          "CUSTNAME"                => $custname,
                          "CUSTEMAIL"               => $custemail,                                           
                          "DESCRIPTION"             => $desc,
                          "RETURN_URL"              => 'http://localhost:8080/sandbox/assets/nativecredit/PayWindow.php',
                          "SIGNATURE"               => $signaturecc,                
                          "PYMT_IND"                => "",
                          "PYMT_CRITERIA"           => "",
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

                $string = '<form method="post" name="form" action="https://ucdev.faspay.co.id/payment/PaymentWindow.jsp">';
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
