<?php
  $sql = "SELECT * FROM cointransactions WHERE username = '$username' AND status = 0";
  $results = mysqli_query($conn, $sql);
  $selling = 0.00; 
  while ($row = mysqli_fetch_array($results)) {
      $selling = $selling + $row['amountnow'];
  }
  if (isset($_GET['acceptid'])) {
     $acceptid = $_GET['acceptid'];
     $sql = "SELECT coinsid, amount, status FROM buyrequest WHERE id = $acceptid AND sellername = '$username' LIMIT 1";
     $results = mysqli_query($conn, $sql);
     $row = mysqli_fetch_array($results);
     $coinsid = $row['coinsid'];
     $acceptamount = $row['amount'];
     if ($row['status'] == 0) {
            $sql = "SELECT amountnow FROM cointransactions WHERE id = $coinsid LIMIT 1";
            $rslt = mysqli_query($conn, $sql);
            $rw = mysqli_fetch_array($rslt);
            $amountnow = $rw['amountnow'];
            
            $newbalance = $amountnow - $acceptamount;
            $sql = "UPDATE cointransactions SET amountnow = amountnow - $acceptamount WHERE id = $coinsid LIMIT 1";
            mysqli_query($conn, $sql);
       
            $sql = "SELECT * FROM buyrequest WHERE sellername = '$username' AND status = 0";
            $rsltt = mysqli_query($conn, $sql);
            while ($rrw = mysqli_fetch_array($rsltt)) {
               $reqamount = $rrw['amount'];
               $reqid = $rrw['id'];
               if ($newbalance - $reqamount < 150) {
                  $sqll = "UPDATE buyrequest SET status = 3 WHERE id = $reqid";
                  mysqli_query($conn, $sqll);
               }
            }
       
            if ($newbalance == 0) {
             $sqll = "UPDATE cointransactions SET status = 1  WHERE id = $coinsid LIMIT 1";
             mysqli_query($conn, $sqll);
            }
       
            $sql = "UPDATE buyrequest SET status = 1 WHERE sellername = '$username' AND id =$acceptid LIMIT 1";
            mysqli_query($conn, $sql);
      # code...
     }
?>
<script>
  window.onload = function() {
  // Your code goes here
  notie.alert({ type: 'success', position: 'bottom', text: 'You have accepted buy request', time: 10 });
  };
</script>
<?php
  }
  if (isset($_GET['declineid'])) {
    $declinedid = $_GET['declineid'];
    $sql = "UPDATE buyrequest SET status = 3 WHERE sellername = '$username' AND id=$declinedid LIMIT 1";
    mysqli_query($conn, $sql);
?>
<script>
  window.onload = function() {
  // Your code goes here
  notie.alert({ type: 'error', position: 'bottom', text: 'You have declined a buy request', time: 10 });
  };
</script>
<?php
  }
  if (isset($_GET['approveid'])) {
    $approveid = $_GET['approveid'];

    $sql = "SELECT coinsid, amount, username, status FROM buyrequest WHERE id = $approveid LIMIT 1";
    $results = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($results);
    $coinsid = $row['coinsid'];
    $bonus = $acceptamount * 0.1;
    $acceptamount = $row['amount'] + $row['amount'] * 0.05;
    $buyer = $row['username'];
    $approved = $row['status'];

    if ($approved == 1) {
      $sql = "UPDATE buyrequest SET status = 2 WHERE sellername = '$username' AND id =$approveid LIMIT 1";
      mysqli_query($conn, $sql);
  
      $sql = "UPDATE profile SET coins = coins + $acceptamount WHERE username = '$buyer' LIMIT 1";
      mysqli_query($conn, $sql);
      $sql = "SELECT upliner FROM profile WHERE username = '$buyer' LIMIT 1";
      $rlt = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($rlt);
      $upliner = $row['upliner'];

      $sql = "UPDATE profile SET bonus = bonus + $bonus WHERE username = '$upliner' LIMIT 1";
      mysqli_query($conn, $sql);

      $sql = "UPDATE profile SET bonusgen = bonusgen + $bonus WHERE username = '$username' LIMIT 1";
      mysqli_query($conn, $sql);
      # code...
    }
  ?>
  <script>
  window.onload = function() {
  // Your code goes here
  notie.alert({ type: 'success', position: 'bottom', text: 'The buyer has been approved!', time: 10 });
  };
</script>
<?php

  }
