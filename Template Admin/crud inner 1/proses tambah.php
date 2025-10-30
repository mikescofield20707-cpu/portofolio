<?php
ob_start();
include "pendalaman/koneksi.php";

$NIS = $_POST['NIS'];
$NAMA = $_POST['Nama'];
$JENKEL = $_POST['Jenkel'];
$JURUSAN = $_POST['Jurusan'];
$ALAMAT = $_POST['Alamat'];
$STATUS = $_POST['Status'];

echo $NIS."|".$NAMA."|".$JENKEL."|".$JURUSAN."|".$ALAMAT."|".$STATUS;

$SQL ="INSERT INTO tbl_siswa SET
nis = '$NIS',
nama ='$NAMA',
jenkel ='$JENKEL',
alamat ='$ALAMAT',
kode_jurusan ='$JURUSAN',
kode_status ='$STATUS' ";

mysqli_query($KONEKSI,$SQL) or die ("gagal maning input data bro...!");
echo "Data masuk broo..!";

?>

<meta http-equiv="refresh" content="1 url=?pages=crud_inner">

<section class="section">
      <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="title">
                <h1>Berhasil!!!</h1>
                    <h3>Data Sudah Di Tambahkan!!</h3>
              </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
              <div class="breadcrumb-wrapper">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#0">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Page
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div>
        <!-- ========== title-wrapper end ========== -->
      </div>
      <!-- end container -->
    </section>