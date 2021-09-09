<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		<!-- SITE TITLE -->
		<title>Famazon - E-commerce | Checkout</title>
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

			<div class="atf-page-heading atf-size-md" data-stellar-background-ratio="0.3" style="background-image: url(assets/img/blog/1-full.jpg); background-size:cover; background-position: center center;">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-xl-7 col-lg-6 col-12">
								<div class="atf-page-heading-in text-center">
									<h1 class="atf-page-heading-title">We Are Best Checkout</h1>
									<div class="atf-post-label">
										<span><a href="index1.html">Home</a></span>
										<span>Checkout</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- .atf-page-heading -->
				
		
				<!-- Checkout Page -->
				<section class="atf-checkout-area atf-section-padding">
					<div class="container">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-12">
								<div class="title">
									<h3>Billing Details</h3>
								</div>
								<form class="atf-checkout-form contact" action="#" method="post">
									<div class="row">
										<div class="form-group">
											<label class="form-label ">Country*</label>
											<select class="form-select" aria-label="Default select example">
												<option selected>Amarica</option>
												<option value="1">Russia</option>
												<option value="2">Europe</option>
												<option value="3">France</option>
											</select>
										</div>
										
										<div class="form-group col-lg-6">
											<label class="form-label">First Name*</label>
											<input name="first_name" placeholder="First name" class="form-control" type="text">
										</div>
										
										 <div class="form-group col-lg-6">
											<label class="form-label">Last Name</label>										 
											<input name="last_name" placeholder="Last name" class="form-control" type="text">
										</div>
										
									
									
										<div class="form-group">
											<label class="form-label">Company Name*</label>
											  <input name="company_name" placeholder="Company name" class="form-control" type="text">                         
										</div>
										
										<div class="form-group">
											<label class="form-label">Address*</label>											
											<textarea rows="3" name="street" id="address" placeholder="Street address" class="form-control"></textarea>
										</div>
										
										<div class="form-group">
											<label class="form-label">Town / City:</label>											
											<input name="Town-city" placeholder="Europe" class="form-control" type="text"> 
										</div>
										
										
										<div class="form-group col-md-6">
										<label class="form-label">State*</label>	
											<input name="city" placeholder="State" class="form-control" type="text">
										</div>
										
										<div class="form-group col-md-6">
											<label class="form-label">Postcode*</label>
											<input name="code" placeholder="Post code / Zip" class="form-control" type="text">
										</div>
											
										<div class="form-group col-md-6">
											<label  class="form-label">Email address*</label>
											<input name="email" placeholder="Email" class="form-control" type="email">
										</div>

										<div class="form-group col-md-6">
										<label class="form-label">Phone number*</label>
											<input name="phone" placeholder="Phone" class="form-control" type="text">
										</div>
										
										<div class="form-group">
											<label  class="form-label">Deliver Note</label>  
											<textarea rows="3" name="street" placeholder="Deliver note" class="form-control"></textarea>                            
										</div>
									</div>
								</form>
							</div>
							
							
							<div class="col-xl-6 col-lg-6 col-12 pl-lg-5">
								<div class="title">
									<h3>Your Order</h3>
								</div>
								
								<div class="your-order-table table-responsive">
									<table class="table table-bordered">
										<thead>
											<tr>
												<th class="product-dec">Product</th>
												<th class="product-amount">Total</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="product-dec">Man Fasion</td>
												<td class="product-amount"><span>$100.00</span></td>
											</tr>
											<tr>
												<td class="product-dec">Woman Fasion</td>
												<td class="product-amount"><span>$200.00</span></td>
											</tr>
											<tr>
												<td class="product-dec">Latest Shoe</td>
												<td class="product-amount"><span>$290.00</span></td>
											</tr>
											<tr>
												<th class="product-dec">Shiping</th>
												<td class="product-amount"><span>$10.00</span></td>
											</tr>
											
											<tr class="sub-total">
												<th class="product-dec">Cart Sub Total</th>
												<td class="product-amount"><span>$600.00</span></td>
											</tr>
										</tbody>
										<tfoot>
											<tr>
												<th>Total</th>
												<th><span class="product-total-amount">$600.00</span></th>
											</tr>
										</tfoot>
									</table>
								</div>
								
								<div class="payment_method">           
									<ul>
										<li>
											<div class="custom-control custom-radio">
												<input type="radio" id="customRadio5" name="Direct" class="custom-control-input">
												<label class="custom-control-label" for="customRadio5">Direct Bank Transfer</label>
											</div>						
								
										</li>
										
										<li>
											<div class="custom-control custom-radio">
												<input type="radio" id="customRadio2" name="payment" class="custom-control-input">
												<label class="custom-control-label" for="customRadio2">Payment Check</label>
											</div>	
										</li>
										
										<li>
											<div class="custom-control custom-radio">
												<input type="radio" id="customRadio1" name="cashon" class="custom-control-input">
												<label class="custom-control-label" for="customRadio1">Cash On Deliver</label>
											</div>	
										</li>
										
										
										<li>
											<div class="custom-control custom-radio">
												<input type="radio" id="customRadio3" name="Paypal" class="custom-control-input">
												<label class="custom-control-label" for="customRadio3">PayPal</label>
											</div>	
										</li>
										
										
									</ul> 
										<p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed lobortis sem. Quisque at sapien ut odio</p>									
								</div>
								
								<div class="atf-checkout-btn">
									<a href="#" class="atf-themes-btn" tabindex="0">Place Order</a>
								</div>
							</div>
							
						</div>
					</div>
				</section>


				<!-- FOOTER SECTION-->
				<?php include_once "components/footer.php" ?>
		</div>
		<!-- PAGE WRAPPER END-->
		
		
		<!-- JS Script COMPONENTS -->
		<?php include_once "components/jscollection.php" ?>	
		
	</body>
</html>