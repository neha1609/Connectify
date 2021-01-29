<?php
	include("includes/dbcon.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<link rel="stylesheet" href="styles/style.css">
  	<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">

	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Overpass:wght@900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;800&family=Ubuntu&display=swap" rel="stylesheet">
	<link href="styles/bootstrap.min.css" rel="stylesheet">

	<link href="styles/style12.css" rel="stylesheet">


	<title></title>
</head>
<body>
	<?php
    	include("includes/header.php");
  	?>



  	<div class="row"><!-- 1 row Starts -->

		<div class="col-lg-12"><!-- col-lg-12 Starts -->

			<ol class="breadcrumb"><!-- breadcrumb Starts -->

				<li>

					<i class="fa fa-dashboard"></i> Address of Delivery

				</li>

			</ol><!-- breadcrumb Ends -->

		</div><!-- col-lg-12 Ends -->

	</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->


	<div class="panel panel-default"><!-- panel panel-default Starts -->

		<div class="panel-heading"><!-- panel-heading Starts -->

			<h3 class="panel-title"><!-- panel-title Starts -->

				<i class="fa fa-money fa-fw"></i> Address

			</h3><!-- panel-title Ends -->

		</div><!-- panel-heading Ends -->
		<?php
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$cust = "select * from customers where customer_id='$id'";
			$run_cust = mysqli_query($con,$cust);
			if($row=mysqli_fetch_array($run_cust)){
				$addres=$row['address'];}
		}
		?>
		<div class="panel-body"><!-- panel-body Starts -->

			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

				<div class="form-group"><!-- form-group Starts -->

					<label class="col-md-3 control-label">Address</label>

					<div class="col-md-6">

						<input type="text" name="address" class="form-control" value="<?php echo $addres; ?>">

					</div>

				</div><!-- form-group Ends -->

			<div class="form-group"><!-- form-group Starts -->

				<label class="col-md-3 control-label">Pincode</label>

				<div class="col-md-6">

					<input type="text" name="pincode" class="form-control">

				</div>

			</div><!-- form-group Ends -->
			
			<div class="form-group"><!-- form-group Starts -->

				<label class="col-md-3 control-label"></label>

				<div class="col-md-6">

					<input type="submit" name="submit" value="Add Customer Address" class="btn btn-primary form-control">

				</div>

			</div><!-- form-group Ends -->

			</form><!-- form-horizontal Ends -->

		</div><!-- panel-body Ends -->

	</div><!-- panel panel-default Ends -->
</div>
</div>

</body>
</html>
	<?php
	if(isset($_GET['id'])){
	if(isset($_POST['submit'])){

		$address = $_POST['address'];

		$pincode = $_POST['pincode'];
		$id = $_GET['id'];
		$addr=$address . ",". $pincode;

		$insert_cust = "update customers set address='$addr' where customer_id='$id'";

		$run_cust = mysqli_query($con,$insert_cust);

		if($run_cust){

			echo "<script> alert('Customer Address Has Been Inserted')</script>";

			echo "<script> window.open('checkout.php?payment_options','_self') </script>";

		}
		else{
			echo "<script> alert('Error Occured')</script>";
		}

	}
}



	?>

	<?php 
		include("includes/footer.php");
	?>
