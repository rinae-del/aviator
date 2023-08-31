<?php
session_start();
require_once "../../connection.php";
$username = $_SESSION['username'];
$sql = "SELECT lastaviation FROM profile WHERE username = '$username' LIMIT 1";
$results = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($results);
$lastflip = $row['lastaviation'];
$startTime = new DateTime($lastflip); // Insert your start date and time here
$now = new DateTime(); // Current time


$elapsed = $now->diff($startTime);
$elapsedHours = $elapsed->h + ($elapsed->days * 24); // Get the total hours

if ($elapsedHours >= 12) {
    echo "00:00:00";
} else {
    $remainingHours = 11 - $elapsedHours;
    $remainingMinutes = 60 - $elapsed->i;
    $remainingSeconds = 60 - $elapsed->s;

    if ($remainingMinutes == 60) {
        $remainingHours++;
        $remainingMinutes = 0;
    }

    if ($remainingSeconds == 60) {
        $remainingMinutes++;
        $remainingSeconds = 0;
    }
    $remainingHours = sprintf("%02d", $remainingHours);
    $remainingMinutes = sprintf("%02d", $remainingMinutes);
    $remainingSeconds = sprintf("%02d", $remainingSeconds);

    echo $remainingHours . ":" . $remainingMinutes . " : " . $remainingSeconds;
}
?>