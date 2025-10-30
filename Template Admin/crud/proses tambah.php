<?php
ob_start();
require_once "../content/function.php";

$NIS = $_POST['NIS'];
$NAMA = $_POST['Nama'];
$JENKEL = $_POST['Jenkel'];
$JURUSAN = $_POST['Jurusan'];
$ALAMAT = $_POST['Alamat'];
$STATUS = $_POST['Status'];

if  ($NIS = ""| $NAMA = ""| $JENKEL = ""| $JURUSAN = ""| $ALAMAT = ""| $STATUS = ""){
?>

                    <div class="ms-3">
                        <h6 class="mb-0 text-white">Success Alerts</h6>
                        <div class="text-white">Data berhasil di edit</div>
                    </div> 

<?php
} else {
  if (inner_tambah($_POST) >0 ){
    echo "added!";
  } else {
    echo "tidak berhasil";
  }
}

inner_tambah($_POST);
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