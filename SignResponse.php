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
		<h1>Signature Request-Response</h1>
		</div>

		<form action="" method="post">
			<p>Merchant ID <input type="text" name="merchant_id" class="form-control" value="TEST01"></p>
			<p>Password <input type="password" name="sTxnPassword" class="form-control" value="059B8125F"></p>
			<p>Merchant TranID <input type="text" name="merchant_tranid" class="form-control"  value="20061123_003"></p>
			<p>Amount <input type="text" name="amount" class="form-control" value="100.00"></p>
			<p>Transaction ID <input type="text" name="transaction_id" class="form-control" value="50126"></p>
			<button type="submit" name="submit" class="btn btn-success">Submit</button></a>
		</form>

    	<?php
    		if(isset($_POST['submit'])){
    			$merchant_id = $_POST['merchant_id'];
	            $sTxnPassword = $_POST['sTxnPassword'];
	            $merchant_tranid = $_POST['merchant_tranid'];
	            $amount = $_POST['amount'];
	            $transaction_id = $_POST['transaction_id'];
	            $hash='##'.strtoupper($merchant_id).'##'.strtoupper($sTxnPassword).'##'.$merchant_tranid.'##'.$amount.'##'.$transaction_id.'##';

            	$hes = sha1($hash);
            	echo "<div class='alert alert-success' style='text-transform:uppercase;' >".strtoupper($hes)."</div>";
			}    			
    	?>
	</div>

</body>
</html>