<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banhang";
// B1: Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// B2:
$sql = "SELECT * FROM sanpham1 ORDER BY rand() LIMIT 8";
// Bước 3
$result = mysqli_query($conn, $sql);
?>
<style>
.current-ten {
    text-transform: uppercase;
    color: green;
    font-weight: bold;
}
.card-image-link, .img {
    width: 100%; /* Đảm bảo hình ảnh chiếm 100% chiều rộng */
    height: 200px; /* Thay đổi chiều cao cho phù hợp */
}
.product {
    margin-bottom: 50px; /* Khoảng cách giữa các sản phẩm */
}


.row {
    margin-right: 0; /* Ngăn chặn khoảng cách bên phải */
    margin-left: 0; /* Ngăn chặn khoảng cách bên trái */
}

</style>
<!-- SECTION -->
<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./assetss/img/shop01.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Laptop<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./assetss/img/shop03.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Accessories<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./assetss/img/shop02.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Cameras<br>Collection</h3>
								<a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
<!-- SECTION -->
<div class="section">
    <div class="container">
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">New Products</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
                            <li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
                            <li><a data-toggle="tab" href="#tab3">Cameras</a></li>
                            <li><a data-toggle="tab" href="#tab4">Accessories</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="row">
                                <?php
                                $limit = 8; 
                                $count = 0; 
                                while ($row = mysqli_fetch_assoc($result)) { 
                                    if ($count >= $limit) {
                                        break; 
                                    }
                                ?>
                                <!-- product -->
                                <div class="col-md-3 col-xs-6">
                                    <div class="product">
                                        <div class="product-img">
                                            <a href="chitiet.php?masp=<?php echo $row['masp']; ?>">
                                                <img src="upload/<?php echo $row['img1']; ?>" alt="" class="card-image-link">
                                            </a>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"></p>
                                            <h3 class="product-name"><a href="#"><?php echo $row['tensp']; ?></a></h3>
                                            <h4 class="product-price"><?php echo $row['dongiamoi']; ?> 000 VNĐ <del class="product-old-price"><?php echo $row['dongiacu']; ?> 000 VNĐ</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                                            </div>
                                        </div>

                                        <form action="cart.php" method="post" >
                                        <div class="add-to-cart">
  <input type="submit" name="addcart" class="add-to-cart-btn" value="Add to Cart">
    

                                        <input type="hidden" name="soluong" value="1">
                                            <input type="hidden" name="tensp" value="<?php echo $row["tensp"] ?>">
                                            <input type="hidden" name="dongiamoi" value="<?php echo $row["dongiamoi"] ?> 000 VNĐ">
                                            <input type="hidden" name="img1" value="<?php echo $row["img1"] ?>">   
                                            
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /product -->
                                <?php 
                                    $count++;    
                                } 
                                ?> 
                            </div>
                        </div>
                      
                        <!-- /tab -->
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
                            </div>
        <!-- /SECTION -->
         	<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="#">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->
