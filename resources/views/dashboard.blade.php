<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Petty Cash</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.4.47/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('assets/modules/jqvmap/dist/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/weather-icon/css/weather-icons.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/weather-icon/css/weather-icons-wind.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/summernote/summernote-bs4.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/select2/dist/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/jquery-selectric/selectric.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">



  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    
   <!-- Datatable Libraries -->
   <link rel="stylesheet" href="{{asset('assets/modules/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
 
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA -->
 <!-- toastr -->
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      
      @include('body.header')
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="">Petty Cash</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="">PC</a>
          </div>

          @include('body.sidebar')

                </aside>
      </div>

      <!-- Main Content -->
      @yield('admin')

      @include('body.footer')
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
  <script src="{{asset('assets/modules/popper.js')}}"></script>
  <script src="{{asset('assets/modules/tooltip.js')}}"></script>
  <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('assets/modules/moment.min.js')}}"></script>
  <script src="{{asset('assets/js/stisla.js')}}"></script>
  
  <!-- JS Libraies -->
  <script src="{{asset('assets/modules/simple-weather/jquery.simpleWeather.min.js')}}"></script>
  <script src="{{asset('assets/modules/chart.min.js')}}"></script>
  <script src="{{asset('assets/modules/jqvmap/dist/jquery.vmap.min.js')}}"></script>
  <script src="{{asset('assets/modules/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
  <script src="{{asset('assets/modules/summernote/summernote-bs4.js')}}"></script>
  <script src="{{asset('assets/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>

  <!-- Toastr script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>


<!-- code js -->
<script src="{{ asset('assets/js/code.js') }}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  
<script>
    $(document).ready(function () {
        // Check the session for different alert types and display corresponding iziToast notifications
        @if(session('alert-type') == 'success')
            iziToast.success({
                
                message: '{{ session('toastr') }}',
                position: 'topRight'
            });
        @elseif(session('alert-type') == 'error')
            iziToast.error({
                message: '{{ session('toastr') }}',
                position: 'topRight'
            });
        @elseif(session('alert-type') == 'info')
            iziToast.info({
                
                message: '{{ session('toastr') }}',
                position: 'topRight'
            });
        @elseif(session('alert-type') == 'warning')
            iziToast.warning({
                message: '{{ session('toastr') }}',
                position: 'topRight'
            });
        @endif
    });
</script>


 <!-- Datatable JS Libraies -->
 <script src="{{asset('assets/modules/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
  <script src="{{asset('assets/modules/jquery-ui/jquery-ui.min.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('assets/js/page/modules-datatables.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('assets/js/page/index-0.js')}}"></script>
  
  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>

 <!-- JS Libraies -->
 <script src="{{asset('assets/modules/cleave-js/dist/cleave.min.js')}}"></script>
  <script src="{{asset('assets/modules/cleave-js/dist/addons/cleave-phone.us.js')}}"></script>
  <script src="{{asset('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
  <script src="{{asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <script src="{{asset('assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
  <script src="{{asset('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
  <script src="{{asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
  <script src="{{asset('assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
  <script src="{{asset('assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>



   
</body>
</html>