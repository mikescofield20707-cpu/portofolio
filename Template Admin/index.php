
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from  by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 May 2024 01:24:44 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
  <title>PlainAdmin Demo | Bootstrap 5 Admin Template</title>

  <!-- ========== All CSS files linkup ========= -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/lineicons.css" />
  <link rel="stylesheet" href="assets/css/quill/bubble.css" />
  <link rel="stylesheet" href="assets/css/quill/snow.css" />
  <link rel="stylesheet" href="assets/css/morris.css" />
  <link rel="stylesheet" href="assets/css/datatable.css" />
  <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>
  <!-- ======== Preloader =========== -->
  <div id="preloader">
    <div class="spinner"></div>
  </div>
  <!-- ======== Preloader =========== -->

  <!-- ======== sidebar-nav start =========== -->
  <?php include 'navbar.php'; ?>

  
  <div class="overlay"></div>
  <!-- ======== sidebar-nav end =========== -->

  <!-- ======== main-wrapper start =========== -->
  <main class="main-wrapper">
    <!-- ========== header start ========== -->
    <header class="header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-6">
            <div class="header-left d-flex align-items-center">
              <div class="menu-toggle-btn mr-15">
                <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                  <i class="lni lni-chevron-left me-2"></i> Menu
                </button>
              </div>
              <div class="header-search d-none d-md-flex">
                <form action="#">
                  <input type="text" placeholder="Search..." />
                  <button><i class="lni lni-search-alt"></i></button>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-7 col-md-7 col-6">
            <div class="header-right">
              <!-- notification start -->
              <div class="notification-box ml-15 d-none d-md-flex">
                <button class="dropdown-toggle" type="button" id="notification" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M11 20.1667C9.88317 20.1667 8.88718 19.63 8.23901 18.7917H13.761C13.113 19.63 12.1169 20.1667 11 20.1667Z"
                      fill="" />
                    <path
                      d="M10.1157 2.74999C10.1157 2.24374 10.5117 1.83333 11 1.83333C11.4883 1.83333 11.8842 2.24374 11.8842 2.74999V2.82604C14.3932 3.26245 16.3051 5.52474 16.3051 8.24999V14.287C16.3051 14.5301 16.3982 14.7633 16.564 14.9352L18.2029 16.6342C18.4814 16.9229 18.2842 17.4167 17.8903 17.4167H4.10961C3.71574 17.4167 3.5185 16.9229 3.797 16.6342L5.43589 14.9352C5.6017 14.7633 5.69485 14.5301 5.69485 14.287V8.24999C5.69485 5.52474 7.60672 3.26245 10.1157 2.82604V2.74999Z"
                      fill="" />
                  </svg>
                  <span></span>
                </button>
              <!-- profile start -->
              <div class="profile-box ml-15">
                <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="profile-info">
                    <div class="info">
                      <div class="image">
                        <img src="assets/images/profile/profile-image.png" alt="" />
                      </div>
                      <div>
                        <h6 class="fw-500">Michael Scofield MK</h6>
                        <p>Admin</p>
                      </div>
                    </div>
                  </div>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                  <li>
                    <div class="author-info flex items-center !p-1">
                      <div class="image">
                        <img src="assets/images/profile/profile-image.png" alt="image">
                      </div>
                      <div class="content">
                        <h4 class="text-sm">Adam Joe</h4>
                        <a class="text-black/40 dark:text-white/40 hover:text-black dark:hover:text-white text-xs"
                          href="#">Email@gmail.com</a>
                      </div>
                    </div>
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="#0">
                      <i class="lni lni-user"></i> View Profile
                    </a>
                  </li>
                  <li>
                    <a href="#0">
                      <i class="lni lni-alarm"></i> Notifications
                    </a>
                  </li>
                  <li>
                    <a href="#0"> <i class="lni lni-inbox"></i> Messages </a>
                  </li>
                  <li>
                    <a href="#0"> <i class="lni lni-cog"></i> Settings </a>
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="#0"> <i class="lni lni-exit"></i> Sign Out </a>
                  </li>
                </ul>
              </div>
              <!-- profile end -->
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- ========== header end ========== -->
    <aside class="sidebar-nav-wrapper">
        <div class="navbar-logo">
        <a href="demo.plainadmin.com/index.php">
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
                <a href="?pages=index"> Home </a>
                </li>
                <li>
                <a href="?pages=login">
                    <span class="text">
                    Login
                </a>
                </li>
                <li>
                <a href="?pages=accordion">
                    <span class="text">
                    Pendahuluan
                </a>
                </li>
                <li>
                <a href="?pages=register">
                    <span class="text">
                    Register
                </a>
                </li>
                <li>
                <a href="demo.plainadmin.com/tables.php">
                    <span class="text">
                    Table
                </a>
                </li>
                <li>
                <a href="demo.plainadmin.com/modals.php">
                    <span class="text">
                    Modal
                </a>
                </li>
                <li>
                <a href="demo.plainadmin.com/invoice.php">
                    <span class="text">
                    Invoice
                </a>
                </li>
                <li>
                <a href="demo.plainadmin.com/form-edit.php">
                    <span class="text">
                    Form 
                </a>
                </li>
                <li>
                <a href="demo.plainadmin.com/blank-page.php">
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
                <a href="demo.plainadmin.com/task.php">
                    <span class="text">
                    If
                </a>
                </li>
                <li>
                <a href="demo.plainadmin.com/else.php">
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
                <a href="demo.plainadmin.com/forloop.php">
                    <span class="text">
                    For
                </a>
                </li>
                <li>
                <a href="demo.plainadmin.com/while.php">
                    <span class="text">
                    While
                </a>
                </li>
                <li>
                <a href="demo.plainadmin.com/dowhile.php">
                    <span class="text">
                    Do while
                </a>
                </li>
                <li>
                <a href="demo.plainadmin.com/foreach.php">
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
                <a href="demo.plainadmin.com/array1.php">
                    <span class="text">
                    Array 1
                </a>
                </li>
                <li>
                <a href="demo.plainadmin.com/array2.php">
                    <span class="text">
                    Array 2
                </a>
                </li>
            </ul>
            </li>
            <li class="nav-item nav-item-has-children">
            <a href="#0" data-bs-toggle="collapse" data-bs-target="#ddmenu_5" aria-controls="ddmenu_5"
                aria-expanded="false" aria-label="Toggle navigation">
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
                <a href="demo.plainadmin.com/4each.php">
                    <span class="text">
                    For Each
                </a>
                </li>
                <li>
                <a href="demo.plainadmin.com/4eachdb.php">
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
                <a href="demo.plainadmin.com/tables-responsive.php">
                    <span class="text">
                    Crud Dasar
                </a>
                </li>

                <li>
                <a href="?pages=crud_inner_1">
                    <span class="text">
                    Crud Inner
                </a>
                </li>

                <li>
                <a href="demo.plainadmin.com/crud-pts.php">
                    <span class="text">
                    Crud PTS
                </a>
                </li>
            </ul>
            </li>
        </ul>
        </nav>
    </aside>
    <!-- ========== section start ========== -->
    
    <?php 
      include 'content/menu.php' ;
    ?>
    <!-- ========== section end ========== -->

    <!-- ========== footer start =========== -->
    <footer class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 order-last order-md-first">
            <div class="copyright text-center text-md-start">
              <p class="text-sm">
                Designed and Developed by
                <a href="https://plainadmin.com/" rel="nofollow" target="_blank">
                  PlainAdmin
                </a>
              </p>
            </div>
          </div>
          <!-- end col-->
          <div class="col-md-6">
            <div class="terms d-flex justify-content-center justify-content-md-end">
              <a href="#0" class="text-sm">Term & Conditions</a>
              <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
            </div>
          </div>
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </footer>
    <!-- ========== footer end =========== -->
  </main>
  <!-- ======== main-wrapper end =========== -->

  <!-- ============ Theme Option Start ============= -->
  <button class="option-btn">
    <i class="lni lni-cog"></i>
  </button>
  <div class="option-overlay"></div>
  <div class="option-box">
    <div class="option-header">
      <div>
        <h5>Theme Customizer</h5>
        <p class="text-gray">Customize and Preview in Real time</p>
      </div>
      <button class="option-btn-close text-gray">
        <i class="lni lni-close"></i>
      </button>
    </div>
    <h6 class="mb-10">Sidebar</h6>
    <ul class="mb-30">
      <li><button class="leftSidebarButton active">Left Sidebar</button></li>
      <li><button class="rightSidebarButton">Right Sidebar</button></li>
    </ul>

    <h6 class="mb-10">Theme</h6>
    <ul class="d-flex flex-wrap align-items-center">
      <li>
        <button class="lightThemeButton active">
          Light Theme + Sidebar 1
        </button>
      </li>
      <li><button class="darkThemeButton">Dark Theme + Sidebar 1</button></li>
    </ul>

    <div class="promo-box">
      <div class="promo-icon">
        <img class="mx-auto" src="assets/images/logo/logo-icon-big.svg" alt="Logo">
      </div>
      <h3>Upgrade to PRO</h3>
      <p>Improve your development process and start doing more with PlainAdmin PRO!</p>
      <a href="https://plainadmin.com/pro" target="_blank" rel="nofollow" class="main-btn primary-btn btn-hover">
        Upgrade to PRO
      </a>
    </div>
  </div>
  <!-- ============ Theme Option End ============= -->

  <!-- ========= All Javascript files linkup ======== -->
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/Chart.min.js"></script>
  <script src="assets/js/apexcharts.min.js"></script>
  <script src="assets/js/dynamic-pie-chart.js"></script>
  <script src="assets/js/moment.min.js"></script>
  <script src="assets/js/jvectormap.min.js"></script>
  <script src="assets/js/world-merc.js"></script>
  <script src="assets/js/polyfill.js"></script>
  <script src="assets/js/quill.min.js"></script>
  <script src="assets/js/datatable.js"></script>
  <script src="assets/js/Sortable.min.js"></script>
  <script src="assets/js/main.js"></script>

  <script>
    // ======== jvectormap activation
    var markers = [
      { name: "Egypt", coords: [26.8206, 30.8025] },
      { name: "Russia", coords: [61.524, 105.3188] },
      { name: "Canada", coords: [56.1304, -106.3468] },
      { name: "Greenland", coords: [71.7069, -42.6043] },
      { name: "Brazil", coords: [-14.235, -51.9253] },
    ];

    var jvm = new jsVectorMap({
      map: "world_merc",
      selector: "#map",
      zoomButtons: true,

      regionStyle: {
        initial: {
          fill: "#d1d5db",
        },
      },

      labels: {
        markers: {
          render: (marker) => marker.name,
        },
      },

      markersSelectable: true,
      selectedMarkers: markers.map((marker, index) => {
        var name = marker.name;

        if (name === "Russia" || name === "Brazil") {
          return index;
        }
      }),
      markers: markers,
      markerStyle: {
        initial: { fill: "#4A6CF7" },
        selected: { fill: "#ff5050" },
      },
      markerLabelStyle: {
        initial: {
          fontWeight: 400,
          fontSize: 14,
        },
      },
    });

    // =========== chart one start
    const ctx1 = document.getElementById("Chart1").getContext("2d");
    const chart1 = new Chart(ctx1, {
      type: "line",
      data: {
        labels: [
          "Jan",
          "Fab",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ],
        datasets: [
          {
            label: "",
            backgroundColor: "transparent",
            borderColor: "#365CF5",
            data: [
              600, 800, 750, 880, 940, 880, 900, 770, 920, 890, 976, 1100,
            ],
            pointBackgroundColor: "transparent",
            pointHoverBackgroundColor: "#365CF5",
            pointBorderColor: "transparent",
            pointHoverBorderColor: "#fff",
            pointHoverBorderWidth: 5,
            borderWidth: 5,
            pointRadius: 8,
            pointHoverRadius: 8,
            cubicInterpolationMode: "monotone", // Add this line for curved line
          },
        ],
      },
      options: {
        plugins: {
          tooltip: {
            callbacks: {
              labelColor: function (context) {
                return {
                  backgroundColor: "#ffffff",
                  color: "#171717"
                };
              },
            },
            intersect: false,
            backgroundColor: "#f9f9f9",
            title: {
              fontFamily: "Plus Jakarta Sans",
              color: "#8F92A1",
              fontSize: 12,
            },
            body: {
              fontFamily: "Plus Jakarta Sans",
              color: "#171717",
              fontStyle: "bold",
              fontSize: 16,
            },
            multiKeyBackground: "transparent",
            displayColors: false,
            padding: {
              x: 30,
              y: 10,
            },
            bodyAlign: "center",
            titleAlign: "center",
            titleColor: "#8F92A1",
            bodyColor: "#171717",
            bodyFont: {
              family: "Plus Jakarta Sans",
              size: "16",
              weight: "bold",
            },
          },
          legend: {
            display: false,
          },
        },
        responsive: true,
        maintainAspectRatio: false,
        title: {
          display: false,
        },
        scales: {
          y: {
            grid: {
              display: false,
              drawTicks: false,
              drawBorder: false,
            },
            ticks: {
              padding: 35,
              max: 1200,
              min: 500,
            },
          },
          x: {
            grid: {
              drawBorder: false,
              color: "rgba(143, 146, 161, .1)",
              zeroLineColor: "rgba(143, 146, 161, .1)",
            },
            ticks: {
              padding: 20,
            },
          },
        },
      },
    });
    // =========== chart one end

    // =========== chart two start
    const ctx2 = document.getElementById("Chart2").getContext("2d");
    const chart2 = new Chart(ctx2, {
      type: "bar",
      data: {
        labels: [
          "Jan",
          "Fab",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ],
        datasets: [
          {
            label: "",
            backgroundColor: "#365CF5",
            borderRadius: 30,
            barThickness: 6,
            maxBarThickness: 8,
            data: [
              600, 700, 1000, 700, 650, 800, 690, 740, 720, 1120, 876, 900,
            ],
          },
        ],
      },
      options: {
        plugins: {
          tooltip: {
            callbacks: {
              titleColor: function (context) {
                return "#8F92A1";
              },
              label: function (context) {
                let label = context.dataset.label || "";

                if (label) {
                  label += ": ";
                }
                label += context.parsed.y;
                return label;
              },
            },
            backgroundColor: "#F3F6F8",
            titleAlign: "center",
            bodyAlign: "center",
            titleFont: {
              size: 12,
              weight: "bold",
              color: "#8F92A1",
            },
            bodyFont: {
              size: 16,
              weight: "bold",
              color: "#171717",
            },
            displayColors: false,
            padding: {
              x: 30,
              y: 10,
            },
          },
        },
        layout: {
          padding: {
            top: 15,
            right: 15,
            bottom: 15,
            left: 15,
          },
        },
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            grid: {
              display: false,
              drawTicks: false,
              drawBorder: false,
            },
            ticks: {
              padding: 35,
              max: 1200,
              min: 0,
            },
          },
          x: {
            grid: {
              display: false,
              drawBorder: false,
              color: "rgba(143, 146, 161, .1)",
              drawTicks: false,
              zeroLineColor: "rgba(143, 146, 161, .1)",
            },
            ticks: {
              padding: 20,
            },
          },
        },
        plugins: {
          legend: {
            display: false,
          },
          title: {
            display: false,
          },
        },
      },
    });
    // =========== chart two end

    // =========== chart three start
    const ctx3 = document.getElementById("Chart3").getContext("2d");
    const chart3 = new Chart(ctx3, {
      type: "line",
      data: {
        labels: [
          "Jan",
          "Feb",
          "Mar",
          "Apr",
          "May",
          "Jun",
          "Jul",
          "Aug",
          "Sep",
          "Oct",
          "Nov",
          "Dec",
        ],
        datasets: [
          {
            label: "Revenue",
            backgroundColor: "transparent",
            borderColor: "#365CF5",
            data: [80, 120, 110, 100, 130, 150, 115, 145, 140, 130, 160, 210],
            pointBackgroundColor: "transparent",
            pointHoverBackgroundColor: "#365CF5",
            pointBorderColor: "transparent",
            pointHoverBorderColor: "#365CF5",
            pointHoverBorderWidth: 3,
            pointBorderWidth: 5,
            pointRadius: 5,
            pointHoverRadius: 8,
            fill: false,
            tension: 0.4,
          },
          {
            label: "Profit",
            backgroundColor: "transparent",
            borderColor: "#9b51e0",
            data: [
              120, 160, 150, 140, 165, 210, 135, 155, 170, 140, 130, 200,
            ],
            pointBackgroundColor: "transparent",
            pointHoverBackgroundColor: "#9b51e0",
            pointBorderColor: "transparent",
            pointHoverBorderColor: "#9b51e0",
            pointHoverBorderWidth: 3,
            pointBorderWidth: 5,
            pointRadius: 5,
            pointHoverRadius: 8,
            fill: false,
            tension: 0.4,
          },
          {
            label: "Order",
            backgroundColor: "transparent",
            borderColor: "#f2994a",
            data: [180, 110, 140, 135, 100, 90, 145, 115, 100, 110, 115, 150],
            pointBackgroundColor: "transparent",
            pointHoverBackgroundColor: "#f2994a",
            pointBorderColor: "transparent",
            pointHoverBorderColor: "#f2994a",
            pointHoverBorderWidth: 3,
            pointBorderWidth: 5,
            pointRadius: 5,
            pointHoverRadius: 8,
            fill: false,
            tension: 0.4,
          },
        ],
      },
      options: {
        plugins: {
          tooltip: {
            intersect: false,
            backgroundColor: "#fbfbfb",
            titleColor: "#8F92A1",
            bodyColor: "#272727",
            titleFont: {
              size: 16,
              family: "Plus Jakarta Sans",
              weight: "400",
            },
            bodyFont: {
              family: "Plus Jakarta Sans",
              size: 16,
            },
            multiKeyBackground: "transparent",
            displayColors: false,
            padding: {
              x: 30,
              y: 15,
            },
            borderColor: "rgba(143, 146, 161, .1)",
            borderWidth: 1,
            enabled: true,
          },
          title: {
            display: false,
          },
          legend: {
            display: false,
          },
        },
        layout: {
          padding: {
            top: 0,
          },
        },
        responsive: true,
        // maintainAspectRatio: false,
        legend: {
          display: false,
        },
        scales: {
          y: {
            grid: {
              display: false,
              drawTicks: false,
              drawBorder: false,
            },
            ticks: {
              padding: 35,
            },
            max: 350,
            min: 50,
          },
          x: {
            grid: {
              drawBorder: false,
              color: "rgba(143, 146, 161, .1)",
              drawTicks: false,
              zeroLineColor: "rgba(143, 146, 161, .1)",
            },
            ticks: {
              padding: 20,
            },
          },
        },
      },
    });
    // =========== chart three end

    // ================== chart four start
    const ctx4 = document.getElementById("Chart4").getContext("2d");
    const chart4 = new Chart(ctx4, {
      type: "bar",
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],
        datasets: [
          {
            label: "",
            backgroundColor: "#365CF5",
            borderColor: "transparent",
            borderRadius: 20,
            borderWidth: 5,
            barThickness: 20,
            maxBarThickness: 20,
            data: [600, 700, 1000, 700, 650, 800],
          },
          {
            label: "",
            backgroundColor: "#d50100",
            borderColor: "transparent",
            borderRadius: 20,
            borderWidth: 5,
            barThickness: 20,
            maxBarThickness: 20,
            data: [690, 740, 720, 1120, 876, 900],
          },
        ],
      },
      options: {
        plugins: {
          tooltip: {
            backgroundColor: "#F3F6F8",
            titleColor: "#8F92A1",
            titleFontSize: 12,
            bodyColor: "#171717",
            bodyFont: {
              weight: "bold",
              size: 16,
            },
            multiKeyBackground: "transparent",
            displayColors: false,
            padding: {
              x: 30,
              y: 10,
            },
            bodyAlign: "center",
            titleAlign: "center",
            enabled: true,
          },
          legend: {
            display: false,
          },
        },
        layout: {
          padding: {
            top: 0,
          },
        },
        responsive: true,
        // maintainAspectRatio: false,
        title: {
          display: false,
        },
        scales: {
          y: {
            grid: {
              display: false,
              drawTicks: false,
              drawBorder: false,
            },
            ticks: {
              padding: 35,
              max: 1200,
              min: 0,
            },
          },
          x: {
            grid: {
              display: false,
              drawBorder: false,
              color: "rgba(143, 146, 161, .1)",
              zeroLineColor: "rgba(143, 146, 161, .1)",
            },
            ticks: {
              padding: 20,
            },
          },
        },
      },
    });
      // =========== chart four end
      
    // =========== theme change
    const lightThemeColors = {
      darkBorder: "rgba(143, 146, 161, .1)",
      darkColor: "#5A6A85",
    };

    const darkThemeColors = {
      darkBorder: "#2b2b42",
      darkColor: "#838C9A",
    };

    // Function to apply theme colors to the chart
    function applyThemeColors(themeColors) {
      chart1.options.scales.y.grid.color = themeColors.darkBorder;
      chart1.options.scales.y.grid.borderColor = themeColors.darkBorder;
      chart1.options.scales.x.ticks.color = themeColors.darkColor;
      chart1.options.scales.y.ticks.color = themeColors.darkColor;

      chart2.options.scales.y.grid.color = themeColors.darkBorder;
      chart2.options.scales.y.grid.borderColor = themeColors.darkBorder;
      chart2.options.scales.x.ticks.color = themeColors.darkColor;
      chart2.options.scales.y.ticks.color = themeColors.darkColor;

      chart3.options.scales.y.grid.color = themeColors.darkBorder;
      chart3.options.scales.y.grid.borderColor = themeColors.darkBorder;
      chart3.options.scales.x.ticks.color = themeColors.darkColor;
      chart3.options.scales.y.ticks.color = themeColors.darkColor;

      chart4.options.scales.y.grid.color = themeColors.darkBorder;
      chart4.options.scales.y.grid.borderColor = themeColors.darkBorder;
      chart4.options.scales.x.ticks.color = themeColors.darkColor;
      chart4.options.scales.y.ticks.color = themeColors.darkColor;

      chart1.update();
      chart2.update();
      chart3.update();
      chart4.update();
    }

    const darkThemeButton = document.querySelector('.darkThemeButton')
    const lightThemeButton = document.querySelector('.lightThemeButton')

    // Check if the user has a saved theme preference
    const savedTheme = localStorage.getItem('theme')

    // Check the saved theme preference and apply appropriate colors
    if (savedTheme === 'dark') {
      applyThemeColors(darkThemeColors);
    } else {
      applyThemeColors(lightThemeColors);
    }

    // Event listeners for theme buttons
    darkThemeButton.addEventListener('click', () => {
      applyThemeColors(darkThemeColors);
    });      

    lightThemeButton.addEventListener('click', () => {
      applyThemeColors(lightThemeColors);
    });
  </script>
</body>


<!-- Mirrored from  by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 May 2024 01:25:42 GMT -->
</html>