?>
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="container">
        <div class="card mb-4">
            <div class="card-body">
            <small><p>Below, you can find a list of sold coins and requests to buy your coins. To proceed with a purchase request, you can accept it, allowing the user to make payment into your account. Once a request is approved, the coins will be moved to the "Pending Payment" status. After receiving payment, you are required to approve it. It's important to note that failure to approve the payment within the specified timeframe may result in a permanent ban from the platform.</p></small>
            <div class="col-lg-4" style="user-select: auto;">
    <div class="card h-100" style="user-select: auto;">
      <div class="card-body" style="user-select: auto;">
        <h4 class="card-title mb-1 d-flex gap-2 flex-wrap" style="user-select: auto;">Coins 😀</h4>
        <p class="pb-1" style="user-select: auto;">You are selling</p>
        <h4 class="text-primary mb-1" style="user-select: auto;"><?php echo $selling ?></h4>
        <p class="mb-2 pb-1" style="user-select: auto;">coins 😍</p>
        <!-- <a href="javascript:;" class="btn btn-sm btn-primary waves-effect waves-light" style="user-select: auto;">Sell to admin</a> -->
      </div>
      <!-- <img src="../../../assets/img/illustrations/" alt="" srcset=""> -->
      <img src="../../assets/img/illustrations/girl-with-laptop-light.png" class=" position-absolute bottom-0 end-0 me-3 mb-3" height="162" alt="Upgrade Account" style="user-select: auto;">
    </div>
  </div>    
        </div>
        </div>
    <div class="card">
      <div class="card-body">
          
        <h5 class="card-title">Buy Request <h5>
        <small><p>Below are the people requesting to buy your coins. Before you accept make sure you have contacted the person and you are positive they will make payment because after accepting the coins will go off market and you will have to await the person to make payment into your account then approve them.</p></small>

        <table id="datatable" class="table table-bordered display responsive" style="width:100%">
          <thead>
            <tr>
              <th>Buyer</th>
              <th>Amount</th>
              <th>Avatar</th>
              <th>Phone number</th>
              <th>WhatsApp</th>
              <th>Date</th>
              <th>Accept</th>
              <th>Decline</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM buyrequest WHERE sellername = '$username' AND status = 0 ORDER BY id DESC";
            $rslt = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($rslt)) {
              $buyer = $row['username'];
              $sql = "SELECT * FROM profile WHERE username = '$buyer' LIMIT 1";
              $rslto = mysqli_query($conn, $sql);
              $rw = mysqli_fetch_array($rslto);
              if (empty($rw['avatar'])) {
                $path = '../../assets/img/avatars/1.png';
              }else{
                $path = $rw['avatar'];
              }
            ?>
            <tr>
              <td><?php echo $row['username'] ?></td>
              <td><?php echo $row['amount'] ?></td>
              <td><div class="avatar-wrapper" style="user-select: auto;"><div class="avatar me-2" style="user-select: auto;"><img src="<?php echo $path ?>" alt="Avatar" class="rounded-circle" style="user-select: auto;"></div></div></td>
              <td><?php echo $rw['phone_number'] ?></td>
              <td><?php echo $rw['whatsapp_number'] ?></td>
              <td><?php echo $row['date'] ?></td>
              <td><a href="#!" class='btn btn-sm btn-success' onclick="acceptRequest(<?php echo $row['id'] ?>)">Accept</a></td>
              <td><a href="#!" class='btn btn-sm btn-danger' onclick="declineRequest(<?php echo $row['id'] ?>)">Decline</a></td>
            </tr>
            <?php
            }
            ?>
            <!-- Add more rows here -->
          </tbody>
        </table>
      </div>

    </div>

    <div class="card mt-4">
      <div class="card-body">
          
        <h5 class="card-title">Pending Payment <h5>
        <small><p>Below are the people who's request you have accepted and awaiting their payment. Once payment recieved press yes to accept and finalise the process.</p></small>

        <table id="datatable2" class="table table-bordered display responsive" style="width:100%">
          <thead>
            <tr>
              <th>Buyer</th>
              <th>Amount</th>
              <th>Avatar</th>
              <th>Phone number</th>
              <th>WhatsApp</th>
              <th>Date</th>
              <th>Action</th>
              <!-- <th>Decline</th> -->
            </tr>
          </thead>
          <tbody>
          <?php
            $sql = "SELECT * FROM buyrequest WHERE sellername = '$username' AND status = 1 ORDER BY id DESC";
            $rslt0 = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($rslt0)) {
              $buyer = $row['username'];
              $sql = "SELECT * FROM profile WHERE username = '$buyer' LIMIT 1";
              $rslt = mysqli_query($conn, $sql);
              $rw = mysqli_fetch_array($rslt);
              if (empty($rw['avatar'])) {
                $path = '../../assets/img/avatars/1.png';
              }else{
                $path = $rw['avatar'];
              }
            ?>
            <tr>
              <td><?php echo $buyer ?></td>
              <td><?php echo $row['amount'] ?></td>
              <td><div class="avatar-wrapper" style="user-select: auto;"><div class="avatar me-2" style="user-select: auto;"><img src="<?php echo $path ?>" alt="Avatar" class="rounded-circle" style="user-select: auto;"></div></div></td>
              <td><?php echo $rw['phone_number'] ?></td>
              <td><?php echo $rw['whatsapp_number'] ?></td>
              <td><?php echo $row['date'] ?></td>
              <td><a href="#!" class='btn btn-sm btn-success' onclick="approvePayment(<?php echo $row['id'] ?>)">Approve</a></td>
              <!-- <td><a href="">Yes</a></td> -->
            </tr>
            <?php
            }
            ?>
            <!-- Add more rows here -->
          </tbody>
        </table>
      </div>

    </div>

    <div class="card mt-4">
      <div class="card-body">
          
        <h5 class="card-title">Sold Coins <h5>
        <small><p>Coins you have succesfully sold</p></small>

        <table id="datatable2" class="table table-bordered display responsive" style="width:100%">
          <thead>
            <tr>
              <th>Buyer</th>
              <th>Amount</th>
              <th>Avatar</th>
              <th>Phone number</th>
              <th>WhatsApp</th>
              <th>Date</th>
              <!-- <th>Recieved</th> -->
              <!-- <th>Decline</th> -->
            </tr>
          </thead>
          <tbody>
          <?php
            $sql = "SELECT * FROM buyrequest WHERE sellername = '$username' AND status = 2 ORDER BY id DESC";
            $rslt0 = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($rslt0)) {
              $buyer = $row['username'];
              $sql = "SELECT * FROM profile WHERE username = '$buyer' LIMIT 1";
              $rslt = mysqli_query($conn, $sql);
              $rw = mysqli_fetch_array($rslt);
              if (empty($rw['avatar'])) {
                $path = '../../assets/img/avatars/1.png';
              }else{
                $path = $rw['avatar'];
              }
            ?>
            <tr>
            <td><?php echo $buyer ?></td>
              <td><?php echo $row['amount'] ?></td>
              <td><div class="avatar-wrapper" style="user-select: auto;"><div class="avatar me-2" style="user-select: auto;"><img src="<?php echo $path ?>" alt="Avatar" class="rounded-circle" style="user-select: auto;"></div></div></td>
              <td><?php echo $rw['phone_number'] ?></td>
              <td><?php echo $rw['whatsapp_number'] ?></td>
              <td><?php echo $row['date'] ?></td>
              <!-- <td><a href="">Yes</a></td> -->
              <!-- <td><a href="">Yes</a></td> -->
            </tr>
            <?php
            }
            ?>
            <!-- Add more rows here -->
          </tbody>
        </table>
      </div>

    </div>
  </div>
    </div>
    <!-- / Content -->
    <!-- Footer -->
    <?php 
    require_once "components/footer.php";
    ?>
    <!-- / Footer -->
    <div class="content-backdrop fade"></div>
</div>