<!--Index Page-->

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
  
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Connectify</title>
</head>

<body>
  <?php
    include("includes/header.php");
  ?>
  
<!-- a new section here  -->

     <section class="section1">
       <div style="background-image: url('image/pic2.jpg');
     background-size:width:100%; background-repeat: no-repeat; height:100vh; padding-top:80px; margin-left:0; margin-right:0; background-position:center ">
     <h1 class="Text1">WE ARE HERE TO PROVIDE YOU <br> UNINTERRUPTED EDUCATION </h1>


     </div>

     </section>

    <!-- new section here for test   -->
    <section class="section2">
      <div class="background">
  <div class="container">
    <div class="panel pricing-table">

      <div class="pricing-plan">
        <img src="image/book1.jpg" alt="" class="pricing-img">
        <h2 class="pricing-header"></h2>
        <ul class="pricing-features">
          <li class="pricing-features-item">Custom domains</li>
          <li class="pricing-features-item">Sleeps after 30 mins of inactivity</li>
        </ul>
        <span class="pricing-price">Rs. 200</span>
        
      </div>

      <div class="pricing-plan">
        <img src="image/pic1.jpg" alt="" class="pricing-img">
        <h2 class="pricing-header"></h2>
        <ul class="pricing-features">
          <li class="pricing-features-item">Never sleeps</li>
          <li class="pricing-features-item">Multiple workers for more powerful apps</li>
        </ul>
        <span class="pricing-price">Rs. 150</span>
        
      </div>

      <div class="pricing-plan">
      <img src="image/clrs.jpg" alt="" class="pricing-img">
        <h2 class="pricing-header"></h2>
        <ul class="pricing-features">
          <li class="pricing-features-item">Dedicated</li>
          <li class="pricing-features-item">Simple horizontal scalability</li>
        </ul>
        <span class="pricing-price">Rs. 400</span>
        
      </div>

    </div>
  </div>
</div>

    </section>
<br>
<br>
<!-- Order Information -->
<section>
  <div style="background-image: url('image/pic1.jpg');
     background-size:width:100%; background-repeat: no-repeat; height:60vh; padding-top:100px; margin-left:0; margin-right:0; background-position:center ">
     <!--<h1 class="Text1">WE ARE HERE TO PROVIDE YOU <br> UNINTERRUPTED EDUCATION </h1>-->
     <br>
     
     <div class="container px-6 py-24 mx-auto">
      <h1 class="Text1">Facilities for you to order</h1>
      <br>
      <ol class="flex flex-wrap md:text-left text-center order-first ">
       <li class="lg:w-1/4 md:w-1/2 w-full px-4"><div style="color:;"><i class="fa fa-whatsapp" style="font-size:48px;"></i> 9262259386</div></li>
       <li class="lg:w-1/4 md:w-1/2 w-full px-4"><div style="color:;"><i class="fas fa-sms" style="font-size:48px;color:;"></i> 9262259386</div></li>
       <li class="lg:w-1/4 md:w-1/2 w-full px-4"><div style="color:;"><i class="fa fa-whatsapp" style="font-size:48px;color:;"></i> 9262259386</div></li>
       <li class="lg:w-1/4 md:w-1/2 w-full px-4"><div style="color:;"><i class="fa fa-envelope" style="font-size:48px;color:;"></i> dpkr5365@gmail.com</div></li>
     </ol>
   </div>


     </div>
</section>
<!--Footer included-->
<?php
  include("includes/footer.php");
?>

  <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

</body>

</html>
