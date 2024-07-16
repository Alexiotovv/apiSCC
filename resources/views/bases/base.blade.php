<!DOCTYPE html>
<html lang="es">
  <!-- [Head] start -->

  
<!-- Mirrored from html.phoenixcoded.net/light-able/bootstrap/widget/w_data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 May 2024 15:07:39 GMT -->
<head>
    <title>Dashboard</title>
    <!-- [Meta] -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="description"
      content="Light Able admin and dashboard template offer a variety of UI elements and pages, ensuring your admin panel is both fast and effective."
    />
    <meta name="author" content="phoenixcoded"/>

    <!-- [Favicon] icon -->
    <link rel="icon" href="../../../assets/images/favicon.svg" type="image/x-icon" />
    <script src="../../../assets/js/jquery-3.7.1.min.js"></script>
 <!-- [Google Font : Public Sans] icon -->
{{-- <link href="../../../fonts.googleapis.com/css23da6.css?family=Public+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet"> --}}

{{-- <link rel="stylesheet" href="../../../assets/css/plugins/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="../../../assets/css/plugins/responsive.bootstrap5.min.css"> --}}


<!-- [Tabler Icons] https://tablericons.com -->
<link rel="stylesheet" href="../../../assets/fonts/tabler-icons.min.css" >
<!-- [Feather Icons] https://feathericons.com -->
<link rel="stylesheet" href="../../../assets/fonts/feather.css" >
<!-- [Font Awesome Icons] https://fontawesome.com/icons -->
<link rel="stylesheet" href="../../../assets/fonts/fontawesome.css" >
<!-- [Material Icons] https://fonts.google.com/icons -->
<link rel="stylesheet" href="../../../assets/fonts/material.css" >
<!-- [Template CSS Files] -->
<link rel="stylesheet" href="../../../assets/css/style.css" id="main-style-link" >
<link rel="stylesheet" href="../../../assets/css/style-preset.css" >

@yield('css')

</head>
  <!-- [Head] end -->



  @if (Route::has('login'))
  @auth
<!-- [Body] Start -->

      <body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
          <!-- [ Pre-loader ] start -->
      <div class="loader-bg">
        <div class="loader-track">
          <div class="loader-fill"></div>
        </div>
      </div>
      <!-- [ Pre-loader ] End -->
      <!-- [ Sidebar Menu ] start -->
      <nav class="pc-sidebar">
        <div class="navbar-wrapper">
          <div class="m-header">
            <a href="https://html.phoenixcoded.net/light-able/bootstrap/dashboard/index.html" class="b-brand text-primary">
              <!-- ========   Change your logo from here   ============ -->
              {{-- <img src="../../../assets/images/logo-dark.svg" alt="logo image" class="logo-lg" /> --}}
              
              <h6>SCC-Sistema de Cobranza Coactivo</h6>
              <span class="badge bg-brand-color-2 rounded-pill ms-2 theme-version">v1.0</span>
            </a>
          </div>
          <div class="navbar-content">
            <ul class="pc-navbar">
              <li class="pc-item pc-caption">
                <label>Navigation</label>
              </li>
              <li class="pc-item pc-hasmenu">
                <a href="#!" class="pc-link">
                  <span class="pc-micon">
                    <i class="ph-duotone ph-gauge"></i>
                  </span>
                  <span class="pc-mtext">Dashboard</span>
                  <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                  <!-- <span class="pc-badge">2</span> -->
                </a>
                <ul class="pc-submenu">
                  <li class="pc-item"><a class="pc-link" href="">Inicio</a></li> 
                </ul>
                <ul class="pc-submenu">
                  <li class="pc-item"><a class="pc-link" href="">Métricas</a></li> 
                </ul>
              </li>
              <li class="pc-item pc-hasmenu">
                <a href="#!" class="pc-link"
                  ><span class="pc-micon"> <i class="ph-duotone ph-layout"></i></span><span class="pc-mtext">Options</span
                  ><span class="pc-arrow"><i data-feather="chevron-right"></i></span
                ></a>
                <ul class="pc-submenu">
                  <li class="pc-item"><a class="pc-link" href="">Data Register </a></li>
                  
                </ul>
              </li>


            </ul>
            <!-- <div class="card nav-action-card bg-brand-color-4">
              <div class="card-body" style="background-image: url('../../../assets/images/layout/nav-card-bg.svg')">
                <h5 class="text-dark">Help Center</h5>
                <p class="text-dark text-opacity-75">Please contact us for more questions.</p>
                <a href="https://phoenixcoded.support-hub.io/" class="btn btn-primary" target="_blank">Go to help Center</a>
              </div>
            </div> -->
          </div>
          <div class="card pc-user-card">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                  <img src="../../../assets/images/user/avatar-1.jpg" alt="user-image" class="user-avtar wid-45 rounded-circle" />
                </div>
                <div class="flex-grow-1 ms-3 me-2">
                  <h6 class="mb-0">Jonh Smith</h6>
                  <small>Administrator</small>
                </div>
          
              </div>
            </div>
          </div>
        </div>
      </nav>
      <!-- [ Sidebar Menu ] end -->
      <!-- [ Header Topbar ] start -->
      <header class="pc-header">
        <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
      <div class="me-auto pc-mob-drp">
        <ul class="list-unstyled">
          <!-- ======= Menu collapse Icon ===== -->
          <li class="pc-h-item pc-sidebar-collapse">
            <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
          <li class="pc-h-item pc-sidebar-popup">
            <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
          <li class="dropdown pc-h-item d-inline-flex d-md-none">
            <a
              class="pc-head-link dropdown-toggle arrow-none m-0"
              data-bs-toggle="dropdown"
              href="#"
              role="button"
              aria-haspopup="false"
              aria-expanded="false"
            >
              <i class="ph-duotone ph-magnifying-glass"></i>
            </a>
            <div class="dropdown-menu pc-h-dropdown drp-search">
              <form class="px-3">
                <div class="mb-0 d-flex align-items-center">
                  <input type="search" class="form-control border-0 shadow-none" placeholder="Search..." />
                  <button class="btn btn-light-secondary btn-search">Search</button>
                </div>
              </form>
            </div>
          </li>
          <li class="pc-h-item d-none d-md-inline-flex">
            <form class="form-search">
              <!-- <i class="ph-duotone ph-magnifying-glass icon-search"></i> -->
              <!-- <input type="search" class="form-control" placeholder="Search..." /> -->

              <!-- <button class="btn btn-search" style="padding: 0"><kbd>ctrl+k</kbd></button> -->
            </form>
          </li>
        </ul>
      </div>
      <!-- [Mobile Media Block end] -->
      <div class="ms-auto">
        <ul class="list-unstyled">
          <li class="dropdown pc-h-item">
            <a
              class="pc-head-link dropdown-toggle arrow-none me-0"
              data-bs-toggle="dropdown"
              href="#"
              role="button"
              aria-haspopup="false"
              aria-expanded="false"
            >
              <i class="ph-duotone ph-sun-dim"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
              <a href="#!" class="dropdown-item" onclick="cambiar_modo('dark')">
                <i class="ph-duotone ph-moon"></i>
                <span>Dark</span>
              </a>
              <a href="#!" class="dropdown-item" onclick="cambiar_modo('light')">
                <i class="ph-duotone ph-sun-dim"></i>
                <span>Light</span>
              </a>
              <!-- <a href="#!" class="dropdown-item" onclick="layout_change_default()">
                <i class="ph-duotone ph-cpu"></i>
                <span>Default</span>
              </a> -->
            </div>
          </li>
          {{-- <li class="pc-h-item">
            <a class="pc-head-link pct-c-btn" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_pc_layout">
              <i class="ph-duotone ph-gear-six"></i>
            </a>
          </li> --}}
          <li class="dropdown pc-h-item">
            <a
              class="pc-head-link dropdown-toggle arrow-none me-0"
              data-bs-toggle="dropdown"
              href="#"
              role="button"
              aria-haspopup="false"
              aria-expanded="false"
            >
              <i class="ph-duotone ph-diamonds-four"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
              {{-- <a href="#!" class="dropdown-item">
                <i class="ph-duotone ph-user"></i>
                <span>My Account</span>
              </a>
              <a href="#!" class="dropdown-item">
                <i class="ph-duotone ph-gear"></i>
                <span>Settings</span>
              </a>
              <a href="#!" class="dropdown-item">
                <i class="ph-duotone ph-lifebuoy"></i>
                <span>Support</span>
              </a>
              <a href="#!" class="dropdown-item">
                <i class="ph-duotone ph-lock-key"></i>
                <span>Lock Screen</span>
              </a> --}}
              <a href="#" class="dropdown-item" id="Salir">
                <i class="ph-duotone ph-power"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
      
          <li class="dropdown pc-h-item header-user-profile">
            <a
              class="pc-head-link dropdown-toggle arrow-none me-0"
              data-bs-toggle="dropdown"
              href="#"
              role="button"
              aria-haspopup="false"
              data-bs-auto-close="outside"
              aria-expanded="false"
            >
              <img src="../../../assets/images/user/avatar-2.jpg" alt="user-image" class="user-avtar" />
            </a>
        
          </li>
        </ul>
        </div>
        </div>
      </header>
      <!-- [ Header ] end -->


      <!-- [ Main Content ] start -->
      <div class="pc-container">
        <div class="pc-content">
            @yield('content')
        </div>
        <!-- [ Main Content ] end -->
      </div>
      <!-- [ Main Content ] end -->
      <footer class="pc-footer">
        <div class="footer-wrapper container-fluid">
          <div class="row">
            <div class="col-sm-6 my-1">
              <p class="m-0">Made with &#9829; by Team <a href="https://themeforest.net/user/phoenixcoded" target="_blank"> Phoenixcoded</a></p>
            </div>
            <div class="col-sm-6 ms-auto my-1">
              <ul class="list-inline footer-link mb-0 justify-content-sm-end d-flex">
                <li class="list-inline-item"><a href="https://html.phoenixcoded.net/light-able/bootstrap/index.html">Home</a></li>
                <li class="list-inline-item"><a href="https://pcoded.gitbook.io/light-able/" target="_blank">Documentation</a></li>
                <li class="list-inline-item"><a href="https://phoenixcoded.support-hub.io/" target="_blank">Support</a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>

@else
  <div class="row" style="padding:50px;" >
    aqui debe ir ub boton de login
  </div>
  @endauth
@endif


 <!-- Required Js -->
<script src="../../../assets/js/plugins/popper.min.js"></script>
<script src="../../../assets/js/plugins/simplebar.min.js"></script>
<script src="../../../assets/js/plugins/bootstrap.min.js"></script>
<script src="../../../assets/js/fonts/custom-font.js"></script>
<script src="../../../assets/js/pcoded.js"></script>
<script src="../../../assets/js/plugins/feather.min.js"></script>
<script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
{{-- <script src="../../../assets/js/plugins/dataTables.min.js"></script> --}}
{{-- <script src="../../../assets/js/plugins/dataTables.bootstrap5.min.js"></script> --}}
{{-- <script src="../../../assets/js/plugins/dataTables.responsive.min.js"></script> --}}
{{-- <script src="../../../assets/js/plugins/responsive.bootstrap5.min.js"></script> --}}



<script>layout_change('light');</script>




<script>layout_sidebar_change('light');</script>



<script>change_box_container('false');</script>


<script>layout_caption_change('true');</script>




<script>layout_rtl_change('false');</script>


<script>preset_change("preset-1");</script>


<script>
  function cambiar_modo(modo){
    layout_change(modo);
    localStorage.setItem('modo',modo)

  }

  $(document).ready(function() {
    let modo = localStorage.getItem('modo');
    layout_change(modo);
  });
</script>

  </body>
  <!-- [Body] end -->

<!-- Mirrored from html.phoenixcoded.net/light-able/bootstrap/widget/w_data.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 May 2024 15:07:45 GMT -->


<script>
  
  $("#Salir").on("click",function () { 
    $.ajax({
      type: "GET",
      url: "/api/logout",
      success: function (response) {
        window.location.href = "/login";
      }
    });
   })
  
</script>

@yield('js')

</html>
