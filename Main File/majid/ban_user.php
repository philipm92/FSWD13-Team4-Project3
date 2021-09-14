<?php
session_start();
//remove headers already sent warning!
ob_start();
require_once 'assets/php/db_connect.php';

// it will never let you open index(login) page if session is set
if (!isset($_SESSION['admin']) || $_SESSION['admin']==""){
   header("Location: index2.php");
   exit;
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

                    <table class="table table-hover ">
                        <thead >
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Firstname</th>
                            <th scope="col">Lastname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Ban</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = 'SELECT ID, first_name, last_name, email, isBanned FROM users';
                               
                                $result = $db->query($sql); //mysqli_query($connection, $sql);
                                $rows = $result->fetchAll();
                                $i = 0; 
                                foreach($rows as $row) { //while ($row = $result->fetch_row()) {
                                    
                                    $button="";
                                    if($row["isBanned"]==0){
                                        $button = '<form method="POST" action="ban_user.php"><input type="hidden" name="id" value='.$row["ID"].'><button class="btn btn-danger col-12" name="ban" type="submit">Ban</button></form>';
                                    }else{
                                        $button = '<form method="POST" action="ban_user.php"><input type="hidden" name="id" value='.$row["ID"].'><button class="btn btn-light btn-outline-dark col-12" name="allow" type="submit">Allow</button></form>';
                                    }
                                    if($_SESSION['admin']!=$row["ID"]){
                                        $i++;
                                        echo('<tr>
                                            <th scope="row">'.$i.'</th>
                                            <td>'.$row["first_name"].'</td>
                                            <td>'.$row["last_name"].'</td>
                                            <td>'.$row["email"].'</td>
                                        <td>'.$button.'</td>
                                        </tr>
                                    ');
                                    }
                                   
                                }
                            ?>
                            
                            
                        </tbody>
                        </table>
						
					</div><!--- END CONTAINER -->
				</section>
				<!-- CONTACT SECTION END-->
                <?php
                if(isset($_POST['ban'])){
                        $sql = 'UPDATE users SET isBanned = 1 WHERE ID='.$_POST['id'];
                        $db->query($sql);
                        //mysqli_query($connection, $sql);

                        header('Location: ban_user.php');
                    }

                    if(isset($_POST['allow'])){
                        $sql = 'UPDATE users SET isBanned = 0 WHERE ID='.$_POST['id'];
                        $db->query($sql); //mysqli_query($connection, $sql);

                        header('Location: ban_user.php');
                    }
                ?>
				
			</div>
			<!--- END CONTENT -->
		
		   <!-- FOOTER SECTION-->
		   <?php include_once "components/footer.php" ?>
		</div>
		<!-- PAGE WRAPPER END-->
		
		<!-- JS Script COMPONENTS -->
		<?php include_once "components/jscollection.php" ?>
		<?php $db->close() ?>
	</body>
</html>