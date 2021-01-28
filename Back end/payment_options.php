<div class="box"><!-- box Starts -->

<?php

$session_row = $_SESSION['customers'];

//$select_customer = "select * from customers where customer_email='$session_email'";

//$run_customer = mysqli_query($con,$select_customer);

//$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $session_row['customer_id'];


?>

<h1 class="text-center">Payment Options For You</h1>

<p class="lead text-center">

<a href="order.php?c_id=<?php echo $customer_id; ?>">Pay Off line</a>

</p>
<center><!-- center Starts -->
<p>OR</p>

<p class="lead">

<a href="razorpay/pay.php">

Pay Online With Razor Pay

<img src="image/Razor_pay.png" width="500" height="270" class="img-responsive">

</a>

</p>

</center><!-- center Ends -->

</div><!-- box Ends -->