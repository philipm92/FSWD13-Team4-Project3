<?php
session_start();
ob_start();
require_once '../../db_connect.php';
require_once '../file_upload.php';

if ($_POST) { 
    $id = CleanInput($_POST['ID']);
    $name = CleanInput($_POST['product_name']);
    $price = CleanInput($_POST['product_price']);
    $discount = CleanInput($_POST['product_discount']);
    $amount = CleanInput($_POST['product_amount']);
    $seller = CleanInput($_POST['product_seller']);
  

    //variable for upload pictures errors is initialized
    $uploadError = $sql = '';
    $image = file_upload($_FILES['product_image'], 'products');
    
    if($image->error === 0) {
        ($_POST["product_image"]=="$image->fileName")?: unlink("../../../img/product/$_POST[product_image]"); 
        $sql = "UPDATE products SET name = '$name', price = $price, discount = $discount, amount = $amount, fk_seller = '$seller', image = '$image->fileName' WHERE ID = {$id}";
    } else {
        $sql = "UPDATE products SET name = '$name', price = $price, discount = $discount, amount = $amount, fk_seller = '$seller' WHERE ID = {$id}";
    }

    if ($db->query($sql) == TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
        $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . mysqli_connect_error();
        $uploadError = ($image->error !=0)? $image->ErrorMessage :'';
    }
}
    $db->close();   

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <?php echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>"; ?>
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Update request response</h1>
            </div>
            <div class="alert alert-<?php echo $class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../../../../update_product.php?id=<?=$id;?>'><button class="btn btn-warning" type='button'>Back</button></a>
                <a href='../../../../dashboard_products.php'><button class="btn btn-success" type='button'>Product Dashboard</button></a>
            </div>
        </div>
    </body>
</html>