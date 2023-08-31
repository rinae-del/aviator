<?php
$sql = "SELECT * FROM profile WHERE username = '$username' LIMIT 1";
$results = mysqli_query($conn, $sql) or die("Error fetching profile data...");
$row = mysqli_fetch_array($results);
$balance = $row['balance'];
$aviators = $row['aviators'];
$coins = $row['coins'];
$bonus = $row['bonus'];

if ($row['level'] == 0) {
   $earnings = "R2 - R5";
}

if ($row['level'] == 1) {
   $earnings = "R10 - R20";
}

if ($row['level'] == 2) {
   $earnings = "R35 - R70";
}

if ($row['level'] == 3) {
   $earnings = "R75 - R150";
}

if ($row['level'] == 4) {
   $earnings = "R160 - R320";
}

if ($row['level'] == 5) {
   $earnings = "R450 - R850";
}

if ($row['level'] == 6) {
   $earnings = "R1000 - R2000";
}
?>
<div class="content-wrapper">
   <!-- Content -->
   <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row gy-4 mb-4">
         <!-- Congratulations card -->
         <div class="col-xl-4 col-lg-4 col-md-12 col-sm-8 col-12">
            <div class="card h-100">
               <div class="card-body text-nowrap">
                  <h4 class="card-title mb-1 d-flex gap-2 flex-wrap">Welcome <strong><?php echo $username ?></strong> 🎉</h4>
                  <!-- <p class="pb-0">You have 0 unopened presents</p> -->
                  <h4 class="text-primary mb-1">R<?php echo $balance ?></h4>
                  <p class="mb-2 pb-1"><?php echo $aviators ?>x aviation left 🚀</p>
                  <a href="aviator" class="btn btn-sm btn-primary">Start Aviator</a>
               </div>
               <img src="../../assets/img/illustrations/trophy.png" class="position-absolute bottom-0 end-0 me-3" height="140" alt="view sales">
            </div>
         </div>
         <!--/ Congratulations card -->
         <!-- Total Profit -->
         <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
            <div class="card h-100">
               <div class="card-body">
                  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                     <div class="avatar">
                        <div class="avatar-initial bg-label-primary rounded">
                           <i class="mdi mdi-hand-coin-outline mdi-24px"></i>
                        </div>
                     </div>
                     <div class="d-flex align-items-center">
                        <!-- <p class="mb-0 text-success me-1">+22%</p> -->
                        <i class="mdi mdi-chevron-up text-success"></i>
                     </div>
                  </div>
                  <div class="card-info mt-4 pt-1">
                     <h5 class="mb-2">C<?php echo $coins ?></h5>
                     <p class="text-muted">Available Coins </p>
                     <div class="badge bg-label-secondary rounded-pill">1 Coin is R1</div>
                  </div>
               </div>
            </div>
         </div>
         <!--/ Total Profit -->
         <!-- Total Expenses -->
         <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
            <div class="card h-100">
               <div class="card-body">
                  <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                     <div class="avatar">
                        <div class="avatar-initial bg-label-success rounded">
                           <i class="mdi mdi-cash-multiple mdi-24px"></i>
                        </div>
                     </div>
                     <div class="d-flex align-items-center">
                        <!-- <p class="mb-0 text-success me-1">+38%</p> -->
                        <i class="mdi mdi-chevron-up text-success"></i>
                     </div>
                  </div>
                  <div class="card-info mt-4 pt-1">
                     <h5 class="mb-2">R<?php echo $bonus ?></h5>
                     <p class="text-muted">Available Bonus</p>
                     <div class="badge bg-label-secondary rounded-pill">Earn 10%</div>
                  </div>
               </div>
            </div>
         </div>
         <!--/ Total Expenses -->
         <!-- Total Profit chart -->
         <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
            <div class="card h-100">
               <div class="card-header pb-0">
                  <div class="d-flex align-items-end mb-1 flex-wrap gap-2">
                     <h4 class="mb-0 me-2" id='coundowncontent'></h4>
                     <p class="mb-0 text-danger">Wait 12 hours</p>
                  </div>
                  <span class="d-block mb-2 text-muted">Aviator Countdown</span>
               </div>
               <div class="card-body">
                  <div class="">
                     <img src="../../assets/img/countdown.png" width="100%" alt="" srcset="">

                  </div>
               </div>
            </div>
         </div>
         <!--/ Total Profit chart -->
         <!-- Total Growth chart -->
         <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
            <div class="card h-100">
               <div class="card-header pb-0">
                  <div class="d-flex align-items-end mb-1 flex-wrap gap-2">
                     <h4 class="mb-0 me-2">Level <?php echo $row['level'] ?></h4>
                     <p class="mb-0 text-success">Earning <?php echo $earnings ?></p>
                  </div>
                  <span class="d-block mb-2 text-muted">Account Level</span>
               </div>
               <div class="card-body">
                  <div class="">
                     <img src="../../assets/img/level.png" width="100%" alt="" srcset="">

                  </div>
               </div>
            </div>
         </div>
         <!--/ Total Sales chart -->
      </div>
      <div class="row gy-4">
         <!-- Organic Sessions Chart-->

         <!--/ Organic Sessions Chart-->
         <!-- Project Timeline Chart-->
         <!--/ Project Timeline Chart-->
         <!-- Weekly Overview Chart -->

         <!--/ Weekly Overview Chart -->
         <!-- Social Network Visits -->

         <!--/ Social Network Visits -->
         <!-- Monthly Budget Chart-->
   
         <!--/ Monthly Budget Chart-->
         <!-- Meeting Schedule -->
         <div class="col-lg-4 col-md-6 col-12">
            <div class="card h-100">
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="card-title mb-0 me-2">Referrals</h5>
                  <div class="dropdown">
                     <button class="btn p-0" type="button" id="meetingSchedule" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="mdi mdi-dots-vertical mdi-24px"></i>
                     </button>
                     <div class="dropdown-menu dropdown-menu-end" aria-labelledby="meetingSchedule">
                        <a class="dropdown-item" href="referrals">View More</a>
                     </div>
                  </div>
               </div>
               <div class="card-body pt-2">
                  <ul class="p-0 m-0">
                     <?php
                     $sql = "SELECT * FROM profile WHERE upliner = '$username'";
                     $results = mysqli_query($conn, $sql);
                     while ($row = mysqli_fetch_array($results)) {
                     ?>
                     <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                           <img src="../../assets/img/avatars/4.png" alt="avatar" class="rounded">
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                           <div class="me-2">
                              <h6 class="mb-0 fw-semibold">@<?php echo $row['username'] ?></h6>
                              <small class="text-muted">
                              <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                              <span><?php echo $row['datejoined'] ?></span>
                              </small>
                           </div>
                           <div class="badge bg-label-primary rounded-pill">R<?php echo $row['bonusgen'] ?> generated</div>
                        </div>
                     </li>
                     <?php
                     }
                     ?>

                  </ul>
               </div>
            </div>
         </div>
         <!--/ Meeting Schedule -->
         <!-- External Links Chart -->
         <!--/ Payment History -->
         <!-- Most Sales in Countries -->
         <div class="col-lg-4 col-12">
            <div class="card h-100">
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="card-title m-0 me-2">Coins in Market</h5>
                  <div class="dropdown">
                     <button class="btn p-0" type="button" id="mostSales" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="mdi mdi-dots-vertical mdi-24px"></i>
                     </button>
                     <div class="dropdown-menu dropdown-menu-end" aria-labelledby="mostSales">
                        <a class="dropdown-item" href="soldcoins">View More</a>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <?php 
                  $sql = "SELECT * FROM cointransactions WHERE username = '$username' AND status = 0";
                  $results = mysqli_query($conn, $sql);
                  $selling = 0.00; 
                  while ($row = mysqli_fetch_array($results)) {
                     $selling = $selling + $row['amountnow'];
                  }
                  ?>
                  <div class="mt-1 mb-1">
                     <div class="d-flex align-items-center">
                        <h1 class="mb-0 me-3 display-3">C<?php echo $selling ?></h1>
                        <!-- <div class="badge bg-label-success rounded-pill">+42%</div> -->
                     </div>
                     <small class="text-muted mt-0 mb-2">Total Coins you are selling</small>
                  </div>
                  <hr>
                  <div>
                     <ul class="p-0 m-0">
                     <?php 
                     $sql = "SELECT * FROM cointransactions WHERE username = '$username' AND status = 0";
                     $results = mysqli_query($conn, $sql);
                     while ($row = mysqli_fetch_array($results)) {
                        // $row['avatar'] = "";
                        $sql = "SELECT avatar FROM profile WHERE username = '$username' LIMIT 1";
                        $rslt = mysqli_query($conn, $sql);
                        $rw = mysqli_fetch_array($rslt);
                        if (empty($rw['avatar'])) {
                           $rw['avatar'] = "../../assets/img/avatars/4.png";
                        }
                     ?>
                        <li class="d-flex mb-4 pb-1">
                           <div class="avatar flex-shrink-0 me-3">
                              <img src="<?php echo $rw['avatar'] ?>" alt="avatar" class="rounded">
                           </div>
                           <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                              <div class="me-2">
                                 <h6 class="mb-0 fw-semibold">@<?php echo $username ?></h6>
                                 <small class="text-muted">
                                 <i class="mdi mdi-calendar-blank-outline mdi-14px"></i>
                                 <span>Selling <strong>C<?php echo $row['amountnow'] ?></strong></span>
                                 </small>
                              </div>
                              <a href='soldcoins' class="badge bg-label-primary rounded-pill">More Info</a>
                           </div>
                        </li>
                     <?php
                     }
                     ?>

                     </ul>

                  </div>
               </div>
               
            </div>
         </div>
         <!--/ Most Sales in Countries -->
         <!-- Roles Datatables -->
         <div class="col-lg-6 col-xl-4 mb-4">
            <div class="card h-100">
               <div class="card-header d-flex align-items-center justify-content-between">
               <h5 class="card-title m-0 me-2">Referral Link</h5>
               <div class="dropdown">
                  <button class="btn p-0" type="button" id="upgradePlanCard" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" fdprocessedid="ed242">
                     <i class="mdi mdi-dots-vertical mdi-24px"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="upgradePlanCard">
                     <a class="dropdown-item waves-effect" href="referrals">View Referrals</a>
                  </div>
               </div>
               </div>
               <div class="card-body">
               <span class="text-muted">Earn a 10% referral bonus when your referred individual makes an investment, and receive an additional bonus gift when they invest for the first time.</span>
               <div class="d-flex bg-label-primary p-2 border rounded my-3">
                  <div class="border border-2 border-primary rounded me-3 p-2 d-flex align-items-center justify-content-center w-px-40 h-px-40">
                     <i class="mdi mdi-star-outline mdi-24px"></i>
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                     <div class="me-2">
                     <h6 class="mb-0 fw-semibold">Invite</h6>
                     <a href="javascript:void(0)" class="small" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">40 users.</a>
                     </div>
                     <div class="user-progress">
                     <div class="d-flex justify-content-center">
                        <sup class="mt-3 mb-0 text-heading small">R</sup>
                        <h3 class="fw-medium mb-0">150</h3>
                        <sub class="mt-auto mb-2 text-heading small"> /first 100 recruiters</sub>
                     </div>
                     </div>
                  </div>
               </div>
               <form id="paymentDetailsForm" onsubmit="return false">
                  <h6 class="mb-3 pb-1 fw-semibold">Your Link</h6>

                  <!-- <a href="javascript:;" class="d-block my-2 small" data-bs-toggle="modal" data-bs-target="#addNewCCModal"> Add Payment Method </a> -->
                  <div class="col-12 mb-2 pb-1">
                     <input name="addEmail" class="form-control" id='link' type="text" value="https://www.aviator.center/?ref=<?php echo $username ?>" fdprocessedid="nf9dm">
                  </div>
                  <div class="col-12 text-center">
                     <button type="submit" class="btn btn-primary w-100 waves-effect waves-light" fdprocessedid="yupemp">
                     <span class="me-1" onclick='copyLink()'>Copy Referral Link</span>
                     <i class="mdi mdi-arrow-right scaleX-n1-rtl"></i> </button>
                  </div>
               </form>
               </div>
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