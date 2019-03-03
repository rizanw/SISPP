<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/fa.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/tabulator.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/tabulator_bootstrap4.min.css') }}">
    @yield('styles')
    <style>
        .table-controls{
            padding: 10px 0px;
        }
        .container-utama{
            padding: 5px 7% !important;
        }
        @media only screen and (min-width: 1400px) {
            .modal-trans{
                max-width: 30% !important;
            }
        }
    </style>
</head>
<body>
@include('partials.header')
@yield('content')
<script type="text/javascript" src="{{ URL::to('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/fa.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::to('js/tabulator.min.js') }}"></script>

@yield('modal')
@yield('scripts')
</body>
</html>
