<?php
session_start(); // start a new session or continues the previous
if (isset($_SESSION['user']) != "") {
    header("Location: home_user.php"); // redirects to home.php
}

require_once 'assets/php/db_connect.php';
require_once 'assets/php/actions/file_upload.php';
// `username`, `first_name`, `last_name`, `birthday`, `image`, `email`, `password`, `role`, `address`, `phone_number`

$error = false;
$username = $fname = $lname = $birthday = $email = $pass = $phone = $address = $image = '';
$usernameError = $fnameError = $lnameError = $bdayError = $emailError = $passError = $phoneError = $addressError = $imgError = '';

$_SESSION["USERS_TABLE"] = "users";
$USERS_TABLE = $_SESSION["USERS_TABLE"];

$html_country_string = CreateSelectDropDown("SELECT * FROM `countries` ORDER BY `name`;");
$html_city_string = CreateSelectDropDown("SELECT * FROM `cities` ORDER BY `name`;");
if (isset($_POST['btn-signup'])) {
    // sanitize user input to prevent sql injection
    $username = CleanInput($_POST['username']);
    $fname = CleanInput($_POST['fname']);
    $lname = CleanInput($_POST['lname']);
    $birthday = CleanInput($_POST['bday']);
    $email = CleanInput($_POST['email']);
    $pass = CleanInput($_POST['pass']);
    $phone = CleanInput($_POST['phone']);
    $address = CleanInput($_POST['address']);
    
    $cityID = (int)CleanInput($_POST['city']);
    $countryID = (int)CleanInput($_POST['country']);

    
    $uploadError = '';
    $image = file_upload($_FILES['picture']);
    // debug_to_console($username." ".$fname." ".$lname." ".$birthday." ".$email." ".$pass." ".$phone." ".$address." ".$image->fileName." ".$cityID." ".$countryID);
    
    // basic first name validation
    if (empty($fname)) {
        $error = true;
        $fnameError = "Please enter your full first name";
    } else if (strlen($fname) < 2) {
        $error = true;
        $fnameError = "First name must have at least 2 characters.";
    } else if (!preg_match("/^[a-zA-Z]+$/", $fname)) {
        $error = true;
        $fnameError = "First name must contain only letters and no spaces.";
    }

    // basic last name validation
    if (empty($lname)) {
        $error = true;
        $fnameError = "Please enter your full last name";
    } else if (strlen($lname) < 2) {
        $error = true;
        $fnameError = "Last name must have at least 2 characters.";
    } else if (!preg_match("/^[a-zA-Z]+$/", $lname)) {
        $error = true;
        $fnameError = "Last name must contain only letters and no spaces.";
    }  
    // password validation
    if (!ValidateDate($birthday)) {
        $error = true;
        $bdayError = "Birthday is empty or not a valid date.";
    }
    
    // TODO CHECK FOR USER & EMAIL BEFORE CLICKING THE SIGN UP BUTTON
    //basic email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address.";
    } else {
        // checks whether the email exists or not
        $query = "SELECT `email` FROM `$USERS_TABLE` WHERE `email`='$email'";
        $result = $db->query($query);
        $count = $result->numRows();
        if ($count != 0) {
            $error = true;
            $emailError = "Provided Email is already in use.";
        }
    }

    //basic username validation
    if (empty($username)) {
        $error = true;
        $usernameError = "Please pick an username.";
    } else {
        // checks whether the email exists or not
        $query = "SELECT `username` FROM `$USERS_TABLE` WHERE `username`='$username'";
        $result = $db->query($query);
        $count = $result->numRows();
        if ($count != 0) {
            $error = true;
            $usernameError = "Provided Username is already in use.";
        }
    }     
     
    // basic address validation
    if (empty($address)) {
        $error = true;
        $addressError = "Please enter your full address.";
    }

    // basic phone number validation
    if (empty($phone)) {
        $error = true;
        $phoneError = "Please enter your phone number.";
    } else if (!ValidatePhoneNumber($phone)) {
        $error = true;
        $phoneError = "Please enter a valid phone number.";        
    }

    // password validation
    if (empty($pass)) {
        $error = true;
        $passError = "Please enter password.";
    } else if (strlen($pass) < 4) {
        $error = true;
        $passError = "Password must have at least 4 characters.";
    }

    // password hashing for security
    $pass_hashed = password_hash($pass, PASSWORD_BCRYPT);
    // if there's no error, continue to signup
    if (!$error) {
        $query = "INSERT INTO `$USERS_TABLE` (`ID`, `fk_city`, `username`, `first_name`, `last_name`, `birthday`, `image`, `email`, `password`, `role`, `address`, `phone_number`, `isBanned`, `banned_from`, `banned_until`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        # `ID`, `fk_city`, `username`, `first_name`, `last_name`, `birthday`, `image`, `email`, `password`, `role`, `address`, `phone_number`, `isBanned`, `banned_from`, `banned_until`
        # run query $image->fileName, "user"
        $db->query($query, array(NULL, $cityID, $username, $fname, $lname, $birthday, $image->fileName, $email, $pass_hashed, "user", $address, $phone, false, NULL, NULL));
        $errTyp = "success";
        $errMSG = "Successfully registered, you may login now";
        $uploadError = ($image->error != 0) ? $image->ErrorMessage : '';

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
		<title>Famazon - User | Registration</title>
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

			<!-- START REGISTER HEADING -->
			<div class="atf-page-heading atf-size-md" data-stellar-background-ratio="0.3" style="background-image: url(assets/img/gallery/register_heading.jpg); background-size:cover; background-position: center center;">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-xl-7 col-lg-6 col-12">
								<div class="atf-page-heading-in text-center">
									<h1 class="atf-page-heading-title">Create an account!</h1>
								</div>
							</div>
						</div>
					</div>
			</div>
			<!-- END REGISTER HEADING -->

            <div class="atf-section-padding atf-blog-area atf-blog-grid-area pb-0">
                <form class="w-75 mx-auto" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" enctype="multipart/form-data">
                            <hr/>
                            <?php
                            if (isset($errMSG)) {
                            ?>
                            <div class="alert alert-<?php echo $errTyp ?>" >
                                        <p><?php echo $errMSG; ?></p>
                                        <p><?php echo $uploadError; ?></p>
                            </div>

                            <?php
                            }
                            ?>

                            <div class="d-flex my-2 justify-content-between">
                                <input type ="text"  name="fname" class="form-control ml-1"  placeholder="First name" maxlength="50" value="<?php echo $fname ?>"  />
                                <span class="text-danger"> <?php echo $fnameError; ?> </span>

                                <input type ="text"  name="lname"  class="form-control mx-1"  placeholder="Lastname" maxlength="50" value="<?php echo $lname ?>"  />
                                <span class="text-danger"> <?php echo $lnameError; ?> </span>

                                <input type ="text"  name="username"  class="form-control mr-1"  placeholder="Username" maxlength="50" value="<?php echo $username ?>"  />
                                <span class="text-danger"> <?php echo $usernameError; ?> </span>                                
                            </div>
                            <div class="d-flex my-2">
                                <input type="email" name="email" class="form-control w-50 mr-1" placeholder="Enter Your Email" maxlength="40" value ="<?php echo $email ?>"  />
                                <span  class="text-danger"> <?php echo $emailError; ?> </span>

                                <input type="password" name="pass" class="form-control w-50 ml-1" placeholder="Enter Password" maxlength="15" />
                                <span class="text-danger"> <?php echo $passError; ?> </span>
                            </div>

                            <div class="d-flex my-2">
                                <input type="text" name="address" class="form-control w-50 mr-1" placeholder="Enter Your Address" maxlength="40" value ="<?php echo $address ?>"  />
                                <span  class="text-danger"> <?php echo $addressError; ?> </span>

                                <input type="tel" name="phone" class="form-control w-50 ml-1" placeholder="Enter Phone Number" maxlength="15" value ="<?php echo $phone ?>" />
                                <span class="text-danger"> <?php echo $phoneError; ?> </span>
                            </div>

                            <div class="d-flex my-2">
                                <select class="form-control w-50 mr-1" name="city">
                                    <?php echo $html_city_string ?>
                                </select>
                                <select class="form-control w-50 ml-1" name="country">
                                    <?php echo $html_country_string ?>
                                </select>                                
                            </div>
                            <div class="d-flex my-2">
                                <input class='form-control w-50 mr-1' type="date" name="bday" value="<?php echo $birthday ?>" />
                                <span class="text-danger"> <?php echo $bdayError; ?> </span>

                                <input class='form-control w-50 ml-1' type="file" name="picture" >
                                <span class="text-danger"> <?php echo $imgError; ?> </span>
                            </div>
                            <p><button type="submit" class="btn-block atf-themes-btn" name="btn-signup">Sign Up</button></p>
                            <hr/>
                            <p class="text-center my-2">Already have an account? <a href="login_user.php">Sign in >here<</a></p>
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