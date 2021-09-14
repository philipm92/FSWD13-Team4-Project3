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
		<title>Famazon - E-commerce | Contact</title>
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
				<div class="atf-page-heading atf-size-md atf-dynamic-bg" data-stellar-background-ratio="0.3" style="background-image: url(assets/img/blog/2.jpg); background-size:cover; background-position: center center;">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-xl-7 col-md-6 col-12">
								<div class="atf-page-heading-in text-center">
									<h1 class="atf-page-heading-title">Any Help For The Customer </h1>
									<div class="atf-post-label">
										<span><a href="index1.html">Home</a></span>
										<span>Contact Us</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- .atf-page-heading -->

				<!-- CONTACT SECTION START-->
				<section id="contact" class="atf-contact-area atf-section-padding">
					<div class="container">
						<div class="row clearfix justify-content-center">
							<div class="col-lg-6 col-xl-6">
								<div class="atf-section-title text-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
									<h2 class="">Get In Touch</h2>
									<p class="mx-auto my-auto">Lorem elementum Sed congue nisl dolorSed congue nisl dolor Lorem elementum Sed congue nisl dolorSed.</p>
								</div>
							</div>
						</div><!--- END ROW -->
						
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-12 my-auto mx-auto">
								<div class="contact mr-lg-5">
									<h4>Stay Connected with us</h4>
									<form id="contact-form" class="atf-contact-form form" method="POST" action="assets/php/mail.php">
										<div class="row">
											<div class="form-group col-md-6">
												<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required="required">
											</div>
											<div class="form-group col-md-6">
												<input type="email" name="email" class="form-control" id="form_email" placeholder="Your Email" required="required">
											</div>
											<div class="form-group col-md-12">
												<input type="text" name="subject" class="form-control" id="subject" placeholder="Your Subject" required="required">
											</div>
											<div class="form-group col-md-12">
												<textarea rows="6" name="message" class="form-control" id="message" placeholder="Your Message" required="required"></textarea>
											</div>
											<div class="col-md-12">
												<div class="actions atf-contact-btn text-left">
													<button type="submit" value="Submit Now" name="submit" id="submitButton" class="btn atf-themes-btn" title="Submit Your Message!">Send Message</button>
												</div>
											</div>
										</div>
									</form>
									<p class="form-message"></p>
								</div>
							</div><!--- END COL -->
							

							<div class="col-xl-6 col-lg-6 col-12">
								<div class="atf-contact-info mx-auto my-auto">
									<div class="atf-contact-details">
										<i class="fa fa-home"></i>
										<h4>Home Address</h4>
										<p>Walfischgasse 1, 1010 Vienna</p>
									</div>
									<div class="atf-contact-details">
										<i class="fa fa-phone"></i>
										<h4>Phone Number</h4>
										<p>+43 (0) 1 512 33 44</p>
									</div>
									<div class="atf-contact-details">
										<i class="fa fa-envelope"></i>
										<h4>Email Address</h4>
										<p>info@famazon.com</p>
									</div>
								</div><!--- END CONTACT -->
							</div><!--- END COL -->
						</div><!--- END ROW -->
					</div><!--- END CONTAINER -->
				</section>
				<!-- CONTACT SECTION END-->
				
				<!-- Google Map start-->
				<div id="atf-map-area">
					<iframe style="border:0" src="https://maps.google.com/maps?width=100%25&amp;hl=en&amp;q=1%20Walfischgasse,%20Vienna,%20Austria+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" allowfullscreen></iframe>
				</div>
				<!-- Google Map end -->
				
			</div>
			<!--- END CONTENT -->
		
		   <!-- FOOTER SECTION-->
		   <?php include_once "components/footer.php" ?>
		</div>
		<!-- PAGE WRAPPER END-->
		
		<!-- JS Script COMPONENTS -->
		<?php include_once "components/jscollection.php" ?>
		
	</body>
</html>