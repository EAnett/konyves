<?php

$servername="localhost";
$username="root";
$password="";
$database="konyves";

$conn=new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Kapcsolati hiba:". $conn->connect_error);
}

$conn->set_charset("utf8");

