<?php 
$ID = $_GET['id_pelanggan'];
require_once "pendalaman/koneksi.php";

$HAPUS = "DELETE FROM tbl_pelanggan WHERE id_pelanggan ='$ID';";
mysqli_query($KONEKSI, $HAPUS) or die ("gagal melakukan delete..!".mysqli_error($KONEKSI));

echo "proses hapus data berhasil di lakukan"; 

?>
<meta http-equiv="refresh" content="1; url=index.php?pages=crud_pts">