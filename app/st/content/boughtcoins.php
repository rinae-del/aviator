<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="container">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Bought Coins <h5>
            <small><p>After submitting a request to purchase coins, it is advisable to contact the recipient. Once the recipient receives your request, they will review it and if approved, you will be provided with their banking details. <strong class="text-danger">Only use the banking details displayed by the system, don't send funds to the account the recipients send you through whatsapp or any other communication media.</strong> </p> <p> After making the payment, please notify the recipient to verify your payment. Once the payment is confirmed, the funds will be credited to your account. It is important to stay in touch with the recipient throughout the process to ensure a smooth transaction. </p></small>
        <table id="datatable" class="table table-bordered display responsive" style="width:100%">
          <thead>
            <tr>
              <th>Sellername</th>
              <th>Amount</th>
              <th>Avatar</th>
              <th>Full Name</th>
              <th>Phone number</th>
              <th>WhatsApp</th>
              <th>Bank Name</th>
              <th>Account Number</th>
              <th>Status</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $sql = "SELECT * FROM buyrequest WHERE username = '$username' ORDER BY id DESC";
                $results2 = mysqli_query($conn, $sql);
                while($row2 = mysqli_fetch_array($results2)){
                  if (empty($row2['status'])) {
                      $row2['status'] = 0;
                  }
                  $sellername = $row2['sellername'];
                  $sql = "SELECT * FROM profile WHERE username = '$sellername' LIMIT 1";
                  $rslt = mysqli_query($conn, $sql);
                  $rw = mysqli_fetch_array($rslt);
                  if (empty($rw['avatar'])) {
                    $path = '../../assets/img/avatars/1.png';
                  }else{
                    $path = $rw['avatar'];
                  }
                  $requestStatus = $row2['status'];
                  if ($requestStatus == 0) {
                    $reqStatus = 'Request Sent';
                    $bankname = "*********";
                    $accountnumber = "*********";
                  }else{
                    $bankname = $rw['bankname'];
                    $accountnumber = $rw['accountnumber'];
                    $reqStatus = 'Make payment';
                  }
                  if ($requestStatus == 2) {
                    $reqStatus = 'Payment Approved';
                  }
            ?>
              <tr>
                  <td><?php echo $sellername ?></td>
                  <td>R<?php echo $row2['amount'] ?></td>
                  <td>
                    <div class="avatar-wrapper" style="user-select: auto;">
                      <div class="avatar me-2" style="user-select: auto;">
                        <img src="<?php echo $path ?>" alt="Avatar" class="rounded-circle" style="user-select: auto;">
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class='text-capitalize'>
                    <?php 
                      echo $rw['firstname'].' '.$rw['lastname'];
                    ?>

                    </span>
                  </td>
                  <td>
                    <?php 
                      echo $rw['phone_number'] 
                    ?>
                  </td>
                  <td>
                    <?php echo $rw['whatsapp_number'] ?>
                  </td>
                  <td>
                    <?php echo $bankname ?>
                  </td>
                  <td>
                    <?php echo $accountnumber ?>
                  </td>
                  <td>
                    <?php echo $reqStatus ?>
                  </td>
                  <td>
                    <?php echo $row2['date'] ?>
                  </td>
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