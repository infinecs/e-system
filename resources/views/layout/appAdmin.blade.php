<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../../">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Multi-purpose admin dashboard template that especially build for programmers.">
    <title>Infinecs E-Learning Systems</title>
    <link rel="shortcut icon" href="{{asset('images/logo/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css?v1.1.1')}}">
</head>

<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg">
    <!-- Root  -->
    <div class="nk-app-root">
        <!-- main  -->
        <div class="nk-main">
            @include('inc.sidebarNavAdmin') 
            @yield('content')
            @include('sweetalert::alert')
            @include('inc.footer') 
        </div> <!-- .nk-wrap -->
    </div> <!-- .nk-main -->
    </div> <!-- .nk-app-root -->

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="{{asset('assets/js/bundle.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src="{{asset('assets/js/charts/analytics-chart.js')}}"></script>
    <script src="{{asset('assets/js/data-tables/data-tables.js')}}"></script>
    <script src="{{asset('assets/js/libs/editors/quill.js')}}"></script>
    <script src="{{asset('assets/js/editors/quill.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/css/libs/editors/quill.css?v1.1.1')}}">
    
    <!-- Include other custom scripts here -->

    @include('inc.script')
</body>

</html>
