<?php
$host = "localhost";
$user = "u126710918_sudhakar";
$password = "!Lakshi123";
$database = "u126710918_annai";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
