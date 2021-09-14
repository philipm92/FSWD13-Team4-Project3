<!-- Start Header Section -->
<?php 
require_once 'assets/php/db_connect.php'; 
$userID = GetUserID();
$html_usernav_string = "";
if ($userID !== NULL) {
	$user_link = isset($_SESSION['admin']) ? "dashboard_admin.php" : "home_user.php";
	$result = $db->query("SELECT * FROM `users` WHERE `ID` = ?;", array($userID));
	$row = $result->fetchArray();

	$html_usernav_string .= "<li class='d-flex flex-column flex-md-row align-self-center align-items-center'>";
	$html_usernav_string .= "	<a class='login-btn font-weight-bold' href='$user_link'><img class='search header-search' src='assets/img/".$row["image"]."' alt='' style='width:auto;height:20px;'>";
	$html_usernav_string .= "	".$row["username"]."</a>";
	$html_usernav_string .= "</li>";
	
} else $html_usernav_string = "<li><a class='login-btn' href='login_user.php'>Login</a></li>";

$html_categories_string = "<ul>";
$sql = "SELECT * FROM `categories`;";
$result = $db->query($sql);
if ($result->numRows() > 0) {
	$rows = $result->fetchAll();
	foreach ($rows as $row) {
		$html_categories_string .= "<li><a href='products.php?categoryID=".(int)$row["ID"]."'>".$row["name"]."</a></li>";
	}
}
$html_categories_string .= "</ul>";
?>
<header class="atf-site-header atf-style1 atf-sticky-header">
	<div class="atf-top-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8">
					<div class="atf-top-header-in wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
						<ul class="atf-top-header-list">
							<li><i class="fas fa-envelope"></i>Email: <a href="mailto:info@famazon.com">info@famazon.com</a></li>
							<li><i class="fas fa-phone-volume"></i>Contact: <a href="#">+43 (0) 1 512 33 44</a></li>
						</ul>
					</div>
				</div> <!--- END COL -->
				<div class="col-lg-4 col-md-4">
					<div class="nav-right-part nav-right-part-desktop">
						<ul class="atf-nav-list atf-onepage-nav">
							<li><a class="search header-search" href="#"><i class="fa fa-search"></i></a></li>
							<?= $html_usernav_string ?>
							<li><a class="shopping-cart-btn" href="cart.php"><i class="fa fa-shopping-cart"></i><span>2</span></a></li>
						</ul>
					</div>
				</div><!--- END COL -->
			</div><!--- END ROW -->
		</div><!--- END CONTAINER -->

	</div><!--- END TOP HEADER -->
				
	<div class="atf-main-header">
		<div class="container">
			<div class="atf-main-header-in">
				<div class="atf-main-header-left">
					<a class="atf-site-branding atf-white-logo" href="index2.php"><img src="assets/img/logo.png" alt="Logo"></a>
				</div>

				<div class="nav-right-part nav-right-part-mobile">
                    <ul>
                        <li><a class="search header-search" href="#"><i class="fa fa-search"></i></a></li>
                        <?= $html_usernav_string ?>
                        <li><a class="shopping-cart-btn" href="#"><i class="fa fa-shopping-cart"></i><span>2</span></a></li>
                    </ul>
				</div>
                
                <div class="atf-main-header-right">
                    <div class="atf-nav">
                        <ul class="atf-nav-list atf-onepage-nav">
                            <li><a href="index2.php" class="atf-smooth-move">Home</a></li>
                                <li><a href="#about" class="atf-smooth-move">Shop</a></li>
                                <!-- COMMENTED FOR BETTER OVERVIEW LATER ON, COULD BE REMOVED AT SOME POINT! -->
								<!-- <li class="menu-item-has-children"><a href="#" class="atf-smooth-move">Pages<i class="fa fa-chevron-down ml-2"></i></a>
                                    <ul>
                                        <li class="menu-item-has-children"><a href="cart.php">Cart</a></li>
										<li class="menu-item-has-children"><a href="checkout.php">Checkout</a></li>
										<li class="menu-item-has-children"><a href="product.php">Product 01</a></li>
										<li class="menu-item-has-children"><a href="product-php">Product Details</a></li>
										<li class="menu-item-has-children"><a href="contact.php"> Contact Us</a></li>
										<li class="menu-item-has-children"><a href="error.php">404</a></li>
									</ul>
								</li> -->
								<li class="menu-item-has-children"><a href="#category" class="atf-smooth-move">Categories<i class="fa fa-chevron-down ml-2"></i></a>
									<?= $html_categories_string ?>
								</li>
								<li><a href="contact.php" class="#">Contact Us</a></li>
						</ul><!--- END NAV -->
					</div>
				</div><!--- END MAIN HEADER RIGHT -->
			</div>
		</div><!--- END CONTAINER -->
	</div><!--  END MAIN HEADER -->
</header>
<!-- End Header Section -->