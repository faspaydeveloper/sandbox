<html>

<?php
    
    $clearkey = 'abclearkey123';

    function genKeyId($clearkey)
    {
        return strtoupper(bin2hex(str2bin($clearkey))); 
    }

    function intval32bits($value)
    {
        if ($value > 2147483647)
        {
          $value = ($value - 4294967296);
        }
        else if ($value < -2147483648)
        {
          $value = ($value + 4294967296);
        }
        return $value;
    }

    function getHash($value) 
    {
        $h = 0;
        for ($i = 0; $i < strlen($value); $i++)
        {
          $h = intval32bits(add31T($h) + ord($value{$i}));
        }
        return $h;
    }

    function add31T($value)
    {
        $result = 0;
        for($i = 1; $i <= 31; $i++)
        {
          $result = intval32bits($result + $value);
        }
        return $result;
    }

    function str2bin($data)
    {
        $len = strlen($data);
        return pack("a".$len, $data);
    }

    function genSignature($klikpaycode, $transactiondate, $transactionnumber, $totalamount, $currency, $clearkey)
    {
        //Signature Step 1
        $tempKey1 = $klikpaycode.$transactionnumber.$currency.$clearkey;
        $hashKey1 = getHash($tempKey1);

        //Signature Step 2
        $expDate = explode("-",substr($transactiondate,0,10));
        $strDate = intval32bits($expDate[0].$expDate[1].$expDate[2]); 
        $amt = intval32bits($totalamount);
        $tempKey2 = $strDate + $amt;
        $hashKey2 = getHash((string)$tempKey2);

        //Generate Key Step 3
        $signature = abs($hashKey1 + $hashKey2);

        return $signature; 
    }

    $transactiondate = date('d-m-Y H-i-s');
    $klikpaycode = $_POST['klikpaycode'];
    $transactionnumber = $_POST['trx_id'];
    $totalamount = $_POST['totalamount'];
    $currency = $_POST['currency'];
    $paytype = '01';
    $description = $_POST['description'];
    $callback = $_POST['callback'];
    $misc_fee = $_POST['misc_fee'];

    $url = 'http://faspaydev.mediaindonusa.com/redirectbca';

    $signature = genSignature($klikpaycode, $transactiondate, $transactionnumber, $totalamount, $currency, $clearkey);

    $arr = array(  
        "klikPayCode"       => $klikpaycode,
        "transactionDate"   => $transactiondate,
        "transactionNo"     => $transactionnumber,
        "currency"          => $currency,
        "totalAmount"       => $totalamount.'.00',
        "payType"           => $paytype,
        "signature"         => $signature,
        "descp"             => $description,
        "callback"          => $callback,
        "miscFee"           => $misc_fee
    );  

    echo '<form method="post" name="form" id = "BCAForm" action="'.$url.'">';     
    if($arr != null)
    {
        foreach($arr as $name => $value)
        {
            echo '<input type="hidden" name="'.$name.'" value="'.$value.'">';
        }
    }
    echo '</form>';
    echo '<script>document.getElementById("BCAForm").submit();';
?>

</html>