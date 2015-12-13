<?php
$server = "localhost";
$username = "root";
$pwd = "";
$dbName = "finance1";

$conn = mysqli_connect($server, $username, $pwd, $dbName);
if( !$conn ){
    die("DB Connection Failed - ".mysqli_connect_error());
}