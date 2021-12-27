<?php
    include "config.php";
    include "opendb.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css" type="text/css">

    <title>Checkout</title>
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

    <?php


  if ( ! isset($totalamount)) {
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
  <div class="container col-lg-6">
  <table class="table table-hover table-dark text-white" border="1" align="center" cellpadding="5">
  <thead class="table-dark"><td>Model Number</td><td>Quantity</td><td>Item Name</td><td>Price</td><td>Total Price</td>
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
        $totalamount = $totalamount + ($cart_price * $cart_quantity);

        echo $totalprice;
      }
      echo "</td></tr>";
      echo "</table><br>";
      echo "<div style=\"width:400px; margin:auto;\">You currently have " . $totalquantity . " product(s) selected in your cart</div> ";
  ?>
</div>
  <table border="0" style="margin:auto;">
  <tr><td  style="padding: 10px;">


    </td><td>

  </td></tr></table>

  <div class="container" >
    <div class="row">
        <div class="col-xs-12 col-md-6"style="margin:auto">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Payment Details
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form">
                    <div class="row">
                        <div class="col-xs-9 col-md-9">
                            <div class="form-group">
                                <label for="cardholderName">
                                    Card Holder's Full Name</label>
                                <div class="col-xs-9 col-lg-9 pl-ziro">
                                    <input type="text" class="form-control" id="cardholderName" placeholder="Full Name" required />
                                </div>

                            </div>
                        </div>
                        <div class="col-xs-3 col-md-3 pull-right">
                            <div class="form-group">
                                <label for="billingZip">
                                    Billing Zip</label>
                                <input type="text" class="form-control" id="billingZip" placeholder="00000" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cardNumber">
                            CARD NUMBER</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="cardNumber" placeholder="Valid Card Number"
                                required autofocus />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 col-md-7">
                            <div class="form-group">
                                <label for="expiryMonth">
                                    EXPIRY DATE</label>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expiryMonth" placeholder="MM" required />
                                </div>
                                <div class="col-xs-6 col-lg-6 pl-ziro">
                                    <input type="text" class="form-control" id="expiryYear" placeholder="YY" required /></div>
                            </div>
                        </div>
                        <div class="col-xs-5 col-md-5 pull-right">
                            <div class="form-group">
                                <label for="cvCode">
                                    CV CODE</label>
                                <input type="password" class="form-control" id="cvCode" placeholder="CV" required />
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><span class="badge pull-right"><span class="glyphicon glyphicon-usd"></span><?php echo "<h3>". $totalamount."</h3>" ;?></span> Final Payment</a>
                </li>
            </ul>
            <br/>
            <a href="#" class="btn btn-success btn-lg btn-block" role="button">Pay</a>
        </div>
    </div>
</div>

  <?php
  }
  ?>