<!--Connecting to database-->
<?php

$host=<Host_name>;
$user=<Username>;
$password=<Password>;
$database=<Database_Name>;

$con= new mysqli($host,$user,$password,$database);

if($con->connect_error)
die($con->connect_error);

/*echo "connection done!";*/

?>
