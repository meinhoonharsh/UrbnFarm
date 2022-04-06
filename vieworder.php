<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/layout.css">
   <link rel="stylesheet" href="css/responsive.css">
   <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
   <!--Font Awesome-->
   <script src="https://kit.fontawesome.com/c5fe5e7547.js" crossorigin="anonymous"></script>
   <!--IcoFont-->
   <link rel="stylesheet" href="icofont/icofont.min.css">
   <!--Animate on Scroll-->
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <!--Animate.CSS-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
   <!--Slick Slider-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" />
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

   <title>Urbn Farm - Buy Fresh Vegetables Online</title>

   <meta charset='UTF-8'>
   <meta name='keywords' content='fresh vegetable,fresh veggies, fresh vegetable in bhopal, bhopal vegetable, fresh vegetable bhopal,Buy Vegetables Online, Online Vegetables, Vegetables Store, Online Vegetables Shopping, Online Vegetables Store,Urban Farm, Urbn Farm, Urban Farms, Online Supermarket, Free Delivery, Great Offers, Best Prices, bhopal, fresh vegetable near me, online fresh vegetable, online fresh vegetable in bhopal, bhopal best online vegetable store, online vegetable purchase, online fresh vegetable buy, harsh vishwakarma, harsh vishwakarma website, online buy vegeatble, online vegetable in bhopal, bhopal best online vegetable store, online bhopal sabzi store, buy sabzi in bhopal, online bhopal sabzi, sabzi in bhopal, bhopal sabzi, sabzi buy online'>
   <meta name='description' content='Buy fresh vegetables & green vegetables online at best prices and experience the ease of online shopping only at The Fresh Vegetable. Shop for potato,  beans, broccoli, tomato, onion and more online.'>
   <meta name='subject' content='Buy Fresh Vegetables Online'>
   <meta name='copyright' content='Urbn Farm'>
   <meta name='language' content='ES'>
   <meta name='summary' content=''>
   <meta name='Classification' content='Business'>
   <meta name='author' content='Harsh Vishwakarma, harshprogrammer782@gmail.com'>
   <meta name='designer' content='Harsh Vishwakarma'>
   <meta name='reply-to' content='email@hotmail.com'>
   <meta name='owner' content=''>
   <meta name='category' content='urbn farm'>
   <meta name='subtitle' content='This is my subtitle'>
   <meta name='date' content='Jan. 20, 2021'>
   <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
   <div class="bodydiv">

      <div class="header">
         <img class="animate__fadeInLeft animate__animated logo" src="img/logo.png" alt=" Urbn Farm Logo">
         <i id="bar" class="fas fa-bars"></i>
         <div class="navigationbar">
            <a href="#home" class="animate__fadeInUp animate__animated navitem">HOME</a>
            <a href="#about" class="animate__fadeInUp animate__animated navitem">ABOUT</a>
            <!-- <a href="#ogc" class="animate__fadeInUp animate__animated navitem">OUR GROUP COMPANIES</a> -->
            <a href="#testimonial" class="animate__fadeInUp animate__animated navitem">TESTIMONIAL</a>
            <a href="products.php" class="animate__fadeInUp animate__animated navitem">ORDER NOW</a>
            <a href="https://api.whatsapp.com/send?phone=+919584006195&text=Hi, I want to order fresh vegetables for tomorrow." class="animate__fadeInUp animate__animated navitem">Whatsapp</a>
         </div>
      </div>






      <div id="viewbox">
         <div>
            <form action="vieworder.php" method="post">
               <input class="form-control" type="text" onkeyup="this.value=this.value.replace(/[^\d]/,'')" MAXLENGTH="10" name="number" placeholder="Your Number" required>
               <input class="form-control" type="date" name="date" id="" required>
               <button type="submit" name="submit" class="form-control btn btn-success">Search</button>
            </form>
         </div>
         <table class="w3-table w3-striped">

            <?php
            date_default_timezone_set("Asia/Kolkata");
            include "connection.php";
            if (isset($_POST['submit'])) {
               # code...


               $sqlorder = "SELECT * FROM `order` WHERE `date`='" . $_POST['date'] . "' AND `number` = '" . $_POST['number'] . "'";

               $resultorder = mysqli_query($conn, $sqlorder);

               $totalPrice = 0;
               $totalWeight = 0;
               // echo "nextpage :".$nextpage;
               if (mysqli_num_rows($resultorder) > 0) {
                  $n = 1;

            echo '<tr>
               <th>No.</th>
               <th>Name</th>
               <th>Phone</th>
               <th>Colony</th>
               <th>Address</th>
               <th>Note</th>
               <th>Order Detail</th>

            </tr>';
                  while ($row = mysqli_fetch_assoc($resultorder)) {
                     echo ' <tr>
      <th>' . $n . '</th>
      <td>' . $row['name'] . '</td>
      <td><a href="tel:' . $row['number'] . '">' . $row['number'] . '</a></td>
      <td>' . $row['colony'] . '</td>
      <td>' . $row['address'] . '</td>
      <td>' . $row['extranote'] . '</td>
      <td><table style="">';

                     $products = explode("----", $row['orderquery']);
                     foreach ($products as $product) {
                        # code...

                        $detail = explode("-", $product);
                        echo '<tr>
    <td>' . $detail[1] . '</td>
    <td>	&#8377;' . $detail[2] * $detail[3] . '</td>
    <td>' . $detail[3] . '</td>
  </tr>';
                     }
                     echo '<tr>
    <td>Total</td>
      <td>&#8377;' . $row['price'] . '</td>
      <td>' . $row['weight'] . '</td>
  </tr>';
                     echo '
</table></td>
      

    </tr>';
                     $n += 1;

                     $totalPrice += $row['price'];
                     $totalWeight += $row['weight'];
                  }
                  echo ' <tr>
      <th>--</th>
      <td>Total</td><td>-</td><td>-</td><td>-</td><td>-</td>
      <td><table>
      <tr>
      <td>Overall</td>
      <td>&#8377;' . $totalPrice . '</td>
      <td>' . $totalWeight . 'Kg</td>
      </tr></table></td>
    </tr>';
               } else {
                  echo "No Results Found";
               }
            }


            ?>

         </table>

      </div>






      <div id="footer">
         <div class="footertop">
            <div>
               <h2>Contact Us:</h2>
               <table>
                  <tr>
                     <td><span>Phone: </span></td>
                     <td>7987303675</td>
                  </tr>
                  <tr>
                     <td></td>
                     <td>7415374899</td>
                  </tr>
                  <tr>
                     <td><span>Email: </span></td>
                     <td>support@urbnfarm.in</td>
                  </tr>
                  <tr>
                     <td><span>Address:</span> </td>
                     <td>Shop-09, Girnar Hills near by</td>
                  </tr>
                  <tr>
                     <td></td>
                     <td>Galaxy City, Bhopal (462022)</td>
                  </tr>
               </table>
            </div>
            <div>
               <h2>About Us</h2>
               <a href="#about">About</a><br>
               <!-- <a href="ogc">Our Group Companies</a> -->
            </div>
            <div>
               <h2>Quick Link</h2>
               <a href="#testimonial">Testimonial</a><br>
               <a href="products.php">Order Now</a>
            </div>
         </div>
         <div class="footerbottom">
            Designed with &#10084; by <a href="#">Harsh Vishwakarma</a>
         </div>
      </div>












   </div>








































   <!-- Optional JavaScript; choose one of the two! -->

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
   </script>

   <!-- Option 2: Separate Popper and Bootstrap JS -->
   <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->




   <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
   <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous"></script>

   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script type="text/javascript">
      AOS.init();

      $('.autoplay').slick({
         slidesToShow: 4,
         slidesToScroll: 1,
         autoplay: true,
         autoplaySpeed: 2000,
         adaptiveHeight: true,
         responsive: [{
               breakpoint: 1024,
               settings: {
                  slidesToShow: 3,
                  slidesToScroll: 1,
                  infinite: true,
                  dots: true
               }
            },
            {
               breakpoint: 600,
               settings: {
                  slidesToShow: 2,
                  slidesToScroll: 1
               }
            },
            {
               breakpoint: 480,
               settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
               }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
         ]
      });
      $('.testimonialslider').slick({
         slidesToShow: 1,
         slidesToScroll: 1,
         autoplay: true,
         autoplaySpeed: 2000
      });


      $("#bar").click(function() {
         $(".navigationbar").slideToggle();
         console.log("This Works");
      });
   </script>
</body>

</html>