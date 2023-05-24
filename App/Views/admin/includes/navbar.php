   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

       <!-- Sidebar - Brand -->
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
           <div class="sidebar-brand-icon rotate-n-15">
               <i class="fas fa-ad"></i>
           </div>
           <div class="sidebar-brand-text mx-3">ADMIN</sup></div>
       </a>

       <!-- Divider -->
       <hr class="sidebar-divider my-0">

       <!-- Nav Item - Dashboard -->
       <li class="nav-item active">
           <a class="nav-link" href="?controller=admin&action=index">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Thống Kê</span></a>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Heading -->
       <div class="sidebar-heading">
           CHỨC NĂNG
       </div>

       <!-- Nav Item - Pages Collapse Menu -->

       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
               <i class="fas fa-file-invoice-dollar"></i>
               <span>Thống kê</span>
           </a>
           <div id="collapseEleven" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">

                   <a class="collapse-item" href="?controller=admin&action=statistical">Danh sách thống kê</a>
               </div>
           </div>
           <div id="collapseEleven" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">

                   <a class="collapse-item" href="?controller=admin&action=revenueStatistical">Thống kê doanh thu</a>
               </div>
           </div>
       </li>
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseONE" aria-expanded="true" aria-controls="collapseONE">
               <i class="fas fa-file-invoice-dollar"></i>
               <span>Đơn Hàng</span>
           </a>
           <div id="collapseONE" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">

                   <a class="collapse-item" href="?controller=bill&action=index">Danh sách đơn hàng</a>
               </div>
           </div>
       </li>
       <!--Nav-->
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
               <i class="fas fa-user"></i>

               <span>Khách Hàng</span>
           </a>
           <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">

                   <a class="collapse-item" href="?controller=user&action=index">Danh sách khách hàng</a>
               </div>
           </div>
       </li>
       
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
               <i class="fas fa-book"></i>
               <span>Sách</span>
           </a>
           <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">

                   <a class="collapse-item" href="?controller=product&action=index">Danh sách sách</a>
               </div>
           </div>
       </li>
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
               <i class="far fa-list-alt"></i>
               <span>Thể Loại</span>
           </a>
           <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">

                   <a class="collapse-item" href="?controller=Category&action=index">Danh sách thể loại</a>
               </div>
           </div>
       </li>

       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
               <i class="far fa-list-alt"></i>
               <span>Danh mục</span>
           </a>
           <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">

                   <a class="collapse-item" href="?controller=Menu&action=index">Danh sách danh mục</a>
               </div>
           </div>
       </li>

       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
               <i class="far fa-list-alt"></i>
               <span>Tác giả</span>
           </a>
           <div id="collapseSix" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">

                   <a class="collapse-item"  href="?controller=Author&action=index">Danh sách tác giả</a>
               </div>
           </div>
       </li>

       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSevent" aria-expanded="true" aria-controls="collapseSevent">
               <i class="far fa-list-alt"></i>
               <span>Chương trình khuyến mãi</span>
           </a>
           <div id="collapseSevent" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">

                   <a class="collapse-item" href="?controller=Promotion&action=index">Danh sách CTKM</a>
               </div>
           </div>
       </li>

       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
               <i class="far fa-list-alt"></i>
               <span>Nhà cung cấp</span>
           </a>
           <div id="collapseEight" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">

                   <a class="collapse-item" href="?controller=supplisher&action=index">Danh sách nhà cung cấp</a>
               </div>
           </div>
       </li>
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
               <i class="far fa-list-alt"></i>
               <span>Phiếu nhập hàng</span>
           </a>
           <div id="collapseNine" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">

                   <a class="collapse-item" href="?controller=import&action=index">Danh sách phiếu nhập</a>
               </div>
           </div>
       </li>

       
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
               <i class="far fa-list-alt"></i>
               <span>Nhà xuất bản</span>
           </a>
           <div id="collapseTen" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">

                   <a class="collapse-item" href="?controller=Publisher&action=index">Danh sách nhà xuất bản</a>
               </div>
           </div>
       </li>

       <li class="nav-item">
           <a class="nav-link" href="register.php">
               <i class="fas fa-users-cog"></i>

               <span>Thông tin ADMIN</span></a>
       </li>



       <!-- Nav Item - Utilities Collapse Menu -->
       <!-- <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
               <i class="fas fa-fw fa-wrench"></i>
               <span>Utilities</span>
           </a>
           <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                   <h6 class="collapse-header">Custom Utilities:</h6>
                   <a class="collapse-item" href="utilities-color.html">Colors</a>
                   <a class="collapse-item" href="utilities-border.html">Borders</a>
                   <a class="collapse-item" href="utilities-animation.html">Animations</a>
                   <a class="collapse-item" href="utilities-other.html">Other</a>
               </div>
           </div>
       </li> -->

       <!-- Divider -->
       <hr class="sidebar-divider">



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
                   <div class="topbar-divider d-none d-sm-block"></div>

                   <!-- Nav Item - User Information -->
                   <li class="nav-item dropdown no-arrow">
                       <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                               ADMIN

                           </span>
                           <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                       </a>
                       <!-- Dropdown - User Information -->
                       <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                           <!-- <a class="dropdown-item" href="register.php">
                               <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                               Profile
                           </a>
                           <a class="dropdown-item" href="#">
                               <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                               Settings
                           </a>
                           <a class="dropdown-item" href="#">
                               <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                               Activity Log
                           </a> -->
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
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

                           <form action="?controller=user&action=logout" method="POST">

                               <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

                           </form>


                       </div>
                   </div>
               </div>
           </div>