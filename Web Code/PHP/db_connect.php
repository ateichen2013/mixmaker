<?php 
// Do not change the following two lines.
$teamURL = dirname($_SERVER['PHP_SELF']) . DIRECTORY_SEPARATOR;
$server_root = dirname($_SERVER['PHP_SELF']);

// You will need to require this file in EVERY php file that uses the database.
// Be sure to use $db->close(); at the end of each php file that includes this!

$dbhost = "localhost"; // Most likely will not need to be changed
$dbname = "mixmaker"; // needs to be changed to your designated table name
$dbuser = "mysql"; // needs to be changed to reflect LAMP server credentials
$dbpass = "ed2mixmaker"; // needs to be changed to reflect LAMP server credentials

$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

echo "testing";

if($db->connect_errno > 0)
{
    die('Unable to connect to database [' . $db->connect_error . ']');
}
?>