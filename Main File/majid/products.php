<?php
session_start();
ob_start();
require_once 'assets/php/db_connect.php';
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
		<title>Famazon - E-commerce | !!!PRODUCT NAME!!!</title>
		<!-- CSS Styling COMPONENTS -->
		<?php include_once "components/csscollection.php" ?>		
	</head>

	<body>

		<!-- Page Wrapper -->
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
			

			<div class="atf-content clearfix">
				<div class="atf-page-heading atf-size-md" data-stellar-background-ratio="0.3" style="background-image: url(assets/img/blog/1.jpg); background-size:cover; background-position: center center;">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-xl-7 col-lg-6 col-12">
								<div class="atf-page-heading-in text-center">
									<h1 class="atf-page-heading-title">We Are Best Shop of 30%</h1>
									<div class="atf-post-label">
										<span><a href="index1.html">Home</a></span>
										<span>Shop</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- .atf-page-heading -->

				<!-- START PROJECTS  -->
			<section id="gallery" class="atf-gallery-area atf-section-padding">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-6 col-lg-6 col-12">
							<div class="atf-section-title text-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
								<h2 class="">Popular Item</h2>
								<p class="mx-auto my-auto">Lorem elementum Sed congue nisl dolorSed congue nisl dolor Lorem elementum Sed congue nisl dolorSed.</p>
							</div>
						</div><!--- END COL -->
					</div><!--- END ROW -->
					
					
					<div class="row justify-content-center">
						<div class="slick-wrapper centered">
							<?php 
									$sql = 'SELECT * FROM products WHERE 1;';
									$result = $db->query($sql); //mysqli_query($connection, $sql);
				 					$rows = $result->fetchAll();
									
									
									foreach ($rows as $row) { //while ($row = $result->fetch_row()) {
										echo('<div class="singleproduct slick-slide-in">	
											<div class="atf-single-gallery">
												<img src="assets/img/cart-product/1.jpg" class="img-gallery img-fluid mx-auto my-auto" alt="" />
												<div class="atf-gallery-info text-center">
													<h2>New</h2>
												</div>
											</div><!-- END SINGLE GALLERY -->
											<div class="atf-product-title">
												<h4><a href="#">'.$row["name"].'</a></h4>
												<div class="atf-product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>											
												<span class="atf-product-price">$ '.$row["description"].'</span>
												<span class="atf-gallery-product-cart float-right"><a href="product-details.html"><i class="icon fa fa-shopping-basket"></i></a></span>
											</div>
										</div>');
									}
							?>
						</div>				
					</div>
				</div><!--- END CONTAINER -->
			</section>
			<!-- END PROJECTS -->

				<!-- START PROMOTION  -->
				<section  class="atf-promo-offer atf-align-items-details" data-stellar-background-ratio="0.3" style="background-image: url(assets/img/gallery/4.jpg); background-size:cover; background-position: center center;">
					<div class="container">
						<div class="row justify-content-left">
							<div class="col-xl-6 col-lg-6 col-12 text-left">
								<div class="atf-promo-content atf-main-btn">
									<h5 class="mb-2 text-uppercase text-white">Exclusive On Famazon</h5>
									<h3 class="">BLACK FRIDAY IN AUSTRIA</h3>
									<p class="text-white pr-lg-5">It's that time again on November 26th. Numerous stores and online shops are celebrating Black Friday 2021 with special discounts and special offers. Here at BlackFriday.de/AT you can find the best deals and bargains from Austria at a glance.</p>
									<br>
									<a href="#" class="page-scroll atf-themes-btn">Shop Now<i class="fa fa-angle-right"></i></a>
								</div>
								</div>
							</div><!-- END COL  -->
						</div><!--END  ROW  -->
					</div><!-- END CONTAINER  -->
				</section>
				<!-- END PROMOTION -->

					<!-- Special Offer Area -->
					<?php include_once "components/specialoffer.php" ?>
				</div><!--- END Section -->
			</div>
			<!--- END CONTENT -->

			<!-- FOOTER SECTION-->
			<?php include_once "components/footer.php" ?>
			
		</div>
		<!-- PAGE WRAPPER END-->
		
		<!-- JS Script COMPONENTS -->
		<?php include_once "components/jscollection.php" ?>
		<?php $db->close() ?>
	</body>
</html>