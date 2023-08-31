<?php
session_start();
require_once "../connection.php";
$email = $_GET['email'];
$password = $_GET['password1'];
$password2 = $_GET['password2'];

if (empty($email) || empty($password) || empty($password2)) {
    exit('failed1');
}

if ($password != $password2) {
    exit('failed2');
}



$sql = "SELECT token FROM profile WHERE email = '$email' LIMIT 1";
$rslts = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($rslts);
if (empty($row['token'])) {
    exit('failed3');
}
$token = $row['token'];


$sql = "UPDATE profile SET password = SHA('$password'), status = 0 WHERE email = '$email' LIMIT 1";
mysqli_query($conn, $sql);
exit('success');
?>