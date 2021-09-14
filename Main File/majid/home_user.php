<?php
session_start();
require_once 'assets/php/db_connect.php';

// if adm will redirect to dashboard
if (isset($_SESSION['admin'])) {
    header("Location: dashboard_admin.php");
    exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
    header("Location: login_user.php");
    exit;
}

$_SESSION["USERS_TABLE"] = "users";
$userID = GetUserID();
$USERS_TABLE = $_SESSION["USERS_TABLE"];
$thead = '';
$sql = "SELECT * FROM products;";
$result = $db->query($sql);
$n = $result->numRows();
$rows = $db->fetchAll();
$data = GetQueryData($rows);

$tbody = "";
# fill table with adopted animals
// $sql = "SELECT $TABLE.*
// FROM `user`
// JOIN `pet_adoption` ON `pet_adoption`.`fk_user_id` = `user`.`id`
// JOIN $TABLE ON $TABLE.`id` = `pet_adoption`.`fk_animal_id`
// WHERE `user`.`id` = ? ORDER BY $TABLE.`size`, $TABLE.`name`;";

// $result = $db->query($sql, array($_SESSION["user"]));
// $tbody = ''; //this variable will hold the body for the table
// $n = $result->numRows();

$tbody =  "<tr><td colspan='".$n."'><center>No Items Purchased So Far!</center></td></tr>";



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
		<title>Famazon - User | <?php echo $row['first_name']; ?></title>
		<!-- CSS Styling COMPONENTS -->
		<?php include_once "components/csscollection.php" ?>

        <style>
            .userImage {
                width: 150px !important;
                height: auto !important;
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

            <?php 
            // select logged-in users details - procedural style
            $res = $db->query("SELECT * FROM `$USERS_TABLE` WHERE ID=?", array($_SESSION['user']));
            $row = $res->fetchArray();
            ?>

            <!-- START USER HEADING -->
            <div class="atf-page-heading atf-size-md" data-stellar-background-ratio="0.3" style="background-image: url(assets/img/gallery/user_dashboard.jpg); background-size:cover; background-position: 90% 40%;">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-xl-7 col-lg-6 col-12">
								<div class="atf-page-heading-in text-center">
									<h1 class="atf-page-heading-title">User Dashboard</h1>
								</div>
							</div>
						</div>
					</div>
			</div>
            <!-- END USER HEADING -->


            <div class="atf-section-padding atf-blog-area atf-blog-grid-area pb-0 text-center">  
            
                <div class="p-2 text-center">
                    <img class="userImage" src="assets/img/<?php echo $row['image']; ?>" alt="<?php echo $row['first_name']." ".$row['last_name']; ?>" style="width:100px;height:100px;">
                    <p class="text-dark" >Hi, <?php echo $row['first_name']." ".$row['last_name']; ?></p>
                </div>
                <div class="my-2 d-flex flex-column justify-content-between flex-md-row justify-content-md-center">
                    <a href="logout_user.php?logout"><button type="button" class="btn btn-outline-primary my-1 mx-1"><i class="fas fa-sign-out-alt"></i> Log out</button></a>
                    <a href="update_user.php?ID=<?= $userID ?>"><button type="button" class="btn btn-outline-secondary my-1 mx-1"><i class="fas fa-pen-alt"></i> Update Profile</button></a>
                    <a href="index2.php#about"><button type="button" class="btn btn-outline-success my-1 mx-1"><i class="fa fa-shopping-cart"></i> Shop Now</button></a>
                    <a class="btn btn-outline-danger my-1 mx-1" href="delete_user.php"><i class="fas fa-minus-circle"></i> Delete Account</a>
                </div>
                <?php if (isset($successMSG)) { ?>
                    <div class="alert alert-<?php echo $successTyp ?>" >
                        <p><?php echo $successMSG; ?></p>
                    </div>
                <?php } ?>

                <div class="row my-auto mx-auto">
							<div class="contact mr-lg-5">
								<h4>Account Information</h4>
								<?php
									$id = $_SESSION['user'];
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
                <p class='h2 text-center'>Your orders!</p>
                <div class="table-responsive mx-auto table-width">
                    <table class='table table-hover table-striped'
                        <thead class='table-success'>
                            <tr>
                                <?= $thead; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?= $tbody; ?>
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