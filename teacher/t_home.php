<?php
session_start();
if(isset($_SESSION["sess_user1"])){
 include_once 'db.php';
 $who = $_SESSION['sess_user1'];
  ?>
 
  <html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>L I B R A R Y</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


  </head>

  <body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="t_home.php">
       
        <div class="sidebar-brand-text mx-3">L I B R A R Y Teacher</div>
      </a>


      <hr class="sidebar-divider my-0">

     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-user-graduate"></i>
          <span>Student</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
           <a class="collapse-item" href="t_addStudent.php">Add via excel</a>
           <a class="collapse-item" href="t_addStudentSin.php">Add a student</a>
           <a class="collapse-item" href="t_selectBatch.php">All students</a>
           <a class="collapse-item" href="t_viewDelStudents.php">Removed students</a>
         </div>
       </div>
     </li>

     <hr class="sidebar-divider my-0">


     <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-book"></i>
        <span>Book</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item" href="t_addBookE.php">Add via excel</a>
          <a class="collapse-item" href="t_addBook.php">Add book</a>
          <a class="collapse-item" href="t_allBook.php">All books</a>
          <a class="collapse-item" href="t_viewIssued.php">Book issue records</a>
          <a class="collapse-item" href="t_viewReturned.php">Return details</a>
          <a class="collapse-item" href="t_viewDelBook.php">Removed books</a>
        </div>
      </li>

      <hr class="sidebar-divider my-0">
      <li class="nav-item">
        <a class="nav-link" href="t_issueBook.php">
          <i class="fas fa-passport"></i>
          <span>Issue Book</span></a>
        </li>
        <!-- Heading -->
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
          <a class="nav-link" href="t_return.php">
            <i class="fas fa-undo"></i>
            <span>Return Book</span></a>
          </li>
         <hr class="sidebar-divider my-0">

        
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">??</span>
                </button>
              </div>
              <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Divider -->

        <!-- Heading -->
        
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
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

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
              <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
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

              <!-- Nav Item - Alerts -->
              
              

              

              <div class="topbar-divider d-none d-sm-block"></div>


              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hi, <?php echo $who; ?> </span>
                  <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                 
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>

            </ul>

          </nav>
          <div class="col-lg-6 mb-4">

            <!-- Illustrations -->
            <img src="assets/images/left-image.png" class="rounded img-fluid d-block mx-auto" alt="App">

          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">???Reading is a window to the world.???</h6>
            </div>
            <div class="card-body">
              <p>Whilst the word ???power??? has for a long time been associated with muscular strength, the word ???knowledge??? has always been connected with the mind. The two words do not seem to have any connection whatsoever. However, today the world power has undergone a tremendous transformation. Today it is commonly recognised that the pen is mightier than the sword.<p>We are now living in a time where there are many information sources, such as the Internet leading to some older information sources now becoming increasingly extinct. However, books will always be alive; nothing can beat how you are able to immerse yourself into the story, nothing can replace the comfortable feeling of books. As J.K Rowling said: ???I do believe something very magical can happen when you read a good book???.</p>
              <strong>Reading is a useful pastime because people can learn a lot. We can learn many important and useful facts and improve our understanding of English language too. We can cultivate the habit by reading small books at first and after that we can read bigger and more advanced books. In addition to books we can also read newspapers. Books are a way that we can easily communicate our ideas and keep them safe. If people read, they will also get new ideas and then they can use these to develop the world.</strong></p>

            </div>
          </div>
        </div>



      </div>
    </div>
  </div>
</div>
</body>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
</html>

<?php
}
else{
  header("Location: login.php");

}
?>