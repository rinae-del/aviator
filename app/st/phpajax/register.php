<?php
session_start();
require_once "../connection.php";

$username = $_GET['username'];
$email = $_GET['email'];
$password = $_GET['password'];
$upliner = $_GET['upliner'];

$sql = "SELECT * FROM profile WHERE username = '$username' LIMIT 1";
$rslt = mysqli_query($conn, $sql);
if (mysqli_num_rows($rslt) == 1) {
    exit('failed1');
}

$sql = "SELECT * FROM profile WHERE email = '$email' LIMIT 1";
$rslt = mysqli_query($conn, $sql);
if (mysqli_num_rows($rslt) == 1) {
    exit('failed2');
}

if (strpos($email, '@gmail.com') !== false) {
    // echo "The email is a Gmail address";
} else {
    exit('failed3');
}

if (preg_match('/[^A-Za-z0-9]/', $username)) {
    exit('failed4');
}

$token = bin2hex(random_bytes(16));
$sql = "INSERT INTO profile VALUES(0, '$username', '$email', SHA('$password'), '', '', '', '', '', '', 0, 0, 0, 0, 5, '2023-01-01 00:00:00', '$upliner', 0, 0, '$now', '', '$token')";
mysqli_query($conn, $sql);
$_SESSION['username'] = $username;
exit('success');
?>