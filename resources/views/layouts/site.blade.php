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
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
        <!-- plugins -->
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/font-awesome.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/simple-line-icons.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/animate.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('asset/css/plugins/fullcalendar.min.css') }}"/>
	    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
        <style type="text/css"> .prof-icons { padding-top: 5px; margin-bottom: 0px; } .prof-icons:hover { color: #fff; text-shadow: 1px 1px 1px #ccc; font-size: 1.5em; background-color: red; padding: 3px; border-radius: 3px;  } </style>
        @yield('styles')
	    <!-- end: Css -->
	    <link rel="shortcut icon" href="{{ asset('asset/img/logomi.png') }}">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body id="mimin" class="dashboard">
        <!-- start: Header -->
        @include('layouts.includes.header')
        <!-- end: Header -->

        <div class="container-fluid mimin-wrapper">
            <!-- start:Left Menu -->
            @include('layouts.includes.side')
            <!-- end: Left Menu -->

            <!-- start: content -->
            <div id="content">
                @yield('content')
      		  </div>
            <!-- end: content -->
            <!-- start: right menu -->
            @permission('can_view_right_bar')
                @include('layouts.includes.right') 
            @endpermission
            <!-- end: right menu -->
        </div>

        <!-- start: Mobile -->
        @include('layouts.includes.mob_side')
        <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
            <span class="fa fa-bars"></span>
        </button>
        <!-- end: Mobile -->

        <!-- start: Javascript -->
        <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
        <script src="{{ asset('asset/js/jquery.ui.min.js') }}"></script>
        <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
        <!-- plugins -->
        <script src="{{ asset('asset/js/plugins/moment.min.js') }}"></script>
        <script src="{{ asset('asset/js/plugins/fullcalendar.min.js') }}"></script>
        <script src="{{ asset('asset/js/plugins/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('asset/js/plugins/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('asset/js/plugins/maps/jquery.vmap.world.js') }}"></script>
        <script src="{{ asset('asset/js/plugins/jquery.vmap.sampledata.js') }}"></script>
        <script src="{{ asset('asset/js/plugins/chart.min.js') }}"></script>
        <!-- custom -->
        @yield('scripts')
        <script src="{{ asset('asset/js/main.js') }}"></script>
    </body>
</html>