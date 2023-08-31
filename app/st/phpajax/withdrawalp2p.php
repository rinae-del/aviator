<?php
session_start();
require_once "../connection.php";
$amount = $_GET['amount'];
$username = $_SESSION['username'];

$sql = "SELECT * FROM profile WHERE username = '$username' LIMIT 1";
$results = mysqli_query($conn, $sql) or die("Error fetching profile data...");
$row = mysqli_fetch_array($results);
// $balance = $row['balance'];
// $aviators = $row['aviators'];
$coins = $row['coins'];
$bonus = $row['bonus'];
$accountnumber = $row['accountnumber'];

if (empty($accountnumber)) {
    exit('failed3');
}

if ($amount > $coins) {
    exit('failed1');
}
if ($amount < 150) {
    exit('failed2');
}

$sql = "INSERT INTO cointransactions VALUES(0, '$username', '$username', $amount, $amount, 0, '$now')";
mysqli_query($conn, $sql);

$sql = "INSERT INTO history VALUES(0, '$username', '$username', 'withdrawal peer to peer', $amount, $amount, '$now', 'success')";
mysqli_query($conn, $sql);

$sql = "UPDATE profile SET coins = coins - $amount WHERE username = '$username' LIMIT 1";
mysqli_query($conn, $sql);

exit('success');
?>