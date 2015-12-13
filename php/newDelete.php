<?php
include 'dbConn1.php';

if(function_exists('date_default_timezone_set')){
    date_default_timezone_set('Asia/Calcutta');
}
$date = date("d-m-Y h:i:sa");

$bodyObj = json_decode(file_get_contents('php://input'));
if( isset($bodyObj->id) ){ $thisId =  $bodyObj->id; }
else{  die("Id is Undefined ");  }

$sql = "UPDATE account SET isActive='0', updatedDate='$date' WHERE id='$thisId'";

if( mysqli_query($conn, $sql) ){
    echo "Update Success";
}
else{
    echo "Err: ".$sql. " <---> " . mysqli_error($conn);
}

$conn->close();

?>