
<?php 	  session_start();
//   if(isset($_SESSION)){

//   }
 
 
 ?>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "banhang";

    //B1: Create connetion
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    //check connection
    
    if (!$conn) {
        die("connection failer" . mysqli_connect_error());
    }
    //B2:
    $sql_nhom = "SELECT * FROM `sanpham_nhom` ";
   ;
    //Bước 3
    $result_nhom = mysqli_query($conn, $sql_nhom);
   
    $addToCartClicked = isset($_POST['addcart']);

    if ($addToCartClicked && !isset($_SESSION['user'])) {
        // Người dùng chưa đăng nhập và đã nhấn nút "Thêm vào giỏ hàng"
        // Chuyển hướng đến trang login.php
        header("Location: login.php");
        exit();
    }

   
    ?>
    <style>

</style>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="./assetss/css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="./assetss/css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="./assetss/css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="./assetss/css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="./assetss/css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="./assetss/css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		
                        <?php if(isset($_SESSION['user'])){ ?>
       
						<li><a href="#"><i class="fa fa-user-o"></i> <?php echo $_SESSION['user']; ?></a></li>


                            <?php } ?> 
	