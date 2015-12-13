<?php
//include 'dbConn.php';
include 'dbConn1.php';

if(function_exists('date_default_timezone_set')){
	date_default_timezone_set('Asia/Calcutta');
}
$date = date("d-m-Y h:i:sa");
$bodyObj = json_decode(file_get_contents('php://input'));
$name = isset($bodyObj->name) ? $bodyObj->name : 0;
$money = isset($bodyObj->money) ? $bodyObj->money : 0;
$acc = isset($bodyObj->acc) ? $bodyObj->acc : 0;
$type = isset($bodyObj->type) ? $bodyObj->type : 0;
$givenDate = isset($bodyObj->date) ? $bodyObj->date : '-'/*date("d-m-Y")*/;

$sql = "INSERT INTO account (name, money, account, type, givenDate, date, updatedDate, isActive) VALUES ( '$name', '$money', '$acc', '$type', '$givenDate', '$date', '$date', '1')";

if( mysqli_query($conn, $sql) ){
	echo "Add Success";
}
else{
	echo "Err: ".$sql. " <---> " . mysqli_error($conn);
}

$conn->close();

?>