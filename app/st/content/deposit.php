<?php
$sql = "SELECT * FROM cointransactions WHERE sellername = 'admin' AND username = '$username' AND status = 4 LIMIT 1";
$results = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($results);
if (mysqli_num_rows($results) != 0 ) {
?>
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
<div class="col-xl-6 mb-4" style="user-select: auto;">
    <div class="card" style="user-select: auto;">
      <h5 class="card-header" style="user-select: auto;">Deposit Money</h5>
      <div class="card-body" style="user-select: auto;">
        <p>Please note you are about to deposit into admin account. Depositing into admin account helps the system a lot and it's encouraged, However you can buy coins directly from other users using market and get an extra 5% coins. click <a href="">here</a> to access market.  Do immediate payment and use your username as referrence. You can contact us on <a href="">telegram</a>.</span></p>
        <div class="row" style="user-select: auto;">
        <div class="card mb-4" style="user-select: auto;">
      <div class="card-body" style="user-select: auto;">
        <small class="card-text text-uppercase text-muted" style="user-select: auto;">Details</small>
        <ul class="list-unstyled my-3 py-1" style="user-select: auto;">
          <li class="d-flex align-items-center mb-3" style="user-select: auto;"><i class="mdi mdi-account-outline mdi-24px" style="user-select: auto;"></i><span class="fw-semibold mx-2" style="user-select: auto;">Account Name:</span> <span style="user-select: auto;">Life Changers Society</span></li>
          <li class="d-flex align-items-center mb-3" style="user-select: auto;"><i class="mdi mdi-check mdi-24px" style="user-select: auto;"></i><span class="fw-semibold mx-2" style="user-select: auto;">Account Number:</span> <span class="text-dark" style="user-select: auto;" id='account'>1227520336  </span><small class="text-primary" onclick='copyAccount()'>copy</small></li>
          <li class="d-flex align-items-center mb-3" style="user-select: auto;"><i class="mdi mdi-star-outline mdi-24px" style="user-select: auto;"></i><span class="fw-semibold mx-2" style="user-select: auto;">Account Type:</span> <span style="user-select: auto;">Current Account</span></li>
          <li class="d-flex align-items-center mb-3" style="user-select: auto;"><i class="mdi mdi-flag-outline mdi-24px" style="user-select: auto;"></i><span class="fw-semibold mx-2" style="user-select: auto;">Bank Name:</span> <span style="user-select: auto;">Nedbank</span></li>
          <li class="d-flex align-items-center mb-3" style="user-select: auto;"><i class="mdi mdi-wallet mdi-24px" style="user-select: auto;"></i><span class="fw-semibold mx-2" style="user-select: auto;">Amount:</span> <span style="user-select: auto;"><?php echo $row['amount'] ?></span></li>
          <li class="d-flex align-items-center mb-3" style="user-select: auto;"><i class="mdi mdi-whatsapp mdi-24px" style="user-select: auto;"></i><span class="fw-semibold mx-2" style="user-select: auto;">WhatsApp:</span> +27724647721 </li>
        </ul>
 
      </div>
    </div>
        </div>
        <br>
        <!-- <button type="submit" class="btn btn-primary waves-effect waves-light" fdprocessedid="n6yum3" style="user-select: auto;">Send</button> -->
      </div>
    </div>
  </div>
</div>
<?php
} 
require_once "components/footer.php";
?>
<!-- / Footer -->
<div class="content-backdrop fade"></div>
</div>