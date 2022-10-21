<?php
// Start the session
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<!-- DONE: ajax jalan, login jalan, redirect ke login kalau mau masuk ke index langsung, judul huruf besar di dashboard menurut username (di tabel "user" ada kolom "nama" biar rapih aja namanya) -->
<!-- DONE: insert dan update nilai -->
<!-- TODO: input dari form masuk ke database-->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    

</head>
<?php
// cek kalo session "masukNgga" (kalo true artinya user dah login, kalo belum true artinya belum login, redirect ke login.php)
if($_SESSION['masukNgga'] != true){ //change to masukAdmin
    echo 'not logged in';
    echo '<br>';
    echo "won't redirect? yell at admin and click here:";
    echo "<a href='login.php'><button>Login</button></a>";
    header("Location:login.php");
    
    exit;
}else{
   // echo "Semangat, ".$_SESSION['nama']."!"; // ini ga kepake

};
ob_end_flush();
?>

<body id="page-top">
<!-- KEBAWAH CUMA KODE TAMPILAN -->
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#343a40;background-image:none">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="far fa-sad-cry"></i>
                </div>
                <div class="sidebar-brand-text mx-3"></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
            <div class="text-center d-none d-md-inline">
                <a class="btn btn-success btn-sm" href="logout.php">LOGOUT</a>
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
                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span> <!-- NAMA USER HEREX -->
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
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
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="First group" style="text-align:center">
                            <button type="button" class="btn btn-secondary">Daftar Beasiswa</button>
                        </div>
                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                            <button type="button" class="btn btn-secondary">Beasiswa Berlangsung</button>
                        </div>
                        <div class="btn-group" role="group" aria-label="Third group">
                            <button type="button" class="btn btn-secondary">Arsip Beasiswa</button>
                        </div>
                        <div class="btn-group" role="group" aria-label="Fourth group">
                            <button type="button" class="btn btn-secondary"> Beasiswa Akan Datang</button>
                        </div>
                    </div>
                    <hr></hr>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"></h1>
                        
                    <h1 class="h3 mb-0 text-gray-800" id="judul" hidden></h1> 

                    </div>
<!-- AKHIR DARI KODE TAMPILAN -->

<script>

    function openModal(i){
        var modalLabel = document.getElementById('exampleModalLabel');

        $.ajax({
            type: "POST",
            url: "detail.php",
            data:{
                id : i //get value of form (kode, nama beasiswa, dll) a
            },
            success: function(result){
                detail.innerHTML=result; //ini kayaknya ga kepake, ga usah mikirin hahaha yang penting data yang diinput masuk
            }
        })

    }
</script>

<?php
include 'conn.php';
            $sql = "SELECT * FROM 0_beasiswa";
            $query=mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($query)){
                $nama = $row['nama_beasiswa'];
                if($row['id'] % 4 == 1){
                    echo '<div class="row">';
                }
                ?>
                    <div class="col-sm-3 p-4">
                    	<?php

                        	echo '<div class="card" id="'.$row['id'].'" data-bs-toggle="modal" href="#exampleModalToggle" onclick="openModal('.$row['id'].')">';

                        ?>
                            <div class="card-body">
                                <h4><?php echo $row['nama_beasiswa'];?></h4>
                                <?php 
                                    echo '<img style="width: 150px; height: 150px;" class="center" src="admin/img/noimg.jpg"> <br>';
                                ?>
                                <h5 class="card-text">
                                    <?php
                                            echo $row['deskripsi_beasiswa']; 
                                    ?>
                                </h5>
                                <p class="card-text"> 
                                    <?php
                                        // if($row['nama_beasiswa']=="")
                                        //     echo '-';
                                        // else
                                        //     echo $hasil_rupiah = "Rp " . number_format($row['harga'],2,',','.');
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php
                if($row['id'] % 4 == 0){
                    echo '</div>';
                }
            }
        ?>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; All Wrongs Reserved</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages -->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>