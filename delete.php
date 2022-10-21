<?php
include 'conn.php';
$id = $_POST['id'];

$sqlDelete = "DELETE FROM `beasiswa` WHERE id = '$id'";
// echo $sqlDelete;
mysqli_query($conn,$sqlDelete);

header("location: index.php");