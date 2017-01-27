<html>

<?php
    $payment_status_code = 2;
    $payment_date = date('Y-m-d H:i:s');
    $payment_status_desc = "Payment Success";

    $str = 'bot'.$_POST['merchant_id'].$_POST['password'].$_POST['bill_no'].$payment_status_code;
    $signature = sha1(md5($str));

    $bodie  = "&lt;faspay&gt;<br/>";
    $bodie  .= "&lt;request&gt;Payment Notification&lt;/request&gt;<br/>";
    $bodie  .= "&lt;trx_id&gt;".$_POST['trx_id']."&lt;/trx_id&gt;<br/>";
    $bodie  .= "&lt;merchant_id&gt;".$_POST['merchant_id']."&lt;/merchant_id&gt;<br/>";
    $bodie  .= "&lt;merchant&gt;".$_POST['merchant_name']."&lt;/merchant&gt;<br/>";
    $bodie  .= "&lt;bill_no&gt;".$_POST['bill_no']."&lt;/bill_no&gt;<br/>";
    $bodie  .= "&lt;payment_reff&gt;1234567&lt;/payment_reff&gt;<br/>";
    $bodie  .= "&lt;payment_date&gt;".$payment_date."&lt;/payment_date&gt;<br/>";
    $bodie  .= "&lt;payment_status_code&gt;".$payment_status_code."&lt;/payment_status_code&gt;<br/>";
    $bodie  .= "&lt;payment_status_desc&gt;".$payment_status_desc."&lt;/payment_status_desc&gt;<br/>";
    $bodie  .= "&lt;signature&gt;".$signature."&lt;/signature&gt;<br/>";
    $bodie  .= "&lt;amount&gt;10000&lt;/amount&gt;<br/>";
    $bodie  .= "&lt;/faspay&gt;<br/>";
    
    $body  = "<faspay><br/>";
    $body  .= "<request>Payment Notification</request><br/>";
    $body  .= "<trx_id>".$_POST['trx_id']."</trx_id><br/>";
    $body  .= "<merchant_id>".$_POST['merchant_id']."</merchant_id><br/>";
    $body  .= "<merchant>".$_POST['merchant_name']."</merchant><br/>";
    $body  .= "<bill_no>".$_POST['bill_no']."</bill_no><br/>";
    $body  .= "<payment_reff>1234567</payment_reff><br/>";
    $body  .= "<payment_date>".$payment_date."</payment_date><br/>";
    $body  .= "<payment_status_code>".$payment_status_code."</payment_status_code><br/>";
    $body  .= "<payment_status_desc>".$payment_status_desc."</payment_status_desc><br/>";
    $body  .= "<signature>".$signature."</signature><br/>";
    $body  .= "<amount>10000</amount><br/>";
    $body  .= "</faspay><br/>";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt ($curl, CURLOPT_HTTPHEADER, array("X-Requested-With: XMLHttpRequest"));
    curl_setopt ($curl, CURLOPT_POSTFIELDS, $body);
    curl_setopt ($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec ($curl);
    curl_close ($curl);

    if( $_POST['submitForm'] == 'submit' )
    {
        echo $bodie;
        echo $response;
    }
?>

</html>