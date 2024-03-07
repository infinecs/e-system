<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../../">
    <meta charset="utf-8">
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
       
        
       @yield('content')

        
    </div> <!-- .nk-app-root -->
</body>
<!-- JavaScript -->
<script src="./assets/js/bundle.js"></script>
<script src="./assets/js/scripts.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@include('inc.script') 

</html>