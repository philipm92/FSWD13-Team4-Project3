<?php
session_start();
ob_start();
require_once '../../db_connect.php';
require_once '../file_upload.php';

if ($_POST) {
    $name = CleanInput($_POST['product_name']);
    $price = CleanInput($_POST['product_price']);
    $discount = CleanInput($_POST['product_discount']);
    $amount = CleanInput($_POST['product_amount']);
    $seller = CleanInput($_POST['product_seller']);
    $category = CleanInput($_POST['category']);

    $uploadError = $class = $message =  '';
    $image = file_upload($_FILES['product_image'], 'products');

    if($seller == 'none') {
        $sql = "INSERT INTO products(`name`, `price`, `discount`, `amount`, `image`) VALUES ('$name',$price ,$discount ,$amount ,'$image->fileName')";
    }else {
        $sql = "INSERT INTO products(`name`, `price`, `discount`, `amount`, `image`, `fk_seller`) VALUES ('$name',$price ,$discount ,$amount ,'$image->fileName',$seller)";
    }

    if($db->query($sql) == true) {
        $class = "success";
        $message = "The entry below was added successfully! <br>
            <table class='table w-50'>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
                <tr>
                    <td><img class='img-thumbnail rounded-circle' style='width: 70px !important; height: 70px !important;' src='../../img/product/".$image->fileName."'></td>
                    <td> $name </td>
                    <td> $price </td>
                </tr>
            </table>
            <hr>";
        $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
    }else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>";
        $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
    }
    $result = $db->query("SELECT ID FROM products WHERE image = '$image->fileName'");
    $row = $db->fetchArray($result);
    // var_dump($row);
    $ID = $row["ID"];
    // var_dump($ID);

    $sql_cat = "INSERT INTO product_in_category(`fk_category`, `fk_product`) VALUES ($category, $ID)";
    $db->query($sql_cat);
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
		<title>Famazon - Product | Create <?= $name ?></title>
		<!-- CSS Styling COMPONENTS -->
		<?php include_once "../../../../components/csscollection.php" ?>
	</head>    
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Create request response</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../dashboard_products.php'><button class="btn btn-primary" type='button'>Product Dashboard</button></a>
            </div>
        </div>
    </body>
</html>