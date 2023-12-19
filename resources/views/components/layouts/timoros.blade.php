<!doctype html>
<html lang="{!! app()->getLocale() !!}" dir="{{ app()->getLocale() === 'per' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/57a53d4203.js" crossorigin="anonymous"></script>
    @vite('resources/css/app.css')
    <title>{{ $title ?? '' }} | Shombos Gombol's Admin</title>
</head>
<body class="body-bg {!! app()->getLocale() === 'per' ? 'font-farnaz font-bold' : 'font-viga' !!}">
    <header class="flex items-center text-center">
        @include('components.layouts.partials.admin.user-logout')
    </header>
    {{ $slot }}
</body>
</html>
