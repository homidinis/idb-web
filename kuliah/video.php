<?php
if( !isset($_COOKIE['kunjungan']) )
    {
        $_COOKIE['kunjungan'] = 0;
    }
$_COOKIE['kunjungan']++;
setcookie("kunjungan",$_COOKIE['kunjungan']);


// if( !isset($_COOKIE['buku']) )
//     {
//         $_COOKIE['buku'] = 0;
//     }
// $_COOKIE['buku']++;
// setcookie("buku",$_COOKIE['buku']);

// if( !isset($_COOKIE['elektronik']) )
//     {
//         $_COOKIE['elektronik'] = 0;
//     }
$_COOKIE['elektronik']++;
setcookie("elektronik",$_COOKIE['elektronik']);

if( !isset($_COOKIE['video']) )
    {
        $_COOKIE['video'] = 0;
    }
$_COOKIE['video']++;
setcookie("video",$_COOKIE['video']);


echo "Kunjungan anda ".$_COOKIE['kunjungan']."<br/>";
 
// $_COOKIE['kunjungan']++;
// $_COOKIE['buku']++;
// $_COOKIE['elektronik']++;
// $_COOKIE['video']++;

echo "Anda mengunjungi buku: ".$_COOKIE['buku']."<br/>";
echo "Anda mengunjungi elektronik: ".$_COOKIE['elektronik']."<br/>";
echo "Anda mengunjungi video: ".$_COOKIE['video']."<br/>";

$bil1 = $_COOKIE['buku'];
$bil2 = $_COOKIE['elektronik'];
$bil3 = $_COOKIE['video'];

if ($bil2 > $bil2 && $bil1 > $bil3) echo "Anda lebih suka buku";
elseif ($bil2 > $bil1 && $bil2 > $bil3) echo "Anda lebih suka elektronik";
elseif ($bil3 > $bil1 && $bil3 > $bil2) echo "Anda lebih suka video";
elseif ($bil1 == null && $bil2 == null && $bil3 == null) echo "I don't have a clue";
else echo "Anda suka semuanya";
?>