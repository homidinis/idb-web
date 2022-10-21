<?php
include 'conn.php';
//ini semua adalah data yang dipaket dari index.php saat kita mencet "edit beasiswa" dalem window yang muncul
//apa yang kita input dalem form yang muncul abis mencet edit beasiswa dalem tabel
//semua dikirim disini, ke dalem query sqlUpdate
$id = mysqli_real_escape_string($conn,$_POST['id']); 
$desc = mysqli_real_escape_string($conn,$_POST['deskripsi']);
$kode = mysqli_real_escape_string($conn,$_POST['kode']);
$nama = mysqli_real_escape_string($conn,$_POST['nama']);

$sqlUpdate = "UPDATE 0_beasiswa SET kode_beasiswa = '$kode', nama_beasiswa = '$nama', deskripsi_beasiswa = '$desc' WHERE id = '$id'";

  mysqli_query($conn,$sqlUpdate); //gas query tsb kedalem database
header("location: index.php");
