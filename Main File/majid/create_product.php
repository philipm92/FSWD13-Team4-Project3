<?php
session_start();
require_once 'assets/php/db_connect.php';

$USERS_TABLE = $_SESSION["USERS_TABLE"];

$sql = "SELECT * from `$USERS_TABLE` WHERE role = 'seller'";
$result = $db->query($sql);
$rows = $db->fetchAll($result);
$supplier = "";
foreach($rows as $row){
    $supplier .= "<Option value='".$row["ID"]."'>".$row["username"]."</Option>";
}

$sql_categories = "SELECT * FROM `categories`;";
$result_categories = $db->query($sql_categories);
$rows_categories = $db->fetchAll($result);
$categories = "";
foreach($rows_categories as $row) {
    $categories .= "<Option value='".$row["ID"]."'>".$row["name"]."</Option>";
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		<!-- SITE TITLE -->
		<title>Famazon - Product | Create </title>
		<!-- CSS Styling COMPONENTS -->
		<?php include_once "components/csscollection.php" ?>

    </head>
    <body>
        <div class="page-wrapper">
            <!-- PRELOADER COMPONENT -->
            <?php include_once "components/preloader.php" ?>
            <!-- Back-to-top COMPONENT -->	
            <?php include_once "components/totop.php" ?>
            <!-- Body Overlay COMPONENT -->
            <?php include_once "components/boverlay.php" ?>
            <!-- search popup area start -->
            <?php include_once "components/searchpopup.php" ?>
            <!-- NAVBAR COMPONENT -->
            <?php include_once "components/navbar.php" ?>

            <!-- START PRODUCT HEADING -->
            <div class="atf-page-heading atf-size-md" data-stellar-background-ratio="0.3" style="background-image: url(assets/img/gallery/product_header.jpg); background-size:cover; background-position: 90% 40%;">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-xl-7 col-lg-6 col-12">
								<div class="atf-page-heading-in text-center">
									<h1 class="atf-page-heading-title">Add new Product</h1>
								</div>
							</div>
						</div>
					</div>
			</div>
            <!-- END PRODUCT HEADING -->

            <div class="atf-section-padding atf-blog-area atf-blog-grid-area pb-0 text-center  w-75 mx-auto mb-2 mb-md-4">
                <hr>
                <form class="row g-3" action="assets/php/actions/products/a_create_product.php" method="POST" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="product_name" class="form-label">Name</label>
                        <input name="product_name" type="text" class="form-control" id="product_name">
                    </div>
                    <div class="col-md-6">
                        <label for="product_image" class="form-label">Image</label>
                        <input name="product_image" type="file" class="form-control" id="product_image">
                    </div>
                    <div class="col-md-4">
                        <label for="product_price" class="form-label">Price</label>
                        <input name="product_price" type="number" step="any" class="form-control" id="product_price">
                    </div>
                    <div class="col-md-4">
                        <label for="product_discount" class="form-label">Discount</label>
                        <input name="product_discount" type="number" step="any" class="form-control" id="product_discount">
                    </div>
                    <div class="col-md-4">
                        <label for="product_amount" class="form-label">Amount</label>
                        <input name="product_amount" type="number" class="form-control" id="product_amount">
                    </div>
                    <div class="col-md-6">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-select">
                        <option selected value="none">Choose...</option>
                        <?= $categories ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="product_seller" class="form-label">Seller</label>
                        <select name="product_seller" id="product_seller" class="form-select">
                        <option selected value="none">Choose...</option>
                        <?= $supplier ?>
                        </select>
                    </div>
                
                    <div class="col-12">
                        <button type="submit" class="btn atf-themes-btn">Add Product</button>
                    </div>
                </form>
            </div>
            <!-- FOOTER SECTION-->
            <?php include_once "components/footer.php" ?>
        </div>
        <!-- PAGE WRAPPER END-->
		
	    <!-- JS Script COMPONENTS -->
	    <?php include_once "components/jscollection.php" ?>    
        <?php $db->close(); ?>
</html>