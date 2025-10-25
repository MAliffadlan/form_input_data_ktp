<?php
$server = "localhost";
$username = "root";
$pass = "";
$dbname = "db_ktp"; //ganti ke biodata


$conn = mysqli_connect($server, $username, $pass, $dbname);


if(!$conn){
    die ("Connection Failed! ". mysqli_connect_error());
}
?>