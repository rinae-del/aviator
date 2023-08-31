<?php
session_start();
require_once "../connection.php";
$username = $_SESSION['username'];
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
$accountnumber = $_GET['accountnumber'];
$bankname = $_GET['accountnumber'];
$phonenumber = $_GET['phonenumber'];
$whatsappnumber = $_GET['whatsappnumber'];

if (empty($firstname) || empty($lastname) || empty($accountnumber) || empty($bankname) || empty($phonenumber) || empty($whatsappnumber)) {
   exit('failed1');
}

$sql = "UPDATE profile SET firstname = '$firstname', lastname = '$lastname', accountnumber = '$accountnumber', bankname = '$bankname', phone_number = '$phonenumber', whatsapp_number = '$whatsappnumber' WHERE username = '$username' LIMIT 1";
mysqli_query($conn, $sql);
exit('success');
?>