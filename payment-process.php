<?php
	include"config.php";    
 
	$username=$_POST['username'];
	$payment_id=$_POST['razorpay_payment_id'];
	$amount=$_POST['totalAmount'];
	$product_id=$_POST['product_id'];
	$sql="INSERT INTO payment_details(username,product_id,amount,payment_id) VALUES('$username','$product_id','$amount','$payment_id')";
	$con->query($sql);
 // you can write your database insertation code here
 // after successfully insert transaction in database, pass the response accordingly
 $arr = array('msg' => 'Payment successfully credited', 'status' => true);  
 echo json_encode($arr);

?>

