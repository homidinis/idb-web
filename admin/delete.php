<?php
include 'conn.php';
$id = $_POST['id'];

$sqlDelete = "DELETE FROM `0_beasiswa` WHERE id = '$id'";
// echo $sqlDelete;
mysqli_query($conn,$sqlDelete);

header("location: index.php");