<?php
   include "connection.php";
   if(isset($_POST['submit'])){
      $name = $_POST['cust_name'];
      $mobile = $_POST['cust_mobile'];
      $colony = $_POST['cust_colony'];
      $address = $_POST['cust_addr'];
      $extranote = $_POST['remark'];
      $data = $_POST['my-order-data'];
      $price = $_POST['my-order-price'];
      $weight = $_POST['my-order-weight'];
      $data = str_replace(",","-",$data);
      // echo "Data  : ".$data."<br>";
      $products = explode("----",$data);
      // echo "Products  : ".$products."<br>";

      if($data=='0'){
         echo "<script>alert('You have not Selected any Product');
window.location.replace('products.php');</script>";
   //   header('Location:index.php');
      }

      $query =  "INSERT INTO `order` (`name`,`number`,`colony`,`address`,`extranote`,`orderquery`,`price`,`weight`,`paid`,`delivered`) VALUES ('".$name."','".$mobile."','".$colony."','".$address."','".$extranote."','".$data."',".$price.",".$weight.",0,0)";
      
           if (mysqli_query($conn, $query)) {
              foreach ($products as $product) {
                 $detail = explode("-",$product);
                 $query2 = "SELECT * from `products` WHERE id =".$detail[0];
               $result2 = mysqli_query($conn, $query2);

    
    if (mysqli_num_rows($result2) > 0) {

      while($row = mysqli_fetch_assoc($result2)) {
         // echo "ID : ".$row['demand']."<br>";
            // echo (int)$detail[3]+(int)$row['demand'];
            $newdemand = (float)$detail[3]+(float)$row['demand'];
            $query3 =  "UPDATE `products` SET demand = ".$newdemand." WHERE id=".(int)$detail[0];
    if (mysqli_query($conn, $query3)) {
         //  $id = mysqli_insert_id($conn);
    } else {
      echo "Error:  <br>" . mysqli_error($conn);
    }
      }

    } else {
      echo "No Results Found";
    }
}
           }else{
            echo 'cant add data to all posts';
           }

   }else{
     header('Location:index.php');
   }
?>