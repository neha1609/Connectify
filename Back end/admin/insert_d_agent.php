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

<i class="fa fa-dashboard"></i> Dashboard / Insert Delivery Agent

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> Insert Delivery Agent

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Delivery Agent Name</label>

<div class="col-md-6">

<input type="text" name="ag_name" class="form-control">

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Delivery Agent city</label>

<div class="col-md-6">

<input type="text" name="city" class="form-control">

</div>

</div><!-- form-group Ends -->
<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Delivery Agent image</label>

<div class="col-md-6">

<input type="file" name="image1" class="form-control">

</div>

</div>
<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Delivery Agent Country</label>

<div class="col-md-6">

<input type="text" name="country" class="form-control">

</div>

</div>
<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Delivery Agent Email</label>

<div class="col-md-6">

<input type="text" name="email" class="form-control">

</div>

</div>
<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Delivery Agent contact</label>

<div class="col-md-6">

<input type="text" name="contact" class="form-control">

</div>

</div>

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"></label>

<div class="col-md-6">

<input type="submit" name="submit" value="Add Delivery Agent" class="btn btn-primary form-control">

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php

if(isset($_POST['submit'])){

$name = $_POST['ag_name'];

$city = $_POST['city'];
$email = $_POST['email'];

$country = $_POST['country'];
$image1 = $_FILES['image1']['name'];
$temp_name = $_FILES['image1']['tmp_name'];
move_uploaded_file($temp_name,"image/$image1");

$contact = $_POST['contact'];

$insert_ag = "insert into d_agent (name,city,image,country,email,contact) values ('$name','$city','$image1','$country','$email','$contact')";

$run_ag = mysqli_query($con,$insert_ag);

if($run_ag){

echo "<script> alert('New Delivery Agent Has Been Added')</script>";

echo "<script> window.open('index.php?view_d_agent','_self') </script>";

}

}



?>

<?php } 
include("includes/footer.php");
?>