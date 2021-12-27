<?php
            include "config.php";
            include "opendb.php";
    ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css" type="text/css">

    <title>Shopping Cart</title>
  </head>
  <body>

  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html">BrewBQ<span class="material-icons">
          outdoor_grill
          </span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-auto" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="team.html">Meet The Team</a>
            </li>          
            <li class="nav-item">
              <a class="nav-link" href="products.php">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.html">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="checkout.php">Checkout</a>
            </li>        
            <li class="nav-item">
              <a class="nav-link" href="showcart.php"><span class="material-icons">
                shopping_cart
                </span>
              </a>                
            </li>
          </ul>
        </div>
      </div>
    </nav>

<div class="container">

      <?php

      if (session_status() == PHP_SESSION_NONE) {
          session_start();
          }

          $quantity="";
          $action="";
          $sql="";

          if (isset($_POST['quantity'])) {
            $quantity = trim($_POST['quantity']);
          }

          if ($quantity=='')
          {
            $quantity=1;
          }

          if($quantity <=0)
          {
            echo "The quantity entered is invalid. Please try again.";
          }
          else
          {
              $message="";
            if (isset($_REQUEST['model_number'])) {
            $model_number = $_REQUEST['model_number'];
          }
            if (isset($_REQUEST['item_name'])) {
            $item_name = $_REQUEST['item_name'];
          }
            if (isset($_REQUEST['price'])) {
            $price = $_REQUEST['price'];
          }
            if (isset($_POST['modified_quantity'])) {
            $modified_quantity = $_POST['modified_quantity'];
          }
            $sess = session_id();
            if (isset($_REQUEST['action'])) {
            $action = $_REQUEST['action'];
          }

          switch ($action) {

          case "add":
            
            $sql="SELECT cart_sess, cart_quantity, cart_model_number, cart_item_name, cart_price from shopping_cart where cart_sess = '$sess' and cart_model_number like '$model_number'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)==1) {

                  $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
                  $qt=$row['cart_quantity'];
                  $qt=$qt + $quantity;
                  $sql="UPDATE shopping_cart set cart_quantity=$qt where cart_sess = '$sess' and cart_model_number like '$model_number'";
                  $result = mysqli_query($conn, $sql);
                }
          else
          {
            $sql = "INSERT INTO shopping_cart (cart_sess, cart_quantity, cart_model_number, cart_item_name, cart_price) VALUES ('$sess', '$quantity', '$model_number', '$item_name', '$price')";
             $message ="<div align=\"center\"><strong>Item added.</strong></div>";
          }
          break;

          case "change":
          if($modified_quantity==0)
          {
          $sql = "DELETE FROM shopping_cart WHERE cart_sess = '$sess' and cart_model_number like '$model_number'";
          $message = "<div style=\"width:200px; margin:auto;\">Item deleted</div>";
          }
          else
          {
          if($modified_quantity <0)
          {
          echo "Invalid quantity entered";
          }
          else
          {
          $model_number=$cart_model_number=$_GET['icode'];
          $sql = "UPDATE shopping_cart SET cart_quantity = $modified_quantity  WHERE cart_sess = '$sess' and cart_model_number like '$model_number'";
          $message = "<div style=\"width:200px; margin:auto;\">Quantity changed</div>";
          }
          }
          break;
          case "delete":
          $model_number=$cart_model_number=$_GET['icode'];
          $sql = "DELETE FROM shopping_cart WHERE cart_sess = '$sess' and cart_model_number like '$model_number'";
          $message = "<div style=\"width:200px; margin:auto;\">Item deleted</div>";
          break;
          case "empty":
          $sql = "DELETE FROM shopping_cart WHERE cart_sess = '$sess'";
          break;
          }
          if($sql !="")
          {
          $result = mysqli_query($conn, $sql);

          echo $message;

          }
          include("showcart.php");
          echo '<SCRIPT LANGUAGE=\"JavaScript\">updateCart();</SCRIPT>';
          }
          ?>

</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


      </body>
  </html>