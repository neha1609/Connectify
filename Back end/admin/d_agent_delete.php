<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<?php

if(isset($_GET['d_agent_delete'])){

$delete_id = $_GET['d_agent_delete'];

$delete_d_agent = "delete from d_agent where d_agent_id='$delete_id'";

$run_delete = mysqli_query($con,$delete_d_agent);


if($run_delete){

echo "<script>alert('Delivery Agent Has Been Deleted')</script>";

echo "<script>window.open('index.php?view_d_agent','_self')</script>";


}

}


?>




<?php } ?>