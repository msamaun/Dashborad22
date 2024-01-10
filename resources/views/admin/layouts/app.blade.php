<!DOCTYPE html>
<html>
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/vendors')}}/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/vendors')}}/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/vendors')}}/images/favicon-16x16.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors')}}/styles/core.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors')}}/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/src')}}/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/src')}}/plugins/datatables/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors')}}/styles/style.css">


    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/config.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('js/toastify-js.js')}}"></script>
    <script src="{{asset('form/vendor')}}/jquery/jquery.min.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>
<body>
<div id="loader" class="d-none"></div>

@include('admin.components.dashboard.header')

<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="{{asset('assets/vendors')}}/images/deskapp-logo.svg" alt="" class="dark-logo">
            <img src="{{asset('assets/vendors')}}/images/deskapp-logo-white.svg" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    @include('admin.components.dashboard.sideber')
</div>
<div class="mobile-menu-overlay"></div>

@yield('content')




<script src="{{asset('assets/vendors')}}/scripts/core.js"></script>
<script src="{{asset('assets/vendors')}}/scripts/script.min.js"></script>
<script src="{{asset('assets/vendors')}}/scripts/process.js"></script>
<script src="{{asset('assets/vendors')}}/scripts/layout-settings.js"></script>
<script src="{{asset('assets/src')}}/plugins/apexcharts/apexcharts.min.js"></script>
<script src="{{asset('assets/src')}}/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets/src')}}/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assets/src')}}/plugins/datatables/js/dataTables.responsive.min.js"></script>
<script src="{{asset('assets/src')}}/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('assets/vendors')}}/scripts/dashboard.js"></script>
</body>
</html>
