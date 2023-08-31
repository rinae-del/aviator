<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
<div class="card mb-4" style="user-select: auto;">
      <h4 class="card-header" style="user-select: auto;">Profile Details</h4>
      <!-- Account -->
      <div class="card-body" style="user-select: auto;">
      <form action="" id='avatarform'>
        <div class="d-flex align-items-start align-items-sm-center gap-4" style="user-select: auto;">
          <img src="../../assets/img/avatars/1.png" alt="user-avatar" class="d-block w-px-120 h-px-120 rounded" id="uploadedAvatar" style="user-select: auto;">
          <div class="button-wrapper" style="user-select: auto;">
            <!-- <label for="upload" class="btn btn-primary me-2 mb-3 waves-effect waves-light" tabindex="0" style="user-select: auto;"> -->
              <!-- <span class="d-none d-sm-block" style="user-select: auto;">Upload new photo</span> -->
              <!-- <i class="mdi mdi-tray-arrow-up d-block d-sm-none" style="user-select: auto;"></i> -->
              <!-- <input type="file" id="upload" class="account-file-input" hidden="" accept="image/png, image/jpeg" style="user-select: auto;"> -->
            <!-- </label> -->
            <!-- <button type="button" class="btn btn-outline-secondary account-image-reset mb-3 waves-effect" fdprocessedid="9yu7hf" style="user-select: auto;">
              <i class="mdi mdi-reload d-block d-sm-none" style="user-select: auto;"></i>
              <span class="d-none d-sm-block" style="user-select: auto;">Reset</span>
            </button> -->
            <!-- <div class="text-muted small" style="user-select: auto;">Allowed JPG, GIF or PNG. Max size of 800K</div> -->
          </div>
        </div>
      </form>
      </div>
      <?php
      $sql = "SELECT * FROM profile WHERE username = '$username' LIMIT 1";
      $results = mysqli_query($conn, $sql) or die("Error fetching profile data...");
      $row = mysqli_fetch_array($results);
      // $coins = $row['coins'];
      ?>
      <div class="card-body pt-2 mt-1" style="user-select: auto;">
        <form id="profileinfo" method="POST" enctype="multipart/form-data" class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" style="user-select: auto;">
          <div class="row mt-2 gy-4" style="user-select: auto;">
            <div class="col-md-6 fv-plugins-icon-container" style="user-select: auto;">
              <div class="form-floating form-floating-outline" style="user-select: auto;">
                <input class="form-control" type="text" id="firstName" name="firstname" value='<?php echo $row['firstname'] ?>' placeholder="First Name" autofocus="" fdprocessedid="33ofw" style="user-select: auto;">
                <label for="firstName" style="user-select: auto;">First Name</label>
              </div>
            <div class="fv-plugins-message-container invalid-feedback" style="user-select: auto;"></div></div>
            <div class="col-md-6 fv-plugins-icon-container" style="user-select: auto;">
              <div class="form-floating form-floating-outline" style="user-select: auto;">
                <input class="form-control" type="text" name="lastname" id="lastName" value='<?php echo $row['lastname'] ?>' placeholder="Last Name" fdprocessedid="swsf8d" style="user-select: auto;">
                <label for="lastName" style="user-select: auto;">Last Name</label>
              </div>
            <div class="fv-plugins-message-container invalid-feedback" style="user-select: auto;"></div></div>
            <div class="col-md-6" style="user-select: auto;">
              <div class="form-floating form-floating-outline" style="user-select: auto;">
                <input class="form-control" type="text" id="email" name="email" value='<?php echo $row['email'] ?>' readonly fdprocessedid="xn4b29" style="user-select: auto;">
                <label for="email" style="user-select: auto;">E-mail</label>
              </div>
            </div>
            <div class="col-md-6" style="user-select: auto;">
              <div class="input-group input-group-merge" style="user-select: auto;">
                <div class="form-floating form-floating-outline" style="user-select: auto;">
                  <input type="tel" id="phoneNumber" name="phonenumber" class="form-control" value='<?php echo $row['phone_number'] ?>' require placeholder="0812345678" fdprocessedid="7o4fio" style="user-select: auto;">
                  <label for="phoneNumber" style="user-select: auto;">Phone Number</label>
                </div>
                <span class="input-group-text" style="user-select: auto;"></span>
              </div>
            </div>
            <div class="col-md-6" style="user-select: auto;">
              <div class="form-floating form-floating-outline" style="user-select: auto;">
                <input type="tel" class="form-control" id="organization" name="whatsappnumber" value='<?php echo $row['whatsapp_number'] ?>' require placeholder="whatsapp number"  fdprocessedid="u4vdtb" style="user-select: auto;">
                <label for="organization" style="user-select: auto;">WhatsApp Number</label>
              </div>
            </div>
 
            <div class="col-md-6" style="user-select: auto;">
              <div class="form-floating form-floating-outline" style="user-select: auto;">
                <input type="text" class="form-control" id="address" name="bankname" require placeholder="Address" value='<?php echo $row['bankname'] ?>' fdprocessedid="v8rpu" style="user-select: auto;">
                <label for="address" style="user-select: auto;">Bank Name</label>
              </div>
            </div>
            <div class="col-md-6" style="user-select: auto;">
              <div class="form-floating form-floating-outline" style="user-select: auto;">
                <input class="form-control" type="text" id="state" name="accountnumber" require placeholder="California" value='<?php echo $row['accountnumber'] ?>' fdprocessedid="rwk1tm" style="user-select: auto;">
                <label for="state" style="user-select: auto;">Account Number</label>
              </div>
            </div>


          </div>
          <div class="mt-4" style="user-select: auto;">
            <button type="button" class="btn btn-primary me-2 waves-effect waves-light" onclick="updateprofile()" fdprocessedid="gjinrc" style="user-select: auto;">Save changes</button>
            <!-- <button type="reset" class="btn btn-outline-secondary waves-effect" fdprocessedid="y2buvm" style="user-select: auto;">Cancel</button> -->
          </div>
        <input type="hidden" style="user-select: auto;"></form>
      </div>
      <!-- /Account -->
    </div>
    <div class="card mb-4" style="user-select: auto;">
      <h5 class="card-header" style="user-select: auto;">Change Password</h5>
      <div class="card-body" style="user-select: auto;">
        <form id="passwordform" method="POST" onsubmit="return false" class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" style="user-select: auto;">
          <div class="row" style="user-select: auto;">
            <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container" style="user-select: auto;">
              <div class="input-group input-group-merge" style="user-select: auto;">
                <div class="form-floating form-floating-outline" style="user-select: auto;">
                  <input class="form-control" type="password" name="password" id="currentPassword" placeholder="············" fdprocessedid="1itvb" style="user-select: auto;">
                  <label for="currentPassword" style="user-select: auto;">Current Password</label>
                </div>
                <span class="input-group-text cursor-pointer" style="user-select: auto;"><i class="mdi mdi-eye-off-outline" style="user-select: auto;"></i></span>
              </div>
            <div class="fv-plugins-message-container invalid-feedback" style="user-select: auto;"></div></div>
          </div>
          <div class="row" style="user-select: auto;">
            <div class="mb-4 col-md-6 form-password-toggle fv-plugins-icon-container" style="user-select: auto;">
              <div class="input-group input-group-merge" style="user-select: auto;">
                <div class="form-floating form-floating-outline" style="user-select: auto;">
                  <input class="form-control" type="password" id="password1" name="password1" placeholder="············" fdprocessedid="zlt1le" style="user-select: auto;">
                  <label for="newPassword" style="user-select: auto;">New Password</label>
                </div>
                <span class="input-group-text cursor-pointer" style="user-select: auto;"><i class="mdi mdi-eye-off-outline" style="user-select: auto;"></i></span>
              </div>
            <div class="fv-plugins-message-container invalid-feedback" style="user-select: auto;"></div></div>
            <div class="mb-4 col-md-6 form-password-toggle fv-plugins-icon-container" style="user-select: auto;">
              <div class="input-group input-group-merge" style="user-select: auto;">
                <div class="form-floating form-floating-outline" style="user-select: auto;">
                  <input class="form-control" type="password" name="password3" id="confirmPassword" placeholder="············" fdprocessedid="ez10h" style="user-select: auto;">
                  <label for="confirmPassword" style="user-select: auto;">Confirm New Password</label>
                </div>
                <span class="input-group-text cursor-pointer" style="user-select: auto;"><i class="mdi mdi-eye-off-outline" style="user-select: auto;"></i></span>
              </div>
            <div class="fv-plugins-message-container invalid-feedback" style="user-select: auto;"></div></div>
          </div>

          <div class="mt-4" style="user-select: auto;">
            <button type="button" class="btn btn-primary me-2 waves-effect waves-light" onclick = 'updatepassword()' fdprocessedid="renysh" style="user-select: auto;">Save changes</button>
            <!-- <button type="reset" class="btn btn-outline-secondary waves-effect" fdprocessedid="o6oikd" style="user-select: auto;">Cancel</button> -->
          </div>
        <input type="hidden" style="user-select: auto;"></form>
      </div>
    </div>
<?php 
require_once "components/footer.php";
?>
<!-- / Footer -->
<div class="content-backdrop fade"></div>
</div>
</div>