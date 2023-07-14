<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ExBD | {{ implode(" - ", $page['arr']) }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url("assets/img/favicon.png") }}" rel="icon">
  <link href="{{ url("assets/img/apple-touch-icon.png") }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="{{ url("https://fonts.gstatic.com") }}" rel="preconnect">
  <link href="{{ url("https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i") }}" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url("assets/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
  <link href="{{ url("assets/vendor/bootstrap-icons/bootstrap-icons.css") }}" rel="stylesheet">
  <link href="{{ url("assets/vendor/boxicons/css/boxicons.min.css") }}" rel="stylesheet">
  <link href="{{ url("assets/vendor/quill/quill.snow.css") }}" rel="stylesheet">
  <link href="{{ url("assets/vendor/quill/quill.bubble.css") }}" rel="stylesheet">
  <link href="{{ url("assets/vendor/remixicon/remixicon.css") }}" rel="stylesheet">
  <link href="{{ url("assets/vendor/simple-datatables/style.css") }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url("assets/css/style.css") }}" rel="stylesheet">
  <link href="{{ url("assets/css/ex-style.css") }}" rel="stylesheet">

</head>

<body>
  
  @include('components.header')
  @if(isset($page['arr'][1]) && $page['arr'][1] === "Dashboard")
    @include('components.sidebarD')
  @elseif(isset($page['arr'][1]) && $page['arr'][1] === "Setting")
    @include('components.sidebarS')
  @else
    @include('components.sidebarH')
  @endif

  <main id="main" class="main">
    @yield('main')
  </main><!-- End #main -->

  @include('components.footer')

  <div class="modal fade text-dark" id="logout" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Logout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure to end your session? Click <strong>Logout</strong> to end session.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <a class="btn btn-danger" href="{{ url("logout") }}">Logout</a>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Vendor JS Files -->
  <script src="{{ url("assets/vendor/apexcharts/apexcharts.min.js") }}"></script>
  <script src="{{ url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
  <script src="{{ url("assets/vendor/chart.js/chart.umd.js") }}"></script>
  <script src="{{ url("assets/vendor/echarts/echarts.min.js") }}"></script>
  <script src="{{ url("assets/vendor/quill/quill.min.js") }}"></script>
  <script src="{{ url("assets/vendor/simple-datatables/simple-datatables.js") }}"></script>
  <script src="{{ url("assets/vendor/tinymce/tinymce.min.js") }}"></script>
  <script src="{{ url("assets/vendor/php-email-form/validate.js") }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ url("assets/js/main.js") }}"></script>
  <script src="{{ url("assets/js/sidebar.js") }}"></script>

</body>

</html>