<?php
session_start();
include "connection.php";


mysqli_set_charset($conn, 'utf8');









if (!isset($_COOKIE['id'])) {
  $_SESSION['id'] = $_COOKIE['id'];
  header("Location:login.php");
} else if (!isset($_SESSION['id'])) {
  header("Location:login.php");
}
// $title = "Dashboard | Circuit Reboot";
// include "header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171634979-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag("js", new Date());

  gtag("config", "UA-171634979-1");
</script> -->

  <meta charset="utf-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <title>DashBoard</title>

  <!-- Bootstrap core CSS -->
  <link href="static/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="static/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="static/css/clean-blog.min.css" rel="stylesheet">
  <style>
    .drop {
      font-size: 12px;
      font-weight: 800;
      letter-spacing: 1px;
      text-transform: uppercase
    }
  </style>
</head>

<body>


  <!-- Page Header -->
  <header class="masthead" style="background-image: url('static/img/dashboard.jpg');background-size:streched">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Admin Panel</h1>
            <span class="subheading">Manage Everything here</span>
          </div>
        </div>
      </div>
    </div>
  </header>




  <div class="w3-bar w3-black">
    <button class="w3-bar-item w3-button" onclick="openCity('orders')">Orders</button>
    <button class="w3-bar-item w3-button" onclick="openCity('products')">Products</button>
    <button class="w3-bar-item w3-button" onclick="openCity('colony')">Colony</button>
    <button class="w3-bar-item w3-button" onclick="openCity('overall')">OverAll</button>
  </div>

  <div id="orders" class="w3-container city">
    <!-- <div class="w3-dropdown-click">
  <button onclick="myFunction()" class="w3-button w3-black">Select View</button>
  <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border">
    <a href="dashboard.php" class="w3-bar-item w3-button">All Orders</a>
    <a href="dashboard.php?paid=0" class="w3-bar-item w3-button">Not Paid</a>
    <a href="dashboard.php?delivered=0" class="w3-bar-item w3-button">Not Delivered</a>
  </div>
