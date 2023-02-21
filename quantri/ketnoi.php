<?php
$DBhost = "localhost";
$DBuser = "root";
$DBpassword = "";
$DBname = "agriproduct";

$conn = mysqli_connect($DBhost, $DBuser, $DBpassword, $DBname);

if ($conn){
    $setLanguage = mysqli_query($conn, "SET NAMES 'utf8'");
} else {
    die ("Kết nối thất bại !".mysqli_connect_error());
}

?>