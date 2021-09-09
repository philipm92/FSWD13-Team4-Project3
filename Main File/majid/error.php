<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		<!-- SITE TITLE -->
		<title>Famazon - E-commerce | Error</title>
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
				<div class="atf-page-heading atf-pattern-area atf-size-md atf-dynamic-bg" data-stellar-background-ratio="0.3" style="background-image: url(assets/img/blog/3.jpg); background-size:cover; background-position: center center;">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-xl-7 col-md-6 col-12">
								<div class="atf-page-heading-in text-center">
									<h1 class="atf-page-heading-title">404</h1>
									<div class="atf-post-label">
										<span><a href="index1.html">Home</a></span>
										<span>Not Found</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- .atf-page-heading -->

				<!-- error SECTION START-->
				<section id="error" class="atf-error-area atf-section-padding pt-0">
					<div class="container">
						<div class="row clearfix">
							<div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3 col-12 atf-single-details text-center">
								<div class="error-content text-center mt-5">
									<img src="assets/img/404.jpg" alt="error">
									
									<div class="atf-blog-search mt-5">
										<input type="text" class="form-control" placeholder="Search..">
										<button type="submit" id="search-button" class="btn atf-themes-btn"><i class="fa fa-search"></i></button>
									</div>
									<h2>Page Not Found</h2>
									<p class="mt-3 mb-3 pl-">The page you are looking for might have been removed had its name changed or The page you are looking for might have been  had its name changed or is temporarily unavailable.</p> 
									<a href="index1.html" class="atf-themes-btn">Go to Home</a>
								</div>
							</div>
						</div><!--- END ROW -->
					</div><!--- END container -->
				</section>
				<!-- error SECTION end-->	
			</div>
			
		   <!-- FOOTER SECTION-->
		   <?php include_once "components/footer.php" ?>			
		</div>
		<!-- PAGE WRAPPER END-->
		
		<!-- JS Script COMPONENTS -->
		<?php include_once "components/jscollection.php" ?>
		
	</body>
</html>