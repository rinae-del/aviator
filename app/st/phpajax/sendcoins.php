<?php
session_start();
require_once "../connection.php";
$username = $_SESSION['username'];
$amount = $_GET['amount'];
$receipient = $_GET['receipient'];

$sql = "SELECT * FROM profile WHERE username = '$username' LIMIT 1";
$results = mysqli_query($conn, $sql) or die("Error fetching profile data...");
$row = mysqli_fetch_array($results);
$coins = $row['coins'];

if ($amount > $coins) {
    exit('failed1');
}

if ($amount < 50) {
   exit('failed2');
}

$sql = "SELECT * FROM profile WHERE username = '$receipient' LIMIT 1";
$results = mysqli_query($conn, $sql) or die("Error fetching profile data...");
if (mysqli_num_rows($results) == 0) {
    exit('failed3');
}

$sql = "UPDATE profile SET coins = coins - $amount WHERE username = '$username' LIMIT 1";
mysqli_query($conn, $sql);

$sql = "UPDATE profile SET coins = coins + $amount WHERE username = '$receipient' LIMIT 1";
mysqli_query($conn, $sql);

$sql = "INSERT INTO history VALUES(0, '$username', '$receipient', 'Sent Coins to $receipient', $amount, $amount, '$now', 'success')";
mysqli_query($conn, $sql);

$sql = "INSERT INTO history VALUES(0, '$receipient', '$receipient', 'Received coins from $username', $amount, $amount, '$now', 'success')";
mysqli_query($conn, $sql);

exit('success');
?>