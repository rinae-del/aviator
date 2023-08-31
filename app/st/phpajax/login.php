<?php
session_start();
require_once "../connection.php";
$username = $_GET['username'];
$password = $_GET['password'];

$sql = "SELECT * FROM profile WHERE username = '$username' AND password = SHA('$password')";
$results = mysqli_query($conn, $sql);
if (mysqli_num_rows($results) == 1) {
    $_SESSION['username'] = $username;
    exit('success');
}else{
    exit('failed1');
}
?>