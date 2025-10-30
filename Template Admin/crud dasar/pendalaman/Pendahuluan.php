<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
        <title>Data Tables | PlainAdmin Demo</title>
      
        <!-- ========== All CSS files linkup ========= -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/lineicons.css" />
        <link rel="stylesheet" href="assets/css/quill/bubble.css" />
        <link rel="stylesheet" href="assets/css/quill/snow.css" />
        <link rel="stylesheet" href="assets/css/fullcalendar.css" />
        <link rel="stylesheet" href="assets/css/morris.css" />
        <link rel="stylesheet" href="assets/css/datatable.css" />
        <link rel="stylesheet" href="assets/css/main.css" />
      </head>
</head>
<body>
    <!-- ======== Preloader =========== -->
  <div id="preloader">
    <div class="spinner"></div>
  </div>
  <!-- ======== Preloader =========== -->

  <!-- ======== sidebar-nav start =========== -->
  <aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
      <a href="index.php">
        <img src="assets/images/logo/logo.svg" alt="logo" />
      </a>
    </div>
    <nav class="sidebar-nav">
      <ul>
        <li class="nav-item nav-item-has-children">
          <a href="#0" data-bs-toggle="collapse" data-bs-target="#ddmenu_1" aria-controls="ddmenu_1"
            aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M8.74999 18.3333C12.2376 18.3333 15.1364 15.8128 15.7244 12.4941C15.8448 11.8143 15.2737 11.25 14.5833 11.25H9.99999C9.30966 11.25 8.74999 10.6903 8.74999 10V5.41666C8.74999 4.7263 8.18563 4.15512 7.50586 4.27556C4.18711 4.86357 1.66666 7.76243 1.66666 11.25C1.66666 15.162 4.83797 18.3333 8.74999 18.3333Z" />
                <path
                  d="M17.0833 10C17.7737 10 18.3432 9.43708 18.2408 8.75433C17.7005 5.14918 14.8508 2.29947 11.2457 1.75912C10.5629 1.6568 10 2.2263 10 2.91665V9.16666C10 9.62691 10.3731 10 10.8333 10H17.0833Z" />
              </svg>
            </span>
            <span class="text">Dashboard</span>
          </a>
          <ul id="ddmenu_1" class="collapse show dropdown-nav">
            <li>
              <a href="index.php" > Home </a>
            </li>
            <li>
              <a href="signin.php">
                <span class="text">
                  Login
              </a>
            </li>
            <li>
              <a href="accordion.php" class="active">
                <span class="text">
                  Pendahuluan
              </a>
            </li>
            <li>
              <a href="signup.php">
                <span class="text">
                  Register
              </a>
            </li>
            <li>
              <a href="tables.php">
                <span class="text">
                  Table
              </a>
            </li>
            <li>
              <a href="modals.php">
                <span class="text">
                  Modal
              </a>
            </li>
            <li>
              <a href="invoice.php">
                <span class="text">
                  Invoice
              </a>
            </li>
            <li>
              <a href="form-edit.php">
                <span class="text">
                  Form 
              </a>
            </li>
            <li>
              <a href="blank-page.php">
                <span class="text">
                  Blank Page
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <ul>
        <li class="nav-item nav-item-has-children">
          <a href="#0" data-bs-toggle="collapse" data-bs-target="#ddmenu_2" aria-controls="ddmenu_2"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M8.74999 18.3333C12.2376 18.3333 15.1364 15.8128 15.7244 12.4941C15.8448 11.8143 15.2737 11.25 14.5833 11.25H9.99999C9.30966 11.25 8.74999 10.6903 8.74999 10V5.41666C8.74999 4.7263 8.18563 4.15512 7.50586 4.27556C4.18711 4.86357 1.66666 7.76243 1.66666 11.25C1.66666 15.162 4.83797 18.3333 8.74999 18.3333Z" />
                <path
                  d="M17.0833 10C17.7737 10 18.3432 9.43708 18.2408 8.75433C17.7005 5.14918 14.8508 2.29947 11.2457 1.75912C10.5629 1.6568 10 2.2263 10 2.91665V9.16666C10 9.62691 10.3731 10 10.8333 10H17.0833Z" />
              </svg>
            </span>
            <span class="text">Percabangan</span>
          </a>
          <ul id="ddmenu_2" class="collapse dropdown-nav">
            <li>
              <a href="task.php">
                <span class="text">
                  If
              </a>
            </li>
            <li>
              <a href="else.php">
                <span class="text">
                  switch
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <ul>
        <li class="nav-item nav-item-has-children">
          <a href="#0" data-bs-toggle="collapse" data-bs-target="#ddmenu_3" aria-controls="ddmenu_3"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M8.74999 18.3333C12.2376 18.3333 15.1364 15.8128 15.7244 12.4941C15.8448 11.8143 15.2737 11.25 14.5833 11.25H9.99999C9.30966 11.25 8.74999 10.6903 8.74999 10V5.41666C8.74999 4.7263 8.18563 4.15512 7.50586 4.27556C4.18711 4.86357 1.66666 7.76243 1.66666 11.25C1.66666 15.162 4.83797 18.3333 8.74999 18.3333Z" />
                <path
                  d="M17.0833 10C17.7737 10 18.3432 9.43708 18.2408 8.75433C17.7005 5.14918 14.8508 2.29947 11.2457 1.75912C10.5629 1.6568 10 2.2263 10 2.91665V9.16666C10 9.62691 10.3731 10 10.8333 10H17.0833Z" />
              </svg>
            </span>
            <span class="text">Perulangan</span>
          </a>
          <ul id="ddmenu_3" class="collapse dropdown-nav">
            <li>
              <a href="forloop.php">
                <span class="text">
                  For
              </a>
            </li>
            <li>
              <a href="while.php">
                <span class="text">
                  While
              </a>
            </li>
            <li>
              <a href="dowhile.php">
                <span class="text">
                  Do while
              </a>
            </li>
            <li>
              <a href="foreach.php">
                <span class="text">
                  For each
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <ul>
        <li class="nav-item nav-item-has-children">
          <a href="#0" data-bs-toggle="collapse" data-bs-target="#ddmenu_4" aria-controls="ddmenu_4"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M8.74999 18.3333C12.2376 18.3333 15.1364 15.8128 15.7244 12.4941C15.8448 11.8143 15.2737 11.25 14.5833 11.25H9.99999C9.30966 11.25 8.74999 10.6903 8.74999 10V5.41666C8.74999 4.7263 8.18563 4.15512 7.50586 4.27556C4.18711 4.86357 1.66666 7.76243 1.66666 11.25C1.66666 15.162 4.83797 18.3333 8.74999 18.3333Z" />
                <path
                  d="M17.0833 10C17.7737 10 18.3432 9.43708 18.2408 8.75433C17.7005 5.14918 14.8508 2.29947 11.2457 1.75912C10.5629 1.6568 10 2.2263 10 2.91665V9.16666C10 9.62691 10.3731 10 10.8333 10H17.0833Z" />
              </svg>
            </span>
            <span class="text">Array</span>
          </a>
          <ul id="ddmenu_4" class="collapse dropdown-nav">
            <li>
              <a href="array1.php">
                <span class="text">
                  Array 1
              </a>
            </li>
            <li>
              <a href="array2.php">
                <span class="text">
                  Array 2
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item nav-item-has-children">
          <a href="#0" data-bs-toggle="collapse" data-bs-target="#ddmenu_5" aria-controls="ddmenu_5"
            aria-expanded="true" aria-label="Toggle navigation">
            <span class="icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M8.74999 18.3333C12.2376 18.3333 15.1364 15.8128 15.7244 12.4941C15.8448 11.8143 15.2737 11.25 14.5833 11.25H9.99999C9.30966 11.25 8.74999 10.6903 8.74999 10V5.41666C8.74999 4.7263 8.18563 4.15512 7.50586 4.27556C4.18711 4.86357 1.66666 7.76243 1.66666 11.25C1.66666 15.162 4.83797 18.3333 8.74999 18.3333Z" />
                <path
                  d="M17.0833 10C17.7737 10 18.3432 9.43708 18.2408 8.75433C17.7005 5.14918 14.8508 2.29947 11.2457 1.75912C10.5629 1.6568 10 2.2263 10 2.91665V9.16666C10 9.62691 10.3731 10 10.8333 10H17.0833Z" />
              </svg>
            </span>
            <span class="text">Pendalaman</span>
          </a>
          <ul id="ddmenu_5" class="collapse dropdown-nav">
            <li>
              <a href="4each.php">
                <span class="text">
                  For Each
              </a>
            </li>
            <li>
              <a href="4eachdb.php">
                <span class="text">
                  For Each DB
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <ul>
        <li class="nav-item nav-item-has-children">
          <a href="#0" data-bs-toggle="collapse" data-bs-target="#ddmenu_6" aria-controls="ddmenu_6"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon">
              <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M8.74999 18.3333C12.2376 18.3333 15.1364 15.8128 15.7244 12.4941C15.8448 11.8143 15.2737 11.25 14.5833 11.25H9.99999C9.30966 11.25 8.74999 10.6903 8.74999 10V5.41666C8.74999 4.7263 8.18563 4.15512 7.50586 4.27556C4.18711 4.86357 1.66666 7.76243 1.66666 11.25C1.66666 15.162 4.83797 18.3333 8.74999 18.3333Z" />
                <path
                  d="M17.0833 10C17.7737 10 18.3432 9.43708 18.2408 8.75433C17.7005 5.14918 14.8508 2.29947 11.2457 1.75912C10.5629 1.6568 10 2.2263 10 2.91665V9.16666C10 9.62691 10.3731 10 10.8333 10H17.0833Z" />
              </svg>
            </span>
            <span class="text">Crud</span>
          </a>
          <ul id="ddmenu_6" class="collapse dropdown-nav">
            <li>
              <a href="tables-responsive.php">
                <span class="text">
                  Crud Dasar
              </a>
            </li>

            <li>
              <a href="../crud inner 1/crud_inner_1.php">
                <span class="text">
                  Crud Inner
              </a>
            </li>

            <li>
              <a href="crud-pts.php">
                <span class="text">
                  Crud PTS
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </aside>
    <div class="container">
        <h1>Pendahuluan PHP</h1>
        <p>PHP adalah singkatan dari "PHP: Hypertext Preprocessor", yaitu bahasa pemrograman yang digunakan untuk pengembangan web. PHP dapat di-embed ke dalam HTML dan sangat populer untuk membuat halaman web dinamis.</p>
        
        <h2>Pengertian PHP</h2>
        <p>PHP adalah bahasa pemrograman server-side yang berarti eksekusi kodenya dilakukan di server dan hasilnya dikirimkan ke browser pengguna. PHP memungkinkan pembuatan konten web yang dinamis dan interaktif.</p>
        
        <h2>3 File dalam PHP</h2>
        <ul>
            <li><a href="file1.php">File 1</a></li>
            <li><a href="file2.php">File 2</a></li>
            <li><a href="file3.php">File 3</a></li>
        </ul>
    </div>
    <script src="script.js"></script>
</body>
</html>