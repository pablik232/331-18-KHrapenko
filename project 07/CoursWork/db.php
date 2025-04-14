<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cwp1_331";

$conn = mysqli_connect($server, $username, $password, $dbname);

if(!$conn){
    die("Connection Fialed".mysqli_connect_error());
} 