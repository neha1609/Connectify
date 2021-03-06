<?php
session_start();
  include("includes/dbcon.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Overpass:wght@900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;800&family=Ubuntu&display=swap" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Stationary</title>
</head>

  <body>
    <?php
      include("includes/header.php");
    ?>

    <section class="Books">

    <section class="text-gray-600 body-font">
      <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap -m-4">

            <?php
              $get_products = "select * from products";
              $run_products = mysqli_query($con,$get_products);
              while ($row_product = mysqli_fetch_array($run_products)) {
                $cat_id = $row_product['cat_id'];
                if($cat_id==3) {
                  $pro_id=$row_product['product_id'];
                  $image = $row_product['product_img'];
                  $product_title = $row_product['product_title'];
                  $product_price = $row_product['product_price'];
                  ?>
                  <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                    <a class="block relative h-48 rounded overflow-hidden" href="product.php?id=<?php echo $pro_id; ?>">
                      <img alt="ecommerce" class="object-cover object-center w-40 h-70 block" src="image/<?php echo $image; ?>">
                    </a>
                    <div class="mt-4">
                      <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">STATIONARY</h3>
                      <h2 class="text-gray-900 title-font text-lg font-medium"><?php echo $product_title; ?></h2>
                      <p class="mt-1">Rs. <?php echo $product_price; ?></p>
                    </div>
                  </div>
                  <?php

                }

              }
            ?>

        </div>
      </div>
    </section>


    </section>

    <?php
      include("includes/footer.php");

    ?>

    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  </body>
</html>


