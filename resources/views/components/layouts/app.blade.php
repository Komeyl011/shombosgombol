<!doctype html>
<html lang="{!! app()->getLocale() !!}" dir="{{ app()->getLocale() === 'per' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="{!! __('header.cont') !!}">
    <meta name="author" content="{{ app()->getLocale() === 'per' ? 'شومبوس گومبول' : 'Shombos Gombol' }}"
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/57a53d4203.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
    <title>
        @section('page_title')
            @yield('page_title')
        @show
         | Shombos Gombol's Website
    </title>
</head>
<body class="w-full body-bg text-white {!! app()->getLocale() === 'per' ? 'font-farnaz font-bold' : 'font-viga' !!}">
    <!-- HEADER -->
    @include('components.layouts.partials.header')
    <!-- LEFT SIDEBAR -->
    @include('components.layouts.partials.left-sidebar')
    <!-- Right SIDEBAR -->
    @include('components.layouts.partials.right-sidebar')
    <!-- MAIN CONTENT -->
    @yield('main')
    <!-- FOOTER -->
    @include('components.layouts.partials.footer')
</body>
</html>
