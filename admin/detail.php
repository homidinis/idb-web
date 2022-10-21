<?php
include 'conn.php';
$id = $_POST['id'];
    $sql = "SELECT * FROM 0_beasiswa WHERE id='$id'";
    $query=mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
        $kode = $row['kode_beasiswa']; 
        $nama = $row['nama_beasiswa'];
        $desc = $row['deskripsi_beasiswa'];
//todo sesuaikan form
echo ' <form method="post" action="submit.php" enctype="multipart/form-data">';
echo '                             <div class="form-group">';
echo '                                   <input type="hidden"  id="id" name="id" value="'.$id.'">';
echo '                            </div>';
echo '                            <div class="form-group">';
echo '                                   <label>Kode Beasiswa</label>';
echo '                                  <input name="kode" required type="text" class="form-control" value="'.$kode.'">';
echo '                             </div>';
echo '                               <div class="form-group">';
echo '                                   <label>Nama beasiswa</label>';
echo '                               <input name="nama" required type="text" class="form-control" rows="5" value="'.$nama.'">';
echo '                             </div>';
echo '                           <div class="form-group">';
echo '                               <label>Deskripsi Beasiswa</label>';
echo '                               <textarea class="form-control" required name="deskripsi">'.$desc.'</textarea>';
echo '                           </div>';
echo '                           <div class="form-group">';
echo '                               <input type="submit" value="Update" class="form-control btn btn-primary">';
echo '                           </div>';      
echo '                       </form>';
echo '            <div class="modal-body">';
echo '            <form method="post" action="delete.php"> ';
echo '                <div class="form-group">';
echo '                 <input type="hidden" name=id value="'.$id.'">';
echo '                    <input type="submit" value="Delete Entry" class="form-control btn btn-danger">';
echo '                </div>';
echo '            </form>';
?>