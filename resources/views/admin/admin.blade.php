

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('adminboostrap/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminboostrap/vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('adminboostrap/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('adminboostrap/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('adminboostrap/images/favicon.png') }}">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">


    @livewireStyles
</head>
<body>




  <div class="container-scroller">

    @include('admin.inccomoponent.navbar')

    <div class="container-fluid page-body-wrapper">
        @include("admin.inccomoponent.sidebard")


        <div class="main-panel">



            <div class="content-wrapper">


                @yield('content')


            </div>
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                  <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="https://www.uniq.edu" target="_blank">SG-uniq</a>2023</span>
                  <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">all right reserved</span>
                </div>
                </footer>
    </div>
    </div>
  </div>



    <script src="{{ asset('assets/js/jquery-3.7.0.js') }}"></script>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>


    <script src="{{ asset('adminboostrap/vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{asset('adminboostrap/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{asset('adminboostrap/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('adminboostrap/js/off-canvas.js')}}"></script>
    <script src="{{asset('adminboostrapjs/hoverable-collapse.js')}}"></script>
    <script src="{{asset('adminboostrap/js/template.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('adminboostrap/js/dashboard.js') }}"></script>
    <script src="{{ asset('adminboostrap/js/data-table.js') }}"></script>
    <script src="{{ asset('adminboostrap/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('adminboostrap/js/dataTables.bootstrap4.js') }}"></script>
    <!-- End custom js for this page-->
    <script src="{{ asset('js/jquery.cookie.js') }}" type="text/javascript"></script>




    <script src="{{ asset('assets/js/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    @livewireScripts
</body>
</html>
