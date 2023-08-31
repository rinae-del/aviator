<?php
session_start();
require_once "../connection.php";
$username = $_SESSION['username'];
$amount = $_GET['amount'];
//check coins being sold, order by latest
if ($amount < 150) {
    exit('failed2');
}
$sql = "SELECT * FROM cointransactions WHERE status = 0 AND username != '$username' ORDER BY id DESC";
$results = mysqli_query($conn, $sql) or die('not working...');
if (mysqli_num_rows($results) == 0) {
    exit('failed1');
}
$allocations = 0;
while ($row = mysqli_fetch_array($results) ) {
    //loop through coins being sold, check if more than 3 buy request have already been made
    $sellername = $row['username'];
    $sql1 = "SELECT * FROM buyrequest WHERE sellername = '$sellername' AND status = 0";
    $results1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($results1) >= 3) {
        //do nothing, check the next seller
    }else{
        $selleramount = $row['amountnow'];
        $coinsid = $row['id'];
        if ($amount == $selleramount) {
            $sql = "INSERT INTO buyrequest VALUES(0, '$username', $amount, '$now', 0, $coinsid, '$sellername')";
            mysqli_query($conn, $sql);
            $amount = 0;
        }else{
            if ($amount > $selleramount) {
                //buyer amount is greater than seller offer
                if ( $amount - $selleramount < 150) {
                    # code...
                }else{
                    $amount = $selleramount;
                    $sql = "INSERT INTO buyrequest VALUES(0, '$username', $amount, '$now', 0, $coinsid, '$sellername')";
                    mysqli_query($conn, $sql);
                    $allocations++;
                }
            }else{
                //buyer amount is less than seller offer
                if ($selleramount - $amount < 150) {
                    # code...
                }else{
                    $sql = "INSERT INTO buyrequest VALUES(0, '$username', $amount, '$now', 0, $coinsid, '$sellername')";
                    mysqli_query($conn, $sql);
                    $allocations++;
                    $amount = 0;
                    
                }
            }
        }
    }
    if ($amount == 0) {
        break;
    }
}

if ($amount > 0 && $allocations == 0) {
    exit('failed1');
}

if ($amount > 0 && $allocations > 0) {
    exit('success1');
}

exit('success');
?>