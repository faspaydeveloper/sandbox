<html>

<?php
    function genKeyId($clearKey)
    {
        return strtoupper(bin2hex(str2bin($clearKey))); 
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

    function genSignature($klikpaycode, $transactiondate, $transactionnumber, $totalamount, $currency, $clearKey)
    {
        //Signature Step 1
        $tempKey1 = $klikpaycode.$transactionnumber.$currency.$clearKey;
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

    function genAuthKey($clearKey, $klikpaycode, $transactionnumber, $currency, $transactiondate, $keyId)
    {   
        //Step 1 - Padding
        $klikpaycode = str_pad($klikpaycode, 10, "0");
        $transactionnumber = str_pad($transactionnumber, 18, "A");
        $currency = str_pad($currency, 5, "1");
        $keyId = genKeyId($clearKey);

        //Step 2
        $value_1 = $klikpaycode.$transactionnumber.$currency.$transactiondate.$keyId;
    
        //Step 3
        $hash_value_1 = strtoupper(md5($value_1));

        //Step 4
        $key = '';
        if (strlen($keyId) == 32)
        {
            $key = $keyId . substr($keyId,0,16);
        }
        else if (strlen($keyId) == 48)
        {
            $key = $keyId;
        }
        return $key;

        // hex encode the return value
        $end = strtoupper(bin2hex(mcrypt_encrypt(MCRYPT_3DES, hex2bin($key), hex2bin($hash_value_1), MCRYPT_MODE_ECB)));
    }

    $currency = 'IDR';
    $transactiondate = date('d-m-Y H-i-s');
    $clearKey = $_POST['clearKey'];
    $klikpaycode = $_POST['klikpaycode'];
    $transactionnumber = $_POST['trx_id'];
    $amount = $_POST['amount'];

    $keyId = genKeyId($clearKey);
    $Sign = genSignature($klikpaycode, $transactiondate, $transactionnumber, $amount, $currency, $keyId);
    $Auth = genAuthKey($clearKey, $klikpaycode, $transactionnumber, $currency, $transactiondate, $keyId);

    echo "Key ID: ".$keyId."<br/>";
    echo "Signature: ".$Sign."<br/>";
    echo "Authkey: ".$Auth;
?>

</html>