
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
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
					</ul>
					<ul class="header-links pull-right">
						
                        <?php if(isset($_SESSION['user'])){ ?>
                   <li><a href="xemdonhang_dadat.php"><i class="fa fa-file-invoice"></i> Đơn Hàng</a></li>        
           <li><a href="logout.php"><i class="fa fa-sign-out-alt"></i> Đăng xuất</a></li>         
						<li><a href="#"><i class="fa fa-user-o"></i> <?php echo $_SESSION['user']; ?></a></li>


                        <?php } else { ?>
                            <li><a href="login.php"><i class="fa fa-user-o"></i>Đăng Nhập</a></li>
                            <li><a href="dangki.php"><i class="fa fa-user-plus"></i>Đăng Kí</a></li>  
                            <?php } ?> 
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="index.php" class="logo">
									<img src="./assetss/img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

<!-- SEARCH BAR -->
<div class="col-md-6">
    <div class="header-search" style="display: flex; align-items: center;">
        <form action="cat.php" method="GET" style="margin-right: 0px;">
            <select name="nhom_id" class="input-select" onchange="this.form.submit()">
                <option value="">Danh Mục</option>
                <?php while ($row_nhom = mysqli_fetch_assoc($result_nhom)) { ?>
                    <option value="<?php echo $row_nhom["id"]; ?>"><?php echo $row_nhom["tennhom"]; ?></option>
                <?php } ?>
            </select>
        </form>

        <form action="timkiemsp.php" method="GET" style="display: flex; align-items: center;">
            <input type="text" name="timkiem" class="input" placeholder="Tìm kiếm ..."
                   style="width: 300px; padding: 10px; font-size: 16px;" 
                   value="<?php if (isset($_GET['timkiem'])) { echo htmlspecialchars($_GET['timkiem']); } ?>">
            <button type="submit" class="search-btn">Search</button>
        </form>
    </div>
</div>
<!-- /SEARCH BAR -->
						<div class="col-md-3 clearfix">
    <div class="header-ctn">
        <!-- Wishlist -->
        <div>
            <a href="#">
                <i class="fa fa-heart-o"></i>
                <span>Your Wishlist</span>
                <div class="qty">2</div>
            </a>
        </div>
        <!-- /Wishlist -->

        <?php if (isset($_SESSION['user'])) { ?>
            <!-- Cart -->
            <div class="dropdown">
                <a href="cart.php" class="dropdown-toggle" aria-expanded="true">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Your Cart</span>
                    <div class="qty"><?php echo isset($_SESSION['giohang']) ? count($_SESSION['giohang']) : 0; ?></div>
                </a>
            </div>
            <!-- /Cart -->
        <?php } else { ?>
            <div class="dropdown">
                <a href="login.php" class="dropdown-toggle" aria-expanded="true">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Your Cart</span>
                    <div class="qty">0</div>
                </a>
            </div>
        <?php } ?>
    </div>
    <!-- /Menu Toogle -->
</div>
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
	<!-- NAVIGATION -->
    <nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="index.php">Trang Chủ</a></li>
						
						<li><a href="fullsp.php">Sản Phẩm</a></li>
						<li><a href="tintuc.php">Tin Tức</a></li>
						<li><a href="lienhe.php">Liên Hệ</a></li>
		
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

        	<!-- jQuery Plugins -->
		<script src="./assetss/js/jquery.min.js"></script>
		<script src="./assetss/js/bootstrap.min.js"></script>
		<script src="./assetss/js/slick.min.js"></script>
		<script src="./assetss/js/nouislider.min.js"></script>
		<script src="./assetss/js/jquery.zoom.min.js"></script>
		<script src="./assetss/js/main.js"></script>