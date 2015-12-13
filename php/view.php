<?php
//include 'dbConn.php';
include 'dbConn1.php';

$sql = "SELECT * FROM account WHERE isActive=1";
$result = mysqli_query($conn, $sql);
$myArr = array();
if( mysqli_num_rows($result) > 0 ){
	while( $row=mysqli_fetch_assoc($result) ){
		$myArr[] = $row;
	}	
	echo json_encode($myArr);
	//echo json_encode($row);
}
else{
	echo "0 result found";
}

$conn->close();

?>