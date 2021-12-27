<?php
include('config.php');
if(!isset($_SESSION['email_address'])){
    header('location:login.html');
    $rt=0;
}else{
    include("header.php");
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
</head>

<body>
	<h1>Welcome to the site, <?php echo  $_SESSION['complete_name']; ?> ! </h1>

</body>
</html>


<?php
     }
?>