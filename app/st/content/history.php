<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="container">
    <div class="card">
      <div class="card-body">
        <!-- <h5 class="card-title">Transaction History <h5> -->
        <table id="datatable" class="table table-bordered display responsive" style="width:100%">
          <thead>
            <tr>
              <th>Details</th>
              <th>Amount</th>
              <th>Status</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM history WHERE username = '$username' ORDER BY id DESC";
            $results = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($results)) {
            ?>
            <tr>
              <td><?php echo $row['type'] ?></td>
              <td><?php echo $row['fee'] ?></td>
              <td><?php echo $row['status'] ?></td>
              <td><?php echo $row['date'] ?></td>
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