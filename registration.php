<?php 
include 'config.php';
include 'opendb.php';
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

    <title>Registration</title>
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
    <form action="newregistration.php" method="post">
        <table border="0" cellspacing="1" cellpadding="3">
            <tr><td colspan="2" align="center">Enter your information</td></tr>
            <tr><td>Email Address: </td><td><input size="20" type="text" name="emailaddress"></td></tr>
            <tr><td>Password: </td><td><input size="20" type="password" name="password"></td></tr>
            <tr><td>ReType Password:  </td><td><input size="20" type="password" name="repassword"></td></tr>
            <tr><td>Complete Name  </td><td><input size="50" type="text" name="complete_name"></td></tr>
            <tr><td>Address:  </td><td><input size="80" type="text" name="address1"></td></tr>
            <tr><td></td><td><input size="80" type="text" name="address2"></td></tr>
            <tr><td>City:  </td><td><input size="30" type="text" name="city"></td></tr>
            <tr><td>State:  </td><td><input size="30" type="text" name="state"></td></tr>
            <tr><td>Country:  </td><td><input size="30" type="text" name="country"></td></tr>
            <tr><td>Zip Code:  </td><td><input size="20" type="text" name="zipcode"></td></tr>
            <tr><td>Phone No:  </td><td><input size="30" type="text" name="cellphone_no"></td></tr>
            <tr><td><input type="submit" name="submit" value="Submit"></td><td>
            <input type="reset" value="Cancel"></td></tr>
        </table>
    </form>
  </div>
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
  </html>