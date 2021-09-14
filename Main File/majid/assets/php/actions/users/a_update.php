<?php

$class = 'd-none';
echo var_dump($_POST);
if (isset($_POST["submit"])) {
    // debug_to_console("I am here");
    // $fname = CleanInput($_POST['first_name']);
    // $lname = CleanInput($_POST['last_name']);
    // $email = CleanInput($_POST['email']);
    // $phone = CleanInput($_POST['phone']);
    // $address = CleanInput($_POST['address']);
    // $cityID = $_POST['fk_city'];
    // $ID = $_POST['ID'];
    // //variable for upload images errors is initialized
    // $uploadError = '';    
    // $image = file_upload($_FILES['image']); //file_upload() called
    // debug_to_console($image->error);
    // if ($image->error === 0) {   
    //     debug_to_console($_POST["image"]);    
    //     ($_POST["image"] == "avatar.png") ?: unlink("assets/img/".$_POST["image"]);
    //     $sql = "UPDATE `users` SET  `fk_city` = ?, `first_name` = ?, `last_name` = ?, `birthday` = ?, `email` = ?, `address` = ?, `phone_number` = ?, `image` = ? WHERE `ID` = ?;";
    //     $params = array($cityID, $fname, $lname, $birthday, $email, $address, $phone, $image->fileName, $ID);
    // } else {
    //     $sql = "UPDATE `users` SET  `fk_city` = ?, `first_name` = ?, `last_name` = ?, `birthday` = ?, `email` = ?, `address` = ?, `phone_number` = ? WHERE `ID` = ?;";
    //     $params = array($cityID, $fname, $lname, $birthday, $email, $address, $phone, $ID);
    // }
    // $db->query($sql, $params);
    
    // $class = "alert alert-success";
    // $message = "The record was successfully updated";
    // $uploadError = ($image->error != 0) ? $image->ErrorMessage : '';
    // header("refresh:3;url=update_user.php?ID={$ID}");

}
