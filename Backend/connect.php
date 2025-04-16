<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$hostname = "127.0.0.1"; // or "localhost"
$user = "root"; // Default for XAMPP
$pass = ""; // Default XAMPP has no password
$db = "DAYCAREPRO"; // Make sure this database exists

$con = mysqli_connect($hostname, $user, $pass, $db);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}
?>

