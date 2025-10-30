<?php include '../navbar.php'; ?>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../assets/css/lineicons.css" />
  <link rel="stylesheet" href="../assets/css/quill/bubble.css" />
  <link rel="stylesheet" href="../assets/css/quill/snow.css" />
  <link rel="stylesheet" href="../assets/css/fullcalendar.css" />
  <link rel="stylesheet" href="../assets/css/morris.css" />
  <link rel="stylesheet" href="../assets/css/datatable.css" />
  <link rel="stylesheet" href="../assets/css/main.css" />
<section>
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title">
            <h2>Accordion</h2>
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
                <li class="breadcrumb-item">
                  <a href="#0">UI Components</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Pendahuluan
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

    <!-- ========== Accordion-cards-wrapper start ========== -->
    <div>
          <div class="row">
            <div class="col-lg-6">
              <div class="card-style mb-30">
                <h5 class="text-medium mb-25">
                  Pendahuluan 1
                </h5>
    
                <div class="base-accordion accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Pengertian JavaScript
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        JavaScript adalah bahasa pemrograman yang terutama digunakan untuk pengembangan web. 
                        Bahasa ini biasanya digunakan untuk membuat halaman web menjadi lebih interaktif dan dinamis. 
                        JavaScript berjalan di sisi klien (client-side), yang berarti kodenya dijalankan di browser pengguna.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Apa Itu JavaScript
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        JavaScript adalah bahasa pemrograman yang digunakan untuk membuat halaman web 
                        lebih interaktif dan responsif. JavaScript berjalan di browser pengguna dan memungkinkan 
                        perubahan konten halaman secara langsung tanpa perlu memuat ulang halaman.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Asal Muassal JavaScript
                      </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        JavaScript pertama kali dikembangkan oleh Brendan Eich pada tahun 1995 saat 
                        bekerja di Netscape Communications. Awalnya, JavaScript dibuat untuk menambah 
                        kemampuan interaktif pada halaman web di browser Netscape Navigator. Sejak itu, JavaScript telah 
                        berkembang menjadi salah satu bahasa pemrograman paling populer di 
                        dunia dan digunakan secara luas untuk pengembangan web.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end card -->
            </div>
            <!-- end col -->
            <div class="col-lg-6">
              <div class="card-style mb-30">
                <h5 class="text-medium mb-25">
                  Pendahuluan 2
                </h5>
    
                <div class="base-accordion accordion-two accordion" id="accordionExampleTwo">
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFaqOne" aria-expanded="true" aria-controls="collapseFaqOne">
                        Pengertian PHP
                      </button>
                    </h2>
                    <div id="collapseFaqOne" class="accordion-collapse collapse show"
                      data-bs-parent="#accordionExampleTwo">
                      <div class="accordion-body">
                        PHP adalah singkatan dari "PHP: Hypertext Preprocessor". Ini adalah bahasa pemrograman 
                        server-side yang digunakan untuk mengembangkan halaman web dinamis dan interaktif. PHP dapat 
                        disematkan ke dalam HTML, yang membuatnya sangat populer untuk pengembangan web.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFaqTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Apa Itu PHP
                      </button>
                    </h2>
                    <div id="collapseFaqTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExampleTwo">
                      <div class="accordion-body">
                        PHP adalah bahasa pemrograman yang dieksekusi di server, artinya kode PHP dijalankan di server dan 
                        hasilnya dikirimkan ke browser pengguna sebagai HTML. PHP sering digunakan untuk mengelola konten 
                        dinamis, database, sesi pengguna, dan bahkan membangun aplikasi web yang lengkap.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFaqThree" aria-expanded="false" aria-controls="collapseFaqThree">
                        Asal Muasal
                      </button>
                    </h2>
                    <div id="collapseFaqThree" class="accordion-collapse collapse"
                      data-bs-parent="#accordionExampleTwo">
                      <div class="accordion-body">
                        PHP pertama kali dibuat oleh Rasmus Lerdorf pada tahun 1994. Awalnya, PHP
                        dikembangkan sebagai serangkaian skrip sederhana untuk melacak kunjungan ke 
                        halaman web pribadinya. Namun, seiring berjalannya waktu, PHP berkembang menjadi bahasa 
                        pemrograman yang lebih canggih dan digunakan oleh jutaan pengembang di seluruh dunia.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="title-wrapper pt-30">
                  <div class="row align-items-center">
                    <div class="col-md-6">
                      <div class="title d-flex align-items-center flex-wrap">
                        <h2 class="mr-40">Script Dasar 1</h2>
                        <a href="../../Pendahuluan/01 Script Dasar.php" class="main-btn primary-btn btn-hover btn-sm">
                          <i class="lni lni-plus mr-5"></i>Klik Disini!</a>
                      </div>
                    </div>
                    <div class="title-wrapper pt-30">
                  <div class="row align-items-center">
                    <div class="col-md-6">
                      <div class="title d-flex align-items-center flex-wrap">
                        <h2 class="mr-40">Variabel 2</h2>
                        <a href="../../Pendahuluan/02 Variable.php" class="main-btn primary-btn btn-hover btn-sm">
                          <i class="lni lni-plus mr-5"></i>Klik Disini!</a>
                      </div>
                    </div>
                    <div class="title-wrapper pt-30">
                  <div class="row align-items-center">
                    <div class="col-md-6">
                      <div class="title d-flex align-items-center flex-wrap">
                        <h2 class="mr-40">Type Data 3</h2>
                        <a href="../../Pendahuluan/03 Type Data.php" class="main-btn primary-btn btn-hover btn-sm">
                          <i class="lni lni-plus mr-5"></i>Klik Disini!</a>
                      </div>
                    </div>        
              </div>
          <!-- end card -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- ========== Accordion-cards-wrapper end ========== -->
  </div>
  <!-- end container -->
</section>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/Chart.min.js"></script>
  <script src="../assets/js/apexcharts.min.js"></script>
  <script src="../assets/js/dynamic-pie-chart.js"></script>
  <script src="../assets/js/moment.min.js"></script>
  <script src="../assets/js/fullcalendar.js"></script>
  <script src="../assets/js/jvectormap.min.js"></script>
  <script src="../assets/js/world-merc.js"></script>
  <script src="../assets/js/polyfill.js"></script>
  <script src="../assets/js/quill.min.js"></script>
  <script src="../assets/js/datatable.js"></script>
  <script src="../assets/js/Sortable.min.js"></script>
  <script src="../assets/js/main.js"></script>