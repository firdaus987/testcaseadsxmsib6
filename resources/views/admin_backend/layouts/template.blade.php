<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{config('app.name')}}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    {{-- <link href="{{ asset('admin_backend/assets/img/ads x mbkm.png')}}" rel="icon">
    <link href="{{ asset('admin_backend/assets/img/ads x mbkm.png')}}" rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('admin_backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin_backend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('admin_backend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin_backend/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{ asset('admin_backend/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{ asset('admin_backend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{ asset('admin_backend/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('admin_backend/assets/css/style.css')}}" rel="stylesheet">
  <!-- 
    =======================================================
    * Template Name: NiceAdmin
    * Updated: May 30 2023 with Bootstrap v5.3.0
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
  </head>

  <body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
          <span class="d-none d-lg-block">{{config('app.name')}}</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->

    </header><!-- End Header -->

    @include('admin_backend/layouts.sidebar')

    @yield('content')
    
    @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
    @endif
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
      <div class="copyright">
        &copy; Copyright <strong><span>Test Case MSIB ADS</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
         </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('js/jquery.js')}}"></script>
    <script src="{{ asset('admin_backend/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{ asset('admin_backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('admin_backend/assets/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{ asset('admin_backend/assets/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{ asset('admin_backend/assets/vendor/quill/quill.min.js')}}"></script>
    <script src="{{ asset('admin_backend/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{ asset('admin_backend/assets/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{ asset('admin_backend/assets/vendor/php-email-form/validate.js')}}"></script>


    <!-- Template Main JS File -->
    <script src="{{ asset('admin_backend/assets/js/main.js')}}"></script>
    <script src="{{ asset('css/sweealert2.all.min.js')}}"></script>

    @yield('script')

    @if (session('success'))
      <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          });

          Toast.fire({
            icon: 'success',
            title: '{{ session('success') }}'
        });
      </script>
    @endif

    @if (session('error'))
      <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          });

          Toast.fire({
            icon: 'error',
            title: '{{ session('error') }}'
        });
      </script>
    @endif
  </body>

</html>