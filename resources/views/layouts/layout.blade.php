<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/fa.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/helper.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/tabulator.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/tabulator_bootstrap4.min.css') }}">
    @yield('styles')
    <style>
        .table-controls{
            padding: 10px 0px;
        }
        @media only screen and (min-width: 1400px) {
            .modal-trans{
                max-width: 30% !important;
            }
        }
    </style>
</head>
<body class="fix-header fix-sidebar">
@include('partials.header')
@yield('content')
<script type="text/javascript" src="{{ URL::to('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/jquery.slimscroll.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/fa.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/sidebarmenu.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/script.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/custom.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/tabulator.min.js') }}"></script>

@yield('modal')
@yield('scripts')
</body>
</html>
