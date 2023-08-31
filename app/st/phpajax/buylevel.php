<?php
session_start();
require_once "../connection.php";
$level = $_GET['customRadioTemp'];
$username = $_SESSION['username'];

 if ($level == 1) {
    $price = 150;
 }
 
 if ($level == 2) {
    $price = 500;
 }
 
 if ($level == 3) {
    $price = 1000;
 }
 
 if ($level == 4) {
    $price = 2000;
 }
 
 if ($level == 5) {
    $price = 5000;
 }
 
 if ($level == 6) {
    $price = 10000;
 }

$sql = "SELECT * FROM profile WHERE username = '$username' LIMIT 1";
$results = mysqli_query($conn, $sql) or die("Error fetching profile data...");
$row = mysqli_fetch_array($results);
$aviators = $row['aviators'];
$coins = $row['coins'];

if ($coins < $price) {
    exit('failed1');
}

if ($aviators > 0) {
    exit("failed2");
}

$sql = "UPDATE profile SET level = $level, coins = coins - $coins, aviators = 20 WHERE username = '$username' LIMIT 1";
$results = mysqli_query($conn, $sql);
exit('success');
?>