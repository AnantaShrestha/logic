<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin Dashboard</title>
    <!-- Favicon icon -->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendor/sweetalert2/dist/sweetalert2.min.css')}}">
    @stack('style')
</head>
<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <div id="main-wrapper">
        @include($ADMINTEMPLATEROOT.'layouts.nav-header')
        @include($ADMINTEMPLATEROOT.'layouts.header')
        @include($ADMINTEMPLATEROOT.'layouts.sidebar')
        <div class="content-body">
           @yield('content')
        </div>

    </div>

    <!-- Required vendors -->
    <script src="{{asset('admin/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('admin/js/quixnav-init.js')}}"></script>
    <script src="{{asset('admin/js/custom.min.js')}}"></script>
    <script src="{{asset('admin/vendor/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    @include($ADMINTEMPLATEROOT.'scripts.alertmessage')
    @stack('scripts')
</body>

</html>