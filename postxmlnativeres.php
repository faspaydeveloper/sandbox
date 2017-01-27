<html>

<?php
    $price = 0;
    $product = '';

    if (isset($_POST['bw']))
    {
        $_POST['bwp'] = 8000;
        $_POST['bwn'] = 'Belgian Waffles';
        $price = $_POST['bwp'];
        $product = $_POST['bwn'];
    }
    else if (isset($_POST['sbw']))
    {
        $_POST['sbwp'] = 27000;
        $_POST['sbwn'] = 'Strawberry Belgian Waffles';
        $price = $_POST['sbwp'];
        $product = $_POST['sbwn'];
    }
    else if (isset($_POST['bbbw']))
    {
        $_POST['bbbwp'] = 28000;
        $_POST['bbbwn'] = 'Berry-Berry Belgian Waffles';
        $price = $_POST['bbbwp'];
        $product = $_POST['bbbwn'];
    }
    else if (isset($_POST['ft']))
    {
        $_POST['ftp'] = 24000;
        $_POST['ftn'] = 'French Toast';
        $price = $_POST['ftp'];
        $product = $_POST['ftn'];
    }
    else if (isset($_POST['hb']))
    {
        $_POST['hbp'] = 7500;
        $_POST['hbn'] = 'Homestyle Breakfast';
        $price = $_POST['hbp'];
        $product = $_POST['hbn'];
    }

    $bill_price = $price.'.00';
    $total = $price + $_POST['misc_fee'];
    $bill_total = $total.'.00';

    $bill_date = date('Y-m-d h:i:s');
    $bill_expired = date('Y-m-d h:i:s', strtotime('+1 day'));

    $str = 'bot'.$_POST['merchant_id'].$_POST['password'].$_POST['bill_no'];
    $signature = sha1(md5($str));

    $bodie  = "&lt;faspay&gt;<br/>";
    $bodie  .= "&lt;request&gt;".$_POST['request']."&lt;/request&gt;<br/>";
    $bodie  .= "&lt;merchant_id&gt;".$_POST['merchant_id']."&lt;/merchant_id&gt;<br/>";
    $bodie  .= "&lt;merchant&gt;".$_POST['merchant_name']."&lt;/merchant&gt;<br/>";
    $bodie  .= "&lt;bill_no&gt;".$_POST['bill_no']."&lt;/bill_no&gt;<br/>";
    $bodie  .= "&lt;bill_reff&gt;&lt;/bill_reff&gt;<br/>";
    $bodie  .= "&lt;bill_date&gt;".$bill_date."&lt;/bill_date&gt;<br/>";
    $bodie  .= "&lt;bill_expired&gt;".$bill_expired."&lt;/bill_expired&gt;<br/>";
    $bodie  .= "&lt;bill_desc&gt;".$_POST['bill_desc']."&lt;/bill_desc&gt;<br/>";
    $bodie  .= "&lt;bill_currency&gt;IDR&lt;/bill_currency&gt;<br/>";
    $bodie  .= "&lt;bill_gross&gt;&lt;/bill_gross&gt;<br/>";
    $bodie  .= "&lt;bill_tax&gt;&lt;/bill_tax&gt;<br/>";
    $bodie  .= "&lt;bill_miscfee&gt;".$_POST['misc_fee']."&lt;/bill_miscfee&gt;<br/>";
    $bodie  .= "&lt;bill_total&gt;".$bill_total."&lt;/bill_total&gt;<br/>";
    $bodie  .= "&lt;cust_no&gt;&lt;/cust_no&gt;<br/>";
    $bodie  .= "&lt;cust_name&gt;&lt;/cust_name&gt;<br/>";
    $bodie  .= "&lt;payment_channel&gt;".$_POST['channel']."&lt;/payment_channel&gt;<br/>";
    $bodie  .= "&lt;pay_type&gt;01&lt;/pay_type&gt;<br/>";
    $bodie  .= "&lt;bank_userid&gt;&lt;/bank_userid&gt;<br/>";
    $bodie  .= "&lt;msisdn&gt;&lt;/msisdn&gt;<br/>";
    $bodie  .= "&lt;email&gt;".$_POST['emails']."&lt;/email&gt;<br/>";
    $bodie  .= "&lt;terminal&gt;10&lt;/terminal&gt;<br/>";
    $bodie  .= "&lt;billing_address&gt;&lt;/billing_address&gt;<br/>";
    $bodie  .= "&lt;billing_address_city&gt;&lt;/billing_address_city&gt;<br/>";
    $bodie  .= "&lt;billing_address_region&gt;&lt;/billing_address_region&gt;<br/>";  
    $bodie  .= "&lt;billing_address_state&gt;&lt;/billing_address_state&gt;<br/>";  
    $bodie  .= "&lt;billing_address_poscode&gt;&lt;/billing_address_poscode&gt;<br/>";
    $bodie  .= "&lt;billing_address_country_code&gt;&lt;/billing_address_country_code&gt;<br/>";
    $bodie  .= "&lt;receiver_name_for_shipping&gt;&lt;/receiver_name_for_shipping&gt;<br/>";
    $bodie  .= "&lt;shipping_address&gt;&lt;/shipping_address&gt;<br/>";
    $bodie  .= "&lt;shipping_address_city&gt;&lt;/shipping_address_city&gt;<br/>";
    $bodie  .= "&lt;shipping_address_region&gt;&lt;/shipping_address_region&gt;<br/>";
    $bodie  .= "&lt;shipping_address_state&gt;&lt;/shipping_address_state&gt;<br/>";
    $bodie  .= "&lt;shipping_address_poscode&gt;&lt;/shipping_address_poscode&gt;<br/>";
    $bodie  .= "&lt;item&gt;<br/>";
    $bodie  .= "&lt;product&gt;".$product."&lt;/product&gt;<br/>";
    $bodie  .= "&lt;qty&gt;1&lt;/qty&gt;<br/>";
    $bodie  .= "&lt;amount&gt;".$bill_price."&lt;/amount&gt;<br/>";
    $bodie  .= "&lt;payment_plan&gt;01&lt;/payment_plan&gt;<br/>";
    $bodie  .= "&lt;merchant_id&gt;&lt;/merchant_id&gt;<br/>";
    $bodie  .= "&lt;tenor&gt;00&lt;/tenor&gt;<br/>";
    $bodie  .= "&lt;/item&gt;<br/>";
    $bodie  .= "&lt;reserve1&gt;&lt;/reserve1&gt;<br/>";
    $bodie  .= "&lt;reserve2&gt;&lt;/reserve2&gt;<br/>";
    $bodie  .= "&lt;signature&gt;".$signature."&lt;/signature&gt;<br/>";
    $bodie  .= "&lt;/faspay&gt;<br/>";
    
    $body  = "<faspay><br/>";
    $body  .= "<request>".$_POST['request']."</request><br/>";
    $body  .= "<merchant_id>".$_POST['merchant_id']."</merchant_id><br/>";
    $body  .= "<merchant>".$_POST['merchant_name']."</merchant><br/>";
    $body  .= "<bill_no>".$_POST['bill_no']."</bill_no><br/>";
    $body  .= "<bill_reff></bill_reff><br/>";
    $body  .= "<bill_date>".$bill_date."</bill_date><br/>";
    $body  .= "<bill_expired>".$bill_expired."</bill_expired><br/>";
    $body  .= "<bill_desc>".$_POST['bill_desc']."</bill_desc><br/>";
    $body  .= "<bill_currency>IDR</bill_currency><br/>";
    $body  .= "<bill_gross></bill_gross><br/>";
    $body  .= "<bill_tax></bill_tax><br/>";
    $body  .= "<bill_miscfee>".$_POST['misc_fee']."</bill_miscfee><br/>";
    $body  .= "<bill_total>".$bill_total."</bill_total><br/>";
    $body  .= "<cust_no></cust_no><br/>";
    $body  .= "<cust_name></cust_name><br/>";
    $body  .= "<payment_channel>".$_POST['channel']."</payment_channel><br/>";
    $body  .= "<pay_type>01</pay_type><br/>";
    $body  .= "<bank_userid></bank_userid><br/>";
    $body  .= "<msisdn></msisdn><br/>";
    $body  .= "<email>".$_POST['emails']."</email><br/>";
    $body  .= "<terminal>10</terminal><br/>";
    $body  .= "<billing_address></billing_address><br/>";
    $body  .= "<billing_address_city></billing_address_city><br/>";
    $body  .= "<billing_address_region></billing_address_region><br/>";  
    $body  .= "<billing_address_state></billing_address_state><br/>";  
    $body  .= "<billing_address_poscode></billing_address_poscode><br/>";
    $body  .= "<billing_address_country_code></billing_address_country_code><br/>";
    $body  .= "<receiver_name_for_shipping></receiver_name_for_shipping><br/>";
    $body  .= "<shipping_address></shipping_address><br/>";
    $body  .= "<shipping_address_city></shipping_address_city><br/>";
    $body  .= "<shipping_address_region></shipping_address_region><br/>";
    $body  .= "<shipping_address_state></shipping_address_state><br/>";
    $body  .= "<shipping_address_poscode></shipping_address_poscode><br/>";
    $body  .= "<item><br/>";
    $body  .= "<product>".$product."</product><br/>";
    $body  .= "<qty>1</qty><br/>";
    $body  .= "<amount>".$bill_price."</amount><br/>";
    $body  .= "<payment_plan>01</payment_plan><br/>";
    $body  .= "<merchant_id></merchant_id><br/>";
    $body  .= "<tenor>00</tenor><br/>";
    $body  .= "</item><br/>";
    $body  .= "<reserve1></reserve1><br/>";
    $body  .= "<reserve2></reserve2><br/>";
    $body  .= "<signature>".$signature."</signature><br/>";
    $body  .= "</faspay><br/>";

    $curl = curl_init('http://faspaydev.mediaindonusa.com/pws/300002/183xx00010100000');
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt ($curl, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
    curl_setopt ($curl, CURLOPT_POSTFIELDS, $body);
    curl_setopt ($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec ($curl);
    curl_close ($curl);

    $xml = simplexml_load_string($response);
    $trx_id = "";

    foreach ($xml as $key => $value)
    {
        if($key == "trx_id")
        {
            $trx_id = $value;
        }
    }

    if( $_POST['submitForm'] == 'submit' )
    {
        echo $bodie;
        echo $response;

        if($_POST['red'] == 'yes')
        {
            echo "http://faspaydev.mediaindonusa.com/pws/100003/0830000010100000/".$signature."?trx_id=".$trx_id."&merchant_id=".$_POST['merchant_id']."&bill_no=".$_POST['bill_no'];
        }
    }
?>

</html>