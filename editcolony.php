
  <?php
  
session_start();
include "connection.php";


if(!isset($_COOKIE['id'])){
  $_SESSION['id'] = $_COOKIE['id'];
  header("Location:login.php");
}
else if(!isset($_SESSION['id'])){
  header("Location:login.php");
}
    mysqli_set_charset( $conn, 'utf8');
if ($_GET['id'] != 0){


      if(isset($_POST['submit'])){
      $name = $_POST['name'];

          $query = "UPDATE `address` SET colony = '".$name."' WHERE id=".$_GET['id'];
    if (mysqli_query($conn, $query)) {
          $id = mysqli_insert_id($conn);
          header("Location:dashboard.php?page=colony");
          // echo "<script>alert('Your Account has been Created successfully')</script>";



    } else {
      echo "Error:  <br>" . mysqli_error($conn);
    }
        }


      $sql = "SELECT * FROM address WHERE id = '".$_GET['id']."'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
      //   $title = $row["post_name"];
      }
}else{
  $id = 0;
    if(isset($_POST['submit'])){
      $name = $_POST['name'];


      // $query = "INSERT INTO `posts` (`id`, `post_name`, `post_subtitle`, `post_content`, `author`, `playlist`, `post_slug`, `fritzing_img`, `schematic_img`, `yt_link`, `tags`, `datetime`) VALUES (NULL, 'Light Detector using NE555 and LDR at home', 'this is a subtitle for testing', 'this is some random text', 'harsh', 'basic-electronics', 'this-is-slug-for-post', '01.jpg', '02.jpg', 'https://www.youtube.com/embed/UhTRrjYXqPU', 'ha,rsh', CURRENT_TIMESTAMP)";


          $query = "INSERT INTO `address` (`colony`) VALUES ('".$name."')";
          

    if (mysqli_query($conn, $query)) {
          $id = mysqli_insert_id($conn);
          header("Location:editcolony.php?page=colony");
          // echo "<script>alert('Your Account has been Created successfully')</script>";



    } else {
      echo "Error:  <br>" . mysqli_error($conn);
    }
        }

      $row = [
            "colony"=>""
      ];
}

       
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
  <title>Edit/Add Products</title>

  <!-- Bootstrap core CSS -->
  <link href="static/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="static/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="static/css/clean-blog.min.css" rel="stylesheet">
  <style>
    .drop{font-size:12px;font-weight:800;letter-spacing:1px;text-transform:uppercase}
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
            <h1>Add/Edit Products</h1>
            <span class="subheading">Manage Everything here</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
         <h3>Basic Actions</h3>
         <a href="dashboard.php" class="btn btn-primary">Go to DashBoard</a>
         <a href="logout.php" class="btn btn-primary">Logout</a>
         <hr>

         <h3>Edit/Add Post</h3>
      <form name="sentMessage" id="contactForm" action="editcolony.php?id=<?=$_GET['id'];?>" method="POST" enctype="multipart/form-data">
         <div class="control-group">
            <div class="form-group floating-label-form-group controls">
               <label>Name</label>
               <input name="name" type="text" value="<?=$row['colony'];?>"  class="form-control" placeholder="Name" id="name" required
                  data-validation-required-message="Please enter your name.">
               <p class="help-block text-danger"></p>
            </div>
         </div>
         <br>
         <div id="success"></div>
         <button type="submit" name="submit" class="btn btn-primary" id="sendMessageButton">Submit</button>
      </form>

        <!-- Pager
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div> -->
      </div>
    </div>
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


</body>

</html>

