<!DOCTYPE html>
<html lang="es">
<!-- [Head] start -->


<!-- Mirrored from html.phoenixcoded.net/light-able/bootstrap/pages/login-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 May 2024 15:59:37 GMT -->

<!-- Mirrored from file:///home/alexvasquez/websites/template_admin_modal/html.phoenixcoded.net/light-able/bootstrap/pages/login-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 May 2024 04:37:41 GMT -->
<head>
  <title>Login | Light Able Admin & Dashboard Template</title>
  <!-- [Meta] -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta
    name="description"
    content="Light Able admin and dashboard template offer a variety of UI elements and pages, ensuring your admin panel is both fast and effective."
  />
  <meta name="author" content="phoenixcoded" />

  <!-- [Favicon] icon -->
  <link rel="icon" href="../../../assets/images/favicon.svg" type="image/x-icon" />
 <!-- [Google Font : Public Sans] icon -->
<link href="../fonts.googleapis.com/css23da63da6.css?family=Public+Sans:wght@400;500;600;700&amp;display=swap" rel="stylesheet">

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

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-theme="light" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
  <!-- [ Pre-loader ] start -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <!-- [ Pre-loader ] End -->

  <div class="auth-main v1">
    <div class="auth-wrapper">
      <div class="auth-form">
        <div class="card my-5">
          <div class="card-body">
            <div class="text-center">
              <img src="../../../assets/images/authentication/circle_logo_gorel.png" alt="images" class="img-fluid mb-3">
              {{-- <h4 class="f-w-500 mb-1">Login with your email</h4>
              <p class="mb-3">Don't have an Account? <a href="register-v1.html" class="link-primary ms-1">Create Account</a></p> --}}
            </div>
            <form>@csrf
                <div class="mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="Correo" value="alex@gmail.com">
                </div>
                <div class="mb-3">
                <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" value="123456">
                </div>
                <div class="d-flex mt-1 justify-content-between align-items-center">
                <div class="form-check">
                    <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="">
                    <label class="form-check-label text-muted" for="customCheckc1">Recuerdame</label>
                </div>
                {{-- <a href="forgot-password-v1.html"><h6 class="f-w-400 mb-0">Forgot Password?</h6></a> --}}
                </div>
                <div class="d-grid mt-4">
                <button type="button" class="btn btn-primary" onclick="Ingresar()">Ingresar</button>
                </div>
            </form>
            
          </div>
        </div>
      </div>
      <div class="auth-sidefooter">
        {{-- <img src="../../../assets/images/logo-dark.svg" class="img-brand img-fluid" alt="images" /> --}}
        <hr class="mb-3 mt-4" />
        <div class="row">
          <div class="col my-1">
            {{-- <p class="m-0">Made with ♥ by Team <a href="https://themeforest.net/user/phoenixcoded" target="_blank"> Phoenixcoded</a></p> --}}
          </div>
          <div class="col-auto my-1">
            <ul class="list-inline footer-link mb-0">
              {{-- <li class="list-inline-item"><a href="https://html.phoenixcoded.net/light-able/bootstrap/index.html">Home</a></li>
              <li class="list-inline-item"><a href="https://pcoded.gitbook.io/light-able/" target="_blank">Documentation</a></li>
              <li class="list-inline-item"><a href="https://phoenixcoded.support-hub.io/" target="_blank">Support</a></li> --}}
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- [ Main Content ] end -->
  <!-- Required Js -->
  <script src="../../../assets/js/plugins/popper.min.js"></script>
  <script src="../../../assets/js/plugins/simplebar.min.js"></script>
  <script src="../../../assets/js/plugins/bootstrap.min.js"></script>
  <script src="../../../assets/js/fonts/custom-font.js"></script>
  <script src="../../../assets/js/pcoded.js"></script>
  <script src="../../../assets/js/plugins/feather.min.js"></script>
  <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
  <script>
    function Ingresar() {
        let email = $("#email").val();
        let password = $("#password").val();
        //let _token=$("input[name='_token']")
        
        $.ajax({
            type: "POST",
            url: "/login",
            data: {
                email:email,
                password:password,
                _token:"{{csrf_token()}}"
            },
            dataType: "json",
            success: function (response) {
              console.log("entro")
              window.location.href = "/home";
                
            }
        });
    }
  </script>
  
  <script>preset_change("preset-1");</script>
   <div class="offcanvas border-0 pct-offcanvas offcanvas-end" tabindex="-1" id="offcanvas_pc_layout">
  <div class="offcanvas-header justify-content-between">
    <h5 class="offcanvas-title">Settings</h5>
    <button type="button" class="btn btn-icon btn-link-danger" data-bs-dismiss="offcanvas" aria-label="Close"><i
        class="ti ti-x"></i></button>
  </div>

</div>
</body>
<!-- [Body] end -->


<!-- Mirrored from html.phoenixcoded.net/light-able/bootstrap/pages/login-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 May 2024 15:59:38 GMT -->

<!-- Mirrored from file:///home/alexvasquez/websites/template_admin_modal/html.phoenixcoded.net/light-able/bootstrap/pages/login-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 May 2024 04:37:41 GMT -->
</html>