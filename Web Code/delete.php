<?php
include("db_connect.php");

if( $_POST ) {
    $sql = "DELETE FROM drinks WHERE drinkname='" . $_POST["drinkname"] . "'";
    
    if ($db->query($sql) === TRUE) {
        echo "Drink deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>