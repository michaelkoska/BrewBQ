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
    <?php

    include 'config.php';
    include 'opendb.php';

    $email_address = $_POST['emailaddress'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $completename = $_POST['complete_name'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $zipcode = $_POST['zipcode'];
    $cellphone_no = $_POST['cellphone_no'];

    $sql = "INSERT INTO customers(email_address, password, complete_name, address_line1, address_line2, city, state, country, zipcode, cellphone_no) VALUES ('$email_address',(PASSWORD('$password')), '$completename', '$address1','$address2','$city', '$state', '$country', '$zipcode', '$cellphone_no')";
    $result = mysqli_query($conn, $sql) or die("Query unsuccessful");
    if($conn){
        echo "Connected: "  . $country . " : " . $zipcode . " : " . $cellphone_no . " : ";
    }
    if ($result) {
        echo  "Thank you, " . $completename . ". Your account has been successfully created.";
        
		}else{
            mysqli_error($sql);
            
            echo "This email address has already been used to register an account. Please register using a different email address.";
        }


  mysqli_close($conn);

    ?>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>