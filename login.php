


<div class="container">
  <h3>Login</h3>
<?php
include "config.php";
include "opendb.php";

if(isset($_POST['submit'])){

    $uname = mysqli_real_escape_string($conn,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($conn,$_POST['txt_pwd']);

    if ($uname != "" && $password != ""){

        $sql = "SELECT complete_name, email_address FROM customers WHERE email_address='".$uname."' and password = PASSWORD('".$password."')";
        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result) > 0) {
                 $row=mysqli_fetch_array($result);
                    $_SESSION['complete_name']=$row['complete_name'];
    				$_SESSION['email_address']=$row['email_address'];
                    $_SESSION["cartquantity"] = $row['cart_quantity'];
                    $_SESSION["cartprice"] = $row['cart_price'];
                    header('location:welcome.php');

		}else{
            echo "Invalid username and password.";
        }

    }else {
    echo "Your entry was invalid. Please try again.";
	}

}

mysqli_close($conn);

?>
</div>