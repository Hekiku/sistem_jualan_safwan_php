<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "sistem_jualan_safwan";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (!$conn) {
    die("Hubungan ke pangakalan data gagal: " . mysqli_connect_error());
}
?>