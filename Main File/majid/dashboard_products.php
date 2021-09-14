<?php
session_start();
require_once 'assets/php/db_connect.php';
// if session is not set this will redirect to login page
if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
    header("Location: login_user.php");
    exit;
}
//if session user exist it shouldn't access dashboard.php
if (isset($_SESSION["user"])) {
    header("Location: home_dashboard.php");
    exit;
}
$USERS_TABLE = $_SESSION["USERS_TABLE"];

$sql = "SELECT * FROM `products`;";
$result = $db->query($sql);
$rows = $result->fetchAll();

$tbody = "";

foreach($rows as $row) {
    if (TRUE) {
        $tbody .= "
            <tr>
                <td><img class='img-thumbnail rounded-circle' src='assets/img/product/" . $row['image'] . "' alt=" . $row['name'] . "></td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['price'] . "</td>
                <td>" . $row['discount'] . "</td>
                <td>" . $row['amount'] . "</td>
                <td>" . $row["fk_seller"] . "</td>
                <td><a href='update_product.php?id=" . $row['ID'] . "'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a>
                <a href='delete_product.php?id=" . $row['ID'] . "'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
            </tr>
        ";
    }
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
		<title>Famazon - Products | Dashboard </title>
		<!-- CSS Styling COMPONENTS -->
		<?php include_once "components/csscollection.php" ?>

        <style type="text/css">        
            .img-thumbnail {
                width: 70px !important;
                height: 70px !important;
            }

            td {
                text-align: left;
                vertical-align: middle;
            }
            tr {
                text-align: center;
            }

            .userImage{
                width: 100px;
                height: auto;
            }
        </style>
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

            <!-- START USER HEADING -->
            <div class="atf-page-heading atf-size-md" data-stellar-background-ratio="0.3" style="background-image: url(assets/img/gallery/product_header.jpg); background-size:cover; background-position: 90% 40%;">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-xl-7 col-lg-6 col-12">
								<div class="atf-page-heading-in text-center">
									<h1 class="atf-page-heading-title">Products Dashboard</h1>
								</div>
							</div>
						</div>
					</div>
			</div>

            <!-- END USER HEADING -->
            <div class="atf-section-padding atf-blog-area atf-blog-grid-area pb-0 text-center row">  
                <div class="col-8 mt-2 mx-auto">
                    <p class='h2'>Products</p>
                    <table class='table table-striped'>
                        <thead class='table-success'>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Amount</th>
                                <th>Seller</th>
                                <th><a class="btn btn-success" href="create_product.php">Add Product</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?=$tbody?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- FOOTER SECTION-->
            <?php include_once "components/footer.php" ?>
        </div>
        <!-- PAGE WRAPPER END-->
		
	<!-- JS Script COMPONENTS -->
	<?php include_once "components/jscollection.php" ?>    
    <?php $db->close(); ?>
    </body>
</html>