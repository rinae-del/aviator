<?php
session_start();
require_once "../connection.php";
$username = $_SESSION['username'];
$sql = "SELECT * FROM profile WHERE upliner = '$username' AND status = 1";
$results = mysqli_query($conn, $sql);
$referrals = mysqli_num_rows($results);

$sql = "SELECT * FROM claims WHERE username = '$username' LIMIT 1";
$results = mysqli_query($conn, $sql);
$claim = mysqli_num_rows($results);

if ($referrals < 1) {
    exit('failed1');
}

if ($claim == 1) {
    exit('failed2');
}

$sql = "UPDATE profile SET balance = balance + 150 WHERE username = '$username' LIMIT 1";
mysqli_query($conn, $sql);

$sql = "INSERT INTO claims VALUES(0, '$username', '$now')";
mysqli_query($conn, $sql);

$sql = "INSERT INTO history VALUES(0, '$username', '$username', 'Completed Task', 150, 150, '$now', 'success')";
mysqli_query($conn, $sql);

exit('success');
?>