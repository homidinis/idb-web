<?php
include 'conn.php';
$id = mysqli_real_escape_string($conn,$_POST['id']);
$desc = mysqli_real_escape_string($conn,$_POST['deskripsi']);
$nama = mysqli_real_escape_string($conn,$_POST['kode']);
$harga = mysqli_real_escape_string($conn,$_POST['nama']);

$sqlUpdate = "INSERT INTO `beasiswa`(`kode_beasiswa`, `nama_beasiswa`, `deskripsi_beasiswa`) VALUES ('$nama','$harga','$desc')";
// echo $sqlUpdate;
  mysqli_query($conn,$sqlUpdate);


header("location: index.php");