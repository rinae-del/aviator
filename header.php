<?php
$sql = "SELECT * FROM profile WHERE username = '$username' LIMIT 1";
$results = mysqli_query($conn, $sql) or die("Error fetching profile data...");
$row = mysqli_fetch_array($results);
if (empty($row['avatar'])) {
   $path = '../../assets/img/avatars/1.png';
}else{
   $path = $row['avatar'];
}
?>
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
   <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <i class="mdi mdi-menu mdi-24px"></i>
      </a>
   </div>
   <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
      <!-- Search -->
      <div class="navbar-nav align-items-center">
         <div class="nav-item navbar-search-wrapper mb-0">
            <a class="nav-item nav-link search-toggler fw-normal px-0" href="javascript:void(0);">
            <i class="mdi mdi-face-agent mdi-24px scaleX-n1-rtl"></i>
            <span class="d-none d-md-inline-block text-muted">Contact Support Agent</span>
            </a>
         </div>
      </div>
      <!-- /Search -->
      <ul class="navbar-nav flex-row align-items-center ms-auto">
         <!-- Language -->
         <li class="nav-item  me-1 me-xl-0" >
            <a href="referrals">
               <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
               <lord-icon
                  src="https://cdn.lordicon.com/nkmsrxys.json"
                  trigger="loop"
                  colors="primary:#636578,secondary:#636578"
                  stroke="100"
                  style="width:30px;height:30px">
               </lord-icon>

            </a>
         </li>
         <li>
         </li>
         <!--/ Language -->
         <!-- Style Switcher -->
         <li class="nav-item me-1 me-xl-0">
            <a class="nav-link btn btn-text-secondary rounded-pill btn-icon  hide-arrow" href="aviator">
            <i class='mdi mdi-rocket mdi-24px'></i>
            </a>
         </li>
         <!--/ Style Switcher -->
         <!-- Quick links  -->
         <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-1 me-xl-0">
            <a class="nav-link btn btn-text-secondary rounded-pill btn-icon " href="upgrade" aria-expanded="false">
            <i class='mdi mdi-store mdi-24px'></i>
            </a>
         </li>
         <!-- Quick links -->
         <!-- Notification -->
         <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-2 me-xl-1">
            <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" href="profile"  aria-expanded="false">
            <i class="mdi  mdi-account mdi-24px"></i>
            <span class="position-absolute top-0 start-50 translate-middle-y badge badge-dot bg-danger mt-2 border"></span>
            </a>
         </li>
         <!--/ Notification -->
         <!-- User -->
         <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
               <div class="avatar avatar-online">
                  <img src="<?php echo $path ?>" alt class="w-px-40 h-auto rounded-circle">
               </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
               <li>
                  <a class="dropdown-item" href="pages-account-settings-">
                     <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                           <div class="avatar avatar-online">
                              <img src="<?php echo $path ?>" alt class="w-px-40 h-auto rounded-circle">
                           </div>
                        </div>
                        <div class="flex-grow-1">
                           <span class="fw-semibold d-block"><?php echo $username ?></span>
                           <small class="text-muted">User</small>
                        </div>
                     </div>
                  </a>
               </li>
               <li>
                  <div class="dropdown-divider"></div>
               </li>


               <li>
                  <div class="dropdown-divider"></div>
               </li>
               <li>
                  <a class="dropdown-item" href="logout" target="_blank">
                  <i class="mdi mdi-logout me-2"></i>
                  <span class="align-middle">Log Out</span>
                  </a>
               </li>
            </ul>
         </li>
         <!--/ User -->
      </ul>
   </div>
   <!-- Search Small Screens -->

</nav>