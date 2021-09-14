<?php
session_start();
require_once 'assets/php/db_connect.php';
require_once 'assets/php/actions/file_upload.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['admin']) && !isset($_SESSION['user']) ) {
    header("Location: index2.php");
    exit;
   }
   
$backBtn = '';
//if it is a user it will create a back button to home.php
if(isset($_SESSION["user"])){
    $backBtn = "home_user.php";    
}
//if it is a adm it will create a back button to dashboard.php
if(isset($_SESSION["adm"])){
    $backBtn = "dashboard_admin.php";    
}

$USERS_TABLE = $_SESSION["USERS_TABLE"];
//fetch and populate form
if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    $sql = "SELECT * FROM `$USERS_TABLE` WHERE `ID` = ?";
    $result = $db->query($sql, array($ID));
    $n = $result->numRows();
    if ($n === 1) {
        $data = $result->fetchArray();
        $fname = $data['first_name'];
        $lname = $data['last_name'];
        $birthday = $data['birthday'];
        $email = $data['email'];
        $pass = $data['password'];
        $phone = $data['phone_number'];
        $address = $data['address'];
        $image = $data['image'];
        $cityID = $data['fk_city'];
        $city = $db->query("SELECT * FROM `cities` WHERE `ID` = ?;", array($cityID))->fetchArray()['name'];
        $country = $db->query("SELECT * FROM `countries` WHERE `ID` = ?;", array($cityID))->fetchArray()['name'];
        $html_city_string  = CreateSelectDropDown("SELECT * FROM `cities`", $city);
        $html_country_string  = CreateSelectDropDown("SELECT * FROM `countries`", $country);
        // $cityID = $data['fk_city'];
        // $countryID = $db->query("SELECT * FROM countries WHERE ID = ?", array($cityID))->fetchArray()["ID"];
    }   
}

//update
$class = 'd-none';
if (isset($_POST["submit"])) {
    $fname = CleanInput($_POST['first_name']);
    $lname = CleanInput($_POST['last_name']);
    $email = CleanInput($_POST['email']);
    $phone = CleanInput($_POST['phone']);
    $address = CleanInput($_POST['address']);
    $cityID = $_POST['fk_city'];
    $ID = $_POST['ID'];
    //variable for upload images errors is initialized
    $uploadError = '';    
    $image = file_upload($_FILES['image']); //file_upload() called
    debug_to_console($image->error);
    if ($image->error === 0) {   
        //debug_to_console($_POST["image"]);    
        ($_POST["image"] == "avatar.png") ?: unlink("assets/img/".$_POST["image"]);
        $sql = "UPDATE `users` SET  `fk_city` = ?, `first_name` = ?, `last_name` = ?, `birthday` = ?, `email` = ?, `address` = ?, `phone_number` = ?, `image` = ? WHERE `ID` = ?;";
        $params = array($cityID, $fname, $lname, $birthday, $email, $address, $phone, $image->fileName, $ID);
    } else {
        $sql = "UPDATE `users` SET  `fk_city` = ?, `first_name` = ?, `last_name` = ?, `birthday` = ?, `email` = ?, `address` = ?, `phone_number` = ? WHERE `ID` = ?;";
        $params = array($cityID, $fname, $lname, $birthday, $email, $address, $phone, $ID);
    }
    $db->query($sql, $params);
    
    $class = "alert alert-success";
    $message = "The record was successfully updated";
    $uploadError = ($image->error != 0) ? $image->ErrorMessage : '';
    header("refresh:3;url=update_user.php?ID={$ID}");

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
		<title>Famazon - User | Edit</title>
		<!-- CSS Styling COMPONENTS -->
		<?php include_once "components/csscollection.php" ?>
        <style>
            .userImage {
                width: 150px !important;
                height: auto !important;
            }
        </style>
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

            <div class="atf-section-padding atf-blog-area atf-blog-grid-area pb-0">
                <div class="<?php echo $class; ?>" role="alert">
                    <p><?php echo ($message) ?? ''; ?></p>
                    <p><?php echo ($uploadError) ?? ''; ?></p>       
                </div>
            

                <form name="form" id="form-id" method="post" enctype="multipart/form-data">
                    <div class="table-responsive mx-auto" style="width:90%;">
                        <h2 class="text-center">Update your personal data</h2>        
                        <div class="text-center my-2">
                            <img class='userImage' src='assets/img/<?= $data['image'] ?>' alt="<?= "$data[first_name] $data[last_name]" ?>">
                        </div>
                        <table class='table table-hover table-striped'>
                            <tr>
                                <th>First Name</th>
                                <td><input class="form-control" type="text"  name="first_name" placeholder ="First Name" value="<?php echo $fname ?>"  /></td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td><input class="form-control" type= "text" name="last_name"  placeholder="Last Name" value ="<?php echo $lname ?>" /></td>
                            </tr>
                            <tr>
                                <th>E-Mail</th>
                                <td><input class="form-control" type="email" name="email" placeholder= "Email" value= "<?php echo $email ?>" /></td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td><input class="form-control" type="tel" name="phone" placeholder= "Phone Number" value= "<?php echo $phone ?>" /></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><input class="form-control" type="text" name="address" placeholder= "Address" value= "<?php echo $address ?>" /></td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td><select name="fk_city" class="form-select"><?= $html_city_string ?></select></td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td><select name="country_id" class="form-select"><?= $html_country_string ?></select></td>
                            </tr>                                        
                            <tr>
                                <th>Image</th>
                                <td><input class="form-control" type="file" name="image" /></td>
                            </tr>
                            <tr>
                                <input type= "hidden" name="ID" value= "<?php echo $data['ID'] ?>" />
                                <input type= "hidden" name="image" value= "<?php echo $image ?>" />
                                <td><a href= "<?= $backBtn ?>"><button class="btn btn-warning font-weight-bold" type="button"><i class="fas fa-hand-point-left"></i> Go Back</button></a></td>
                                <td><button name="submit" type="submit" class="atf-themes-btn" id="submitBtn"><i class='fas fa-save'></i> Save</button></td>
                                
                            </tr>
                        </table>
                        <div id="testphp"></div>
                    </div>
                </form>
            </div>
            <!-- FOOTER SECTION-->
            <?php include_once "components/footer.php" ?>
		</div>
		<!-- PAGE WRAPPER END-->
		<!-- <script>serialize</script> -->
		<!-- JS Script COMPONENTS -->
		<?php include_once "components/jscollection.php" ?>  

        <!-- AJAX Part -->
        <!-- <script>
            // 'keyup'
            // "focusout"
            
            document.getElementById("submitBtn").addEventListener("click", UpdateProfile);
            function UpdateProfile(e) {
                e.preventDefault(); //this prevents the page from refreshing after submitting
                let request = new XMLHttpRequest(); //creating new request
                // alert(params);
                request.open("POST", "assets/php/actions/users/a_update.php", true); //connecting to a_update.php
                // let formData = $('form[name="form"]').serialize();
                var form = document.getElementById('form-id');
                var formData = new FormData(form);
                var entries = formData.entries();
                var data = Object.fromEntries(entries); 
                var params = JSON.stringify(formData);                      
                formData.forEach((value, key) => params += `&${key}=${value}` );
                console.log(params);
                // request.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //setting header for POST method
                request.setRequestHeader("Content-Type", "application/json");
                request.onload = function(){ if(this.status == 200) (document.getElementById("testphp").innerText = this.responseText); }
                request.send(params); //send parameters to be further processed by php
            }
        </script> -->

        <?php $db->close(); ?>


</body>
</html>

