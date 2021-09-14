<?php
session_start();
require_once 'assets/php/db_connect.php';
$_SESSION["USERS_TABLE"] = "users";
$USERS_TABLE = $_SESSION["USERS_TABLE"];

// it will never let you open index(login) page if session is set
if (isset($_SESSION['user']) != "") {
    header("Location: home_user.php");
    exit;
}
if (isset($_SESSION['adm']) != "") {
    header("Location: dashboard_admin.php"); // redirects to home.php
}


$error = false;
$username = $pass = $usernameError = $passError = '';
if (isset($_POST['btn-login'])) {

    // prevent sql injections/ clear user inputs
    $username = CleanInput($_POST['username']);
    $pass = CleanInput($_POST['pass']);

    if (empty($username)) {
        $error = true;
        $usernameError = "Please enter an username.";
    }

    if (empty($pass)) {
        $error = true;
        $passError = "Please enter your password.";
    }

    // if there's no error, continue to login
    if (!$error) {
        $sql = "SELECT `ID`, `first_name`, `password`, `role` FROM `$USERS_TABLE` WHERE `username` = ?";
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) $sql = "SELECT `ID`, `first_name`, `password`, `role` FROM `$USERS_TABLE` WHERE `email` = ?";
        $result = $db->query($sql, array($username));
        $count = $result->numRows();
        $row = $result->fetchArray();

        if ($count == 1 && password_verify($pass, $row["password"])) {
            if($row['role'] == 'admin'){
                $_SESSION['admin'] = $row['ID'];
                header( "Location: dashboard_admin.php");}
            else {
                $_SESSION['user'] = $row['ID'];
                header( "Location: index2.php");
            }          
        } else {
            $errMSG = "Incorrect Credentials, Try again...";
        }
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
		<title>Famazon - User | Login</title>
		<!-- CSS Styling COMPONENTS -->
		<?php include_once "components/csscollection.php" ?>
    </head>
    <body class="d-flex">
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

			<!-- START LOGIN HEADING -->
			<div class="atf-page-heading atf-size-md" data-stellar-background-ratio="0.3" style="background-image: url(assets/img/gallery/login_heading.jpg); background-size:cover; background-position: center center;">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-xl-7 col-lg-6 col-12">
								<div class="atf-page-heading-in text-center">
									<h1 class="atf-page-heading-title">Please login</h1>
								</div>
							</div>
						</div>
					</div>
			</div>
			<!-- END LOGIN HEADING -->

            <div class="atf-section-padding atf-blog-area atf-blog-grid-area pb-0">
                <form class="w-75 mx-auto" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                    <!-- <h2 class="text-center">Please login</h2> -->
                    <hr/>
                    <input type ="text" autocomplete="off" name="username"  class="form-control mr-1"  placeholder="E-Mail Or Username" maxlength="50" value="<?php echo $username ?>"  />
                    <span class="text-danger"><?php echo $usernameError; ?></span>

                    <input type="password" name="pass"  class="form-control my-2" placeholder="Your Password" maxlength="15"  />
                    <span class="text-danger"><?php echo $passError; ?></span>
                    <button class="btn-block atf-themes-btn" type="submit" name="btn-login">Sign In</button>
                    <hr/>
                    <p class="text-center my-2">Not registered yet? <a href="register_user.php">>Click here<</a></p>
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