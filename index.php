<?php
session_start();
require_once "app/st/connection.php";
if (isset($_GET['ref'])) {
    $_SESSION['upliner'] = $_GET['ref'];
}
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "UPDATE profile SET status = 1 WHERE $token = '$token'";
    mysqli_query($conn, $sql);
    header("location: app/st/login?verified");
    exit();
}
header('location: app/home/');
exit();
?>