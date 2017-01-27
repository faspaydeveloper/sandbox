<html>

<?php
	$user_id = $_POST['user_id'];
	$password = $_POST['password'];
	$order_id = $_POST['order_id'];

	$signature = $user_id.$password.$order_id;
    $hash = sha1(md5($signature));

    echo "Signature: ".$hash;
?>

</html>
