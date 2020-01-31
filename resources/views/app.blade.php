<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Julipels</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Vue JS | Bootstrap | Laravel" name="description" />
    <meta content="JuliRash" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body data-sidebar="dark">
   
    <div id="app">
    <Navbar/>      
    </div>

    <div id="app">
        
    </div>

<!-- JAVASCRIPT -->
<script src="{{ asset('/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('/assets/libs/node-waves/waves.min.js') }}"></script>

<script src="{{ asset('assets/js/app.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>