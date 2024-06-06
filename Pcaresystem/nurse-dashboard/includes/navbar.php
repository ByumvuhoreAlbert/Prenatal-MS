<?php
session_start();
if (!isset($_SESSION['user-type']) && $_SESSION['user_name'] =='') {
    header("Location: ../index.php");
    exit();
}
$userType = $_SESSION['user-type'];
$username = $_SESSION['user_name'];
$hospital = $_SESSION['hospital'];
$health = $_SESSION['health'];

$conn = new mysqli('localhost', 'root', '', 'prenatal_db');

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT profile FROM nurse WHERE name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($profile_photo);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-transparent-success bg-opacity-0.3 sidebar sidebar-white accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
            <img src="img/logo.png" alt="yanze" style="width: 220px; height:80px; padding:10px;">
        </div>
    </a>

    <hr class="sidebar-divider">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="index.php" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            Antenatal Care
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Antenatal Care Center:</h6>
                <a class="collapse-item" href="register.php">Add New Mothers</a>
                <a class="collapse-item" href="viewAll.php">View All Pregnancy</a>
                <a class="collapse-item" href="generalInfor.php">General Information</a>
                <a class="collapse-item" href="clinicals.php">Clinical Considerations</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <!--   ---->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            Antenatal Consultation
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Consultation Center:</h6>
                <a class="collapse-item" href="Consultation.php">General Consultation</a>
                <a class="collapse-item" href="ultrasound.php">Ultrasound Tests</a>
                <a class="collapse-item" href="allConsoltation.php">Report Complication</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <!--   ---->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            Laboratory Test
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Laboratory Exams</h6>
                <a class="collapse-item" href="laboratory.php">Laboratory Exams</a>
                <a class="collapse-item" href="optional-labs.php">Report Complications</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" href="#collapseExample"  aria-expanded="true" aria-controls="collapseExample">
            Supportive Measures
        </a>
        <div class="collapse" id="collapseExample" aria-labelledby="headingExample" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pregnancy Provided Supports</h6>
                <a class="collapse-item" href="preventive.php">Preventive Measures</a>
                <a class="collapse-item" href="education.php">Health Education</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">
    <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" href="#collapsePost"  aria-expanded="true" aria-controls="collapsePost">
            Post-Pertum Period
        </a>
        <div class="collapse" id="collapsePost" aria-labelledby="headingPost" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">End Of Pregnancy</h6>
                <a class="collapse-item" href="urinarytest.php">Conclusion</a>
                <a class="collapse-item" href="optional-labs.php">Post-Pertum Care</a>
              </div>
</div>
</li>
<hr class="sidebar-divider">
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
Appointment Center
</a>
<div id="collapse" class="collapse" aria-labelledby="heading" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
  <h6 class="collapse-header">Appointment Info:</h6>
  <a class="collapse-item" href="viewAppoints.php">Scheduled Appoints</a>
  <a class="collapse-item" href="missedAppoints.php">Missed Appoints</a>
</div>
</div>
</li>
<hr class="sidebar-divider">
<li class="nav-item">
<a class="nav-link collapsed" href="complication.php">
Report Complication
</a>
</li>
<hr class="sidebar-divider">
<div class="text-center d-none d-md-inline">
<button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

<!-- Topbar -->

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="file.php" method="post">

  <div class="input-group">
      <input type="text" name="search" class="form-control bg-light border-0 small" placeholder="Search for Registed Id, National Id, Names, or phone" aria-label="Search" aria-describedby="basic-addon2">
      <div class="input-group-append">
          <button class="btn btn-secondary" type="submit" name="searchFor">
            <i class="fas fa-search fa-sm"></i>
          </button>
      </div>
  </div>
</form>

<ul class="navbar-nav ml-auto">
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
                <a class="dropdown-item" href="profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
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



<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
      <div class="modal-body"> Are You Ready to Leave? </div>
      <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

          <form action="logout.php" method="POST">
              <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>
          </form>
      </div>
  </div>
</div>
</div>
