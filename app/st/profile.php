<?php
session_start();
require_once "connection.php";
if (!isset($_SESSION['username'])) {
   header('location: ../home/');
   exit();
}
$username = $_SESSION['username'];
$sql = "SELECT status FROM profile WHERE username = '$username' LIMIT 1";
$results = mysqli_query($conn, $sql) or die("Error fetching profile data...");
$row = mysqli_fetch_array($results);
if ($row['status'] == 0) {
   header('location: verifyaccount');
}
?><!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<?php
require_once "components/head.php";
require_once "content/modals.php";
?>
   <body>
      <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5J3LMKC" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->
      <!-- Layout wrapper -->
      <div class="layout-wrapper layout-content-navbar  ">
         <div class="layout-container">
            <?php
            require_once "components/nav.php";
            ?>
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
               <!-- Navbar -->
               <?php
            require_once "components/header.php";
            require_once "content/profile.php";
            ?>
               <!-- / Navbar -->
               <!-- Content wrapper -->

               <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
         </div>
         <!-- Overlay -->
         <div class="layout-overlay layout-menu-toggle"></div>
         <!-- Drag Target Area To SlideIn Menu On Small Screens -->
         <div class="drag-target"></div>
      </div>
      <!-- / Layout wrapper -->
      <div class="buy-now" >
         <a href="aviator"  style ='bottom: 6rem;' class="btn btn-danger btn-buy-now">Aviator</a>
      </div>
      <?php
      require_once "components/scripts.php";
      ?>
   </body>
   <script>
    $(document).ready(function() {
    //   $('#datatable').DataTable();
    $('#datatable').DataTable({
    responsive: true,
    dom: 'Bfrtip',
    buttons: [
      {
        extend: 'pdfHtml5',
        text: 'Export to PDF',
        exportOptions: {
          columns: ':not(.no-export)'
        }
      }
    ],
    language: {
      search: ''
    }
  });
    });
    $('#upload').change(function() {
    var reader = new FileReader();
      // console.log('runing..')
    reader.onload = function(e) {
        $('#uploadedAvatar').attr('src', e.target.result);
    }

    reader.readAsDataURL(this.files[0]);
});

function updateprofile() {
form = $('#profileinfo').serialize()
$.get('phpajax/updateprofile', form, function(data){
         console.log(data);
            if (data == 'failed1') {
                  notie.alert({ type: 'error', position: 'bottom', text: 'Fill in the entire form', time: 10 });
            }
            if (data=='success') {
               notie.alert({ type: 1, time: 60, text: '<b>Profile successfully updated!</b>' })
            }
      })
   }

function updatepassword() {
form = $('#passwordform').serialize()
$.get('phpajax/updatepassword', form, function(data){
         console.log(data);
            if (data == 'failed1') {
                  notie.alert({ type: 'error', position: 'bottom', text: 'Fill in the entire form', time: 10 });
            }
            if (data == 'failed2') {
                  notie.alert({ type: 'error', position: 'bottom', text: 'Incorrect Current Password', time: 10 });
            }
            if (data == 'failed3') {
                  notie.alert({ type: 'error', position: 'bottom', text: 'Password do not match', time: 10 });
            }
            if (data=='success') {
               notie.alert({ type: 1, time: 60, text: '<b>Password Updated !</b>' })
            }
      })
   }
  </script>
   <!-- Mirrored from demos.pixinvent.com/materialize-html-admin-template/html/vertical-menu-template/dashboards-crm.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 May 2023 17:04:39 GMT -->
</html>
<!-- beautify ignore:end -->