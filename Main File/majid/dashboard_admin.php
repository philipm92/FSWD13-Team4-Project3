<?php
session_start();
require_once 'assets/php/db_connect.php';

// if session is not set this will redirect to login page
if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
//if session user exist it shouldn't access dashboard.php
if (isset($_SESSION["user"])) {
    header("Location: home.php");
    exit;
}

$sql = "SELECT * FROM `$PRODUCTS_TABLE`";
$rows = $db->query($sql)->fetchAll();
$data = GetQueryData($rows);

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
			
			<!-- START ADMIN HEADING -->
			<div class="atf-page-heading atf-size-md" data-stellar-background-ratio="0.3" style="background-image: url(assets/img/gallery/admin_dashboard.jpg); background-size:cover; background-position: 90% 40%;">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-xl-7 col-lg-6 col-12">
								<div class="atf-page-heading-in text-center">
									<h1 class="atf-page-heading-title">Admin Dashboard</h1>
								</div>
							</div>
						</div>
					</div>
			</div>
			<!-- END ADMIN HEADING -->
			

			<!-- CONTACT SECTION START-->
			<section id="contact" class="atf-contact-area atf-section-padding">
					<div class="container">
						<div class="row clearfix justify-content-center">
							<div class="col-lg-6 col-xl-6">
								<div class="atf-section-title text-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
									<h2 class="">Admin Panel</h2>
									<p class="mx-auto my-auto">Manage this online shop</p>
								</div>
							</div>
						</div><!--- END ROW -->
						<div class="row my-auto mx-auto">
							<div class="contact mr-lg-5">
								<h4>Account Information</h4>
								<?php
									$id = $_SESSION['admin'];
									$sql = "SELECT u.*, c.name AS city, a.name AS country FROM users u JOIN cities c ON u.fk_city=c.ID JOIN countries a ON c.fk_country=a.ID WHERE u.ID = '$id'";
									$result =$db->query($sql);
									$row = $result->fetchArray();
									
									echo('<p class="col-12"><strong>Name: </strong>'.$row['first_name'].' '.$row['last_name'].'</p>
									<p class="col-12"><strong>Username: </strong>'.$row['username'].'</p>
									<p class="col-12"><strong>Email: </strong>'.$row['email'].'</p>
									<p class="col-124"><strong>Phone: </strong>'.$row['phone_number'].'</p>
									<p class="col-12"><strong>Birthday: </strong>'.$row['birthday'].'</p>
									<p class="col-12"><strong>Address: </strong>'.$row['address'].'</p>
									<p class="col-12"><strong>City: </strong>'.$row['city'].'</p>
									<p class="col-12"><strong>Country: </strong>'.$row['country'].'</p>'); 
								?>
							</div>
						</div>
						
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-12 my-auto mx-auto">
								<div class="contact mr-lg-5">
									<h4>Manage products</h4>
									
									<a class="btn btn-dark col-8 adminlink" href="create_product.php">Create product</a>
									<a class="btn btn-dark col-8 adminlink" href="dashboard_products.php">Manage products</a>
									<a class="btn btn-dark col-8 adminlink" href="#">Create product category</a>
									<a class="btn btn-dark col-8 adminlink" href="#">Manage product reviews</a>
									<a class="btn btn-dark col-8 adminlink" href="#">Manage discounts</a>
									
								</div>
							</div><!--- END COL -->
							

							<div class="col-xl-6 col-lg-6 col-12">
								<div class="atf-contact-info mx-auto my-auto">
									<div class="row">
										
											<div class="contact mr-lg-5">
												<h4>Manage accounts</h4>
												<a class="btn btn-light btn-outline-dark col-12 adminlink" href="register_user.php">Create user/admin</a>
												<a class="btn btn-light btn-outline-dark col-12 adminlink" href="ban_user.php">Restrict users</a>
												<!-- <a class="btn btn-light btn-outline-dark col-12 adminlink" href="#">Delete users</a> -->
												
											</div>
										
									</div>
								</div><!--- END CONTACT -->
							</div><!--- END COL -->
						</div><!--- END ROW -->
					</div><!--- END CONTAINER -->
				</section>
			
			
				

		 
		   <!-- FOOTER SECTION-->
		   <?php include_once "components/footer.php" ?>
		</div>
		<!-- PAGE WRAPPER END-->
		
		<!-- JS Script COMPONENTS -->
		<?php include_once "components/jscollection.php" ?>
	</body>
</html>