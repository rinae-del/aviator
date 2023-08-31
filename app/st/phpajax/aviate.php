<?php
session_start();
require_once "../connection.php";
$username = $_SESSION['username'];
$sql = "SELECT * FROM profile WHERE username = '$username' LIMIT 1";
$results = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($results);
$lastaviation = $row['lastaviation'];
$level = $row['level'];
$aviators = $row['aviators'];

$startTime = new DateTime($lastaviation); // Insert your start date and time here
$now = new DateTime(); // Current time


$elapsed = $now->diff($startTime);
$elapsedHours = $elapsed->h + ($elapsed->days * 24); // Get the total hours

if ($elapsedHours < 12) {
    exit('failed1');
}

if ( $aviators == 0) {
    $sql = "UPDATE profile SET level = 0 WHERE username = '$username' LIMIT 1";
    $results = mysqli_query($conn, $sql);
    exit('failed2');
}

exit('success');
?>