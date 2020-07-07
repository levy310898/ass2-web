<!DOCTYPE html>
<html lang="en">
<?php 
  require_once('php/db.php');
  require_once('php/operation.php');
  require_once('php/component.php');
  require_once('php/pagination.php');
  require_once('php/picture.php');
  require_once('php/interface.php');
?>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin</title>

  <!-- Custom fonts for this template-->
  <link href="./admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="./admin/css/admin.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="./admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php 
      $page_type = adminType();
    ?>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->

      

      <!-- Product item -->
      <li class="nav-item <?php 
          if($page_type=='product'){
            echo "active";
          }
      ?>">
        <a class="nav-link" href="?type=product">
          <i class="fas fa-box"></i>
          <span>Product</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item <?php 
          if($page_type=='idea'){
            echo "active";
          }
      ?>">
        <a class="nav-link" href="?type=idea">
          <i class="far fa-newspaper"></i>
          <span>Idea</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item
        <?php 
          if($page_type=='user'){
            echo "active";
          }
        ?>">
        <a class="nav-link" href="?type=user">
          <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
          <i class="fa fa-address-book"></i>
          <span>User</span>
        </a>
      </li>

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

            <!-- Nav Item - Messages -->

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  change password
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

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray" id = "tableName">
                <?php
                  if($page_type=='user'){
                    echo "User control";
                  }else if ($page_type=='product'){
                    echo "Product control";
                  }else if ($page_type=='idea'){
                    echo "Idea control";
                  }
                ?>  
            </h1>
          </div>

          <div class="row">
            <div class="col-md-8 col-lg-6 offset-lg-3 offset-md-2 col-sm-12 offset-sm-0">
              <form method = "POST" enctype="multipart/form-data">
                <?php
                #show the input element which is dynamic with each page like user , product, idea ,... 
                  showInput($page_type);
                ?>

                <div class="d-flex justify-content-center btn-box">
                <!-- print the button add , update and delete all -->
                    <?php 
                        buttonElement("btnAdd","btn btn-success mr-2","<i class=\"fa fa-plus\"></i>","btn_add","dat-toggle ='tooltip' data-placement = 'bottom' title = 'Add'");
                        buttonElement("btnUpdate","btn btn-warning mr-2 text-light","<i class=\"fa fa-pen\"></i>","btn_update","dat-toggle ='tooltip' data-placement = 'bottom' title = 'Update'");
                        buttonElement("btnDeleteAll","btn btn-danger","<i class=\"fas fa-trash-alt\"></i>","btn_del_all","dat-toggle ='tooltip' data-placement = 'bottom' title = 'Delete all'");
                    ?>
                    </div>
              </form>
            </div>
          </div>
          
          <div class="message-box">
                  <?php 
                    if(isset($_POST['btn_add'])){
                      $file = $_FILES['file'];
                      $messages = addData($page_type);
                      textNode($messages[0],$messages[1]);
                    }

                    if(isset($_POST['btn_update'])){
                      $messages = updateData($page_type);
                      textNode($messages[0],$messages[1]);
                    }

                    if(isset($_POST['data_delete'])){
                      $id = $_POST['data_delete'];
                      $messages = deleteData($id,$page_type);
                      textNode($messages[0],$messages[1]);
                    }

                    if(isset($_POST['btn_del_all'])){
                      $messages = deleteAllData($page_type);
                      textNode($messages[0],$messages[1]);
                    }
                    
                  ?>
          </div>
          <form action="" method = "POST">
            <!-- pagination part -->
            <?php 
              $total_page = getTotalPage("$page_type");
              $current_page = getCurrentPage();
              if($current_page > $total_page){
                $current_page = $total_page;
              }else if ($current_page < 1){
                $current_page = 1;
              }

              $start_data = ($current_page -1) * $limit_data_table;
              $data_table_query = "SELECT * FROM $page_type LIMIT $start_data, $limit_data_table";
            ?>
            <div class="d-flex table-data table-max-height">
              <table class="table table-striped table-dark table-bordered text-center">
                    <thead class="thead-dark">
                        <?php 
                          loadCategoryData($page_type);
                        ?>
                    </thead>
                      
                    <tbody id="tbody">
                      <?php 
                        loadDataTable($data_table_query,$page_type);
                      ?>
                    </tbody>
              </table>
            </div>

            <ul class="pagination justify-content-end">
              <?php 
                if($current_page >1 && $total_page > 1){
                  $prev_page = $current_page -1;
                  echo <<<_END
                    <li class = "page-item">
                      <a class = "page-link" href = "?type=$page_type&page=$prev_page">Prev</a>
                    </li>
                  _END;
                }

                for($i = 1; $i <=$total_page; $i++){
                  if($i == $current_page){
                    echo <<<_END
                    <li class = "page-item active">
                      <a class = "page-link" href = "?type=$page_type&page=$i">$i</a>
                    </li>
                    _END;
                  }else{
                    echo <<<_END
                    <li class = "page-item">
                      <a class = "page-link" href = "?type=$page_type&page=$i">$i</a>
                    </li>
                    _END;
                  }
                }

                if($current_page <$total_page && $total_page >1){
                  $next_page = $current_page + 1;
                  echo <<<_END
                  <li class = "page-item">
                    <a class = "page-link" href = "?type=$page_type&page=$next_page">Next</a>
                  </li>
                _END;
                }
              ?>
            </ul>
          </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
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
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="admin/vendor/jquery/jquery.min.js"></script>
  <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="admin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="admin/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="admin/js/demo/chart-area-demo.js"></script>
  <script src="admin/js/demo/chart-pie-demo.js"></script>
  
  <script src="admin/js/main.js"></script>
</body>

</html>
