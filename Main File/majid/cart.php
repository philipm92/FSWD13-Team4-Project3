<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		<!-- SITE TITLE -->
		<title>Famazon - E-commerce | Cart</title>
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

			<div class="atf-page-heading atf-size-md" data-stellar-background-ratio="0.3" style="background-image: url(assets/img/blog/3.jpg); background-size:cover; background-position: center center;">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-xl-7 col-lg-6 col-12">
								<div class="atf-page-heading-in text-center">
									<h1 class="atf-page-heading-title">We Are Best Cart</h1>
									<div class="atf-post-label">
										<span><a href="index1.html">Home</a></span>
										<span>Cart</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- .atf-page-heading -->
				
				
				<!-- Cart Page -->
				<div class="atf-cart-area atf-section-padding">
					<div class="container">
						<div class="row clearfix">
							<div class="col-lg-12 ">
								<div class="atf-cart-table-top atf-table-res">
									<table class="table atf-cart-table text-center">
										<thead>
											<tr>
												<th class="atf-cart-no">No.</th>
												<th class="atf-cart-img">Product</th>
												<th class="atf-cart-product">product name</th>
												<th class="atf-cart-price">price</th>
												<th class="atf-cart-quantity">quantity</th>
												<th class="atf-cart-total">total</th>
												<th class="atf-cart-remove">Delete</th>
											</tr>
										</thead>
										
										<tbody>
											<tr>
												<td><span class="atf-sl-no">1</span></td>
												<td><a href="#" class="atf-cart-image"><img src="assets/img/cart-prdct/4s.png" alt="" /></a></td>
												<td><a href="#" class="at-sl-title">Smart Shoe in Fashion</a></td>
												<td><p class="atf-pt-cart-price">$90.77</p></td>
												<td>										
													<form>
														<div class="atf-single-product-quantity  quantity atf-btn-add">
															<input type="button" value="-" class="minus">
															<input type="number" class="input-text qty text" step="1" min="1" max="10000" name="quantity" value="1">
															<input type="button" value="+" class="plus">
														</div>
													</form>
												</td>
												
												<td><p class="atf-pt-cart-total">$90.77</p></td>
												<td><a class="btn btn-default atf-pt-cart-remove"><i class="fas fa-times"></i></a></td>
											</tr>
											
											<tr>
												<td><span class="atf-sl-no">2</span></td>
												<td><a href="#" class="atf-cart-image"><img src="assets/img/cart-prdct/3s.png" alt="" /></a></td>
												<td><a href="#" class="at-sl-title">Smart Shoe in Fashion</a></td>
												<td><p class="atf-pt-cart-price">$80.77</p></td>
												<td>										
													<form>
														<div class="atf-single-product-quantity  quantity atf-btn-add">
															<input type="button" value="-" class="minus">
															<input type="number" class="input-text qty text" step="1" min="1" max="10000" name="quantity" value="1">
															<input type="button" value="+" class="plus">
														</div>
													</form>
												</td>
												
												<td><p class="atf-pt-cart-total">$80.77</p></td>
												<td><a class="btn btn-default atf-pt-cart-remove"><i class="fas fa-times"></i></a></td>
											</tr>
											
											<tr>
												<td><span class="atf-sl-no">3</span></td>
												<td><a href="#" class="atf-cart-image"><img src="assets/img/cart-prdct/2s.png" alt="" /></a></td>
												<td><a href="#" class="at-sl-title">Smart Shoe in Fashion</a></td>
												<td><p class="atf-pt-cart-price">$70.77</p></td>
												<td>										
													<form>
														<div class="atf-single-product-quantity  quantity atf-btn-add">
															<input type="button" value="-" class="minus">
															<input type="number" class="input-text qty text" step="1" min="1" max="10000" name="quantity" value="1">
															<input type="button" value="+" class="plus">
														</div>
													</form>
												</td>
												
												<td><p class="atf-pt-cart-total">$70.77</p></td>
												<td><a class="btn btn-default atf-pt-cart-remove"><i class="fas fa-times"></i></a></td>
											</tr>
											
											<tr>
												<td><span class="atf-sl-no">4</span></td>
												<td><a href="#" class="atf-cart-image"><img src="assets/img/cart-prdct/1s.png" alt="" /></a></td>
												<td><a href="#" class="at-sl-title">Smart Shoe in Fashion</a></td>
												<td><p class="atf-pt-cart-price">$60.77</p></td>
												<td>										
													<form>
														<div class="atf-single-product-quantity  quantity atf-btn-add">
															<input type="button" value="-" class="minus">
															<input type="number" class="input-text qty text" step="1" min="1" max="10000" name="quantity" value="1">
															<input type="button" value="+" class="plus">
														</div>
													</form>
												</td>
												
												<td><p class="atf-pt-cart-total">$60.77</p></td>
												<td><a class="btn btn-default atf-pt-cart-remove"><i class="fas fa-times"></i></a></td>
											</tr>
										</tbody><!-- END TBODY -->
									</table><!-- END TABLE -->
								</div>
								<div class="atf-table-btn">
									<input class="code-input text-center" placeholder="Coupon Code" type="password">
									<a class="atf-themes-btn ml-2" href="#">APPLY COUPON</a>
									<a class="atf-themes-btn float-sm-right btn-2" href="#">Update Cart</a>
								</div><!-- END BTN -->
							</div><!-- END COL -->
						</div><!-- END ROW -->
						
						
						
						<div class="row">
							<div class="col-lg-6 offset-lg-5">
								<div class="atf-order-address">
									<h5 class="atf-order-title text-uppercase">Our Address</h5>
									<div class="atf-order-subtotal">
										<span>Smart Shoe in Fashion:</span>
										<span class="float-right">$500.00</span>
									</div>
									<div class="atf-order-subtotal">
										<span>Smart Shoe in Fashion:</span>
										<span class="float-right">$490.00</span>
									</div>
									
									<div class="atf-order-subtotal">
										<span>Shipping Cost:</span>
										<span class="float-right">$10.00</span>
									</div>
									<div class="atf-order-total">
										<span>Total:</span>
										<span class="float-right">$1000.00</span>
									</div>
									<a class="atf-themes-btn float-right" href="checkout.html">PROCEED TO CHECKOUT</a>
								</div>
							</div><!-- END COL -->
						</div><!-- END ROW -->
					</div><!-- END CONTANIER -->
				</div><!-- END CART -->
				
				<!-- NEWSLETTER COMPONENTS -->
				<?php include_once "components/newsletter.php" ?>				
				
				<!-- FOOTER SECTION-->
		   		<?php include_once "components/footer.php" ?>				
		</div>
		<!-- PAGE WRAPPER END-->
		
		
		<!-- JS Script COMPONENTS -->
		<?php include_once "components/jscollection.php" ?>
		
	</body>
</html>