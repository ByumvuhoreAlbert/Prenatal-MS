<?php
session_start();
if (!isset($_SESSION['userType']) && $_SESSION['userName'] =='') {
    header("Location: ../index.php");
    exit();
}
$userType = $_SESSION['userType'];
$username = $_SESSION['userName'];
$hospital = $_SESSION['hospitals'];
?>
   <!-- Sidebar -->
   <ul class="navbar-nav sidebar accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-icon">
    <img src="img/logo.png" alt="" height="50" width="200">
  </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">
<div style="margin-bottom:30px;"></div>
<li class="nav-item">
  <a class="nav-link collapsed" href="index.php" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
  Antenatal Care
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Antenatal Care Center:</h6>
      <a class="collapse-item" href="viewAll.php">View All Pregnancy</a>
      <a class="collapse-item" href="generalInfor.php">General Information</a>
      <a class="collapse-item" href="clinicals.php">Clinical Considerations</a>
    </div>
  </div>
</li>
<hr class="sidebar-divider">
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    Antenatal Consultation
  </a>
  <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Consultation Center:</h6>
      <a class="collapse-item" href="Consultation.php">General Consultation</a>
      <a class="collapse-item" href="ultrasound.php">Ultrasound Tests</a>
      <a class="collapse-item" href="">Report Complication</a>
    </div>
  </div>
</li>
<hr class="sidebar-divider">
<!--   ---->
<li class="nav-item">
  <a class="nav-link collapsed" href="Laboratory.php" >
    Laboratory Test
  </a>
</li>
<hr class="sidebar-divider d-none d-md-block">
<li class="nav-item">
  <a class="nav-link collapsed" href="complication.php">Complication</a>
</li>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
Appointment Center
</a>
<div id="collapse" class="collapse" aria-labelledby="heading" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
  <h6 class="collapse-header">Appointment Info:</h6>
  <a class="collapse-item" href="appointments.php">Scheduled Appoints</a>
  <a class="collapse-item" href="viewAllAppoints.php">View All Appointment</a>
  <a class="collapse-item" href="missedAppoints.php">Missed Appoints</a>
</div>
</div>
</li>


<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for Registed Id, National Id, Names, or phone" aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-secondary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<?php if (!empty($profile_photo)) : ?>
<img src="<?php echo $profile_photo; ?>" alt="Profile Photo" class="img-profile rounded-circle" style="margin-bottom:10px;">
<?php else: ?>
<img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
<?php endif; ?>
<h6 class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username; ?></h6>
</a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">Are You Ready Leave?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form action="" method="POST">
            <button type="submit" name="logout" class="btn btn-primary">Logout</button>
          </form>
          <?php
          if (isset($_POST['logout'])) {
            session_destroy();
            header("Location: /../index.php");
          }
          ?>
        </div>
      </div>
    </div>
  </div>
