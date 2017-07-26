<?php
include("db_connect.php");

if (isset($_REQUEST['drinkname'])) {
	/* Prepared statement, stage 1: prepare query */
	if (!($stmt = $db->prepare("INSERT INTO drinks(drinkname, drink1, drink2, drink3, drink4) VALUES (?, ?, ?, ?, ?, ?)")))
	{
		echo "Prepare failed: (" . $db->errno . ") " . $db->error;
	}

	/* Prepared statement, stage 2: bind parameters*/
	if (!$stmt->bind_param('sssss', $_POST["drinkname"], $_POST["drink1"], $_POST["drink2"], $_POST["drink3"], $_POST["drink4"]))
	{
		echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
	}

	/* Prepared statement, stage 3: execute*/
	if (!$stmt->execute())
	{
		echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
	}
}
?>