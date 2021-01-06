<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Admin | @yield('title',"Control Panel")</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="app-url" content="{{  $_SERVER['PHP_SELF'] }}">

        @include('layouts.head')
    </head>
<body class="fixed-left">
    <!-- Loader -->
    <div id="preloader"><div id="status"><div class="spinner"></div></div></div>
    <div id="wrapper">
        @include('layouts.header')
        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                @include('layouts.sidebar')
                @yield('content')
            </div>
            @include('layouts.footer')  
        </div>
    </div>
    @include('layouts.footer-script')
    <script type="text/javascript">
        var idleTime = 0;
        $(document).ready(function () {
            //Increment the idle time counter every minute.
            var idleInterval = setInterval(timerIncrement, 60000); // 1 minute
        
            //Zero the idle timer on mouse movement.
            $(this).mousemove(function (e) {
                idleTime = 0;
            });
            $(this).keypress(function (e) {
                idleTime = 0;
            });
        });
        
        function timerIncrement() {
            idleTime = idleTime + 1;
            if (idleTime > 1) { // 20 minutes
                window.location.reload();
            }
        }
        </script>   
</body>
</html>