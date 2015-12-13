<?php
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
$givenDate = isset($bodyObj->date) ? $bodyObj->date : date("d-m-Y");
if( isset($bodyObj->id) ){ $thisId =  $bodyObj->id; }
else{  die("Id is Undefined ");  }
$sql = "UPDATE account SET name='$name', money='$money', account='$acc', type='$type', givenDate='$givenDate', updatedDate='$date' WHERE id='$thisId'";

if( mysqli_query($conn, $sql) ){
    echo "Update Success";
}
else{
    echo "Err: ".$sql. " <---> " . mysqli_error($conn);
}

$conn->close();

?>