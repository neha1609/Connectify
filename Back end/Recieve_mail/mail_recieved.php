<?php
include("../includes/dbcon.php");
require_once("vendor/autoload.php"); 
//require_once __DIR__.'/src/SimpleXLSX.php';
$fname="Email_data.xlsx";
	if ( $xlsx = SimpleXLSX::parse('Email_data.xlsx') ) {

	echo '<table border="1" cellpadding="3" style="border-collapse: collapse">';
	foreach( $xlsx->rows() as $r ) {
		//print_r($r);
		$name_email=$r[0];$product=$r[1];
		$array = preg_split("/>|</", $name_email);
    	//print_r($array);
    	$name=$array[0];
    	$email=$array[1];
    	//echo $email;
		$cust="Select * from customers where email='$email'";
		//echo $cust;
		$result=mysqli_query($con,$cust);
		if($row=mysqli_fetch_array($result)){
			$c_id=$row['customer_id'];
			$pro_array=preg_split("/\,|\n/", $product);
			foreach($pro_array as $pr){
				$prod=$pr;
				$pro="Select * from products where product_title='$prod'";
				$pro_res=mysqli_query($con,$pro);
				if($row_pro=mysqli_fetch_array($pro_res)){
					$p_id=$row_pro['product_id'];
					$p_price=$row_pro['product_price'];
					//echo "recieved product";
					//echo $p_id . $p_price;
					$status = "pending";

					$invoice_no = mt_rand();
					$size= 0;
					$qty=1;
					$insert_customer_order = "insert into customer_orders (customer_id,due_amount,invoice_no,qty,size,order_date,order_status) values ('$c_id','$p_price','$invoice_no','$qty','$size',NOW(),'$status')";

					$run_customer_order = mysqli_query($con,$insert_customer_order);

					$insert_pending_order = "insert into pending_orders (customer_id,invoice_no,product_id,qty,size,order_status) values ('$c_id','$invoice_no','$p_id','$qty','$size','$status')";

					$run_pending_order = mysqli_query($con,$insert_pending_order);
				}
			
				else{
					echo "<script>alert('$pr : Product not available talk to vendor');</script>";
				}
			}
		}
		else{
			//echo "Customer not in Database";
			$em="EMAIL";
			if($name != $em){
				$p="12345";
				$password=md5($p);
				$cust_add="Insert into customers (name,email,password) values ('$name','$email','$password')";
				$res=mysqli_query($con,$cust_add);
				$cust_new="Select * from customers where name='$name'";
				$res_new=mysqli_query($con,$cust_new);
				if($row_c=mysqli_fetch_array($res_new)){
					$c_id=$row_c['customer_id'];
					$pro_array=preg_split("/\,|\n/", $product);
					foreach($pro_array as $pr){
						$prod=$pr;
						$pro="Select * from products where product_title='$prod'";
						$pro_res=mysqli_query($con,$pro);
						if($row_pro=mysqli_fetch_array($pro_res)){
							$p_id=$row_pro['product_id'];
							$p_price=$row_pro['product_price'];
							$status = "pending";

							$invoice_no = mt_rand();
							$size= 0;
							$qty=1;
							$insert_customer_order = "insert into customer_orders (customer_id,due_amount,invoice_no,qty,size,order_date,order_status) values ('$c_id','$p_price','$invoice_no','$qty','$size',NOW(),'$status')";

							$run_customer_order = mysqli_query($con,$insert_customer_order);

							$insert_pending_order = "insert into pending_orders (customer_id,invoice_no,product_id,qty,size,order_status) values ('$c_id','$invoice_no','$p_id','$qty','$size','$status')";

							$run_pending_order = mysqli_query($con,$insert_pending_order);
						}
						else{
							echo "<script>alert('$pr : Product not available talk to vendor');</script>";
						}
					}
				}
			}
		}

		echo '<tr><td>'.implode('</td><td>', $r ).'</td></tr>';

	}
	echo '</table>';
	if(!unlink($fname)){
		echo "file not deleted";
	}
	else{
		echo "file deleted";
	}
	echo "<script>window.open('../admin/index.php?view_orders','_self')</script>";

	// or $xlsx->toHTML();	
	} else {
		echo SimpleXLSX::parseError();
	}
?>