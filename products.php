<?php
  include "config.php";
  include "opendb.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>
<body class="bg-dark">

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
<!-- content below this -->
<h2><?php echo  $_SESSION['complete_name']; ?></h2>
        <?php
        

        $sql = "SELECT products.category, products.description, products.imagename, products.item_code, products.item_name, products.model_number, products.price, products.quantity, products.weightlbs, features.feature1, features.feature2, features.feature3, features.feature4, features.feature5, features.feature6 FROM products LEFT JOIN features ON products.model_number = features.model_number";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            echo "<div class='row'>";
            while($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-lg-4 col-sm-12">
                <?php
                  $image = $row['imagename'];
                  $image_src = "images/".$image; 
                  $item_name=urlencode('$item_name'); ?>
                
                <div class="card bg-dark text-white container">
                                
                  <h3 class="card-title"><?php
                    echo "Item Name: " . $row["item_name"]. "<br>"; ?>
                  </h3>
                  
                <?php                  
                  echo '<img src="'.$image_src.'"  class="card-img-top img-thumbnail"/>'; ?>
                  

                  <div class="card-body container">
                    <h5 class="card-title"><?php
                    $item_name=$row["item_name"];
                      echo "Product Code: " . $model_number=$row["model_number"]. "<br>"; ?>
                    </h5>
                    <p class="card-text"><?php echo "Description: " . $row["description"]. "<br>"; ?> </p>
                    <p class="card-text"> <?php echo "Price: " . $price=$row["price"]. "<br>"; ?></p>
                    <?php
                    echo "Features: " . $row['feature1'] . ", " . $row['feature2'] . ", " . $row['feature3'] . ", " . $row['feature4'] . ", " . $row['feature5'] . ", " . $row['feature6'] . ". <br>"; 
                    ?>
                    <?php
                    $model_number = str_replace("<br>", "", $model_number);
                    $price = str_replace("<br>", "", $price);
                    
                  
                  echo "<form method=\"POST\" action=\"cart.php?action=add&model_number=$model_number&item_name=$item_name&price=$price\">";  
                  echo "<td colspan=\"2\" style=\"font-family:verdana; font-size:150%;\">";
                  echo " Quantity: <input type=\"text\" name=\"quantity\" size=\"2\">&nbsp;&nbsp;&nbsp;Price: " . $price . "&nbsp;&nbsp;&nbsp;";
                  echo "</td></tr><tr><td  colspan=\"2\"><input type=\"submit\" name=\"buynow\" value=\"Buy Now\" style=\"font-size:100%;\">";
                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"addtocart\" value=\"Add To Cart\" style=\"font-size:100%;\"></td>";
                  echo"  </form>"; ?>
                    
                  </div>
                </div>
            
              </div> 
               
                <?php
              
              }
              echo "</div>";
          } else {
              echo "0 results";
          }

          mysqli_close($conn);
      ?>
      
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

