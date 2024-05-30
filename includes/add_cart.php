<?php
include('includes/header.php');
include ('message.php');

if (isset($_POST['add_to_cart'])) {
    if (!isset($_SESSION['auth_user']['user_id'])) {
        $_SESSION['message'] = 'User not logged in';
        header('Location: login.php'); // Redirect to login page
        exit(0);
    }else{

   $item_id = $_POST['item_id'];
   $item_id = filter_var($item_id, FILTER_SANITIZE_STRING);
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);
   $image = $_POST['image'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);

   // Debugging: Print sanitized values
   echo "<pre>";
   echo "Sanitized values: \n";
   var_dump($user_id, $item_id, $name, $price, $qty, $image);
   echo "</pre>";

   $check_cart_numbers = $con->prepare("SELECT * FROM `cart` WHERE user_id = ? AND name = ?");
   if ($check_cart_numbers === false) {
      die("Prepare failed: " . $con->error);
  }
   $check_cart_numbers->bind_param("is", $user_id, $name);
   $check_cart_numbers->execute();
   $check_cart_numbers->store_result();

   if($check_cart_numbers->num_rows > 0){
      $_SESSION['message'] = 'already added to cart!';
   }else{
      $insert_cart = $con->prepare("INSERT INTO `cart`(user_id, item_id, name, price, qty, image) VALUES(?,?,?,?,?,?)");
      if ($insert_cart === false) {
         die("Prepare failed: " . $con->error);
     }
      $insert_cart->bind_param("iissss", $user_id, $item_id, $name, $price, $qty, $image);
      if($insert_cart->execute()){
         $_SESSION['message'] = 'added to cart!';
      }else {
         $_SESSION['message'] = 'Error adding item to cart!' . $insert_cart->error;
     }
     $insert_cart->close();
   }
   $check_cart_numbers->close();
   }

   if (isset($_SESSION['message'])) {
      echo $_SESSION['message'];
      unset($_SESSION['message']);
  }
}

?>