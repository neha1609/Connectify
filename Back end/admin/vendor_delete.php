<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<?php

if(isset($_GET['vendor_delete'])){

$delete_id = $_GET['vendor_delete'];

$delete_vendor = "delete from vendor where vendor_id='$delete_id'";

$run_delete = mysqli_query($con,$delete_vendor);


if($run_delete){

echo "<script>alert('Vendor Has Been Deleted')</script>";

echo "<script>window.open('index.php?view_vendor','_self')</script>";


}

}


?>




<?php } ?>