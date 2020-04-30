<?php

require 'connection.php';

$id = $_GET['id'];
//  echo "$id";


$sql = "DELETE FROM reservation WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    // echo "Record deleted successfully";
    header('Location:datadisplay.php');
} else {
    echo "Error deleting record: " . $conn->error;
}



?>