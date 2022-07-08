<?php
session_start();
if(isset($_SESSION["sess_user"])){
 include_once 'db.php';
 //$batch = $_POST['batch'];
 $result1 = mysqli_query($conn,"SELECT `issue`.`name`, `issue`.`title`, `issue`.`date`, `issue`.`ubin`, `issue`.`adm`, `issue`.`status`, `issue`.`batch`, `issue`.`issue_by` FROM issue,student where `student`.`view`= 0  and `student`.`adm` = `issue`.`adm` order by `date` desc");
 ?>
 <html lang="en">
 <head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>L I B R A R Y</title>
  <link href='https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Datatable JS -->
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>


  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center"href="home.php">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div class="sidebar-brand-text mx-3">L I B R A R Y ADMIN</div>
      </a>

      <!-- Divider -->

      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <div class="sidebar-heading">

      </div>
      
      <!-- Nav Item - Pages Collapse Menu -->

      <!-- Divider -->

      <li class="nav-item">
        <a class="nav-link" href="teacher.php">
          <i class="fas fa-chalkboard-teacher"></i>
          <span>Teachers</span></a>
        </li>

        <hr class="sidebar-divider my-0">

        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-user-graduate"></i>
            <span>Student</span>
          </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
             <a class="collapse-item" href="addStudent.php">Add via excel</a>
             <a class="collapse-item" href="addStudentSin.php">Register a student</a>
             <a class="collapse-item" href="selectBatch.php">Students list</a>
             <a class="collapse-item" href="viewDelStudents.php">Removed students</a>
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
            <a class="collapse-item" href="addBookE.php">Add via excel</a>
            <a class="collapse-item" href="addBook.php">Add book</a>
            <a class="collapse-item" href="allBook.php">All books</a>
            
            <a class="collapse-item" href="viewIssued.php">Book issue records</a>
            
            <a class="collapse-item" href="viewReturned.php">Return details</a>
            <a class="collapse-item" href="ViewDelBook.php">Removed books</a>
          </div>
        </li>
        
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
          <a class="nav-link" href="issueBook.php">
           <i class="fas fa-passport"></i>
           <span>Issue Book</span></a>
         </li>
         <!-- Heading -->
         <hr class="sidebar-divider my-0">
         <li class="nav-item">
          <a class="nav-link" href="return.php">
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
                  <span aria-hidden="true">×</span>
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
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search by UBIN, Adm Number, Name, title or status..." aria-label="Search" aria-describedby="basic-addon2" id="Input" onkeyup="myFunction()">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                  </button>
                </div>
              </div>
            </form>


            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                  <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                      <input type="text" class="form-control bg-light border-0 small" placeholder="Search by UBIN, Adm Number, Name, title or status..."aria-label="Search" aria-describedby="basic-addon2" id="InputP" onkeyup ="myFunctionPhone()">
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                          <i class="fas fa-search fa-sm"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </li>



              <div class="topbar-divider d-none d-sm-block"></div>


              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hi,Admin!</span>
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
          <div class="container-fluid">

            <!-- Page Heading -->


            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-body">

               <form method="POST" action="">


                <select class="form-control" name="category" style="width: 150px; margin-bottom: 10px;  margin-right: 5px;" >
                  <option value="all" selected="">Sort by status</option>
                  <option value="Returned">Returned</option>
                  <option value="pending">Not Returned</option>

                </select>
                <input type="submit" name="reset" value="Show all" >
                <input type="submit" name="submit" value="filter" style="margin-right: 5px;">
                <input type="hidden" name="batch" value="<?php echo $batch ?>">
              </form>
              <form method="post" action="viewIssued1.php">
                <div class="inputfield">
                 <h5 align="left">Select Batch</h5><select name="batch" id="year" class="box" style="float: left; " >
                 </select>
                 <input type="submit" value="OK" style="float:left; width: 50px; margin-left: 5px;">

               </div>
             </form>

             <form method="post" action="viewIssued2.php">
              <div class="inputfield"><br>

               <div class="inputfield"><br>

                Select date<br>
                <input type="date" name="fdate">
                <input type="date" name="ldate"><input type="submit" value="OK" style=" width: 50px; margin-left: 5px;">

              </div>
            </form>


            <br>
            <br>
            <a href="advSearch.php" class="btn btn-primary">Advanced Search</a>
             <div class="table-responsive">
            <table id="Students" width="100%" cellspacing="0" cellpadding="14" >
              <thead>
                <tr>

                  <th>UBIN</th>
                  <th>Title Of The Book</th>
                  <th>Admission Number</th>
                  <th>Name</th>
                  <th>Batch</th>
                  <th>Date of Issue</th>
                  <th>Issued By</th>
                  <th>Status</th>
                </tr>
                <tr>

                  <td>          <?php include'filter.php'?></td>

                </tr>  
              </table>

            </body>

          </table>

          <script>
            function myFunction() {
              var src, input, filter, table, tr, td, i, txtValue;
              input = document.getElementById("Input");
              filter = input.value.toUpperCase().trim().split(' ');
              table = document.getElementById("Students");
              for (j = 0; j < filter.length; j++) {
                tr = table.getElementsByTagName("tr");
                src = filter[j].trim();
                for (i = 0; i < tr.length; i++) {
                  td = tr[i].getElementsByTagName("td")[0];
                  td2 = tr[i].getElementsByTagName("td")[1];
                  td3 = tr[i].getElementsByTagName("td")[2];
                  td5 = tr[i].getElementsByTagName("td")[4];
                  td4 = tr[i].getElementsByTagName("td")[7];
                  if (src!='' && td && td2 && td3  && td5 && td4) {
                    txtValue = td.textContent || td.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    txtValue3 = td3.textContent || td3.innerText;
                    txtValue4 = td4.textContent || td4.innerText;
                    txtValue5 = td5.textContent || td5.innerText;
                    if (txtValue.toUpperCase().indexOf(src) > -1 || txtValue2.toUpperCase().indexOf(src) > -1 || txtValue3.toUpperCase().indexOf(src) > -1 || txtValue5.toUpperCase().indexOf(src) > -1  || txtValue4.toUpperCase().indexOf(src) > -1) {
                      tr[i].style.display = "";
                    } else {
                      tr[i].style.display = "none";
                    }
                  }       
                }
              }
            }

          </script>




          <script>
            function myFunctionPhone() {
              var src, input, filter, table, tr, td, i, txtValue;
              input = document.getElementById("InputP");
              filter = input.value.toUpperCase().trim().split(' ');
              table = document.getElementById("Students");
              for (j = 0; j < filter.length; j++) {
                tr = table.getElementsByTagName("tr");
                src = filter[j].trim();
                for (i = 0; i < tr.length; i++) {
                  td = tr[i].getElementsByTagName("td")[0];
                  td2 = tr[i].getElementsByTagName("td")[1];
                  td3 = tr[i].getElementsByTagName("td")[2];
                  td5 = tr[i].getElementsByTagName("td")[4];
                  td4 = tr[i].getElementsByTagName("td")[7];
                  if (src!='' && td && td2 && td3  && td5 && td4) {
                    txtValue = td.textContent || td.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    txtValue3 = td3.textContent || td3.innerText;
                    txtValue4 = td4.textContent || td4.innerText;
                    txtValue5 = td5.textContent || td5.innerText;
                    if (txtValue.toUpperCase().indexOf(src) > -1 || txtValue2.toUpperCase().indexOf(src) > -1 || txtValue3.toUpperCase().indexOf(src) > -1 || txtValue5.toUpperCase().indexOf(src) > -1  || txtValue4.toUpperCase().indexOf(src) > -1) {
                      tr[i].style.display = "";
                    } else {
                      tr[i].style.display = "none";
                    }
                  }       
                }
              }
            }

          </script>



          <script>
            var year = 2020;
            var till = 2200;
            var options = "";
            for(var y=year; y<=till; y++){
              Y=y+3;
              options += "<option>"+ y+"</option>";
            }
            document.getElementById("year").innerHTML = options;
          </script>






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
