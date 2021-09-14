<?php 
session_start();
require_once '../php/db_connect.php';
// if session is not set this will redirect to login page
if( !isset($_SESSION['admin']) && !isset($_SESSION['user']) ) {
    header("Location: index.php");
    exit;
}
if(isset($_SESSION["user"])){
    header("Location: home.php");
    exit;
}
//initial bootstrap class for the confirmation message
$class = 'd-none';
$USERS_TABLE = $_SESSION["USERS_TABLE"];
//the GET method will show the info from the user to be deleted
if ($_GET['id']) {
   $ID = $_GET['id'];
   $sql = "SELECT * FROM `$USERS_TABLE` WHERE `id` = ?" ;
   $result = $db->query($sql, array($ID));
   $n = $result->numRows();
   $data = $result->fetchAll();
   if ($n == 1) {
       $f_name = $data['first_name'];
       $l_name = $data['last_name'];
       $email = $data['email'];
       $date_of_birth = $data['birthday'];
       $image = $data['image'];
}
//the POST method will actually delete the user permanently
if ($_POST) {
    $ID = $_POST['id'];
    $image = $_POST['image'];
    ($image == "avatar.png")?: unlink("../assets/img/$image");
   
    $sql = "DELETE FROM `$USERS_TABLE` WHERE id = ?";
    $result = $db->query($sql, array($ID));
    $class = "alert alert-success";
    $message = "Successfully Deleted!";
    header("refresh:3;url=dashboard.php");
}

$db->close();
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
		<title>Famazon - User | Delete</title>
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

            <div class="<?php echo $class; ?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>           
            </div>  
            <legend class='h2 mb-3'>Delete request <img class='img-thumbnail rounded-circle' src='images/<?php echo $image ?>' alt="<?php echo $f_name ?>"></legend>
            <h5>You have selected the data below:</h5>
            <table class="table w-75 mt-3">
                <tr>
                    <td><?php echo "$f_name $l_name"?></td>
                    <td><?php echo $email?></td>
                    <td><?php echo $date_of_birth?></td>
                </tr>
            </table>

            <h3 class="mb-4">Do you really want to delete this user?</h3>
            <form method="post">
                <input type="hidden" name="id" value="<?php echo $ID ?>" />
                <input type="hidden" name="image" value="<?php echo $image ?>" />
                <button class="btn btn-danger" type="submit">Yes, delete it!</button >
                <a href="dashboard_admin.php"><button class="btn btn-warning" type="button">No, go back!</button></a>
            </form>

            <!-- FOOTER SECTION-->
            <?php include_once "components/footer.php" ?>
		</div>
		<!-- PAGE WRAPPER END-->
		
		<!-- JS Script COMPONENTS -->
		<?php include_once "components/jscollection.php" ?>        




    </body>

</html>