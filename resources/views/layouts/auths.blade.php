<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="A place where domestic violence and related immorals are eradicated!">
        <meta name="author" content="Bruno Nicholas">
        <meta name="keyword" content="Open Home,Bruno Nicholas,Violence">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') | {{ config('app.name') }}</title>
        <!-- start: Css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/bootstrap.min.css') }}">
        <!-- plugins -->
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/font-awesome.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/simple-line-icons.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/animate.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/icheck/skins/flat/aero.css') }}"/>
        <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
        <!-- end: Css -->

        <link rel="shortcut icon" href="asset/img/logomi.png">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body id="mimin" class="dashboard form-signin-wrapper">
        <div class="container" style="background-image: url({{ asset('asset/img/login.jpg') }}),linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ); background-size: cover; align-items: center; background-attachment: fixed; width: 100%; height: 100%;">
            @yield('content')
        </div>
        <!-- end: Content -->
        <!-- start: Javascript -->
        <script src="asset/js/jquery.min.js"></script>
        <script src="asset/js/jquery.ui.min.js"></script>
        <script src="asset/js/bootstrap.min.js"></script>

        <script src="asset/js/plugins/moment.min.js"></script>
        <script src="asset/js/plugins/icheck.min.js"></script>
        <!-- custom -->
        <script src="asset/js/main.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-aero',
                radioClass: 'iradio_flat-aero'
              });
            });
        </script>
        <!-- end: Javascript -->
    </body>
</html>