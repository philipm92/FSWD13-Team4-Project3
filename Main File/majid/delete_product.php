 <?php
session_start();
require_once 'assets/php/db_connect.php';

$class = 'd-none';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = {$id}" ;
    $result = $db->query($sql);
    
    
    if ($result->numRows() == 1) {
        $data = $result->fetchArray();
        $name = $data['name'];
        $price = $data['price'];
        $discount = $data['discount'];
        $amount = $data['amount'];
        $image = $data['image'];
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
		<title>Famazon - Product | Delete</title>
		<!-- CSS Styling COMPONENTS -->
		<?php include_once "components/csscollection.php" ?>
        <style type= "text/css">
            fieldset {
                    margin: auto;
                    margin-top: 100px;
                    width: 70% ;
                }     
                .img-thumbnail{
                    width: 70px !important;
                    height: 70px !important;
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
                <div class="<?php echo $class; ?>" role="alert">
                        <p><?php echo ($message) ?? ''; ?></p>           
                </div>
                <legend class='h2 mb-3'>Delete request <img class='img-thumbnail rounded-circle' src='../img/product/<?=$image?>' alt="<?=$name?>"></legend>
                <h5>You have selected the data below:</h5>
                <table class="table w-25 mt-3">
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Amount</th>
                    </tr>
                    <tr>
                        <td><?=$name?></td>
                        <td><?=$price?></td>
                        <td><?=$discount?></td>
                        <td><?=$amount?></td>
                    </tr>
                </table>

                <h3 class="mb-4">Do you really want to delete this user?</h3>
                <form action="assets/php/actions/products/a_delete_product.php" method="POST">
                    <input type="hidden" name="id" value="<?=$id?>" />
                    <input type="hidden" name="image" value="<?=$image?>" />
                    <button class="btn btn-danger" type="submit">Yes, delete it!</button >
                    <a href="dashboard_products.php"><button class="btn btn-warning" type="button">No, go back!</button></a>
                </form>
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