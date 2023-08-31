<?php
session_start();
require_once "../connection.php";
$username = $_SESSION['username'];
$amount = $_GET['amount'];
$sql = "SELECT * FROM profile WHERE username = '$username' LIMIT 1";
$results = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($results);
$lastaviation = $row['lastaviation'];
$level = $row['level'];
$aviators = $row['aviators'];

$startTime = new DateTime($lastaviation); // Insert your start date and time here
$now1 = new DateTime(); // Current time


$elapsed = $now1->diff($startTime);
$elapsedHours = $elapsed->h + ($elapsed->days * 24); // Get the total hours

if ($elapsedHours < 12) {
    exit('');
}

if ( $aviators == 0) {
    $sql = "UPDATE profile SET level = 0 WHERE username = '$username' LIMIT 1";
    $results = mysqli_query($conn, $sql);
    exit('');
}
$sql = "INSERT INTO history VALUES(0, '$username', '$username', 'Earned From aviator', $amount, $amount, '$now', 'success')";
mysqli_query($conn, $sql);

$sql =  "UPDATE profile SET balance = balance + $amount, lastaviation = '$now', aviators = aviators - 1 WHERE username = '$username' LIMIT 1";
$results = mysqli_query($conn, $sql) or die('Error updating profile...');
exit('success');
?>