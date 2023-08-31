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
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<?php
require_once "components/head.php";
require_once "content/modals.php";
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.bootstrap5.min.css">
<style>
    .dataTables_wrapper {
      margin-top: 20px;
    }
  </style>
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
            require_once "content/boughtcoins.php";
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
  <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.bootstrap5.min.js"></script>
       <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
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
  </script>
   </body>
   <!-- Mirrored from demos.pixinvent.com/materialize-html-admin-template/html/vertical-menu-template/dashboards-crm.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 May 2023 17:04:39 GMT -->
</html>
<!-- beautify ignore:end -->