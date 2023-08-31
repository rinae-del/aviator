<?php
session_start();
require_once "../connection.php";
$amount = $_GET['amount'];
$amountfee = $_GET['amountfee'];
$username = $_SESSION['username'];

$sql = "SELECT * FROM profile WHERE username = '$username' LIMIT 1";
$results = mysqli_query($conn, $sql) or die("Error fetching profile data...");
$row = mysqli_fetch_array($results);
// $balance = $row['balance'];
// $aviators = $row['aviators'];
$accountnumber = $row['accountnumber'];
$coins = $row['coins'];
$bonus = $row['bonus'];
if (empty($amount) || empty($amountfee)) {
    exit('failed4');
}
if (empty($accountnumber)) {
    exit('failed3');
}
if ($amount > $coins) {
    exit('failed1');
}
if ($amount < 150) {
    exit('failed2');
}

$sql = "INSERT INTO history VALUES(0, '$username', 'Admin', 'withdrawal', $amount, $amountfee, '$now', 'pending')";
mysqli_query($conn, $sql);

$sql = "UPDATE profile SET coins = coins - $amount WHERE username = '$username' LIMIT 1";
mysqli_query($conn, $sql);

exit('success');
?>