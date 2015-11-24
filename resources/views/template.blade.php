<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Campanella Florian, Giffon Luc, Léotier Nicolas">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EventShop</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    
    <!-- Rotating Card CSS -->
    <link href="{{ URL::asset('css/rotating-card.css') }}" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="{{ URL::asset('css/modern-business.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    @yield('homestyles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	@include('nav')

    <div class="container">
	    @yield('contenu')

        <hr>

	    @include('footer')
    </div>

    <!-- jQuery -->
    <script src="{{ URL::asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

    <!--Dynamic scripts added from a view would be pasted here-->
    @yield('homescripts')
</body>

</html>













