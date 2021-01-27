<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {
include("includes/header.php");

?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li>

<i class="fa fa-dashboard"></i> Dashboard / Insert Customer

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> Insert Customer

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Customer Name</label>

<div class="col-md-6">

<input type="text" name="cust_name" class="form-control">

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Customer city</label>

<div class="col-md-6">

<input type="text" name="city" class="form-control">

</div>

</div><!-- form-group Ends -->
<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Customer image</label>

<div class="col-md-6">

<input type="file" name="image1" class="form-control">

</div>

</div>
<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Customer Country</label>

<div class="col-md-6">

<input type="text" name="country" class="form-control">

</div>

</div>
<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Customer Email</label>

<div class="col-md-6">

<input type="text" name="email" class="form-control">

</div>

</div>
<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Customer contact</label>

<div class="col-md-6">

<input type="text" name="contact" class="form-control">

</div>

</div>

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"></label>

<div class="col-md-6">

<input type="submit" name="submit" value="Add Customer" class="btn btn-primary form-control">

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php

if(isset($_POST['submit'])){

$name = $_POST['cust_name'];

$city = $_POST['city'];
$email = $_POST['email'];

$country = $_POST['country'];
$image1 = $_FILES['image1']['name'];
$temp_name = $_FILES['image1']['tmp_name'];
move_uploaded_file($temp_name,"image/$image1");

$contact = $_POST['contact'];
$p="12345";
$password=md5($p);

$insert_cust = "insert into customers (name,city,image,country,email,contact,password) values ('$name','$city','$image1','$country','$email','$contact','$password')";

$run_cust = mysqli_query($con,$insert_cust);

if($run_cust){

echo "<script> alert('New Category Has Been Inserted')</script>";

echo "<script> window.open('index.php?view_customers','_self') </script>";

}

}



?>

<?php } 
include("includes/footer.php");
?>