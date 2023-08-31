<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl-6 mb-4" style="user-select: auto;">
        <div class="col-xl" style="user-select: auto;">
            <div class="card mb-4" style="user-select: auto;">
            <div class="card-header d-flex justify-content-between align-items-center" style="user-select: auto;">
                <h5 class="mb-0" style="user-select: auto;">Send Coins</h5> <small class="text-muted float-end" style="user-select: auto;">Send Coins</small>
            </div>
            <div class="card-body" style="user-select: auto;">
                <form style="user-select: auto;">
                <div class="form-floating form-floating-outline mb-4" style="user-select: auto;">
                    <input type="text" class="form-control" name='' id="receipient" placeholder="Recipient Username" fdprocessedid="y1386xp" style="user-select: auto;">
                    <label for="basic-default-fullname" style="user-select: auto;">Recipient Username</label>
                </div>
                <div class="form-floating form-floating-outline mb-4" style="user-select: auto;">
                    <input type="number" id='sendamount' class="form-control" placeholder="Amount" fdprocessedid="b32fdk" style="user-select: auto;">
                    <label for="basic-default-company" style="user-select: auto;">Amount</label>
                </div>
                <button type="button" id='sendcbtn' class="btn btn-primary waves-effect waves-light" onclick='sendcoinsconfirm()' fdprocessedid="gk1bb" style="user-select: auto;">Send</button>
                </form>
            </div>
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
require_once "components/footer.php";
?>
<!-- / Footer -->
<div class="content-backdrop fade"></div>
</div>