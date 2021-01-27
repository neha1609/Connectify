<?php

$host="localhost";
$user="root";
$password="";
$database="connectify";

$con= new mysqli($host,$user,$password,$database);

if($con->connect_error)
die($con->connect_error);

echo "connection done!";

?>