<?php 
session_start();
ob_start();
require_once '../../db_connect.php';
require_once '../file_upload.php';

if ($_POST) {
    $id = $_POST['id'];
    $image = $_POST['image'];
    unlink("../../../img/product/$image");

    $sql = "DELETE FROM products WHERE id = {$id}";
    if ($db->query($sql) == TRUE) {
        $class = "success";
        $message = "Successfully Deleted!";
    } else {
        $class = "danger";
        $message = "The entry was not deleted try again or later... <br>";
    }
    $db->close();
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
		<?php include_once "../../../../components/csscollection.php" ?>
	</head>     
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Delete request response</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?=$message;?></p>
                <a href='../../../../dashboard_products.php'><button class="btn btn-success" type='button'>Product Dashboard</button></a>
            </div>
        </div>
    </body>
</html>