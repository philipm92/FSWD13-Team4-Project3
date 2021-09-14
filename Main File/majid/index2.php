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
		<title>Famazon - E-commerce | Home</title>
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
			
			
			<!-- START HOME -->
			<section id="home">
				<div class="atf-slider atf-style1 atf-hero-slider1 atf-hero-slider2">
					<div class="slick-container" data-autoplay="0" data-loop="1" data-speed="800" data-autoplay-timeout="1000" data-center="0" data-slides-per-view="1" data-fade-slide="1">
						<div class="slick-wrapper">
							<div class="slick-slide-in">						
								<div class="atf-single-home atf-hero-area" style="background-image: url(assets/img/gallery/Asus_VivoBook.jpg);  background-size:cover; background-position: center center;">
									<div class="atf-home-overlay">
										<div class="container">
											<div class="row atf-single-slide-sm2 atf-align-items-details align-items-center atf-single-text justify-content-center">
												 <!--LEFT COL-->
												<div class="col-xl-6 col-lg-6 col-12 text-center atf-single-details ">
													<h5 class="mb-0 d-block d-lg-block text-white">Tranding Now</h5>
													<h2 class="mb-0 d-block d-lg-block">Asus VivoBook</h2>
													<p class="pr-lg-5">Find the best products on our site.</p>
													<!-- Main-btn -->
													<div class="atf-main-btn mt-3"> 
														<a href="product-details.php" class="page-scroll atf-themes-btn mr-4">Shop Now <i class="fa fa-angle-right"></i></a>
														<a href="product-details.php" class="page-scroll atf-themes-btn">Order Now <i class="fa fa-angle-right"></i></a>
													</div>
												</div><!--- END COL -->
											</div><!--- END ROW -->
										</div><!--- END CONTAINER -->
									</div><!--- END Overlay -->			
								</div><!--- END slide -->			
							</div><!-- .slick-slide-in -->
							
							<div class="slick-slide-in">						
								<div class="atf-single-home atf-hero-area" style="background-image: url(assets/img/gallery/brigitte.jpg);  background-size:cover; background-position: center center;">
									<div class="atf-home-overlay">
										<div class="container">
											<div class="row atf-single-slide-sm atf-align-items-details align-items-center atf-single-text justify-content-center">
												 <!--LEFT COL-->
												<div class="col-xl-6 col-lg-6 col-12 text-center atf-single-details ">
													<h5 class="mb-0 d-block d-lg-block text-white">Tranding Now</h5>
													<h2 class="mb-0 d-block d-lg-block">Coats from our designers</h2>
													<p class="pr-lg-5">Find the best products on our site.</p>
													<!-- Main-btn -->
													<div class="atf-main-btn mt-3"> 
														<a href="product-details.php" class="page-scroll atf-themes-btn mr-4">Shop Now <i class="fa fa-angle-right"></i></a>
														<a href="product-details.php" class="page-scroll atf-themes-btn">Order Now <i class="fa fa-angle-right"></i></a>
													</div>
												</div><!--- END COL -->
											</div><!--- END ROW -->
										</div><!--- END CONTAINER -->
									</div><!--- END Overlay -->			
								</div><!--- END slide -->			
							</div><!-- .slick-slide-in -->
							
							<div class="slick-slide-in">						
								<div class="atf-single-home atf-hero-area" style="background-image: url(assets/img/gallery/Talson_26Zoll_MTB.jpg);  background-size:cover; background-position: center center;">
									<div class="atf-home-overlay">
										<div class="container">
											<div class="row atf-single-slide-sm atf-align-items-details align-items-center atf-single-text justify-content-center">
												 <!--LEFT COL-->
												<div class="col-xl-6 col-lg-6 col-12 text-center atf-single-details ">
													<h5 class="mb-0 d-block d-lg-block text-white">Tranding Now</h5>
													<h2 class="mb-0 d-block d-lg-block">Talson Mountainbike</h2>
													<p class="pr-lg-5">Find the best products on our site.</p>
													<!-- Main-btn -->
													<div class="atf-main-btn mt-3"> 
														<a href="product-details.php" class="page-scroll atf-themes-btn mr-4">Shop Now <i class="fa fa-angle-right"></i></a>
														<a href="product-details.php" class="page-scroll atf-themes-btn">Order Now <i class="fa fa-angle-right"></i></a>
													</div>
												</div><!--- END COL -->
											</div><!--- END ROW -->
										</div><!--- END CONTAINER -->
									</div><!--- END Overlay -->			
								</div><!--- END slide -->			
							</div><!-- .slick-slide-in -->
						</div>
					</div><!-- .slick-container -->
					
					<div class="pagination atf-style1 container"></div> <!-- If dont need Pagination then add class .atf-hidden -->
					<div class="swipe-arrow atf-style1 atf-hidden"> <!-- If dont need navigation then add class .atf-hidden -->
						<div class="slick-arrow-left"><i class="fa fa-angle-left"></i></div>
						<div class="slick-arrow-right"><i class="fa fa-angle-right"></i></div>
					</div>
				</div><!-- .atf-slider -->
			</section>
			<!-- END  HOME DESIGN -->
			
			
			<!-- portfolio Section Start -->
			<section id="portfolio" class="atf-portfolio-area atf-section-padding">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-6 col-lg-6 col-12">
							<div class="atf-section-title text-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
								<h2 class="">Categories</h2>
								<p class="">Search through our categories</p>
							</div>
						</div><!--- END COL -->
					</div><!--- END ROW -->
				</div><!--- END CONTANIER -->
					

				<div class="container clearfix">
					<div class="atf-slider atf-style2">
						<div class="slick-container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0"  data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="4" data-add-slides="3">
							<div class="slick-wrapper">


								<?php 
									$sql = 'SELECT * FROM `categories`';
									$result = $db->query($sql); //mysqli_query($connection, $sql);
				 
									$rows = $result->fetchAll(); //mysqli_fetch_array($result);
									foreach ($rows as $row) {
									//while ($row = $result->fetch_row()) {
										echo('
										<div class="slick-slide-in">
										<!-- portfolio-item -->
										<div class="atf-grid all logo">
											<div class="atf-grid-portfolio">
												<a class="atf-popup-img atf-single-portfolio" href="assets/img/cart-product/1.jpg">
													<img class="atf-portfolio-img img-fluid mx-auto" src="assets/img/cart-product/1.jpg" alt="img">
													<div class="atf-hover-portfolio">
														<div class="atf-portfolio-content">
															<div class="atf-portfolio-icon">
																<i class="icon fa fa-shopping-basket"></i>
															</div>
															<h3>'.$row['name'].'</h3>
															<p>'.$row['name'].'</p>
														</div>
													</div>
												</a>
											</div><!--- END COL -->
										</div><!--- END COL -->
									</div><!-- .slick-slide-in -->
										
										');
								
									}
								?>
								
					
							</div><!-- .slick-slide-Wrapper -->
						</div><!-- .slick-container -->
						
						<div class="pagination atf-style1 atf-flex atf-hidden"></div> <!-- If dont need Pagination then add class .atf-hidden -->
						<div class="swipe-arrow atf-style1"> <!-- If dont need navigation then add class .atf-hidden -->
							<div class="slick-arrow-left"><i class="fa fa-chevron-left"></i></div>
							<div class="slick-arrow-right"><i class="fa fa-chevron-right"></i></div>
						</div>
					</div><!-- .atf-slider -->
				</div><!-- .container -->	
				
				<div class="atf-portfolio-btn atf-main-btn text-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s" data-wow-offset="0">
					<a href="portfolio.html" class="atf-themes-btn mt-5">View More<i class="fa fa-angle-right"></i></a>
				</div>
			</section>
			<!-- Portfolio Section End -->
			
			
			
			
			<!-- Special Offer Area -->
			<?php include_once "components/specialoffer.php" ?>

			<!-- START SERVICE SECTION  -->
			<section id="service" class="atf-service-area atf-section-padding">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-4 col-md-6">
							<div class="atf-single-service-wrap text-center">
								<div class="atf-single-service-wrap">
									<div class="atf-services-icon text-center mb-4">
										<i class="fas fa-shipping-fast"></i>
									</div>
									<div class="atf-service-content">
										<h3>Free Shipping</h3>
										<p>Free shipping worldwide on products over 500$.</p>
									</div>
								</div>
							</div>   
						</div>
						
						<div class="col-lg-4 col-md-6">
							<div class="atf-single-service-wrap text-center">
								<div class="atf-single-service-wrap">
									<div class="atf-services-icon text-center mb-4">
										<i class="fas fa-envelope-open-text"></i>
									</div>
									<div class="atf-service-content">
										<h3>24/7 support</h3>
										<p>For questions visit our Q&A site or talk to our live support.</p>
									</div>
								</div>
							</div>   
						</div>
						
						<div class="col-lg-4 col-md-6">
							<div class="atf-single-service-wrap text-center">
								<div class="atf-single-service-wrap">
									<div class="atf-services-icon text-center mb-4">
										<i class="fas fa-money-bill-alt"></i>
									</div>
									<div class="atf-service-content">
										<h3>Secure Payment</h3>
										<p>Pay your orders with Paypal, online banking, credit card or Amazon Pay.</p>
									</div>
								</div>
							</div>   
						</div>
					</div>
				</div>
			</section>
			<!-- Service-Area End-->
			
			
			
			
			<!-- START PROMOTION  -->
			<section  class="atf-promo-offer atf-align-items-details" data-stellar-background-ratio="0.3" style="background-image: url(assets/img/gallery/LicorneBike_Stella.jpg); background-size:cover; background-position: center center;">
				<div class="container">
					<div class="row justify-content-left">
						<div class="col-xl-6 col-lg-6 col-12 text-left">
							<div class="atf-promo-content atf-main-btn">
								<h5 class="mb-2 text-uppercase text-white">Exclusive On Famazon</h5>
								<h3 class="">Monthly Sale</h3>
								<p class="text-white pr-lg-5">Enjoy our monthly sales with exclusive items.</p>
								<div class="atf-main-btn mt-4"> 
								<a href="#home" class="page-scroll atf-themes-btn">Shop Now<i class="fa fa-angle-right"></i></a>
							</div>
							</div>
						</div><!-- END COL  -->
					</div><!--END  ROW  -->
				</div><!-- END CONTAINER  -->
			</section>
			<!-- END PROMOTION -->

		 
		   <!-- FOOTER SECTION-->
		   <?php include_once "components/footer.php" ?>
		</div>
		<!-- PAGE WRAPPER END-->
		
		<!-- JS Script COMPONENTS -->
		<?php include_once "components/jscollection.php" ?>
		<?php $db->close(); ?>
	</body>
</html>