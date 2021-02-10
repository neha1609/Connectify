<!--Contact form for delivery agent-->
<?php
  include("includes/dbcon.php");
  session_start();
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
    <title>Contact</title>
  </head>

<body>
  <?php
    include("includes/header.php");
  ?>
  <!-- a new section here  -->
  <?php
    if(isset($_GET['id'])) {
      $id=$_GET['id'];
    }
  ?>
  <section class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-col text-center w-full mb-12">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Contact Us</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Please send us your queries by filling these details.</p>
      </div>

      <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <div class="flex flex-wrap -m-2">
          <form action="send_mail_d.php?id=<?php echo $id; ?>" method="post">
      
          <div class="p-2 w-1/2">

          <div class="p-2 w-full">
            <div class="relative">
              <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
              <textarea id="message" name="message"
                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
            </div>
          </div>
          <div class="p-2 w-full">
            <input type="submit" name="submit" value="Send" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg" >
          </div>
        </form>
      </div>
    </div>
  </section>


    
<?php
  /*if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $message = $_POST['message'];
    $to      = 'nehajhawar1609@gmail.com';
    $subject = 'Mail from '.$name;
    $headers = 'From: '.$email . "\r\n" .
        "CC: nehajhawar1609@gmail.com";

    mail($to, $subject, $message, $headers);

  }*/
  
?>


<!--  a footer section here-->
<?php
  include("includes/footer.php");
?>
  
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
</body>
</html>
