<?php
session_start();
require_once "../connection.php";
$username = $_SESSION['username'];
$amount = $_GET['amount'];
if ($amount < 150) {
    exit('failed1');
}
$sql = "SELECT * FROM cointransactions WHERE sellername = 'admin' AND username = '$username' AND status = 4 LIMIT 1";
$results = mysqli_query($conn, $sql);
if (mysqli_num_rows($results) == 1) {
    $sql = "UPDATE cointransactions SET amount = $amount WHERE sellername = 'admin' AND username = '$username' AND status = 4";
    $results = mysqli_query($conn, $sql);
}else{
    $sql = "INSERT INTO cointransactions VALUES(0, '$username', 'Admin', $amount, $amount, 4, '$now')";
    $results = mysqli_query($conn, $sql);
}

?>