<?php
ob_start();
include "pendalaman/koneksi.php";

$ID = mysqli_real_escape_string($KONEKSI, $_POST['Id_siswa']);
$NIS = mysqli_real_escape_string($KONEKSI, $_POST['Nis']);
$NAMA = mysqli_real_escape_string($KONEKSI, $_POST['Id_siswa']);
$JENKEL = mysqli_real_escape_string($KONEKSI, $_POST['Jenkel']);
$ALAMAT = mysqli_real_escape_string($KONEKSI, $_POST['Alamat']);
$KODE_JUR = mysqli_real_escape_string($KONEKSI, $_POST['Jurusan']);
$KODE_STATUS = mysqli_real_escape_string($KONEKSI, $_POST['Status']);

if ($ID == "" || $NIS == "" || $NAMA == "" || $JENKEL == "" || $KODE_JUR == "" || $KODE_STATUS == "") {
?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h5><i class="icon fas fa-ban"></i> Alert!!!</h5>
        Pastikan semua data di form edit sudah terisi ya Brokkk...!
    </div>
<?php
} else {


$QUERY=mysqli_query($KONEKSI, "UPDATE tbl_siswa SET
    nis = '$NIS',
    nama = '$NAMA',
    jenkel = '$JENKEL',
    alamat = '$ALAMAT',
    kode_jurusan = '$KODE_JUR',
    kode_status = '$KODE_STATUS' WHERE tbl_siswa. id_siswa='$ID';")

    ?>
    
    
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h5><i class="icon fas fa-ban"></i> Alert!!!</h5>
        Data berhasil di perbaharui...!.
    </div>
    <meta http-equiv="refresh" content="1; url=crud_inner_1.php?pages=crud_inner">
    <?php

}

?>