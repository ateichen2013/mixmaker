<?php
include("db_connect.php");

if( $_POST )
	$sql = "INSERT INTO drinks (drinkname, drink1, drink2, drink3, drink4) VALUES ('" . $_POST["drinkname"] . "', '" . $_POST["drink1"] . "', '" . $_POST["drink2"] . "', '" . $_POST["drink3"] . "', '" . $_POST["drink4"] . "')";
    
    if ($db->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>