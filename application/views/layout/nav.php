<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">


            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center" href="index.html">
         
                <span>E-Perpus</span>

            </a>

            <!-- Divider -->


            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

         


            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('santri') ?>"> <i class="fas fa-fw fa-tachometer-alt"></i><span> Manajemen Santri</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('buku') ?>"> <i class="fas fa-fw fa-tachometer-alt"></i><span> Manajemen Buku</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('pinjam') ?>">  <i class="fas fa-fw fa-tachometer-alt"></i><span> Pinjaman & Pengambalian</span></a>
            </li>

            

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('laporan') ?>"> <i class="fas fa-fw fa-tachometer-alt"></i><span> Laporan</span></a>
            </li>
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt "></i>
                    Logout
                </a>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-navy topbar mb-4 static-top shadow">
                    <a class="sidebar-brand d-flex align-items-center content-center" href="<?= base_url('dasboard') ?>">

                        <div class="sidebar-brand-text mx-3">E-Perpus</div>
                    </a>
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white-600 small">Selamat Datang, <?= $_SESSION['username'] ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url() ?>/assets/img/fotouser/avatar-4.png">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>


                <!-- Bootstrap core JavaScript-->
                <script src="<?= base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
                <script src="<?= base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="../datatable/js/datatables.min.js"></script>

                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.15.2/dist/sweetalert2.all.min.js"></script>
                <script src="../sweetalert/sweetalert.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="<?= base_url() ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="<?= base_url() ?>/assets/js/sb-admin-2.min.js"></script>
                <script src="<?= base_url() ?>/assets/vendor/dataTables.bootstrap4.min.js"> </script>
                <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.1/sweetalert2.all.min.js"></script>
                <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

                <script src="<?= base_url() ?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"> </script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>