<?php
// Start the session
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Login
    </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>



<body class="bg-gradient-primary">
<!-- KODE TAMPILAN -->
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9" style="max-width:50%">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Input Username dan Password</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control" id="user" name="user" placeholder="Masukkan username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control" id="pass" name="pass" placeholder="Masukkan password...">
                                        </div>
                                        <div class="form-group">
                                        </div>
                                            <button class="btn btn-primary btn btn-block" type="submit" name="submit">
                                                Login 
                                            </button>
                                        <hr>
                                    </form>	
                                    <!-- <div class="text-center">
                                        <a class="small" href="gateway.php">KEMBALI KE LAMAN SEBELUMNYA</a>
                                    </div> -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
<!-- AKHIR DARI KODE TAMPILAN  -->
<!-- LOGIN -->
<?php             
	include 'conn.php';

    if(isset($_POST['submit'])){

        $user = mysqli_real_escape_string($conn,$_POST['user']);
        $pass = mysqli_real_escape_string($conn,$_POST['pass']);

        $sql = "SELECT * FROM users WHERE username ='$user' AND password = '$pass'"; //pilih semua dalem tabel user di username=sesuai user yg diinput dan pass=sesuai pass yg diinput
        $query = mysqli_query($conn, $sql); //gas querynya
        if(mysqli_num_rows($query)==1)
            {   
                $row = mysqli_fetch_array($query);
                $_SESSION['nama'] = $row['nama_pos']; 
                $_SESSION['idpos'] = $row['id']; //check here
                $_SESSION['masukNgga'] = true; //session validation; kalau belum login ga boleh masuk. di index.php ada yang ngecek masukNgga apakah true
                $_SESSION["user"] = $_POST['user'];
                $_SESSION["pass"] = $_POST['pass'];
                header("location: index.php"); // abis login, lempar user ke index.php
            }
                else //kalo gagal login, alert ini
                {
                    echo "<script language='javascript'>";
                    echo "alert('USERNAME ATAU PASS SALAH, COBA LAGI')"; 
                    echo "</script>";
                }

    }


ob_end_flush();
?>	

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>


