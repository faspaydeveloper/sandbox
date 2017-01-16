<html>
<head>
    <link rel= stylesheet href= "bootstrap/css/bootstrap.css">
    <script src="jquery-2.2.1.js"></script>
    <script type= "text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <link rel= stylesheet href= "bootstrap/css/bootstrap.min.css">
</head>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
        <h1>Credit Card Capture API</h1>
        </div>

        <form action="" method="post" id="theForm" name="theForm">
            <p>Merchant ID <input type="text" name="merchant_id" class="form-control" value="bca_ottenCofee" required></p>
            <p>Password <input type="password" name="password" class="form-control" value="wyouw" required></p>
            <p>Merchant TranID <input type="text" name="merchant_tranid" class="form-control" value="20161223_105252" required></p>
            <p>Transaction ID <input type="text" name="transaction_id" class="form-control" value="39519" required></p>
            <p>Amount <input type="text" name="amount" class="form-control" value="100.50" required></p>
            
            <button type="submit" name="submit" class="btn btn-success">Submit</button></a>
        </form>

        <?php
            if(isset($_POST['submit'])){
                $transaction_id=$_POST['transaction_id'];
                $passw=$_POST['password'];
                $mid=$_POST['merchant_id'];
                $trx_id=$_POST['merchant_tranid'];
                $bill_total=$_POST['amount'];



                $signaturecc=sha1('##'.strtoupper($mid).'##'.strtoupper($passw).'##'.$trx_id.'##'.$bill_total.'##'.$transaction_id.'##');

                $post = array(
                            "PAYMENT_METHOD"                    => '1',
                            "TRANSACTIONTYPE"                   => '2',
                            "MERCHANTID"                        => $mid,
                            "MERCHANT_TRANID"                   => $trx_id,   
                            "TRANSACTIONID"                     => $transaction_id,
                            "AMOUNT"                            => $bill_total,
                            "RESPONSE_TYPE"                     => '3',
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
                
                echo "<div class='alert alert-success' style='text-transform:uppercase;' >";
                print_r($result);
                echo "</div>";

                curl_close($curl_connection);
            }               
        ?>
    </div>

</body>
</html>