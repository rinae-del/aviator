<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="container">
    <div class="card mb-4">
        <div class="card-body">
        <small><p>Invite your friends to join and when they buy coins, you will receive a 10% bonus. Additionally, the first 100 users who successfully refer 40 downliners will receive a free R150 reward. Start inviting your friends today and benefit from these exciting referral rewards!</p></small>
        <div class="col-lg-4" style="user-select: auto;">
            <div class="card h-100" style="user-select: auto;">
            <div class="card-body" style="user-select: auto;">
                <h4 class="card-title mb-1 d-flex gap-2 flex-wrap" style="user-select: auto;">Task 😀</h4>
                <p class="pb-1" style="user-select: auto;">Invite 40 friends</p>
                <h4 class="text-primary mb-1" style="user-select: auto;">R150</h4>
                <p class="mb-2 pb-1" style="user-select: auto;">Up for grabs 😍</p>
                <a href="javascript:;" class="btn btn-sm btn-primary waves-effect waves-light" onclick='claim()' style="user-select: auto;">Claim</a>
            </div>
            <!-- <img src="../../../assets/img/illustrations/" alt="" srcset=""> -->
            <img src="../../assets/img/illustrations/girl-with-laptop-light.png" class=" position-absolute bottom-0 end-0 me-3 mb-3" height="162" alt="Upgrade Account" style="user-select: auto;">
            </div>
        </div>    
        </div>
        </div>
    <div class="card mt-4">
      <div class="card-body">
        <!-- <h5 class="card-title">Transaction History <h5> -->
        <table id="datatable" class="table table-bordered display responsive" style="width:100%">
          <thead>
            <tr>
              <th>Avatar</th>
              <th>Username</th>
              <th>Date Joined</th>
              <th>Bonus Generated</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM profile WHERE upliner = '$username' AND status = 1 ORDER BY id DESC";
            $results = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($results)) {
              if (empty($row['avatar'])) {
                $path = '../../assets/img/avatars/1.png';
              }else{
                $path = $row['avatar'];
              }
            ?>
            <tr>
              <td><div class="avatar-wrapper" style="user-select: auto;"><div class="avatar me-2" style="user-select: auto;"><img src="<?php echo $path ?>" alt="Avatar" class="rounded-circle" style="user-select: auto;"></div></div></td>
              <td><?php echo $row['username'] ?></td>
              <td><?php echo $row['datejoined'] ?></td>
              <td><?php echo $row['bonusgen'] ?></td>
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