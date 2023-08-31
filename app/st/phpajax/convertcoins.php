<?php
session_start();
require_once "../connection.php";
$username = $_SESSION['username'];
$amount = $_GET['amount'];
$type = $_GET['type'];

$sql = "SELECT * FROM profile WHERE username = '$username' LIMIT 1";
$results = mysqli_query($conn, $sql) or die("Error fetching profile data...");
$row = mysqli_fetch_array($results);
$bonus = $row['bonus'];
$balance = $row['balance'];

if ($type == 'bonus') {
    if ($amount > $bonus) {
        exit('failed1');
    }
}

if ($type == 'balance') {
    if ($amount > $balance) {
        exit('failed1');
    }
}


$sql = "UPDATE profile SET coins = coins + $amount, $type = $type - $amount WHERE username = '$username' LIMIT 1";
mysqli_query($conn, $sql);


$sql = "INSERT INTO history VALUES(0, '$username', '$username', 'Converted $type', $amount, $amount, '$now', 'success')";
mysqli_query($conn, $sql);

exit('success');
?>