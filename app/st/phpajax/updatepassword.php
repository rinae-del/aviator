<?php
session_start();
require_once "../connection.php";
$username = $_SESSION['username'];

$password1 = $_GET['password'];
$password2 = $_GET['password1'];
$password3 = $_GET['password3'];

if (empty($password1) || empty($password2) || empty($password3)) {
    exit('failed1');
}

$sql = "SELECT * FROM profile WHERE username = '$username' AND password = SHA('$password1') LIMIT 1";
$results = mysqli_query($conn, $sql);
if (mysqli_num_rows($results) ==  0) {
    exit('failed2');
}

if ($password2 == $password3) {
    exit('failed3');
}

$sql = "UPDATE profile SET password = SHA('$password2') WHERE username = '$username' LIMIT 1";
mysqli_query($conn, $sql);
exit('success');
?>