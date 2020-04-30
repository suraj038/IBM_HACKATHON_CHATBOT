<?php


require 'connection.php';



$id = $_GET['id'];
 echo "$id";


 $i_name = $_POST['i_name'];
 $i_address = $_POST['i_address'];
 $i_phn_no = $_POST['i_phn_no'];
 $i_age = $_POST['i_age'];
 $account_type = $_POST['account_type'];
 $r_status = $_POST['r_status'];



 $sql = "UPDATE `reservation` SET `i_address` = ' $i_address', `i_phn_no` = '$i_phn_no', `i_age` = '$i_age', `account_type` = '$account_type', `i_name` = ' $i_name', `r_status` = '$r_status' WHERE `reservation`.`id` = $id;";

 if ($conn->query($sql) === TRUE) {
    //  echo "Record updated successfully";
    header('Location:datadisplay.php');
 } else {
     echo "Error updating record: " . $conn->error;
 }



?>