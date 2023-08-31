<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl-6 mb-4" style="user-select: auto;">
        <div class="col-xl" style="user-select: auto;">
            <div class="card mb-4" style="user-select: auto;">
            <div class="card-header d-flex justify-content-between align-items-center" style="user-select: auto;">
                <h5 class="mb-0" style="user-select: auto;">Convert Balance/Bonus to Coins</h5> <small class="text-muted float-end" style="user-select: auto;">Convert Coins</small>
            </div>
            <div class="card-body" style="user-select: auto;">
            <p>1 coin is equal to 1 rand. You first need to convert your balance/bonus to coins before doing any transaction. Coins are used to buy levels and can also be sold/withdrawn or sent to other users.</p>
                <form style="user-select: auto;">
                <div class="form-floating form-floating-outline mb-4" style="user-select: auto;">
                    <select name="" id='type' class="form-control" id="">
                        <option value="balance">Balance</option>
                        <option value="bonus">Bonus</option>
                    </select>
                    <!-- <input type="text" class="form-control" id="basic-default-company" placeholder="Amount In rands" fdprocessedid="b32fdk" style="user-select: auto;"> -->
                    <label for="basic-default-company" style="user-select: auto;">Type</label>
                </div>
                <div class="form-floating form-floating-outline mb-4" style="user-select: auto;">
                    <input type="text" id='conamount' class="form-control" id="basic-default-company" placeholder="Amount In rands" fdprocessedid="b32fdk" style="user-select: auto;">
                    <label for="basic-default-company" style="user-select: auto;">Amount</label>
                </div>
                <button type="button" onclick='convertcoins()' class="btn btn-primary waves-effect waves-light" fdprocessedid="gk1bb" style="user-select: auto;">Convert</button>
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