</div> -->
    <form action="dashboard.php" method="get">
      <input type="date" name="date" value="<?= $_GET['date'] ?>">
      <button type="submit" class="btn btn-primary">Search</button>

    </form>


    <script>
      function myFunction() {
        var x = document.getElementById("Demo");
        if (x.className.indexOf("w3-show") == -1) {
          x.className += " w3-show";
        } else {
          x.className = x.className.replace(" w3-show", "");
        }
      }
    </script>

    <a href="logout.php" class="btn btn-primary">Logout</a>
    <table class="w3-table w3-striped">

      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Colony</th>
        <th>Address</th>
        <th>Note</th>
        <th>Order Detail</th>
        <th>Date</th>
        <th>Paid</th>
        <th>Delivered</th>

      </tr>
      <?php
      date_default_timezone_set("Asia/Kolkata");

      if (isset($_GET['date'])) {
        $sqlorder = "SELECT * FROM `order` WHERE `date`='" . $_GET['date'] . "'";
      } else if (isset($_GET['paid'])) {
        $sqlorder = "SELECT * FROM `order` WHERE `paid`=0";
      } else if (isset($_GET['delivered'])) {
        $sqlorder = "SELECT * FROM `order` WHERE `delivered`=0";
      } else {

        $sqlorder = "SELECT * FROM `order` WHERE `date`='" . date("Y-m-d") . "' AND (`paid` = '0' OR `delivered`= '0')";
      }
      $resultorder = mysqli_query($conn, $sqlorder);

      $totalPrice = 0;
      $totalWeight = 0;
      // echo "nextpage :".$nextpage;
      if (mysqli_num_rows($resultorder) > 0) {
        $n = 1;
        while ($row = mysqli_fetch_assoc($resultorder)) {
          echo ' <tr>
      <th>' . $n . '</th>
      <td>' . $row['name'] . '</td>
      <td>' . $row['number'] . '</td>
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
      <td>' . $row['date'] . '</td>
      <td>';
          if ($row['paid']) {
            echo  "Paid";
          } else {
            echo '<a href="paid.php?id=' . $row['id'] . '"onclick="return confirm(\'Are you sure?\nPayment id Done\')"  class="btn btn-primary">PAid</a>';
          }
          echo '</td>
      <td>';
          if ($row['delivered']) {
            echo  "Delivered";
          } else {

            echo '<a href="delivered.php?id=' . $row['id'] . '" onclick="return confirm(\'Are you sure?\nProduct is Delivered\')" class="btn btn-primary">Delivered</a>';
          }

          echo '</td>
      

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


      ?>

    </table>
  </div>

  <div id="products" class="w3-container city" style="display:none">

    <a href="editproduct.php?id=0" class="btn btn-primary">Add Product</a>
    <a href="logout.php" class="btn btn-primary">Logout</a>
    <hr>
    <table class="w3-table w3-striped">
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>हिंदी</th>
        <th>Image</th>
        <th>Marked Price</th>
        <th>Our Price</th>
        <th>Exotic</th>
        <th>Kg/Unit</th>
        <th>Edit</th>
        <th>Remove</th>

      </tr>
      <?php


      $sqlproduct = "SELECT * FROM `products`";
      $resultproduct = mysqli_query($conn, $sqlproduct);


      // echo "nextpage :".$nextpage;
      if (mysqli_num_rows($resultproduct) > 0) {
        $n = 1;
        while ($row = mysqli_fetch_assoc($resultproduct)) {
          echo ' <tr>
      <th>' . $n . '</th>
      <td>' . $row['name'] . '</td>
      <td>' . $row['hindi'] . '</td>
      <td><img width="50px" src="img/products/' . $row['img'] . '"></td>
      <td>&#8377;' . $row['markedprice'] . '</td>
      <td>&#8377;' . $row['ourprice'] . '</td>
      <td>' . $row['exotic'] . '</td>
      <td>' . $row['kgunit'] . '</td>
      <td><a href="edit.php?id=' . $row['id'] . '" class="btn btn-primary">Edit</a></td>
      <td><a href="deleteproduct.php?id=' . $row['id'] . '"onclick="return confirm(\'Do you Really want to Delete ' . $row['name'] . ' from Product List \')"  class="btn btn-primary"><i class="fas fa-trash-alt"></i></a></td>
    </tr>';
          $n += 1;
        }
      } else {
        echo "No Results Found";
      }


      ?>

    </table>
  </div>

  <div id="colony" class="w3-container city" style="display:none">

    <a href="editcolony.php?id=0" class="btn btn-primary">Add Colony</a>
    <a href="logout.php" class="btn btn-primary">Logout</a>
    <hr>
    <table class="w3-table w3-striped">
      <tr>
        <th>No.</th>
        <th>Colony</th>
        <th>Remove</th>

      </tr>
      <?php


      $sqlcolony = "SELECT * FROM `address`";
      $resultcolony = mysqli_query($conn, $sqlcolony);


      // echo "nextpage :".$nextpage;
      if (mysqli_num_rows($resultcolony) > 0) {
        $n = 1;
        while ($row = mysqli_fetch_assoc($resultcolony)) {
          echo ' <tr>
      <th>' . $n . '</th>
      <td>' . $row['colony'] . '</td>
      <td><a href="editcolony.php?id=' . $row['id'] . '" class="btn btn-primary">Edit</a></td>

      <td><a href="deletecolony.php?id=' . $row['id'] . '" class="btn btn-primary"><i class="fas fa-trash-alt"></i></a></td>
    </tr>';
          $n += 1;
        }
      } else {
        echo "No Results Found";
      }


      ?>

    </table>
  </div>


  <div id="overall" class="w3-container city" style="display:none">

    <form action="dashboard.php" method="get">
      <input type="date" name="date" value="<?= $_GET['date'] ?>">
      <input type="hidden" name="page" value="overall" id="">
      <button type="submit" class="btn btn-primary">Search</button>

    </form>
    <a href="logout.php" class="btn btn-primary">Logout</a>
    <hr>
    <table class="w3-table w3-striped">
      <tr>
        <th>No.</th>
        <th>Product</th>
        <th>Price</th>
        <th>Weight</th>

      </tr>
      <?php
      $vegetables = [];
      // $vegetables['1'] = ["name" => "somename", "price" => 0, "weight" => 0];
      // $vegetables['3'] = ["name" => "somename", "price" => 0, "weight" => 0];
      // $vegetables['2'] = ["name" => "somename", "price" => 0, "weight" => 0];



      $sqldemand = "SELECT * FROM `products`";
      $resultdemand = mysqli_query($conn, $sqldemand);


      // echo "nextpage :".$nextpage;
      $totalPrice = 0;
      $totalWeight = 0;
      if (mysqli_num_rows($resultdemand) > 0) {
        $n = 1;
        while ($row = mysqli_fetch_assoc($resultdemand)) {
          $vegetables[$row['id']] = ["name" => $row['name'], "price" => 0, "demand" => 0];
          
        }
      } else {
        echo "No Results Found";
      }











      if (isset($_GET['date'])) {
        $sqlextra = "SELECT * FROM `order` WHERE `date`='" . $_GET['date'] . "'";
      } else if (isset($_GET['paid'])) {
        $sqlextra = "SELECT * FROM `order` WHERE `paid`=0";
      } else if (isset($_GET['delivered'])) {
        $sqlextra = "SELECT * FROM `order` WHERE `delivered`=0";
      } else {

        $sqlextra = "SELECT * FROM `order` WHERE `date`='" . date("Y-m-d") . "'";
      }
      $resultextra = mysqli_query($conn, $sqlextra);
      // echo "nextpage :".$nextpage;
      if (mysqli_num_rows($resultextra) > 0) {
        while ($row = mysqli_fetch_assoc($resultextra)) {

          $products = explode("----", $row['orderquery']);
          foreach ($products as $product) {
            # code...

            $detail = explode("-", $product);
            // echo $vegetables[$detail[0]]["price"];
            $vegetables[$detail[0]]["price"]+= $detail[2] * $detail[3];
            $vegetables[$detail[0]]["demand"] += $detail[2] * $detail[3];
  //           echo '<tr>
  //   <td>' . $detail[1] . '</td>
  //   <td>	&#8377;' . $detail[2] * $detail[3] . '</td>
  //   <td>' . $detail[3] . '</td>
  // </tr>';
          }
        }
      }else{
        echo "No Result Found";
        // echo "sql : ".$sqlextra;
      }







  foreach ($vegetables as $key => $value) {
    # code...
    // echo $key . " " . $vegetables[$key]["name"];
    # code...
    
  echo ' <tr>
      <th>' . $n . '</th>
      <td>' . $value['name'] . '</td>
      <td>&#8377;' .  $value['price'] . '</td>
      <td>' . $value['demand'] . '</td>
    </tr>';
  $totalPrice +=  $value['price'];
  $totalWeight += $value['demand'];
  $n += 1;

  }




  echo ' <tr>
      <th>--</th>
      <td>Total</td>
      <td>&#8377;' . $totalPrice . '</td>
      <td>' . $totalWeight . '</td>
    </tr>';
      ?>

    </table>
  </div>














  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

          <p class="copyright text-muted">Copyright &copy; 2020 - The Fresh Vegetables</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="static/vendor/jquery/jquery.min.js"></script>
  <script src="static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    function openCity(cityName) {
      var i;
      var x = document.getElementsByClassName("city");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      document.getElementById(cityName).style.display = "block";
    }
  </script>
  <?php

  if (isset($_GET['page'])) {
    echo "<script>openCity('" . $_GET['page'] . "');</script>";
  }
  ?>


</body>

</html>