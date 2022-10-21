<?php
session_start();

if (!isset($_SESSION['sukses'])){
    $_SESSION['sukses'] = false;
}

if($_SESSION['sukses']==false){
    echo "Nilai sesi sukses = true";
} else {
    echo "Nilai sesi sukses = false";
}
$_SESSION['sukses']=true;