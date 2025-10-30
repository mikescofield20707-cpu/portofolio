<?php 
$ID = $_GET['id_siswa'];
require_once "pendalaman/koneksi.php";

$HAPUS = "DELETE FROM tbl_siswa WHERE id_siswa ='$ID';";
mysqli_query($KONEKSI, $HAPUS) or die ("gagal melakukan delete..!".mysqli_error($KONEKSI));

echo "proses hapus data berhasil di lakukan"; 

?>
<meta http-equiv="refresh" content="1; url=tables-responsive.php?pages=crud_inner">