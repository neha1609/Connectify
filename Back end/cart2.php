
<?php

session_start();

include("includes/dbcon.php");

include("functions/functions.php");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Overpass:wght@900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;800&family=Ubuntu&display=swap" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <title>cart</title>
</head>

<body>
  <?php
  include("includes/header.php");
  ?>
  <!--<header class="text-gray-700 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
          <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
        </svg>
        <span class="ml-3 text-xl">Connectify</span>
      </a>
      <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
        <a class="mr-5 hover:text-gray-900" href="index.html">Home</a>
        <a class="mr-5 hover:text-gray-900" href="About Us.html">About us</a>
        <a class="mr-5 hover:text-gray-900" href="Books.html">Books</a>
        <a class="mr-5 hover:text-gray-900" href="Stationary.html">Stationary</a>
        <a class="mr-5 hover:text-gray-900" href="Study Material.html">Study Material</a>
        <a class="mr-5 hover:text-gray-900" href="contact.html">Contact</a>



      </nav>-->

      <!-- <button class="inline-flex items-center bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0">Butto
    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
      <path d="M5 12h14M12 5l7 7-7 7"></path>
    </svg>
  </button>
-->
    <!--</div>
  </header>-->
  <!-- a new section here  -->

<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<div class="container bootstrap snippets bootdey">
    <div class="col-md-9 col-sm-8 content">
        <!--<div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active">Cart</li>
                </ol>
            </div>
        </div>-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info panel-shadow">
                    <div class="panel-heading">
                        <h3>
                            <?php
                            if(!isset($_SESSION['customers'])){

                            echo "<a href='login.php' >login</a>";

                            }
                            else{
                              $row=$_SESSION['customers'];

                              $c_id = $row['customer_id'];

                              $c_name = $row['name'];
                              //$c_img = $row['image'];
                              //echo $c_img;
                              ?>
                              <!--<img class="img-circle img-thumbnail" src="image/<?php //echo $c_img; ?>">-->
                              <?php
                            echo "$c_name";
                          
                            }?>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Title</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                              $con= new mysqli("localhost","root","","connectify");
                              //$ip_add=getRealUserIp();
                              //echo $ip_add;
                              if(isset($_GET['id'])){

                              $c_id = $_GET['id'];
                              //$get_products = "Select * from cart where ip_add='$c_id'";
                              $get_products = "Select * from cart where c_id='$c_id'";
                              if($run_products = $con->query($get_products)){
                              //echo $run_products;
                              while ($row_product = $run_products->fetch_assoc()) {
                                  $pro_id=$row_product['p_id'];
                                  $qty=$row_product['qty'];
                                  $get_p = "select * from products where product_id=$pro_id";
                                  $run_p = mysqli_query($con,$get_p);
                                  if($row_p = mysqli_fetch_array($run_p)){
                                  $image = $row_p['product_img'];
                                  $product_title = $row_p['product_title'];
                                  $product_desc  = $row_p['product_desc'];
                                  $product_price = $row_p['product_price'];
                                  ?>
                                <tr>
                                    <td><img src="image/<?php echo $image; ?>" class="img-cart"></td>
                                    <td><strong><?php echo $product_title; ?></strong></td>
                                    <td>
                                    <form class="form-inline">
                                        <input class="form-control" type="text" value="<?php echo $qty; ?>">
                                        <!--<button rel="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></button>-->
                                        <!--<a href="#" class="btn btn-primary"><i class="fa fa-trash-o"></i></a>-->
                                    </form>
                                    </td>
                                    <td><?php echo $product_price; ?></td>
                                    <td><?php 
                                    $t=$product_price *$qty;
                                    echo $t;
                                    //echo total_price(); ?></td>
                                </tr>
                                <?php
                              }
                              }
                            }
                            }
                                ?>
                                <!--<tr>
                                    <td><img src="https://via.placeholder.com/400x200/87CEFA/000000" class="img-cart"></td>
                                    <td><strong>Product 2</strong><p>Size : M</p></td>
                                    <td>
                                    <form class="form-inline">
                                        <input class="form-control" type="text" value="2">
                                        <button class="btn btn-default" ><i class="fa fa-pencil"></i></button>
                                        <a href="#" class="btn btn-primary" rel="tooltip" ><i class="fa fa-trash-o"></i></a>
                                    </form>
                                    </td>
                                    <td>$16.00</td>
                                    <td>$32.00</td>
                                </tr>
                                <tr>
                                    <td colspan="6">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">Total Product</td>
                                    <td>$86.00</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right">Total Shipping</td>
                                    <td>$2.00</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="text-right"><strong>Total</strong></td>
                                    <td>$88.00</td>
                                </tr>-->
<?php //$a=$_SESSION['customers'];
//echo $a['customer_id'];?>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                <br>
                <div colspan="4" class="text-right"><strong>Total : </strong> <?php total_price(); ?></div>
                <br>
                <a href="index.php" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Continue Shopping</a>
                <a href="customer_address.php?id=<?php echo $c_id;?>" class="btn btn-primary pull-right">Checkout<span class="glyphicon glyphicon-chevron-right"></span></a>
                <!--<a href="checkout.php?payment_options" class="btn btn-primary pull-right">Checkout<span class="glyphicon glyphicon-chevron-right"></span></a>-->
            </div>
        </div>
    </div>
</div>

  <!--  a new section here-->
  <?php
  include("includes/footer.php");
  ?>
 
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  </body>
  </html>
