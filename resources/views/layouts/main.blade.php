<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    @include('includes.css-plugin')
</head>
<body>
    @yield('master')
    @include('includes.js-plugin')
</body>
</html>