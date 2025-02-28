
<?php
   include "thuvien.php";
//Lấy thông tin bản ghi cần sửa
$masp = isset($_GET['masp']) ? $_GET['masp'] : '';
$sql = "SELECT * FROM `sanpham1`WHERE masp='$masp' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
?>
 	

<style>
.product-preview img {
    transition: transform 0.5s; /* Hiệu ứng chuyển tiếp */
}

.product-preview:hover img {
    transform: scale(1.1); /* Tăng kích thước ảnh */
}
.product-image {
    height: 300px !important; /* Chiều cao cố định */
    width: 300px !important; /* Chiều rộng cố định */
    object-fit: cover !important; /* Cắt ảnh để lấp đầy không gian mà không làm biến dạng ảnh */
}
</style>

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li><a href="#">All Categories</a></li>
							<li><a href="#">Accessories</a></li>
							<li><a href="#">Headphones</a></li>
							<li class="active">Product name goes here</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
                        <div class="product-preview">
								<img src="upload/<?php echo $row['img1'] ?>"alt="" style="width:100%;height: 390px;">
							</div>

							<div class="product-preview">
								<img src="upload/<?php echo $row['img2'] ?>" alt="" style="width:100%;height: 390px;">
							</div>

							<div class="product-preview">
								<img src="upload/<?php echo $row['img3'] ?>" alt="" style="width:100%;height: 390px;">
							</div>

							<div class="product-preview">
								<img src="upload/<?php echo $row['img4'] ?>" alt="" style="width:100%;height: 390px;">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="upload/<?php echo $row['img1'] ?>"alt="" style="width:100%;height: 130px;">
							</div>

							<div class="product-preview">
								<img src="upload/<?php echo $row['img2'] ?>" alt="" style="width:100%;height: 130px;">
							</div>

							<div class="product-preview">
								<img src="upload/<?php echo $row['img3'] ?>" alt="" style="width:100%;height: 130px;">
							</div>

							<div class="product-preview">
								<img src="upload/<?php echo $row['img4'] ?>" alt="" style="width:100%;height: 130px;">
							</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name"><?php echo $row["tensp"] ?></h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link" href="#">10 Review(s) | Add your review</a>
							</div>
							<div>
								<h3 class="product-price"><?php echo $row["dongiamoi"] ?> 000 <del class="product-old-price"><?php echo $row["dongiacu"] ?> 000</del></h3>
								<span class="product-available">In Stock</span>
							</div>
							<p><?php echo $row["mota"] ?></p>
                            <form action="cart.php" method="post">
    <div class="add-to-cart">
        <div class="qty-label">
           Số lượng 
            <div class="input-number">
                <input class="input-number" type="number" name="soluong" min="1" max="100" value="1" id="quantity-input">
                <span class="qty-up" onclick="changeQuantity(1)">+</span>
                <span class="qty-down" onclick="changeQuantity(-1)">-</span>
            </div>
        </div>
        
        <div class="add-to-cart">
            <input type="submit" name="addcart" class="add-to-cart-btn" value="Add to Cart" style="margin-top: 20px;">
            <input type="hidden" name="tensp" value="<?php echo $row['tensp']; ?>">
            <input type="hidden" name="dongiamoi" value="<?php echo $row['dongiamoi']; ?> 000 VNĐ">
            <input type="hidden" name="img1" value="<?php echo $row['img1']; ?>">   
        </div>
    </div>
</form>

							<ul class="product-btns">
								<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
							</ul>

							<ul class="product-links">
								<li>Category:</li>
								<li><a href="#">Headphones</a></li>
								<li><a href="#">Accessories</a></li>
							</ul>

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

                    
</div>
</div>
<div>
        <script src="./assetss/js/jquery.min.js"></script>
		<script src="./assetss/js/bootstrap.min.js"></script>
		<script src="./assetss/js/slick.min.js"></script>
		<script src="./assetss/js/nouislider.min.js"></script>
		<script src="./assetss/js/jquery.zoom.min.js"></script>
		<script src="./assetss/js/main.js"></script>