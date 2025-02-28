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
        $sql = "SELECT * 
        FROM sanpham1
       
        order by rand()
          limit 8";
    //Bước 3
    $result = mysqli_query($conn, $sql);

?>
<style>
.current-ten{
    text-transform: uppercase;
    color: green;
    font-weight: bold;

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
    <div class="container">
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Hot Products</h3>
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
                      
                        <!-- /tab -->
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
                            </div>
                            </div>
        <!-- /SECTION -->
         <!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>