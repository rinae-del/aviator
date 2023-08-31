<?php
session_start();
$username = $_SESSION['username'];
require_once "../connection.php";
$sql = "SELECT token FROM profile WHERE username = '$username' LIMIT 1";
$rslts = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($rslts);
$token = $row['token'];


exit('success');
?>