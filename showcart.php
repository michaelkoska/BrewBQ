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
  <body class="bg-dark text-white">

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
  include "config.php";
  include "opendb.php";

  if ( !isset($totalamount)) {
    $totalamount=0;
  }
    $totalquantity=0;
    if (!session_id()) {
    session_start();
  }
    $sessid = session_id();
    $sql = "SELECT cart_sess, cart_model_number, cart_quantity, cart_item_name, cart_price FROM shopping_cart WHERE cart_sess = '$sessid'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)==0)
  {
  echo "<div class=\"text-dark text-center rounded mt-5 col-2 empty-cart\" style=\"margin:auto;\">Your Cart is empty</div> ";
  }
  else
  {
  ?>
  <table class="table table-dark text-white" border="1" align="center" cellpadding="5">
  <tr><td> Model Number</td><td>Quantity</td><td>Item Name</td><td>Price</td><td>Total Price</td>
  <?php
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        extract($row);
        echo "<tr><td>";
        echo $cart_model_number;
        echo "</td>";
        echo "<td><form method=\"POST\" action=\"cart.php?action=change&icode=$cart_model_number\"><input type=\"text\" name=\"modified_quantity\" size=\"2\" value=\"$cart_quantity\">";
        echo "</td><td>";
        echo $cart_item_name;
        echo "</td><td>";
        echo $cart_price;
        echo "</td><td>";

        $totalquantity = $totalquantity + $cart_quantity;
        $totalprice = number_format($cart_price * $cart_quantity, 2);
        $totalamount=$totalamount + ($cart_price * $cart_quantity);

        echo $totalprice;
        echo "</td><td>";
        echo "<input class=\"btn btn-outline-primary\" type=\"submit\" name=\"Submit\"  value=\"Change quantity\"></form></td>";
        echo "<td>";
        echo "<form method=\"POST\" action=\"cart.php?action=delete&icode=$cart_model_number\">";
        echo "<input class=\"btn btn-outline-primary\" type=\"submit\" name=\"Submit\" value=\"Delete Item\"></form></td></tr>";
      }

      echo "<tr><td >Total</td><td>$totalquantity</td><td></td><td></td><td>";

      $totalamount = number_format($totalamount, 2);
      echo $totalamount;
      echo "</td></tr>";
      echo "</table><br>";
      echo "<div style=\"width:400px; margin:auto;\">You currently have " . $totalquantity . " product(s) selected in your cart</div> ";
  ?>

  <table class="table table-dark text-white" border="0" style="margin:auto;">
  <tr>
  <td>
  <form method="POST" action="checkout.php">
  <input id="cartamount" name="cartamount" type="hidden" value= "<?php echo $totalamount ; ?>">
  <input class="btn btn-success" type="submit" name="Submit" value="Checkout"  style="font-family:verdana; font-size:150%;" >
  </form>
  </td>
  <td  style="padding: 10px;">
  <form method="POST" action="cart.php?action=empty">
  <input class="btn btn-danger" type="submit" name="Submit" value="Empty Cart" style="font-family:verdana; font-size:150%;" >
  </form>
  </td></tr></table>
  <?php
  }
  ?>

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      </body>
  </html>