<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php
include("includes/header.php");

if(isset($_GET['vendor_edit'])){

$edit_id = $_GET['vendor_edit'];

$get_p = "select * from vendor where vendor_id='$edit_id'";

$run_edit = mysqli_query($con,$get_p);

$row_edit = mysqli_fetch_array($run_edit);

$c_id = $row_edit['vendor_id'];

$name = $row_edit['name'];

$city = $row_edit['city'];

$email = $row_edit['email'];

$image = $row_edit['image'];

/*$p_image2 = $row_edit['product_img2'];

$p_image3 = $row_edit['product_img3'];*/

$country = $row_edit['country'];

$contact = $row_edit['contact'];


}
/*

$get_p_cat = "select * from product_categories where p_cat_id='$p_cat'";

$run_p_cat = mysqli_query($con,$get_p_cat);

$row_p_cat = mysqli_fetch_array($run_p_cat);

$p_cat_title = $row_p_cat['p_cat_title'];

$get_cat = "select * from categories where cat_id='$cat'";

$run_cat = mysqli_query($con,$get_cat);

$row_cat = mysqli_fetch_array($run_cat);

$cat_title = $row_cat['cat_title'];*/

?>


<!DOCTYPE html>

<html>

<head>

<title> Edit Customer </title>


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Edit Vendor

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit Vendor

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Vendor Name </label>

<div class="col-md-6" >

<input type="text" name="name" class="form-control" required value="<?php echo $name; ?>">

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Vendor city </label>

<div class="col-md-6" >
<input type="text" name="city" class="form-control" required value="<?php echo $city; ?>">

<!--<select name="city" class="form-control" >

<option value="<?php //echo $city; ?>" > <?php//echo $city; ?> </option>-->


<?php

/*$get_p_cats = "select * from product_categories";

$run_p_cats = mysqli_query($con,$get_p_cats);

while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {

$p_cat_id = $row_p_cats['p_cat_id'];

$p_cat_title = $row_p_cats['p_cat_title'];

echo "<option value='$p_cat_id' >$p_cat_title</option>";

}*/


?>



</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Vendor Email </label>

<div class="col-md-6" >
	<input type="email" name="email" class="form-control" required value="<?php echo $email; ?>">


<!--<select name="cat" class="form-control" >

<option value="<?php //echo $cat; ?>" > <?php //echo $cat_title; ?> </option>-->

<?php

/*$get_cat = "select * from categories ";

$run_cat = mysqli_query($con,$get_cat);

while ($row_cat=mysqli_fetch_array($run_cat)) {

$cat_id = $row_cat['cat_id'];

$cat_title = $row_cat['cat_title'];

echo "<option value='$cat_id'>$cat_title</option>";

}*/

?>

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Vendor Image </label>

<div class="col-md-6" >

<input type="file" name="image" class="form-control">
<br><img src="image/<?php echo $image; ?>" width="70" height="70" >

</div>

</div><!-- form-group Ends -->



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Vendor country </label>

<div class="col-md-6" >

<input type="text" name="country" class="form-control" required value="<?php echo $country; ?>" >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Vendor contact </label>

<div class="col-md-6" >

<input type="text" name="contact" class="form-control" required value="<?php echo $contact; ?>" >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

<input type="submit" name="update" value="Update Vendor Details" class="btn btn-primary form-control" >

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 




</body>

</html>

<?php

if(isset($_POST['update'])){

$name = $_POST['name'];

$city = $_POST['city'];
$email = $_POST['email'];

$country = $_POST['country'];
$image = $_FILES['image']['name'];
$temp_name = $_FILES['image']['tmp_name'];
move_uploaded_file($temp_name,"image/$image");

$contact = $_POST['contact'];

$update_cust = "update vendor set name='$name',city='$city',email='$email',country='$country',image='$image',contact='$contact' where vendor_id='$c_id'";

$run_cust = mysqli_query($con,$update_cust);

if($run_cust){

echo "<script> alert('Vendor Details has been updated successfully') </script>";

echo "<script>window.open('index.php?view_vendor','_self')</script>";

}

}

?>

<?php 
include("includes/footer.php");
} ?>
